<?php

// upload.php
require_once ("../../db_connection/conn.php");

if (isset($_FILES['media'])) {
	for ($count = 0; $count < count($_FILES['media']['name']); $count++) {
		$extension = pathinfo($_FILES['media']['name'][$count], PATHINFO_EXTENSION);

		$new_name = 'assets/media/drive/' . $_FILES['media']['name'][$count];
		$location = BASEURL . $new_name;
		$dateAded = date('Y-m-d H:i:s A');
		$move = move_uploaded_file($_FILES['media']['tmp_name'][$count], $location);

		$drive_id = guidv4();
		
		if ($move) {
			$query = "
				INSERT INTO gmsa_drive (drive_id, drive_media, upload_by, createdAt) 
				VALUES (?, ?, ?, ?)
			";
			$statement = $conn->prepare($query);
			$result = $statement->execute([$drive_id, $_FILES['media']['name'][$count], $admin_data['admin_id'], $dateAded]);

			if ($result) {
				// code...
				$log_message = "uploaded drive " . $extension . " media file(s)";
	            add_to_log($log_message, $admin_data['admin_id']);
			}
		}

	}

}

