<?php 

	// Delete Uploaded signature
	require_once ("../../db_connection/conn.php");
	
	if (isset($_POST['tempuploded_file_id'])) {

		$tempuploded_img_id_filePath = $_POST['tempuploded_file_id'];

		$remove = unlink($tempuploded_img_id_filePath);

		if ($remove) {
			$query = "
				UPDATE gmsa_about 
				SET signature = ''
			";
			$statement = $conn->prepare($query);
			$statement->execute();
		}
	}
