<?php 
    require_once ("../../db_connection/conn.php");

    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    $class = \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class;
    \PhpOffice\PhpSpreadsheet\IOFactory::registerWriter('Pdf', $class);


    if (isset($_GET['export']) && !empty($_GET['export'])) {
        $data = sanitize($_GET['export']);
        $fileName = "GMSA-CKTUTAS-MEMBERS-" . strtoupper($data) . "-SHEET";

        $status = 0;
        if ($data == 'archive') {
            $status = 1;
        }
        $query = "
            SELECT * 
            FROM gmsa_members 
            WHERE gmsa_members.status  = ?
        ";
        $statement = $conn->prepare($query);
        $statement->execute([$status]);
        $rows = $statement->fetchAll();
        $count_row = $statement->fetchAll();
        if ($count_row > 0) {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Header
            $sheet->setCellValue('A1', 'MEMBER ID');
            $sheet->setCellValue('B1', 'MEMBER FIRST NAME');
            $sheet->setCellValue('C1', 'MEMBER MIDDLE NAME');
            $sheet->setCellValue('D1', 'MEMBER LAST NAME');
            $sheet->setCellValue('E1', 'MEMBER EMAIL');
            $sheet->setCellValue('F1', 'MEMBER PHONE');
            $sheet->setCellValue('G1', 'MEMBER GENDER');
            $sheet->setCellValue('H1', 'MEMBER DATE OF BIRTH');
            $sheet->setCellValue('I1', 'MEMBER REGION');
            $sheet->setCellValue('J1', 'MEMBER CITY');
            $sheet->setCellValue('K1', 'MEMBER DIGITAL ADDRESS');
            $sheet->setCellValue('L1', 'MEMBER STUDENT ID');
            $sheet->setCellValue('M1', 'MEMBER PROGRAMME');
            $sheet->setCellValue('N1', 'MEMBER DEPARTMENT');
            $sheet->setCellValue('O1', 'MEMBER ADDMISSION TYPE');
            $sheet->setCellValue('P1', 'MEMBER YEAR');
            $sheet->setCellValue('Q1', 'MEMBER HOSTEL');
            $sheet->setCellValue('R1', 'MEMBER LEVEL');
            $sheet->setCellValue('S1', 'MEMBER GURDIAN FULL NAME');
            $sheet->setCellValue('T1', 'MEMBER GURDIAN PHONE NUMBER');
            $sheet->setCellValue('U1', 'MEMBER PICTURE');
            $sheet->setCellValue('V1', 'DATE');

            $rowCount = 2;
            foreach ($rows as $row) {
                $sheet->setCellValue('A' . $rowCount, $row['member_id']);
                $sheet->setCellValue('B' . $rowCount, ucwords($row['member_firstname']));
                $sheet->setCellValue('C' . $rowCount, ucwords($row['member_middlename']));
                $sheet->setCellValue('D' . $rowCount, ucwords($row['member_lastname']));
                $sheet->setCellValue('E' . $rowCount, $row['member_email']);
                $sheet->setCellValue('F' . $rowCount, $row['member_phone']);
                $sheet->setCellValue('G' . $rowCount, $row['member_gender']);
                $sheet->setCellValue('H' . $rowCount, $row['member_dob']);
                $sheet->setCellValue('I' . $rowCount, $row['member_region']);
                $sheet->setCellValue('J' . $rowCount, ucwords($row['member_city']));
                $sheet->setCellValue('K' . $rowCount, $row['member_digitaladdress']);
                $sheet->setCellValue('L' . $rowCount, $row['member_studentid']);
                $sheet->setCellValue('M' . $rowCount, ucwords($row['member_programme']));
                $sheet->setCellValue('N' . $rowCount, ucwords($row['member_department']));
                $sheet->setCellValue('O' . $rowCount, $row['member_admissiontype']);
                $sheet->setCellValue('P' . $rowCount, $row['member_admissionyear']);
                $sheet->setCellValue('Q' . $rowCount, ucwords($row['member_hostel']));
                $sheet->setCellValue('R' . $rowCount, $row['member_level']);
                $sheet->setCellValue('S' . $rowCount, ucwords($row['member_guardianfullname']));
                $sheet->setCellValue('T' . $rowCount, $row['member_guardianphonenumber']);
                $sheet->setCellValue('U' . $rowCount, 'https://gmsacktutas.org/' . $row['member_picture']);
                $sheet->setCellValue('V' . $rowCount, pretty_date($row['createdAt']));
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
            redirect(PROOT . 'admin/members');
        }
    }
