<?php

// upload.php
require_once ("../../db_connection/conn.php");

if (isset($_FILES['images'])) {
	for ($count = 0; $count < count($_FILES['images']['name']); $count++) {
		$extension = pathinfo($_FILES['images']['name'][$count], PATHINFO_EXTENSION);

		$new_name = uniqid() . '.' . $extension;
		$new_name = 'assets/media/gallery/' . $new_name;
		$location = BASEURL . $new_name;
		$dateAded = date('Y-m-d H:i:s A');
		$move = move_uploaded_file($_FILES['images']['tmp_name'][$count], $location);
		
		if ($move) {
			$query = "
				INSERT INTO gmsa_gallery (gallery_media, createdAt) 
				VALUES (?, ?)
			";
			$statement = $conn->prepare($query);
			$result = $statement->execute([$new_name, $dateAded]);

			if ($result) {
				// code...
				$log_message = "uploaded gallery file(s)";
	            add_to_log($log_message, $admin_data['admin_id']);
			}
		}

	}

	echo 'success';
}

