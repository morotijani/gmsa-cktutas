<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require BASEURL . 'vendor/autoload.php';

// IP INFO
use ipinfo\ipinfo\IPinfo;

$access_token = IPINFO_KEY;
$client = new IPinfo($access_token);
$ip = $client->getDetails();
$ip_address = $ip->ip;


function dnd($data) {
	echo "<pre>";
	print_r($data);
	echo "</pre>";
    die;
}

// Make Date Readable
function pretty_date($date){
	return date("M d, Y h:i A", strtotime($date));
}

// Make Date Readable
function pretty_date_notime($date){
	return date("M d, Y", strtotime($date));
}

// Display money in a readable way
function money($number) {
	return '₵' . number_format($number, 2);
}

// Check For Incorrect Input Of Data
function sanitize($dirty) {
    $clean = htmlentities($dirty, ENT_QUOTES, "UTF-8");
    return trim($clean);
}

function cleanPost($post) {
    $clean = [];
    foreach ($post as $key => $value) {
      	if (is_array($value)) {
        	$ary = [];
        	foreach($value as $val) {
          		$ary[] = sanitize($val);
        	}
        	$clean[$key] = $ary;
      	} else {
        	$clean[$key] = sanitize($value);
      	}
    }
    return $clean;
}

//
function php_url_slug($string) {
 	$slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($string)));
 	return $slug;
}


// REDIRECT PAGE
function redirect($url) {
    if(!headers_sent()) {
      	header("Location: {$url}");
    } else {
      	echo '<script>window.location.href="' . $url . '"</script>';
    }
    exit;
}

function issetElse($array, $key, $default = "") {
    if(!isset($array[$key]) || empty($array[$key])) {
      return $default;
    }
    return $array[$key];
}


// Email VALIDATION
function isEmail($email) {
	return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) ? FALSE : TRUE;
}

// GET USER IP ADDRESS
function getIPAddress() {  
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  // whether ip is from the proxy
       $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     } else {  // whether ip is from the remote address 
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
}

// PRINT OUT RANDAM NUMBERS
function digit_random($digits) {
  	return rand(pow(10, $digits - 1) - 1, pow(10, $digits) - 1);
}

function js_alert($msg) {
	return '<script>alert("' . $msg . '");</script>';
}


// 
function sms_otp($msg, $phone) {
	$sender = urlencode("Inqoins VER");
    $api_url = "https://api.innotechdev.com/sendmessage.php?key=".SMS_API_KEY."&message={$msg}&senderid={$sender}&phone={$phone}";
    $json_data = file_get_contents($api_url);
    $response_data = json_decode($json_data);
    // Can be use for checks on finished / unfinished balance
    $fromAPI = 'insufficient balance, kindly credit your account';  
    if ($api_url)
    	return 1;
	else
		return 0;
}

//
function send_email($name, $to, $subject, $body) {
	$mail = new PHPMailer(true);
	try {
        $fn = $name;
        $to = $to;
        $from = MAIL_MAIL;
        $from_name = 'Garypie, Shop.';
        $subject = $subject;
        $body = $body;

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        $mail->IsSMTP();
        $mail->SMTPAuth = true;

        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'smtp.garypie.com';
        $mail->Port = 465;  
        $mail->Username = $from;
        $mail->Password = MAIL_KEY; 

        $mail->IsHTML(true);
        $mail->WordWrap = 50;
        $mail->From = $from;
        $mail->FromName = $from_name;
        $mail->Sender = $from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        $mail->send();
        return true;
    } catch (Exception $e) {
    	//return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    	return false;
        //$message = "Please check your internet connection well...";
    }
}

// send mail to server
function send_mail_to_server($subject, $body) {
	$to_server = MAIL_MAIL;

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From:" . $contact_email;
                
    mail($to_server, $subject, $body, $headers);
}


// Generate UUID VERSION 4
function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

/// find user agent
function getBrowserAndOs() {

    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser = "N/A";

    $browsers = array(
        '/msie/i' => 'Internet explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/mobile/i' => 'Mobile browser'
    );

    foreach ($browsers as $regex => $value) {
        if (preg_match($regex, $user_agent)) { $browser = $value; }
    }

    $visitor_agent_division = explode("(", $user_agent)[1];
    list($os, $division_two) = explode(")", $visitor_agent_division);

    $refferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

    $visitor_broswer_os = array(
        'browser' => $browser,
        'operatingSystem' => $os,
        'refferer' => $refferer
    );

   	$output = json_encode($visitor_broswer_os);

    return $output;
}


function display_errors($errors) {
    $display = '<div class="lead bg-danger text-white text-center">';
    foreach ($errors as $error) {
        // code...
        $display .= $error;
        break;
    }
    $display .= '
		</div>
    ';
    return $display;
}

function convertNumber($number) {
    list($integer, $fraction) = explode(".", (string) $number);

    $output = "";

    if ($integer[0] == "-") {
        $output = "negative ";
        $integer    = ltrim($integer, "-");
    } else if ($integer[0] == "+") {
        $output = "positive ";
        $integer    = ltrim($integer, "+");
    }

    if ($integer[0] == "0") {
        $output .= "zero";
    } else {
        $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
        $group   = rtrim(chunk_split($integer, 3, " "), " ");
        $groups  = explode(" ", $group);

        $groups2 = array();
        foreach ($groups as $g) {
            $groups2[] = convertThreeDigit($g[0], $g[1], $g[2]);
        }

        for ($z = 0; $z < count($groups2); $z++) {
            if ($groups2[$z] != "") {
                $output .= $groups2[$z] . convertGroup(11 - $z) . (
                        $z < 11
                        && !array_search('', array_slice($groups2, $z + 1, -1))
                        && $groups2[11] != ''
                        && $groups[11][0] == '0'
                            ? " and "
                            : ", "
                    );
            }
        }

        $output = rtrim($output, ", ");
    }

    if ($fraction > 0) {
        $output .= " point";
        for ($i = 0; $i < strlen($fraction); $i++) {
            $output .= " " . convertDigit($fraction[$i]);
        }
    }

    return $output;
}

function convertGroup($index) {
    switch ($index) {
        case 11:
            return " decillion";
        case 10:
            return " nonillion";
        case 9:
            return " octillion";
        case 8:
            return " septillion";
        case 7:
            return " sextillion";
        case 6:
            return " quintrillion";
        case 5:
            return " quadrillion";
        case 4:
            return " trillion";
        case 3:
            return " billion";
        case 2:
            return " million";
        case 1:
            return " thousand";
        case 0:
            return "";
    }
}

function convertThreeDigit($digit1, $digit2, $digit3) {
    $buffer = "";

    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0") {
        return "";
    }

    if ($digit1 != "0") {
        $buffer .= convertDigit($digit1) . " hundred";
        if ($digit2 != "0" || $digit3 != "0")
        {
            $buffer .= " and ";
        }
    }

    if ($digit2 != "0") {
        $buffer .= convertTwoDigit($digit2, $digit3);
    }
    else if ($digit3 != "0") {
        $buffer .= convertDigit($digit3);
    }

    return $buffer;
}

function convertTwoDigit($digit1, $digit2) {
    if ($digit2 == "0") {
        switch ($digit1) {
            case "1":
                return "ten";
            case "2":
                return "twenty";
            case "3":
                return "thirty";
            case "4":
                return "forty";
            case "5":
                return "fifty";
            case "6":
                return "sixty";
            case "7":
                return "seventy";
            case "8":
                return "eighty";
            case "9":
                return "ninety";
        }
    } else if ($digit1 == "1") {
        switch ($digit2) {
            case "1":
                return "eleven";
            case "2":
                return "twelve";
            case "3":
                return "thirteen";
            case "4":
                return "fourteen";
            case "5":
                return "fifteen";
            case "6":
                return "sixteen";
            case "7":
                return "seventeen";
            case "8":
                return "eighteen";
            case "9":
                return "nineteen";
        }
    } else {
        $temp = convertDigit($digit2);
        switch ($digit1) {
            case "2":
                return "twenty-$temp";
            case "3":
                return "thirty-$temp";
            case "4":
                return "forty-$temp";
            case "5":
                return "fifty-$temp";
            case "6":
                return "sixty-$temp";
            case "7":
                return "seventy-$temp";
            case "8":
                return "eighty-$temp";
            case "9":
                return "ninety-$temp";
        }
    }
}

function convertDigit($digit) {
    switch ($digit) {
        case "0":
            return "zero";
        case "1":
            return "one";
        case "2":
            return "two";
        case "3":
            return "three";
        case "4":
            return "four";
        case "5":
            return "five";
        case "6":
            return "six";
        case "7":
            return "seven";
        case "8":
            return "eight";
        case "9":
            return "nine";
    }
}

// go back
function goBack() {
    $previous = "javascript:history.go(-1)";
    if (isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
    }
    return $previous;
}

// get file size
function getFilesize($file) {
    if (!file_exists($file)) return "File does not exist";

    $filesize = filesize($file);

    if ($filesize > 1024) {
        $filesize = ($filesize / 1024);

        if ($filesize > 1024) {
            $filesize = ($filesize / 1024);

            if ($filesize > 1024) {
                $filesize = ($filesize / 1024);
                $filesize = round($filesize, 1);
                return $filesize." GB";
            } else {
                $filesize = round($filesize, 1);
                return $filesize." MB";
            }
        } else {
            $filesize = round($filesize, 1);
            return $filesize." KB";
        }
    } else {
        $filesize = round($filesize, 1);
        return $filesize." Bytes";
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////


function get_header_information() {
	global $conn;
	$siteQuery = "
	    SELECT * FROM garypie_about 
	    LIMIT 1
	";
	$statement = $conn->prepare($siteQuery);
	$statement->execute();
	$site_result = $statement->fetchAll();

	foreach ($site_result as $site_row) {
	    $phone_1 = $site_row["about_phone"];
	}
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$actual_linkBreakDown = explode('/', $actual_link);
	$actual_linkLast = end($actual_linkBreakDown);

	$output = '';
	if ($actual_linkLast != 'signin' && $actual_linkLast != 'signin.php') {

		$output .= '
		<div class="header-eyebrow bg-dark">
		<div class="container">
		<div class="navbar navbar-dark row">
		<div class="col">
		<ul class="navbar-nav mr-auto">
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="javascript:;" id="curency" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		USD
		</a>
		<ul class="dropdown-menu" aria-labelledby="curency">
		<li><a class="dropdown-item" href="javascript:;">EUR</a></li>
		<li><a class="dropdown-item" href="javascript:;">RUB</a></li>
		</ul>
		</li>
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#!" id="language" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		EN
		</a>
		<ul class="dropdown-menu" aria-labelledby="language">
		<li><a class="dropdown-item" href="#!">Deutsch</a></li>
		<li><a class="dropdown-item" href="#!">Russian</a></li>
		<li><a class="dropdown-item" href="#!">French</a></li>
		</ul>
		</li>
		</ul>
		</div>
		<div class="col text-right">
		<span class="phone text-white">'.$phone_1.'</span>
		</div>
		</div>
		</div>
		</div>
		';

	} else {
		$output = '';
	}
	return $output;
}

function getTitle() {
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$actual_linkBreakDown = explode('/', $actual_link);
	$actual_linkLast = end($actual_linkBreakDown);

	$output = '';
	if ($actual_linkLast == 'signin' || $actual_linkLast == 'signin.php') {
		$output = 'Sigin · ';
	} elseif ($actual_linkLast == 'index.php' || $actual_linkLast == 'index' || $actual_linkLast == '') {
		$output = 'Welcome · ';
	} elseif ($actual_linkLast == 'products' || $actual_linkLast == 'products.php') {
		$output = 'Products · ';
	} elseif ($actual_linkLast == 'profile' || $actual_linkLast == 'profile.php') {
		$output = 'Profile · ';
	} elseif ($actual_linkLast == 'yourpassword' || $actual_linkLast == 'yourpassword.php') {
		$output = 'My Password · ';
	} elseif ($actual_linkLast == 'youraddress' || $actual_linkLast == 'youraddress.php') {
		$output = 'My Address · ';
	} elseif ($actual_linkLast == 'yourorders' || $actual_linkLast == 'yourorders.php') {
		$output = 'My Orders · ';
	} elseif ($actual_linkLast == 'cart' || $actual_linkLast == 'cart.php') {
		$output = 'My Cart · ';
	} elseif ($actual_linkLast == 'forgotPassword' || $actual_linkLast == 'forgotPassword.php') {
		$output = 'Forgot Password · ';
	} elseif ($actual_linkLast == 'verify' || $actual_linkLast == 'verify.php') {
		$output = 'Verify Account · ';
	} elseif ($actual_linkLast == 'verified' || $actual_linkLast == 'verified.php') {
		$output = 'Account on Verification · ';
	} elseif ($actual_linkLast == 'contact-us' || $actual_linkLast == 'contact-us.php') {
		$output = 'Contact Us · ';
	} elseif ($actual_linkLast == 'resendVericode' || $actual_linkLast == 'resendVericode.php') {
		$output = 'Resend Verification Code · ';
	} elseif ($actual_linkLast == 'resetPassword' || $actual_linkLast == 'resetPassword.php') {
		$output = 'Reset Password · ';
	} elseif ($actual_linkLast == 'thankYou' || $actual_linkLast == 'thankYou.php') {
		$output = 'Thank You · ';
	}
	return $output;
}


function yearDropdown($startYear, $endYear, $id="year", $class) {           
    //echo each year as an option     
    for ($i = $startYear; $i <= $endYear; $i++) { 
    	echo "<option value=" . $i . ">" . $i . "</option>n";     
    }
}

function find_file_extension($file) {
    $media = explode('.', $file);

    $extension = end($media);

    $location = PROOT . 'assets/media/drive/';
    $icon = $location . 'paper.png';

    if ($extension == 'xlsx') {
        $icon = $location . 'xls.png';
    } elseif ($extension == 'docx') {
        $icon = $location . 'docx.png';
    } elseif ($extension == 'jpg') {
        $icon = $location . 'image.png';
    } elseif ($extension == 'txt') {
        $icon = $location . 'txt.png';
    }

    return $icon;
}





/////////////////////////////////////////////////////////////////////////////////////////////////


// Sessions For login
function adminLogin($admin_id) {
	$_SESSION['GMAdmin'] = $admin_id;
	global $conn;
	$data = array(
		':admin_last_login' => date("Y-m-d H:i:s"),
		':admin_id' => (int)$admin_id
	);
	$query = "
		UPDATE gmsa_admin 
		SET admin_last_login = :admin_last_login 
		WHERE admin_id = :admin_id";
	$statement = $conn->prepare($query);
	$result = $statement->execute($data);
	if (isset($result)) {
        $log_message = "logged in admin " . $admin_id;
        add_to_log($log_message, $admin_id);

		$_SESSION['flash_success'] = 'You are now logged in!';
		redirect(PROOT . 'admin/index');
	}
}

function admin_is_logged_in(){
	if (isset($_SESSION['GMAdmin']) && $_SESSION['GMAdmin'] > 0) {
		return true;
	}
	return false;
}

// Redirect admin if !logged in
function admn_login_redirect($url = 'login') {
	$_SESSION['flash_error'] = 'You must be logged in to access that page!';
	redirect(PROOT . 'admin/auth/' . $url);
}

// Redirect admin if do not have permission
function admin_permission_redirect($url = 'login') {
	$_SESSION['flash_error'] = 'You do not have permission in to access that page!';
	redirect(PROOT . 'admin/' . $url);
}

function admin_has_permission($permission = 'admin') {
	global $admin_data;
	$permissions = explode(',', $admin_data['admin_permissions']);
	if (in_array($permission, $permissions, true)) {
		return true;
	}
	return false;
}







/////////////////////////////////////////////////////////////////////////////////////////////////////////



// GET ALL CATEGORIES
function get_all_faqs() {
	global $conn;
	$output = '';

	$query = "
		SELECT * FROM garypie_faq 
		ORDER BY id DESC
	";
	$statement = $conn->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$count_row = $statement->rowCount();

	if ($count_row > 0) {
		foreach ($result as $row) {
			$parent_id = (int)$row["id"];
			$child = $conn->query("
				SELECT * FROM garypie_faq_details 
				WHERE faq_parent = {$parent_id}
			")->fetchAll();


			$output .= '
				<tr class="bg-warning">
					<td>
						<a href="admin.faq?edit-parent='.$row["id"].'" class="btn btn-sm btn-secondary"><i data-feather="edit"></i></a>
					</td>
					<td>'.ucwords($row["faq_heading"]).'</td>
					<td>Parent</td>
					<td>'.pretty_date($row["faq_added_date"]).'</td>
					<td>
						<span id="'.$row["id"].'" onclick="delete_faq_all(id = '.$row["id"].');" class="btn btn-sm btn-light"><i data-feather="trash-2"></i></span>
					</td>
				</tr>
			';
			foreach ($child as $child_row) {
				// code...
				$output .= '

				<tr class="bg-light">
					<td>
						<a href="admin.faq?edit='.$child_row["id"].'&parent='.$row['id'].'" class="btn btn-sm btn-secondary"><i data-feather="edit"></i></a>
					</td>
					<td>'.ucwords($row["faq_heading"]).'</td>
					<td>'.ucwords($child_row["faq_question"]).'</td>
					<td>'.ucwords($child_row["faq_answer"]).'</td>
					<td>'.pretty_date($child_row["faq_added_date"]).'</td>
					<td>
						<span id="'.$child_row["faq_parent"].'" onclick="delete_faq(id = '.$child_row["id"].');" class="btn btn-sm btn-light">Delete</span>
						</td>
					</tr>
				';
			}
		}
	} else {
		$output = '
			<tr>
				<td colspan="4">No category found.</td>
			</tr>
		';
	}
	return $output;
}

// CHECK IF FAQ EXISTS
function faq_exist($id) {
	global $conn;

	$query = "
        SELECT * FROM garypie_faq_details 
        INNER JOIN garypie_faq 
        ON garypie_faq.id = garypie_faq_details.faq_parent
        WHERE garypie_faq_details.id = :id 
        LIMIT 1
    ";
    $statement = $conn->prepare($query);
    $statement->execute([':id' => $id]);

    $arr['counting'] = $statement->rowCount();;
    $arr['row'] = $statement->fetchAll();

    return $arr;
}



////////////////////////////////////////////////////////////////////////////////////////////////////

// GET ALL ADMINS
function get_all_admins() {
    global $conn;
    global $admin_data;
    $output = '';

    $query = "
        SELECT * FROM gmsa_admin 
        WHERE admin_status = ?
    ";
    $statement = $conn->prepare($query);
    $statement->execute([0]);
    $result = $statement->fetchAll();

    foreach ($result as $row) {
        $admin_last_login = $row["admin_last_login"];
        if ($admin_last_login == NULL) {
            $admin_last_login = '<span class="text-muted">Never</span>';
        } else {
            $admin_last_login = pretty_date($admin_last_login);
        }
        $output .= '
            <tr>
                <td>
        ';
                    
        if ($row['admin_id'] != $admin_data['admin_id']) {
            $output .= '
                <a href="' . PROOT . 'admin/admins?delete='.$row["admin_id"].'" class="btn btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
            ';
        }

        $output .= '
                </td>
                <td>' . (($row["admin_profile"] == NULL) ? '' : '<div class="avatar"><a href="' . PROOT . $row["admin_profile"] . '" target="_blank"><img src="' . PROOT . $row["admin_profile"] . '" clas="" style="width: 50px; height: 50px;" />') . '</a></div></td>
                <td>' . ucwords($row["admin_fullname"]) . '</td>
                <td>' . $row["admin_email"] . '</td>
                <td>' . pretty_date($row["admin_joined_date"]) . '</td>
                <td>' . $admin_last_login . '</td>
                <td>' . strtoupper($row["admin_permissions"]) . '</td>
            </tr>
        ';
    }
    return $output;
}


// GET ADMIN PROFILE DETAILS
function get_admin_profile($admin_id) {
	global $conn;
	global $admin_data;
	$output = '';

	$query = "
		SELECT * FROM gmsa_admin 
		WHERE admin_id = ?
        AND admin_status = ? 
		LIMIT 1
	";
	$statement = $conn->prepare($query);
	$statement->execute([$admin_id,  0]);
	$result = $statement->fetchAll();

	foreach ($result as $row) {
		if ($row['admin_id'] == $admin_data['admin_id']) {
			$output = '
				<h3>Name</h3>
			    <p class="lead">'.ucwords($row["admin_fullname"]).'</p>
			    <br>
			    <h3>Email</h3>
			    <p class="lead">'.$row["admin_email"].'</p>
			    <br>
			    <h3>Joined Date</h3>
			    <p class="lead">'.pretty_date($row["admin_joined_date"]).'</p>
			    <br>
			    <h3>Last Login</h3>
			    <p class="lead">'.pretty_date($row["admin_last_login"]).'</p>
			';
		}
	}
	return $output;
}
