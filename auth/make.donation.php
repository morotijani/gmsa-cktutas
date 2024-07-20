<?php

    // Pay dues page

    require_once ("./../db_connection/conn.php");

    $curl = curl_init();
  
    if (isset($_POST['reference'])) {

        $name = sanitize($_POST['student_id']);
        $phone = sanitize($_POST['level']);
        $email = sanitize($_POST['reference']);
        $amount = sanitize($_POST['amount']);
        $reference = sanitize($_POST['reference']);

        $donation_id = guidv4();
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
                        INSERT INTO `gmsa_donations`(`donation_id`, `name`, `email`, `phone`, `amount`, `reference`, `createdAt`) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)
                    ";
                    $statement = $conn->prepare($query);
                    $statement->execute([$donation_id, $name, $phone, $email, $phone, $amount, $reference, $createdAt]);
                    echo '';
                } else {
                    echo 'transaction did not go through please try again!';
                }
            } else {
                echo 'cmon what are you trying to do bro';
            }
        }

        
    }