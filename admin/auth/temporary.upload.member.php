<?php 

	// Temporary upload member Image And Save To Draft 

	require_once ("../../db_connection/conn.php");

	if ($_FILES["member_media"]["name"]  != '') {

		$test = explode(".", $_FILES["member_media"]["name"]);

		$extention = end($test);

		$name = rand(100, 999) . '.' . $extention;

		$location = BASEURL . 'assets/media/temporary/' . $name;

		$move = move_uploaded_file($_FILES["member_media"]["tmp_name"], $location);

		if ($move) {
			// code...
			$log_message = "temporary uploaded member file " . $name;
        	add_to_log($log_message, $admin_data['admin_id']);

			echo '
				<div id="removeTempuploadedFile" class="list-group list-group-flush list-group-divider">
					<div class="list-group-item">
						<div class="list-group-item-figure">
							<div class="tile tile-img">
								<img src="' . PROOT . 'assets/media/temporary/'.$name.'" width="32" height="32" />
								<input type="hidden" name="uploaded_image" id="uploaded_image" value="'.$location.'">
							</div>
						</div>
						<div class="list-group-item-body">
						<div class="media align-items-center">
							<div class="media-body">'.$name.'</div>
								<div class="media-actions">
									<button type="button" class="btn btn-sm btn-secondary removeImg" id="'.$location.'">Remove</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			';
		}
	}

