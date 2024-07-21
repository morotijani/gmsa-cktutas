<?php 
    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    $errors = '';
    $admin_fullname = ((isset($_POST['admin_fullname'])) ? sanitize($_POST['admin_fullname']) : $admin_data['admin_fullname']);
    $admin_email = ((isset($_POST['admin_email'])) ? sanitize($_POST['admin_email']) : $admin_data['admin_email']);

    if ($_POST) {
        if (empty($_POST['admin_email']) && empty($_POST['admin_email'])) {
            $errors = 'Fill out all empty fileds';
        }

        if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
            $errors = 'The email you provided is not valid';
        }

        if (!empty($errors)) {
            $errors;
        } else {
            $data = [$admin_fullname, $admin_email, $admin_data['admin_id']];
            $query = "
                UPDATE gmsa_admin 
                SET admin_fullname = ?, admin_email = ? 
                WHERE admin_id = ?
            ";
            $statement = $conn->prepare($query);
            $result = $statement->execute($data);
            if (isset($result)) {

                // $message = "updated profile details";
                // add_to_log($message, $admin_data['admin_id']);

                $_SESSION['flash_success'] = 'Admin has been updated!';
                redirect(PROOT . "admin/profile");
            } else {
                $_SESSION['flash_error'] = "Something went wrong!";
                redirect(PROOT . "admin/profile");
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
                                <a href="<?= PROOT . 'admin/change-password'; ?>" class="btn btn-light"> <span class="ml-1">Change password</span></a>&nbsp;
                                <a href="<?= goBack(); ?>" class="btn btn-light"> <span class="ml-1">Go back</span></a>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <div class="card card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <label class="form-label">Avatar</label>
                                </div>
                                <div class="col-md-8 col-xl-5">
                                    <div class="" id="upload_profile">
                                        <div class="d-flex align-items-center">
                                            <a href="<?= PROOT . $admin_data['admin_profile']; ?>" class="avatar avatar-lg bg-warning rounded-circle text-white">
                                                <img src="<?= PROOT . (($admin_data['admin_profile'] == NULL) ? 'assets/media/avatar.png' : $admin_data['admin_profile']); ?>" style="object-fit: cover; object-position: center; width: 35px; height: 35px" alt="<?=ucwords($admin_data['admin_fullname']); ?>'s profile.">
                                            </a>
                                            <div class="d-flex justify-content-between mx-1">
                                                <?php if ($admin_data['admin_profile'] == NULL): ?>
                                                    <label for="file_upload" class="btn btn-secondary mx-1">
                                                        <span>Upload</span> 
                                                        <input type="file" name="file_upload" id="file_upload" class="">
                                                    </label>
                                                <?php else: ?>
                                                    <a href="javascript:;" class="btn d-inline-flex btn-danger change-profile-picture" id="<?= (($admin_data['admin_profile'] == NULL) ? '' : $admin_data['admin_profile']); ?>">
                                                        <span><i class="bi bi-trash"></i> </span>
                                                        <span class="d-none d-sm-block me-2">Remove</span>
                                                    </a>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="">
                             <form method="POST">
                                <div class="text-danger text-center"><?= $errors; ?></div>
                                <fieldset>
                                    <legend>Update profile details</legend>
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

<script type="text/javascript">
    $(document).ready(function() {

        // Upload IMAGE Temporary
        $(document).on('change','#file_upload', function() {

            var property = document.getElementById("file_upload").files[0];
            var image_name = property.name;

            var image_extension = image_name.split(".").pop().toLowerCase();
            if (jQuery.inArray(image_extension, ['jpeg', 'png', 'jpg']) == -1) {
                alert("The file extension must be .jpg, .png, .jpeg");
                $('#file_upload').val('');
                return false;
            }

            var image_size = property.size;
            if (image_size > 15000000) {
                alert('The file size must be under 15MB');
                return false;
            } else {

                var form_data = new FormData();
                form_data.append("file_upload", property);
                $.ajax({
                    url: "<?= PROOT; ?>admin/auth/upload.admin.profile.picture.php",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $("#upload_profile").html("<div class='text-success font-weight-bolder'>Uploading passport picture ...</div>");
                    },
                    success: function(data) {
                        if (data == '') {
                            location.reload();
                        } else {
                            alert(data);
                        }
                    }
                });
            }
        });

        // DELETE TEMPORARY UPLOADED IMAGE
        $(document).on('click', '.change-profile-picture', function() {
            var tempuploded_file_id = $(this).attr('id');

            $.ajax ({
                url : "<?= PROOT; ?>admin/auth/delete.admin.profile.picture.php",
                method : "POST",
                data : {
                    tempuploded_file_id : tempuploded_file_id
                },
                success: function(data) {
                    location.reload();
                }
            });
        });
    });
    
</script>