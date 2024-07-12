<?php

	// Connection To Database
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$conn = new PDO("mysql:host=$servername;dbname=gmsa", $username, $password);

	session_start();

	date_default_timezone_set("Africa/Accra");

	require_once($_SERVER['DOCUMENT_ROOT'].'/gmsa/config.php');
 	require_once(BASEURL.'helpers/helpers.php');

 ///////////////////////////////////////////////////////////////////////////////////////////
 	$siteQuery = "
	    SELECT * FROM garypie_about 
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

///////////////////////////////////////////////////////////////////////////////////////////////////////

 	use Slim\Http\Request;
	use Slim\Http\Response;
	use Stripe\Stripe;

 	require BASEURL.'vendor/autoload.php';

 	// Stripe gateway
    $stripe = new \Stripe\StripeClient(STRIPE_PRIVATE);



////////////////////////////////////////////////////////////////////////////////////////////////

 	$cart_id = '';
 	// check if cart exist in cookie
 	if (isset($_COOKIE[CART_COOKIE])) {
 		$cart_id = sanitize($_COOKIE[CART_COOKIE]);

 		$cartQ = "
 			SELECT * FROM garypie_cart 
 			WHERE cart_id = ?
 		";
 		$statement = $conn->prepare($cartQ);
 		$statement->execute([$cart_id]);
 		if ($statement->rowCount() > 0) {
 			// code... if cookie exist but does not exist in database then delete cookie form browser
 			//echo 'exist';
 		} else {
 			$domain = ($_SERVER['HTTP_HOST'] != 'localhost')? '.'.$_SERVER['HTTP_HOST']: false;
			setcookie(CART_COOKIE,'',1,"/",$domain,false);
 			//echo 'deleted';
 		}
 	}


////////////////////////////////////////////////////////////////////////////////////////////////////////
 	// ADMIN LOGIN
 	if (isset($_SESSION['ATAdmin'])) {
 		$admin_id = $_SESSION['ATAdmin'];
 		$data = array(
 			':admin_id' => $admin_id
 		);
 		$sql = "
 			SELECT * FROM garypie_admin 
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

/////////////////////////////////////////////////////////////////////////////////////////////////////
 	// USER LOGIN
 	if (isset($_SESSION['GPUser'])) {
 		$user_id = $_SESSION['GPUser'];
 		$data = array(
 			':user_id' => $user_id,
 			':user_trash' => 0
 		);
 		$sql = "
 			SELECT * FROM garypie_user 
 			WHERE user_id = :user_id 
 			AND user_trash = :user_trash 
 			LIMIT 1
 		";
 		$statement = $conn->prepare($sql);
 		$statement->execute($data);
 		if ($statement->rowCount() > 0) {
	 		foreach ($statement->fetchAll() as $user_data) {
	 			$fn = explode(' ', $user_data['user_fullname']);
	 			$user_data['first'] = ucwords($fn[0]);
	 			$user_data['last'] = '';
	 			if (count($fn) > 1) {
	 				$user_data['last'] = ucwords($fn[1]);
	 			}
	 		}
 		} else {
 			unset($_SESSION['GPUser']);
 			redirect(PROOT . 'store/index');
 		}

 	}

 	// Display on Messages on Errors And Success
 	$flash = '';
 	if (isset($_SESSION['flash_success'])) {
 	 	$flash = '
 	 		<div class="bg-success" id="temporary">
 	 			<p class="text-white">'.$_SESSION['flash_success'].'</p>
 	 		</div>';
 	 	unset($_SESSION['flash_success']);
 	}

 	if (isset($_SESSION['flash_error'])) {
 	 	$flash = '
 	 		<div class="bg-danger" id="temporary">
 	 			<p class="text-white">'.$_SESSION['flash_error'].'</p>
 	 		</div>';
 	 	unset($_SESSION['flash_error']);
 	}
