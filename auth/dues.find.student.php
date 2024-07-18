<?php

    // Pay dues page

    require_once ("./../db_connection/conn.php");

    if (isset($_POST['type'])) {
        if ($_POST['type'] == 'find') {
            // code...
            $studentid = sanitize($_POST['studentid']);
            $student = find_member_by_studentID($conn, $studentid);
            if (is_array($student)) {
                if ($student['member_level'] == 100) {
                    // code...
                    $levelAmount = $site_row['dues_for_fresher'];
                } else {
                    $levelAmount = $site_row['dues_for_continue'];

                }
                $sql = "
                    SELECT * FROM gmsa_dues 
                    WHERE student_id = ? 
                ";
                $statement = $conn->prepare($sql);
                $statement->execute([$studentid]);
                $rows = $statement->fetchAll();
                if ($statement->rowCount() > 0) {
                    // code...
                    $amountPaid = 0;
                    foreach ($rows as $row) {
                        // code...
                        $amountPaid += $row['transaction_amount'];
                    }
                    $amountToPay = $levelAmount - $amountPaid;
                    if ($amountToPay == 0) {
                        // code...
                        echo 'you\'ve made full payment';
                    } else {
                        echo 'you are to pay ' . money($amountToPay);
                    }
                } else {
                    echo 'you are to pay ' . money($levelAmount);
                }
            } else {
                echo 'Student not found!';
            }
        } else {
            echo 'Somthing went wrong!';
        }
    }
