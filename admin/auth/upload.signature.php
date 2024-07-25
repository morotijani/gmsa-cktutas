<?php 

	// Upload signature And Save To dbs 

	require_once ("../../db_connection/conn.php");

	if ($_FILES["signature"]["name"]  != '') {

		$test = explode(".", $_FILES["signature"]["name"]);

		$extention = end($test);

		$name = rand(100, 999) . '.' . $extention;

		$nameLoc = 'assets/media/signature/' . $name;

		$location = BASEURL . $nameLoc;

		$move = move_uploaded_file($_FILES["signature"]["tmp_name"], $location);

		if ($move) {
			// code...
			$query = "
				UPDATE gmsa_about 
				SET signature = ?
			";
			$statement = $conn->prepare($query);
			$result = $statement->execute([$nameLoc]);
			
			if ($result) {
				// code...

				$log_message = "update admin signature";
                add_to_log($log_message, $admin_data['admin_id']);

				echo '
					<div id="removeTempuploadedFile" class="list-group list-group-flush list-group-divider">
						<div class="list-group-item">
							<div class="list-group-item-figure">
								<div class="tile tile-img">
									<img src="' . PROOT . 'assets/media/signature/'.$name.'" width="32" height="32" />
									<input type="hidden" name="uploaded_image" id="uploaded_image" value="' . $location . '">
								</div>
							</div>
							<div class="list-group-item-body">
							<div class="media align-items-center">
								<div class="media-body">' . $name .'</div>
									<div class="media-actions">
										<button type="button" class="btn btn-sm btn-secondary removeSignature" id="' . $location . '">Remove</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				';
			}
		}

	}

