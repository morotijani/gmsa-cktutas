<?php 
    require_once ("../../db_connection/conn.php");

    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    $class = \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class;
    \PhpOffice\PhpSpreadsheet\IOFactory::registerWriter('Pdf', $class);


    $fileName = "GMSA-CKTUTAS-DUES-ALL-SHEET";

    $query = "
        SELECT *, 
        CONCAT(gmsa_members.member_firstname, ' ', gmsa_members.member_middlename, ' ', gmsa_members.member_lastname) full_name, 
        gmsa_dues.createdAt as dca 
        FROM gmsa_dues 
        INNER JOIN gmsa_members 
            ON gmsa_members.member_studentid = gmsa_dues.student_id
        WHERE gmsa_dues.status = ? 
    ";
    $statement = $conn->prepare($query);
    $statement->execute([0]);
    $rows = $statement->fetchAll();
    $count_row = $statement->fetchAll();
    if ($count_row > 0) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'DUES ID');
        $sheet->setCellValue('B1', 'REFERENCE');
        $sheet->setCellValue('C1', 'NAME');
        $sheet->setCellValue('D1', 'EMAIL');
        $sheet->setCellValue('E1', 'LEVEL');
        $sheet->setCellValue('F1', 'AMOUNT (₵)');
        $sheet->setCellValue('G1', 'DATE');

        $rowCount = 2;
        foreach ($rows as $row) {
            $sheet->setCellValue('A' . $rowCount, $row['dues_id']);
            $sheet->setCellValue('B' . $rowCount, $row['transaction_reference']);
            $sheet->setCellValue('C' . $rowCount, ucwords($row['full_name']));
            $sheet->setCellValue('D' . $rowCount, $row['member_email']);
            $sheet->setCellValue('E' . $rowCount, ucwords($row['member_level']));
            $sheet->setCellValue('F' . $rowCount, $row['transaction_amount']);
            $sheet->setCellValue('g' . $rowCount, pretty_date($row['dca']));
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
        redirect(PROOT . 'admin/dues');
    }
