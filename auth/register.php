<?php
    // REGITER PAGE

    require_once ("./../db_connection/conn.php");

    $errors = array();
    $post = cleanPost($_POST);

    $firstname = (isset($_POST['firstname']) ? $post['firstname'] : '');
    $middlename = (isset($_POST['middlename']) ? $post['middlename'] : '');
    $lastname = (isset($_POST['lastname']) ? $post['lastname'] : '');
    $email = (isset($_POST['email']) ? $post['email'] : '');
    $phone = (isset($_POST['phone']) ? $post['phone'] : '');
    $gender = (isset($_POST['gender']) ? $post['gender'] : '');
    $dob = (isset($_POST['dob']) ? $post['dob'] : '');
    $region = (isset($_POST['region']) ? $post['region'] : '');
    $city = (isset($_POST['city']) ? $post['city'] : '');
    $digitaladdress = (isset($_POST['digitaladdress']) ? $post['digitaladdress'] : '');
    $studentid = (isset($_POST['studentid']) ? $post['studentid'] : '');
    $programme = (isset($_POST['programme']) ? $post['programme'] : '');
    $department = (isset($_POST['department']) ? $post['department'] : '');
    $admissiontype = (isset($_POST['admissiontype']) ? $post['admissiontype'] : '');
    $admissionyear = (isset($_POST['admissionyear']) ? $post['admissionyear'] : '');
    $hostel = (isset($_POST['hostel']) ? $post['hostel'] : '');
    $level = (isset($_POST['level']) ? $post['level'] : '');
    $guardianfullname = (isset($_POST['guardianfullname']) ? $post['guardianfullname'] : '');
    $guardianphonenumber = (isset($_POST['guardianphonenumber']) ? $post['guardianphonenumber'] : '');

    if (isset($_POST['submit'])) {
        $member_id = guidv4();
        $createdAt = date("Y-m-d H:i:s A");
        $vericode = md5(time());

        if (is_array(find_by_student_id($studentid))) {
            $errors[] = "Student ID already exist!";
        }

        if (is_array(find_by_student_email($email))) {
            $errors[] = "Email already exist!";
        }

        if (!empty($errors)) {
            // code...
            // display_errors($error);
        } else {

            $fn = ucwords($firstname . ' ' .  $middlename . ' ' . $lastname);
            $to = $email;
            $subject = "Please Verify Your Account.";
            $body = "
                <h3>
                    {$fn},</h3>
                    <p>
                        Thank you for registering. Please verify your account by clicking 
                        <a href=\"https://sites.local/garypie/auth/verified/{$vericode}\" target=\"_blank\">here</a>.
                </p>
            ";

            // $mail_result = send_email($fn, $to, $subject, $body);
            // if ($mail_result) {}

            $data = [$member_id, $firstname, $middlename, $lastname, $email, $phone, $gender, $dob, $region, $city, $digitaladdress, $studentid, $programme, $department, $admissiontype, $admissionyear, $hostel, $level, $guardianfullname, $guardianphonenumber, $vericode, $createdAt];
            $query = "
                INSERT INTO `gmsa_members`(`member_id`, `member_firstname`, `member_middlename`, `member_lastname`, `member_email`, `member_phone`, `member_gender`, `member_dob`, `member_region`, `member_city`, `member_digitaladdress`, `member_studentid`, `member_programme`, `member_department`, `member_admissiontype`, `member_admissionyear`, `member_hostel`, `member_level`, `member_guardianfullname`, `member_guardianphonenumber`, `member_vericode`, `createdAt`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ";
            $statement = $conn->prepare($query);
            $result = $statement->execute($data);

            if (isset($result)) {

                $log_message = "new member added with id " . $member_id;
                add_to_log($log_message, $ip_address);

                $_SESSION['flash_success'] = 'Your have successfully created a membership account!';
                redirect(PROOT . 'auth/verify');
            } else {
                echo js_alert("Something went wrong, please try again!");
            }
        }
            

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register - GMSA CKTUTAS</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="gmsacktutas.com">
    <meta name="description" content="">

    <script src="<?= PROOT; ?>dist/js/dark-mode.js"></script>

    <link rel="shortcut icon" href="<?= PROOT; ?>assets/media/logo/logo-1.jpeg">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/bootstrap-datepicker.min.css">
    
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/gmsa.css">
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/main.css">
    
    <style type="text/css">
        *, body {
            font-family: "Montserrat" !important;
            font-optical-sizing: auto;
            font-style: normal;
        }

        .ui-datepicker-calendar, {
   display: none !important;
}
    </style>
    
</head>
<body>
<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
        </symbol>
    </svg>

    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="<?= PROOT; ?>" class="nav-link">
                        <img src="<?= PROOT; ?>assets/media/logo/logo-1.jpeg" class="bi mt-1 rounded-3" width="60" height="60" />
                    </a>
                </li>
                <li class="nav-item">
                    <ul class="nav align-items-center dropdown-hover ms-sm-2">
                        <li class="nav-item dropdown dropdown-animation">
                            <button class="btn btn-link mb-0 px-2 lh-1" id="bd-theme"
                            type="button"
                            aria-expanded="false"
                            data-bs-toggle="dropdown"
                            data-bs-display="static">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"  class="bi bi-circle-half theme-icon-active fill-mode fa-fw" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
                                <use href="#"></use>
                            </svg>
                            </button>

                            <ul class="dropdown-menu min-w-auto dropdown-menu-end" aria-labelledby="bd-theme">
                                <li class="mb-1">
                                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
                                        <svg width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                            <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                                            <use href="#"></use>
                                        </svg>Light
                                    </button>
                                </li>
                                <li class="mb-1">
                                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
                                            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
                                            <use href="#"></use>
                                        </svg>Dark
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
                                            <use href="#"></use>
                                        </svg>Auto
                                    </button>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
    </div>

    <main>
        
        <?= $flash; ?>
        <section class="pt-1">
            <div class="container">
                <div class="inner-container text-center mb-6">
                    <h1 class="mb-0 lh-base position-relative">
                        <span class="position-absolute top-0 start-0 mt-n5 ms-n5 d-none d-sm-block">
                            <svg class="fill-primary" width="63.6px" height="93.3px" viewBox="0 0 63.6 93.3" style="enable-background:new 0 0 63.6 93.3;" xml:space="preserve">
                                <path d="M58.5,1.9c0.5,0,1.6,5.3,2.4,11.8c0.8,6.5,1.4,14,1.6,18.5c0.3,8.8-0.5,15.9-1.6,16c-1.1,0-2.1-7.1-2.4-15.8 c-0.2-4.4-0.3-12-0.4-18.4C57.9,7.3,57.9,1.9,58.5,1.9z"/>
                                <path d="M47.7,44.4c-0.5,0.1-1.5-2.1-2.8-4.7c-1.3-2.6-2.8-5.5-3.7-7.2c-1.7-3.4-2.9-6.4-2.1-7c0.8-0.6,3.4,1.5,5.3,5.1 c1,1.8,2.2,5.1,2.9,8.1C48.1,41.8,48.2,44.3,47.7,44.4z"/>
                                <path d="M36.2,53.4c-0.2,0.5-4.1-1.2-8.5-3.5c-4.4-2.3-9.5-5.4-12.3-7.3c-5.6-3.9-9.6-7.9-9-8.8c0.6-0.9,5.4,1.7,11,5.5 c2.8,1.9,7.5,5.3,11.6,8.2C33.1,50.5,36.4,53,36.2,53.4z"/>
                                <path d="M27.2,68.3c-0.1,0.5-2.1,0.7-4.4,0.6c-2.4,0-5.1-0.3-6.7-0.7c-3.1-0.6-5.4-2-5.2-3c0.2-1,2.9-1.2,5.9-0.5 c1.5,0.3,4.1,1,6.3,1.7C25.4,67.1,27.2,67.8,27.2,68.3z"/>
                                <path d="M30.8,83.2c0.1,0.5-3.5,1.7-7.7,3.1c-4.3,1.4-9.2,3.1-12.1,4.1c-5.7,1.9-10.6,3.1-11,2.1 c-0.4-0.9,3.9-3.6,9.8-5.6c2.9-1,8.1-2.4,12.6-3.2C26.9,83,30.7,82.7,30.8,83.2z"/>
                            </svg>
                        </span>
                        Register, your account details to join GMSA - CKTUTAS
                    </h1>
                </div>
                <?= display_errors($errors); ?>
                <form class="col-md-10 mx-auto p-2 mt-4 mt-md-5" id="registerForm" method="POST">
                    <div class="card bg-light">
                        <div class="card-body">
                            <div id="step-1">
                                <h4 class="mb-3 fw-light">Personal Details</h4>
                                <div class="row g-3">
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" value="<?= $firstname; ?>" required>
                                            <label for="firstname">First name *</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="middlename" name="middlename" placeholder="" value="<?= $middlename; ?>">
                                            <label for="middlename">Middle name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" value="<?= $lastname; ?>" required>
                                            <label for="lastname">Last name *</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?= $email; ?>" required>
                                            <label for="email">Email *</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="tel" inputmode="" class="form-control" id="phone" name="phone" placeholder="" value="<?= $phone; ?>" required>
                                            <label for="phone">Phone *</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <select type="text" class="form-select" id="gender" name="gender" required>
                                                <option value="" selected>Open this menu</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <label for="gender">Gender *</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="dob" name="dob" placeholder="" autocomplete="off" value="<?= $dob; ?>" required>
                                            <label for="dob">Date of Birth *</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="region" name="region" placeholder="" value="<?= $region; ?>">
                                            <label for="region">Region</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="city" name="city" placeholder="" value="<?= $city; ?>">
                                            <label for="city">City</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="digitaladdress" name="digitaladdress" placeholder="" value="<?= $digitaladdress; ?>">
                                            <label for="digitaladdress">Digital Address (optional)</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-lg btn-primary-soft icon-link icon-link-hover mb-0" id="next-1">Next <i class="bi bi-arrow-right"></i></button>
                            </div>

                            <div id="step-2" class="d-none">
                                <div class="row g-3">
                                    <h4 class="mb-3 fw-light">School Details</h4>
                                    <div class="col-sm-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="studentid" name="studentid" placeholder="" value="<?= $studentid; ?>" required>
                                            <label for="studentid">Student ID *</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="programme" name="programme" placeholder="" value="<?= $programme; ?>" required>
                                            <label for="programme">Programme *</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="tel" class="form-control" id="department" name="department" placeholder="" value="<?= $department; ?>" required>
                                            <label for="department">Department *</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <select type="tel" class="form-select" id="admissiontype" name="admissiontype" required>
                                                <option value="" selected>Open this select menu</option>
                                                <option value="Diploma">Diploma</option>
                                                <option value="Undergraduate">Undergraduate</option>
                                                <option value="Postgraduate">Postgraduate</option>
                                            </select>
                                            <label for="admissiontype">Admission type *</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="tel" class="form-control" id="admissionyear" name="admissionyear" placeholder="" value="<?= $admissionyear; ?>" required>
                                            <label for="admissionyear">Admission year *</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" min="0" class="form-control" id="level" name="level" placeholder="" value="<?= $level; ?>" required>
                                            <label for="level">Level *</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="hostel" name="hostel" placeholder="" value="<?= $hostel; ?>">
                                            <label for="hostel">Hostel </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-lg btn-light icon-link icon-link-hover mb-0" id="prev-1">Back <i class="bi bi-arrow-left"></i></button>
                                <button type="button" class="btn btn-lg btn-primary-soft icon-link icon-link-hover mb-0" id="next-2">Next <i class="bi bi-arrow-right"></i></button>
                            </div>

                            <div id="step-3" class="d-none">
                                <h4 class="mb-3 fw-light">Parent/Guardian/Family Member Details</h4>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="guardianfullname" name="guardianfullname" placeholder="" value="<?= $guardianfullname; ?>">
                                    <label for="guardianfullname">Full name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="tel" inputmode="" class="form-control" id="guardianphonenumber" name="guardianphonenumber" placeholder="" value="<?= $guardianphonenumber; ?>">
                                    <label for="guardianphonenumber">Phone number</label>
                                </div>
                                <button type="button" class="btn btn-lg btn-light icon-link icon-link-hover mb-0" id="prev-2">Back <i class="bi bi-arrow-left"></i></button>
                                <button type="submit" id="submitRegister" name="submit" class="btn btn-lg btn-success icon-link icon-link-hover mb-0">Submit <i class="bi bi-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </main>

    <footer class="my-5 pt-5 text-body-secondary text-center text-small">
        <p class="mb-1" id="copyright">Copyrights &copy; 2021 - <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script> GMSA-CKTUTAS. <br>Build by <a href="https://www.gmsa-cktutas.org/" class="text-body">IT & Publicity Committe</a>. </p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="<?= PROOT; ?>privacy-policy">Privacy</a></li>
            <li class="list-inline-item"><a href="<?= PROOT; ?>tc">Terms</a></li>
            <li class="list-inline-item"><a href="mailto:support@gmsacktutas.org">Support</a></li>
        </ul>
    </footer>

    <div class="back-top"></div>

    <script type="text/javascript" src="<?= PROOT; ?>dist/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/bootstrap-datepicker.min.js"></script>

    <script src="<?= PROOT; ?>dist/js/mainfunctions.js"></script>

    <script type="text/javascript">
        
        // Fade out messages
        $("#temporary").fadeOut(5000);

        $(document).ready(function() {

            $("#admissionyear").datepicker({
                format: "yyyy",
                viewMode: "years", 
                minViewMode: "years",
                updateViewDate: true,
                changeYear: true,
                defaultViewDate: {year: '2021'}
            });

            $("#dob").datepicker({
            }); 

            $('#next-1').click(function() {

                $('#firstname').removeClass('border border-danger')
                $('#lastname').removeClass('border border-danger')
                $('#email').removeClass('border border-danger')
                $('#phone').removeClass('border border-danger')
                $('#gender').removeClass('border border-danger')
                $('#dob').removeClass('border border-danger')

                var gender = $("#gender option:selected").val();

                if ($('#firstname').val() == '') {
                    $('#firstname').addClass('border border-danger')
                    $('#firstname').focus();
                    alert('Frist name is required!')
                    return false
                }

                if ($('#lastname').val() == '') {
                    $('#lastname').addClass('border border-danger')
                    $('#lastname').focus();
                    alert('Last name is required!')
                    return false
                }

                if ($('#email').val() == '') {
                    $('#email').addClass('border border-danger')
                    $('#email').focus();
                    alert('Email is required!')
                    return false
                }

                if (!isEmail($('#email').val())) {
                    $('#email').addClass('border border-danger')
                    $('#email').focus();
                    alert('Invalid email provided!')
                    return false
                }

                if ($('#phone').val() == '') {
                    $('#phone').addClass('border border-danger')
                    $('#phone').focus();
                    alert('Phone number is required!')
                    return false
                }

                if (gender == '') {
                    $('#gender').addClass('border border-danger')
                    $('#gender').focus();
                    alert('Gender is required!')
                    return false
                }

                if ($('#dob').val() == '') {
                    $('#dob').addClass('border border-danger')
                    $('#dob').focus();
                    alert('Date of Birth is required!')
                    return false
                }

                $('#step-1').addClass('d-none');
                $('#step-2').removeClass('d-none');
            })

            // page 2
            $('#next-2').click(function() {
                $('#studentid').removeClass('border border-danger')
                $('#programme').removeClass('border border-danger')
                $('#department').removeClass('border border-danger')
                $('#admissiontype').removeClass('border border-danger')
                $('#admissionyear').removeClass('border border-danger')
                $('#level').removeClass('border border-danger')

                var admissiontype = $("#admissiontype option:selected").val();

                if ($('#studentid').val() == '') {
                    $('#studentid').addClass('border border-danger')
                    $('#studentid').focus();
                    alert('Student ID is required!')
                    return false
                }

                if ($('#programme').val() == '') {
                    $('#programme').addClass('border border-danger')
                    $('#programme').focus();
                    alert('Programme is required!')
                    return false
                }

                if ($('#department').val() == '') {
                    $('#department').addClass('border border-danger')
                    $('#department').focus();
                    alert('Department is required!')
                    return false
                }

                if (admissiontype == '') {
                    $('#admissiontype').addClass('border border-danger')
                    $('#admissiontype').focus();
                    alert('Admission type is required!')
                    return false
                }

                if ($('#admissionyear').val() == '') {
                    $('#admissionyear').addClass('border border-danger')
                    $('#admissionyear').focus();
                    alert('Admission year is required!')
                    return false
                }


                if ($('#level').val() == '') {
                    $('#level').addClass('border border-danger')
                    $('#level').focus();
                    alert('Level is required!')
                    return false
                }

                $('#step-1').addClass('d-none');
                $('#step-2').addClass('d-none');
                $('#step-3').removeClass('d-none');
            })

            $('#prev-1').click(function() {
                $('#step-2').addClass('d-none');
                $('#step-1').removeClass('d-none');
            })

            $('#prev-2').click(function() {
                $('#step-3').addClass('d-none');
                $('#step-2').removeClass('d-none');
                $('#step-1').addClass('d-none');
            });

            $('#submitRegister').click(function() {
                // $('#guardianfullname').removeClass('border border-danger')
                // $('#guardianphonenumber').removeClass('border border-danger')

                // if ($('#guardianfullname').val() == '') {
                //     $('#guardianfullname').addClass('border border-danger')
                //     $('#guardianfullname').focus();
                //     alert('Guardian full name is required!')
                //     return false
                // }

                // if ($('#guardianphonenumber').val() == '') {
                //     $('#guardianphonenumber').addClass('border border-danger')
                //     $('#guardianphonenumber').focus();
                //     alert('Guardian phone number is required!')
                //     return false
                // }

                if (confirm("If the information you have provided are all correct, then click on Ok!")) {
                    $('#registerForm').submit();
                } else {
                    return false;
                }
            });


            function isEmail(email) { 
                return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(email);
            }
        });

    </script>
</body>
</html>
