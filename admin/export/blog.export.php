<?php 
    require_once ("../../db_connection/conn.php");

    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }

    // check for permissions
    if (!admin_has_permission('editor')) {
        admin_permission_redirect('index');
    }

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    $class = \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class;
    \PhpOffice\PhpSpreadsheet\IOFactory::registerWriter('Pdf', $class);


    if (isset($_GET['export']) && !empty($_GET['export'])) {
        $data = sanitize($_GET['export']);
        $fileName = "GMSA-CKTUTAS-NEWS-" . strtoupper($data) . "-SHEET";

        $status = 0;
        if ($data == 'archive') {
            $status = 1;
        }
        $query = "
            SELECT *, gmsa_news.createdAt news_date 
            FROM gmsa_news 
            INNER JOIN gmsa_categories 
                ON gmsa_categories.category_id = gmsa_news.news_category 
            WHERE gmsa_news.status  = ?
        ";
        $statement = $conn->prepare($query);
        $statement->execute([$status]);
        $rows = $statement->fetchAll();
        $count_row = $statement->fetchAll();
        if ($count_row > 0) {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Header
            $sheet->setCellValue('A1', 'NEWS ID');
            $sheet->setCellValue('B1', 'NEWS TITLE');
            $sheet->setCellValue('C1', 'NEWS CONTENT');
            $sheet->setCellValue('D1', 'NEWS MEDIA');
            $sheet->setCellValue('E1', 'NEWS CATEGORY');
            $sheet->setCellValue('F1', 'NEWS VIEWS');
            $sheet->setCellValue('G1', 'NEWS STATUS');
            $sheet->setCellValue('H1', 'DATE');

            $rowCount = 2;
            foreach ($rows as $row) {
                $sheet->setCellValue('A' . $rowCount, $row['news_id']);
                $sheet->setCellValue('B' . $rowCount, ucwords($row['news_title']));
                $sheet->setCellValue('C' . $rowCount, strip_tags($row['news_content']));
                $sheet->setCellValue('D' . $rowCount, 'https://gmsacktutas.com/' . $row['news_media']);
                $sheet->setCellValue('E' . $rowCount, ucwords($row['category']));
                $sheet->setCellValue('F' . $rowCount, $row['news_views']);
                $sheet->setCellValue('G' . $rowCount, ($row['news_featured'] == 1) ? 'Featured' : '');
                $sheet->setCellValue('H' . $rowCount, pretty_date($row['news_date']));
                $rowCount++;
            }
            
            $writer = new Xlsx($spreadsheet);
            $NewFileName = $fileName . '-' . date("Y-m-d") . '.xlsx';

            $message = "exported " . strtolower($data) . " news data";
            add_to_log($message, $_SESSION['GMAdmin']);

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attactment; filename="' . urlencode($NewFileName) . '"');
            $writer->save('php://output');

        } else {
            $_SESSION['flash_error'] = "No Record Found!";
            redirect(PROOT . 'admin/blog/all');
        }
    }
