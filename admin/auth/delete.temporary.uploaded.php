<?php 

	// Delete Temporary Uploaded img
	require_once ("../../db_connection/conn.php");

	if (isset($_POST['tempuploded_file_id'])) {

		$tempuploded_img_id_filePath = $_POST['tempuploded_file_id'];

		unlink($tempuploded_img_id_filePath);

		$log_message = "deleted temporary uploaded file " . $_POST['tempuploded_file_id'];
        add_to_log($log_message, $admin_data['admin_id']);
	}
