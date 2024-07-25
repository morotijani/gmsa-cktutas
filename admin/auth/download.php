<?php

// upload.php
require_once ("../../db_connection/conn.php");

$fileName = '';
if (isset($_GET['file'])) {
	
	$fileName = BASEURL . $_GET['file'];

	if (file_exists($fileName)) {
		// code...
		$mimeType = mime_content_type($fileName); 
		header("Content-type: " . $mimeType);
		header("Content-Disposition: attachment; filename=" . $fileName);

		readfile($fileName);

		$log_message = "download a drive file " . $fileName . "";
        add_to_log($log_message, $admin_data['admin_id']);
	} else {
		$_SESSION['flash_error'] = 'File not found!';
		redirect(PROOT . 'admin/drive');
	}
	echo 'success';
}
