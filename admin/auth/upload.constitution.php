<?php 

	// Upload constitution And Save To dbs 

	require_once ("../../db_connection/conn.php");

	if ($_FILES["constitution"]["name"]  != '') {

		$test = explode(".", $_FILES["constitution"]["name"]);

		$extention = end($test);

		$name = 'GMSA-CK-TUTAS-CONSTITUTION.' . $extention;

		$nameLoc = 'assets/media/constitution/' . $name;

		$location = BASEURL . $nameLoc;

		$move = move_uploaded_file($_FILES["constitution"]["tmp_name"], $location);

		if ($move) {
			// code...
			$query = "
				UPDATE gmsa_about 
				SET constitution = ?
			";
			$statement = $conn->prepare($query);
			$result = $statement->execute([$nameLoc]);
			
			if ($result) {
				// code...

				$log_message = "update admin constitution";
                add_to_log($log_message, $admin_data['admin_id']);

				echo '
					<div class="card">
                        <div class="card-body">
                            <iframe 
                                src="<?= PROOT . $site_row['constitution']; ?>"
                                style="width:100%; height:200px;" 
                                frameborder="0"
                                scrolling="auto"
                            ></iframe>
                        </div>
                        <div class="d-flex justify-content-between p-3">
                            <a href="<?= PROOT . $site_row['constitution']; ?>" target="_blank" class="btn btn-light">Preview</a>
                            <button type="button" class="btn btn-sm btn-secondary removeConstitution" id="<?= BASEURL . $site_row['constitution']; ?>">Remove</button>
                        </div>
                    </div>

					<div id="removeTempuploadedFile" class="list-group list-group-flush list-group-divider">
						<div class="list-group-item">
							<div class="list-group-item-figure">
								<div class="tile tile-img">
									<img src="' . PROOT . 'assets/media/constitution/'.$name.'" width="32" height="32" />
									<input type="hidden" name="uploaded_image" id="uploaded_image" value="' . $location . '">
								</div>
							</div>
							<div class="list-group-item-body">
							<div class="media align-items-center">
								<div class="media-body">' . $name .'</div>
									<div class="media-actions">
										<button type="button" class="btn btn-sm btn-secondary removeConstitution" id="' . $location . '">Remove</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				';
			}
		}

	}

