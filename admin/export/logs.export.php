<?php 
    require_once ("../../db_connection/conn.php");

    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }

    // check for permissions
    if (!admin_has_permission()) {
        admin_permission_redirect('index');
    }

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    $class = \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class;
    \PhpOffice\PhpSpreadsheet\IOFactory::registerWriter('Pdf', $class);


    $fileName = "GMSA-CKTUTAS-LOGS-ALL-SHEET";

    $query = "
        SELECT * FROM gmsa_logs 
        WHERE status = ? 
    ";
    $statement = $conn->prepare($query);
    $statement->execute([0]);
    $rows = $statement->fetchAll();
    $count_row = $statement->fetchAll();
    if ($count_row > 0) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'LOG ID');
        $sheet->setCellValue('B1', 'MESSAGE');
        $sheet->setCellValue('C1', 'FROM');
        $sheet->setCellValue('D1', 'DATE');

        $rowCount = 2;
        foreach ($rows as $row) {
            $ad = find_admin_by_admin_id($conn, $row["log_from"]);
            $from_row = '';
            if (is_array($ad)) {
                $from_row = ucwords($ad[0]["admin_fullname"]);
            } else {
                $from_row = $row["log_from"];
            }

            $sheet->setCellValue('A' . $rowCount, $row['log_id']);
            $sheet->setCellValue('B' . $rowCount, $row['log_message']);
            $sheet->setCellValue('C' . $rowCount, $from_row);
            $sheet->setCellValue('D' . $rowCount, pretty_date($row['createdAt']));
            $rowCount++;
        }
        
        $writer = new Xlsx($spreadsheet);
        $NewFileName = $fileName . '-' . date("Y-m-d") . '.xlsx';

        $message = "exported all logs data";
        add_to_log($message, $_SESSION['GMAdmin']);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attactment; filename="' . urlencode($NewFileName) . '"');
        $writer->save('php://output');

    } else {
        $_SESSION['flash_error'] = "No Record Found!";
        redirect(PROOT . 'admin/logs');
    }
