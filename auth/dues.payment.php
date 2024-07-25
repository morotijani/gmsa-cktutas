<?php

    // Pay dues page

    require_once ("./../db_connection/conn.php");

    $curl = curl_init();
  
    if (isset($_POST['reference'])) {

        $student_id = sanitize($_POST['student_id']);
        $level = sanitize($_POST['level']);
        $reference = sanitize($_POST['reference']);
        $amount = sanitize($_POST['amount']);

        $dues_id = guidv4();
        $createdAt = date("Y-m-d H:i:s A");

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$reference."",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . PAYSTACK_TEST_SECRETE_KEY . "",
                "Cache-Control: no-cache",
            ),
        ));
      
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
          
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $check_amount = $amount * 100;
            $response = json_decode($response, true);
            if ($check_amount == $response['data']['amount']) {
                // code...
                if ($response['status'] == true) {
                    $query = "
                        INSERT INTO `gmsa_dues`(`dues_id`, `student_id`, `transaction_reference`, `transaction_amount`, `level`, `createdAt`) 
                        VALUES (?, ?, ?, ?, ?, ?)
                    ";
                    $statement = $conn->prepare($query);
                    $statement->execute([$dues_id, $student_id, $reference, $amount, $level, $createdAt]);

                    $log_message = "dues payment made with amount of " . money($amount) . " with student id " . $student_id . ", reference code of " . $reference . " and id " . $dues_id;
                    add_to_log($log_message, $ip_address);

                    echo '';
                } else {
                    echo 'transaction did not go through please try again!';
                }
            } else {
                echo 'cmon what are you trying to do bro';
            }
        }

        
    }