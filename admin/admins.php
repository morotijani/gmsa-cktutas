<?php 
    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }

    // check for permissions
    if (!admin_has_permission()) {
        admin_permission_redirect('index');
    }

    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    // delete admin
    if (isset($_GET['delete'])) {
        $admin_id = sanitize($_GET['delete']);

        $query = "
            UPDATE gmsa_admin 
            SET admin_status = ? 
            WHERE admin_id = ?
        ";
        $statement = $conn->prepare($query);
        $result = $statement->execute([1, $admin_id]);
        if (isset($result)) {

            $message = "deleted an admin with id " . $admin_id . "";
            add_to_log($message, $_SESSION['GMAdmin']);

            $_SESSION['flash_success'] = 'Admin has been deleted!';
            redirect(PROOT . "admin/admins");
        } else {
            echo js_alert("Something went wrong!");
            redirect(PROOT . "admin/admins");
        }
    }

    // add an admin
    if (isset($_GET['add'])) {
        $errors = '';
        $admin_fullname = ((isset($_POST['admin_fullname'])) ? sanitize($_POST['admin_fullname']) : '');
        $admin_email = ((isset($_POST['admin_email'])) ? sanitize($_POST['admin_email']) : '');
        $admin_password = ((isset($_POST['admin_password'])) ? sanitize($_POST['admin_password']) : '');
        $confirm = ((isset($_POST['confirm']))? sanitize($_POST['confirm']) : '');
        $admin_permissions = ((isset($_POST['admin_permissions']))? sanitize($_POST['admin_permissions']) : '');
        $admin_id = guidv4();

        if ($_POST) {
            $required = array('admin_fullname', 'admin_email', 'admin_password', 'confirm', 'admin_permissions');
            foreach ($required as $f) {
                if (empty($f)) {
                    $errors = 'You must fill out all fields!';
                    break;
                }
            }

            if (strlen($admin_password) < 6) {
                $errors = 'The password must be at least 6 characters!';
            }

            if ($admin_password != $confirm) {
                $errors = 'The passwords do not match!';
            }

            if (!empty($errors)) {
                $errors;
            } else {
                $data = array($admin_id, $admin_fullname, $admin_email, password_hash($admin_password, PASSWORD_BCRYPT), $admin_permissions);
                $query = "
                    INSERT INTO `gmsa_admin`(`admin_id`, `admin_fullname`, `admin_email`, `admin_password`, `admin_permissions`) 
                    VALUES (?, ?, ?, ?, ?)
                ";
                $statement = $conn->prepare($query);
                $result = $statement->execute($data);
                if (isset($result)) {

                    $message = "created new admin ".ucwords($admin_fullname)." as an ".strtoupper($admin_permissions)."";
                    add_to_log($message, $admin_data['admin_id']);

                    $_SESSION['flash_success'] = 'Admin has been Added!';
                    redirect(PROOT . "admin/admins");
                } else {
                    echo js_alert("Something went wrong!");
                    redirect(PROOT . "admin/admins?add=1");
                }
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
                            <h1 class="page-title mr-sm-auto"> Admins </h1>
                            <div class="btn-toolbar">
                                <?php if (!isset($_GET['add'])): ?>
                                    <a href="<?= PROOT . 'admin/admins?add=1'; ?>" class="btn btn-light"> <span class="ml-1">+ Add admin</span></a>&nbsp;
                                <?php endif ?>
                                <a href="<?= goBack(); ?>" class="btn btn-light"> <span class="ml-1">Go back</span></a>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <div class="card card-body">
                            <?php if (isset($_GET['add']) && !empty($_GET['add'])): ?>
                                <form method="POST">
                                    <div class="text-danger text-center"><?= $errors; ?></div>
                                    <fieldset>
                                        <legend>Add new admin</legend>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="text" class="form-control" id="admin_fullname" name="admin_fullname" required="" value="<?= $admin_fullname; ?>"> <label for="admin_fullname">Name</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="email" class="form-control" id="admin_email" name="admin_email" required="" value="<?= $admin_email; ?>"> <label for="admin_email">Email</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="password" class="form-control" id="admin_password" name="admin_password" required=""> <label for="admin_password">Password</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="password" class="form-control" id="confirm" name="confirm" required=""> <label for="confirm">Confirm password</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="admin_permissions" class="form-label">Permission</label>
                                            <select class="form-control" name="admin_permissions" id="admin_permissions" required>
                                                <option value=""<?= (($admin_permissions == '')?' selected' : '') ?>>Admin type</option>
                                                <option value="editor"<?= (($admin_permissions == 'editor')?' selected' : '') ?>>Editor</option>
                                                <option value="admin,editor"<?= (($admin_permissions == 'admin,editor')?' selected' : '') ?>>Admin,  Editor</option>
                                            </select>
                                        </div>
                                        <div class="form-actions">
                                            <button class="btn btn-success" type="submit" name="submit">Add</button>
                                            <a class="btn" href="<?= PROOT; ?>admin/profile">Cancel update</a>
                                        </div>
                                    </fieldset>
                                </form>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Joined Date</th>
                                                <th>Last Login</th>
                                                <th>Permission</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?= get_all_admins(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php include ("includes/footer.php"); ?>
