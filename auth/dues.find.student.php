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
                    $amountToPay = $site_row['dues_for_fresher'];
                } else {
                    $amountToPay = $site_row['dues_for_continue'];

                }
                $sql = "

                "
            } else {
                echo 'Student not found!';
            }
        } else {
            echo 'Somthing went wrong!';
        }
    }
