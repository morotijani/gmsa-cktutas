<?php 
    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");


    $errors = '';
    $hashed = $admin_data['admin_password'];
    $old_password = ((isset($_POST['old_password'])) ? sanitize($_POST['old_password']) : '');
    $old_password = trim($old_password);
    $password = ((isset($_POST['password'])) ? sanitize($_POST['password']) : '');
    $password = trim($password);
    $confirm = ((isset($_POST['confirm'])) ? sanitize($_POST['confirm']) : '');
    $confirm = trim($confirm);
    $new_hashed = password_hash($password, PASSWORD_BCRYPT);
    $admin_id = $admin_data['admin_id'];

    if ($_POST) {
        if (empty($_POST['old_password']) || empty($_POST['password']) || empty($_POST['confirm'])) {
            $errors = 'You must fill out all fields';
        } else {

            if (strlen($password) < 6) {
                $errors = 'Password must be at least 6 characters';
            }

            if ($password != $confirm) {
                $errors = 'The new password and confirm new password does not match.';
            }

            if (!password_verify($old_password, $hashed)) {
                $errors = 'Your old password does not our records.';
            }
        }

        if (!empty($errors)) {
            $errors;
        } else {
            $query = '
                UPDATE gmsa_admin 
                SET admin_password = ? 
                WHERE admin_id = ?
            ';
            $satement = $conn->prepare($query);
            $result = $satement->execute(array($new_hashed, $admin_id));
            if (isset($result)) {

                // $message = "changed password";
                // add_to_log($message, $admin_id);

                $_SESSION['flash_success'] = 'Password successfully updated!';
                redirect(PROOT . "admin/profile");
            } else {
                $_SESSION['flash_error'] = 'Something went wrong!';
                redirect(PROOT . "admin/change-password");
            }
        }
    }


?> 
    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <?= $flash; ?>
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Profile </h1>
                            <div class="btn-toolbar">
                                <a href="<?= PROOT . 'admin/profile'; ?>" class="btn btn-light"> <span class="ml-1">Profile</span></a>&nbsp;
                                <a href="<?= goBack(); ?>" class="btn btn-light"> <span class="ml-1">Go back</span></a>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <div class="card card-body">
                             <form method="POST">
                                <div class="text-danger text-center"><?= $errors; ?></div>
                                <fieldset>
                                    <legend>Change password</legend>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="password" class="form-control" id="old_password" name="old_password" required="" value="<?= $old_password; ?>"> <label for="old_password">Old password</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="password" class="form-control" id="password" name="password" required="" value="<?= $password; ?>"> <label for="admin_email">New password</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="password" class="form-control" id="confirm" name="confirm" required="" value="<?= $confirm; ?>"> <label for="admin_email">Confirm new password</label>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button class="btn btn-success" type="submit" name="submit">Update</button>
                                        <a class="btn" href="<?= PROOT; ?>admin/profile">Cancel update</a>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php include ("includes/footer.php"); ?>