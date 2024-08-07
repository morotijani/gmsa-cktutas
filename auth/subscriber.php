<?php 
	// SUBSCRIBE 
	
	require_once ("./../db_connection/conn.php");

	if (isset($_POST['email'])) {
		$email = sanitize($_POST['email']);
		$createdAt = date("Y-m-d H:i:s A");
		$subscriber_id = guidv4();
		$output = '';

		$select = "
			SELECT * FROM gmsa_subscribers 
			WHERE subscriber_email = ? 
			LIMIT 1
		";
		$statement = $conn->prepare($select);
		$statement->execute([$email]);
		$row_count = $statement->rowCount();

		if ($row_count > 0) {
			$output = 'This email '. $email . ' has already subscribed!';
		} else {
			$query = "
				INSERT INTO gmsa_subscribers (subscriber_id, subscriber_email, createdAt) 
				VALUES (?, ?, ?)
			";
			$statement = $conn->prepare($query);
			$result = $statement->execute([$subscriber_id, $email, $createdAt]);
			if ($result) {
				$to = $email;
                $subject = "GMSA CKTUTAS news subscription.";
                $body = "
                    <h3>Hello
                        {$to},</h3>
                        <p>
                            Thank you for subscribing to GMSA CKTUTAS. You will be recieving regualar notifications news, prayer time updates, After Jummah announcement, activity calendar and more.
                        </p>
                        <p>
							Sincerely, <br>
							- GMSA - CKTUTAS.
                        </p>
                ";

				// $mail_result = send_email($to, $to, $subject, $body);
				// if ($mail_result) {
					$output = 'Email subscribed successfully!';
                // } else {
                //     echo "Message could not be sent.";
                // }


                $log_message = "added a subscriber with is " . $subscriber_id . "";
                add_to_log($log_message, $ip_address);
			}
		}
		echo $output;
	}

