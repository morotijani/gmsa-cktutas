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

					<div id="removeTempuploadedConstitution" class="list-group list-group-flush list-group-divider">
						<div class="card">
	                        <div class="card-body">
	                            <iframe 
	                                src="' . PROOT . 'assets/media/constitution/'.$name.'"
	                                style="width:100%; height:200px;" 
	                                frameborder="0"
	                                scrolling="auto"
	                            ></iframe>
	                        </div>
	                        <div class="p-3">
	                            <button type="button" class="btn btn-sm btn-secondary removeConstitution" id="' . $location . '">Remove</button>
	                        </div>
	                    </div>
					</div>
				';
			}
		}

	}

