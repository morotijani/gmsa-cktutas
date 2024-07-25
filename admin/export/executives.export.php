<?php 
    require_once ("../../db_connection/conn.php");

    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    $class = \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class;
    \PhpOffice\PhpSpreadsheet\IOFactory::registerWriter('Pdf', $class);


    $fileName = "GMSA-CKTUTAS-EXECUTIVES-SHEET";

    
    $query = "
        SELECT *, 
        CONCAT(gmsa_members.member_firstname, ' ', gmsa_members.member_middlename, ' ', gmsa_members.member_lastname) full_name, 
        CONCAT(gmsa_executives.year_from, ' / ', gmsa_executives.year_to) executive_year 
        FROM gmsa_executives 
        INNER JOIN gmsa_members 
            ON gmsa_members.member_id = gmsa_executives.member_id 
        INNER JOIN gmsa_positions 
            ON gmsa_positions.position_id = gmsa_executives.position_id 
        WHERE gmsa_executives.status = ? 
    ";
    $statement = $conn->prepare($query);
    $statement->execute([0]);
    $rows = $statement->fetchAll();
    $count_row = $statement->fetchAll();
    if ($count_row > 0) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'EXECUTIVE ID');
        $sheet->setCellValue('B1', 'EXECUTIVE NAME');
        $sheet->setCellValue('C1', 'EXECUTIVE POSITION');
        $sheet->setCellValue('D1', 'EXECUTIVE YEAR');
        $sheet->setCellValue('E1', 'EXECUTIVE PROGRAMME');
        $sheet->setCellValue('F1', 'EXECUTIVE PHOTO');

        $rowCount = 2;
        foreach ($rows as $row) {
            $sheet->setCellValue('A' . $rowCount, $row['executive_id']);
            $sheet->setCellValue('B' . $rowCount, ucwords($row['full_name']));
            $sheet->setCellValue('C' . $rowCount, ucwords($row['position']));
            $sheet->setCellValue('D' . $rowCount, $row['executive_year']);
            $sheet->setCellValue('E' . $rowCount, ucwords($row['member_programme']));
            $sheet->setCellValue('F' . $rowCount, 'https://gmsacktutas.com/' . $row['member_picture']);
            $rowCount++;
        }
        
        $writer = new Xlsx($spreadsheet);
        $NewFileName = $fileName . '-' . date("Y-m-d") . '.xlsx';

        $message = "exported all executives data";
        add_to_log($message, $_SESSION['GMAdmin']);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attactment; filename="' . urlencode($NewFileName) . '"');
        $writer->save('php://output');

    } else {
        $_SESSION['flash_error'] = "No Record Found!";
        redirect(PROOT . 'admin/executives/all');
    }
