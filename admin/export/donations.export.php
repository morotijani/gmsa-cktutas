<?php 
    require_once ("../../db_connection/conn.php");

    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    $class = \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class;
    \PhpOffice\PhpSpreadsheet\IOFactory::registerWriter('Pdf', $class);


    $fileName = "GMSA-CKTUTAS-DONATIONS-ALL-SHEET";

    $query = "
        SELECT * FROM gmsa_donations 
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
        $sheet->setCellValue('A1', 'DONATION ID');
        $sheet->setCellValue('B1', 'REFERENCE');
        $sheet->setCellValue('C1', 'NAME');
        $sheet->setCellValue('D1', 'EMAIL');
        $sheet->setCellValue('E1', 'PHONE');
        $sheet->setCellValue('F1', 'AMOUNT (₵)');
        $sheet->setCellValue('G1', 'DATE');

        $rowCount = 2;
        foreach ($rows as $row) {
            $sheet->setCellValue('A' . $rowCount, $row['donation_id']);
            $sheet->setCellValue('B' . $rowCount, $row['reference']);
            $sheet->setCellValue('C' . $rowCount, ucwords($row['name']));
            $sheet->setCellValue('D' . $rowCount, $row['email']);
            $sheet->setCellValue('E' . $rowCount, $row['phone']);
            $sheet->setCellValue('F' . $rowCount, money($row['amount']));
            $sheet->setCellValue('G' . $rowCount, pretty_date($row['createdAt']));
            $rowCount++;
        }
        
        $writer = new Xlsx($spreadsheet);
        $NewFileName = $fileName . '-' . date("Y-m-d") . '.xlsx';

        $message = "exported all donations data";
        add_to_log($message, $_SESSION['GMAdmin']);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attactment; filename="' . urlencode($NewFileName) . '"');
        $writer->save('php://output');

    } else {
        $_SESSION['flash_error'] = "No Record Found!";
        redirect(PROOT . 'admin/donations');
    }
