<?php

	// Connection To Database
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$conn = new PDO("mysql:host=$servername;dbname=gmsa", $username, $password);

	session_start();

	date_default_timezone_set("Africa/Accra");

	require_once($_SERVER['DOCUMENT_ROOT'] . '/gmsa-cktutas/config.php');
 	require_once(BASEURL . 'helpers/helpers.php');
 	require_once(BASEURL . 'helpers/functions.php');
 	require_once(BASEURL . 'helpers/Category.php');
 	require_once(BASEURL . 'helpers/News.php');
 	require_once(BASEURL . 'helpers/Search.php');

 ///////////////////////////////////////////////////////////////////////////////////////////
 	$siteQuery = "
	    SELECT * FROM gmsa_about 
	    LIMIT 1
	";
	$statement = $conn->prepare($siteQuery);
	$statement->execute();
	$site_result = $statement->fetchAll();

	foreach ($site_result as $site_row) {
	    $country = ucwords($site_row["about_country"]);
	    $state = ucwords($site_row["about_state"]);
	    $city = ucwords($site_row["about_city"]);
	    $email = $site_row["about_email"];
	    $phone_1 = $site_row["about_phone"];
	    $phone_2 = $site_row["about_phone2"];
	    $fax = $site_row["about_fax"];
	    $street_1 = ucwords($site_row["about_street1"]);
	    $street_2 = ucwords($site_row["about_street2"]);
	    $about_info = $site_row['about_info'];
	}



////////////////////////////////////////////////////////////////////////////////////////////////////////
 	// ADMIN LOGIN
 	if (isset($_SESSION['GMAdmin'])) {
 		$admin_id = $_SESSION['GMAdmin'];
 		$data = array(
 			':admin_id' => $admin_id
 		);
 		$sql = "
 			SELECT * FROM gmsa_admin 
 			WHERE admin_id = :admin_id 
 			LIMIT 1
 		";
 		$statement = $conn->prepare($sql);
 		$statement->execute($data);

 		foreach ($statement->fetchAll() as $admin_data) {
 			$fn = explode(' ', $admin_data['admin_fullname']);
 			$admin_data['first'] = ucwords($fn[0]);
 				$admin_data['last'] = '';
 			if (count($fn) > 1) {
 				$admin_data['last'] = ucwords($fn[1]);
 			}
 		}
 	}


 	// Display on Messages on Errors And Success
 	$flash = '';
 	if (isset($_SESSION['flash_success'])) {
 	 	$flash = '
 	 		<!-- <div class="bg-success" id="temporary">
 	 			<p class="text-white">' . $_SESSION['flash_success'] . '</p>
 	 		</div> -->

 	 		<div class="page-message bg-success" role="alert" id="temporary">
              <i class="fa fa-fw fa-bell"></i> ' . $_SESSION['flash_success'] . ': <span class="text-muted-dark text-sm">' . date('jS F, Y H:i A') . '</span>. <a href="#" class="btn btn-sm btn-icon btn-warning ml-1" aria-label="Close" onclick="$(this).parent().fadeOut()"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>

 	 	';
 	 	unset($_SESSION['flash_success']);
 	}

 	if (isset($_SESSION['flash_error'])) {
 	 	$flash = '
 	 		<!-- <div class="bg-danger" id="temporary">
 	 			<p class="text-white">' . $_SESSION['flash_error'] . '</p>
 	 		</div> -->


 	 		<div class="page-message bg-danger" role="alert" id="temporary">
              <i class="fa fa-fw fa-bell"></i> ' . $_SESSION['flash_error'] . ': <span class="text-muted-dark text-sm">' . date('jS F, Y H:i A') . '</span>. <a href="#" class="btn btn-sm btn-icon btn-warning ml-1" aria-label="Close" onclick="$(this).parent().fadeOut()"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>

 	 	';
 	 	unset($_SESSION['flash_error']);
 	}
