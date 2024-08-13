<?php 

	// Delete Uploaded constitution
	require_once ("../../db_connection/conn.php");
	
	if (isset($_POST['tempuploded_file_id'])) {

		$tempuploded_img_id_filePath = $_POST['tempuploded_file_id'];

		$remove = unlink($tempuploded_img_id_filePath);

		if ($remove) {
			$query = "
				UPDATE gmsa_about 
				SET constitution = ?
			";
			$statement = $conn->prepare($query);
			$result = $statement->execute(['']);

			if ($result) {
				// code...

                $log_message = "deleted constitution media";
                add_to_log($log_message, $admin_data['admin_id']);
			}
		}
	}
