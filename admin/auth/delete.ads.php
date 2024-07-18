<?php 

	// Delete Uploaded ads
	require_once ("../../db_connection/conn.php");
	
	if (isset($_POST['tempuploded_file_id'])) {

		$tempuploded_img_id_filePath = $_POST['tempuploded_file_id'];

		$remove = unlink($tempuploded_img_id_filePath);

		if ($remove) {
			$query = "
				UPDATE gmsa_about 
				SET ads = ''
			";
			$statement = $conn->prepare($query);
			$statement->execute();
		}
	}
