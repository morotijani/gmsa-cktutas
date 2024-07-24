<?php 
    require_once ("../../db_connection/conn.php");

    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    $class = \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class;
    \PhpOffice\PhpSpreadsheet\IOFactory::registerWriter('Pdf', $class);


    $fileName = "GMSA-CKTUTAS-CONTACTS-ALL-SHEET";

    $query = "
        SELECT * FROM gmsa_contacts 
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
        $sheet->setCellValue('A1', 'CONTACT ID');
        $sheet->setCellValue('B1', 'NAME');
        $sheet->setCellValue('C1', 'EMAIL');
        $sheet->setCellValue('D1', 'PHONE');
        $sheet->setCellValue('E1', 'MESSAGE');
        $sheet->setCellValue('F1', 'DATE');

        $rowCount = 2;
        foreach ($rows as $row) {
            $sheet->setCellValue('A' . $rowCount, $row['message_id']);
            $sheet->setCellValue('B' . $rowCount, ucwords($row['message_name']));
            $sheet->setCellValue('C' . $rowCount, ucwords($row['message_email']));
            $sheet->setCellValue('D' . $rowCount, $row['message_phone']);
            $sheet->setCellValue('E' . $rowCount, $row['message']);
            $sheet->setCellValue('F' . $rowCount, pretty_date($row['createdAt']));
            $rowCount++;
        }
        
        $writer = new Xlsx($spreadsheet);
        $NewFileName = $fileName . '-' . date("Y-m-d") . '.xlsx';

        // $message = "exported " . strtoupper($FileExtType) . " trades data";
        // add_to_log($message, $_SESSION['JSAdmin']);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attactment; filename="' . urlencode($NewFileName) . '"');
        $writer->save('php://output');

    } else {
        $_SESSION['flash_error'] = "No Record Found!";
        redirect(PROOT . 'admin/contacts');
    }
