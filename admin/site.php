<?php 

    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }

    // check for permissions
    if (!admin_has_permission('editor')) {
        admin_permission_redirect('index');
    }
    
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    $post = cleanPost($_POST);
    $about_info = ((isset($_POST['about_info']) && !empty($_POST['about_info'])) ? $_POST['about_info'] : $site_row['about_info']);
    if (isset($_POST['submit_form'])) {
        // code...
        $query = "
            UPDATE gmsa_about 
            SET about_info = ?
        ";
        $statement = $conn->prepare($query);
        $result = $statement->execute([$about_info]);

        if ($result) {
            $log_message = "updated about info";
            add_to_log($log_message, $admin_data['admin_id']);

            $_SESSION['flash_success'] = 'About info updated successfully!';
            redirect(PROOT . 'admin/site');
        } else {
            $_SESSION['flash_error'] = 'Something went wrong, please try again!';
            redirect(PROOT . 'admin/site');
        }
    }

    $facebook = ((isset($_POST['facebook']) && !empty($_POST['facebook'])) ? $post['facebook'] : $site_row['facebook']);
    $instagram = ((isset($_POST['instagram']) && !empty($_POST['instagram'])) ? $post['instagram'] : $site_row['instagram']);
    $linkedin = ((isset($_POST['linkedin']) && !empty($_POST['linkedin'])) ? $post['linkedin'] : $site_row['linkedin']);
    $youtube = ((isset($_POST['youtube']) && !empty($_POST['youtube'])) ? $post['youtube'] : $site_row['youtube']);
    $twitter = ((isset($_POST['twitter']) && !empty($_POST['twitter'])) ? $post['twitter'] : $site_row['twitter']);
    if (isset($_POST['updatesocials'])) {
        // code...
        $query = "
            UPDATE gmsa_about 
            SET facebook = ?, instagram = ?, youtube = ?, twitter = ?, linkedin = ?
        ";
        $statement = $conn->prepare($query);
        $result = $statement->execute([$facebook, $instagram, $youtube, $twitter, $linkedin]);

        if ($result) {
            // code...

            $log_message = "updated social media link(s)";
            add_to_log($log_message, $admin_data['admin_id']);

            $_SESSION['flash_success'] = 'Social media links updated successfully!';
            redirect(PROOT . 'admin/site');
        } else {
            $_SESSION['flash_error'] = 'Something went wrong, please try again!';
            redirect(PROOT . 'admin/site');
        }
    }

    $mission = ((isset($_POST['mission']) && !empty($_POST['mission'])) ? $post['mission'] : $site_row['mission']);
    $vision = ((isset($_POST['vision']) && !empty($_POST['vision'])) ? $post['vision'] : $site_row['vision']);
    if (isset($_POST['updateMV'])) {
        $query = "
            UPDATE gmsa_about 
            SET mission = ?, vision = ? 
        ";
        $statement = $conn->prepare($query);
        $result = $statement->execute([$mission, $vision]);

        if ($result) {
            // code...

            $log_message = "updated about mission and vision";
            add_to_log($log_message, $admin_data['admin_id']);

            $_SESSION['flash_success'] = 'Mision Vision updated successfully!';
            redirect(PROOT . 'admin/site');
        } else {
            $_SESSION['flash_error'] = 'Something went wrong, please try again!';
            redirect(PROOT . 'admin/site');
        }
    }
?>

    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <?= $flash; ?>
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-flex flex-column flex-md-row">
                            <p class="lead">
                                <span class="font-weight-bold">Site.</span>
                            </p>
                            <div class="ml-auto">
                                <div class="dropdown">
                                    <a class="btn btn-success" href="<?= PROOT . 'admin/site'; ?>"><span>Refresh</span> <i class="fa fa-fw fa-recycle"></i></a>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="">
                                    <div class="form-group mb-2">
                                        <label>Update about us.</label>
                                        <textarea class="form-control" rows="15" name="about_info" id="about_info">
                                            <?= $about_info; ?>
                                        </textarea>
                                        <div class="form-text">After after, it will update itself on the user page. click <a href="<?= PROOT; ?>about-us" target="blank">here...</a> to see changes</div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-info" type="submit" name="submit_form" id="submit_form">Update.</button>
                                    </div>
                                </form>
                                <hr class="my-5">
                                <form method="POST">
                                    <fieldset>
                                        <legend>Mission and Vision</legend>
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" id="mission" name="mission" placeholder="Mission"><?= $mission; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" id="vision" name="vision" placeholder="Vision"><?= $vision; ?></textarea>
                                        </div>
                                        <div class="form-actions">
                                            <button class="btn btn-success" type="submit" name="updateMV">Update</button>
                                        </div>
                                    </fieldset>
                                </form>
                                <hr class="my-5">
                                <fieldset>
                                    <legend>GMSA CKTUTAS Constitution</legend>
                                    <div id="upload-file"></div>
                                    <?php if ($site_row['ads'] != ''): ?>
                                        <div id="removeTempuploadedFile" class="list-group list-group-flush list-group-divider">
                                            <div class="list-group-item">
                                                <div class="list-group-item-figure">
                                                    <div class="tile tile-img">
                                                        <img src="<?= PROOT . $site_row['ads']; ?>" width="32" height="32" />
                                                    </div>
                                                </div>
                                                <div class="list-group-item-body">
                                                <div class="media align-items-center">
                                                    <div class="media-body"><?= $site_row['ads']; ?></div>
                                                        <div class="media-actions">
                                                            <button type="button" class="btn btn-sm btn-secondary removeImg" id="<?= BASEURL . $site_row['ads']; ?>">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <input type="file" class="form-control" id="ads" name="ads">
                                    </div>
                                    <?php endif; ?>
                                </fieldset>
                                <hr class="my-5">
                                <fieldset>
                                    <legend>Ads flyer</legend>
                                    <div id="upload-file"></div>
                                    <?php if ($site_row['ads'] != ''): ?>
                                        <div id="removeTempuploadedFile" class="list-group list-group-flush list-group-divider">
                                            <div class="list-group-item">
                                                <div class="list-group-item-figure">
                                                    <div class="tile tile-img">
                                                        <img src="<?= PROOT . $site_row['ads']; ?>" width="32" height="32" />
                                                    </div>
                                                </div>
                                                <div class="list-group-item-body">
                                                <div class="media align-items-center">
                                                    <div class="media-body"><?= $site_row['ads']; ?></div>
                                                        <div class="media-actions">
                                                            <button type="button" class="btn btn-sm btn-secondary removeImg" id="<?= BASEURL . $site_row['ads']; ?>">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <input type="file" class="form-control" id="ads" name="ads">
                                    </div>
                                    <?php endif; ?>
                                </fieldset>
                                <hr class="my-5">
                                <fieldset>
                                    <legend>Signature</legend>
                                    <div id="upload-signature"></div>
                                    <?php if ($site_row['signature'] != ''): ?>
                                        <div id="removeTempuploadedSignature" class="list-group list-group-flush list-group-divider">
                                            <div class="list-group-item">
                                                <div class="list-group-item-figure">
                                                    <div class="tile tile-img">
                                                        <img src="<?= PROOT . $site_row['signature']; ?>" width="32" height="32" />
                                                    </div>
                                                </div>
                                                <div class="list-group-item-body">
                                                <div class="media align-items-center">
                                                    <div class="media-body"><?= $site_row['signature']; ?></div>
                                                        <div class="media-actions">
                                                            <button type="button" class="btn btn-sm btn-secondary removeSignature" id="<?= BASEURL . $site_row['signature']; ?>">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <input type="file" class="form-control" id="signature" name="signature">
                                    </div>
                                    <?php endif; ?>
                                </fieldset>
                                <hr class="my-5">
                                <form method="POST">
                                    <fieldset>
                                        <legend>Socail media links</legend>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="url" class="form-control" id="facebook" name="facebook" placeholder="https://facebook.com/" value="<?= $facebook; ?>"> <label for="facebook">Facebook</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="url" class="form-control" id="instagram" name="instagram" placeholder="https://instagram.com/" value="<?= $instagram; ?>"> <label for="instagram">Instagram</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="https://linkedin.com/" value="<?= $linkedin; ?>"> <label for="linkedin">LinkedIn</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="url" class="form-control" id="twitter" name="twitter" placeholder="https://twitter.com/" value="<?= $twitter; ?>"> <label for="twitter">Twitter</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="url" class="form-control" id="youtube" name="youtube" placeholder="https://youtube.com/" value="<?= $youtube; ?>"> <label for="youtube">Youtube</label>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button class="btn btn-success" type="submit" name="updatesocials">Update socials</button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php include ("includes/footer.php"); ?>
    <script src="https://cdn.tiny.cloud/1/87lq0a69wq228bimapgxuc63s4akao59p3y5jhz37x50zpjk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        // Testarea Editor
        tinymce.init({
            selector: '#about_info'
        });
     
        $(document).ready(function() {

            // DELETE UPLOADED ADS
            $(document).on('click', '.removeImg', function() {
                var tempuploded_file_id = $(this).attr('id');

                $.ajax ({
                    url: "<?= PROOT; ?>admin/auth/delete.ads.php",
                    method: "POST",
                    data:{
                        tempuploded_file_id : tempuploded_file_id
                    },
                    success: function(data) {
                        //$('#removeTempuploadedFile').remove();

                        location.reload();
                    }
                });
            });


            // Upload ADS
            $(document).on('change','#ads', function() {

                var property = document.getElementById("ads").files[0];
                var image_name = property.name;

                var image_extension = image_name.split(".").pop().toLowerCase();
                if (jQuery.inArray(image_extension, ['jpeg', 'png', 'jpg', 'gif']) == -1) {
                    alert("The file extension must be .jpg, .png, .jpeg, .gif");
                    $('#ads').val('');
                    return false;
                }

                var image_size = property.size;
                if (image_size > 15000000) {
                    alert('The file size must be under 15MB');
                    return false;
                } else {

                    var form_data = new FormData();
                    form_data.append("ads", property);
                    $.ajax({
                        url: "<?= PROOT; ?>admin/auth/upload.ads.php",
                        method: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $("#upload-file").html("<div class='text-success font-weight-bolder'>Uploading news image ...</div>");
                        },
                        success: function(data) {
                            $("#upload-file").html(data);
                            $('#ads').css('visibility', 'hidden');
                        }
                    });
                }
            });

            // DELETE UPLOADED SIGNATURE
            $(document).on('click', '.removeSignature', function() {
                var tempuploded_file_id = $(this).attr('id');

                $.ajax ({
                    url: "<?= PROOT; ?>admin/auth/delete.signature.php",
                    method: "POST",
                    data:{
                        tempuploded_file_id : tempuploded_file_id
                    },
                    success: function(data) {
                        //$('#removeTempuploadedFile').remove();

                        location.reload();
                    }
                });
            });


            // Upload SIGNATURE
            $(document).on('change','#signature', function() {

                var property = document.getElementById("signature").files[0];
                var image_name = property.name;

                var image_extension = image_name.split(".").pop().toLowerCase();
                if (jQuery.inArray(image_extension, ['jpeg', 'png', 'jpg', 'gif']) == -1) {
                    alert("The file extension must be .jpg, .png, .jpeg, .gif");
                    $('#signature').val('');
                    return false;
                }

                var image_size = property.size;
                if (image_size > 15000000) {
                    alert('The file size must be under 15MB');
                    return false;
                } else {

                    var form_data = new FormData();
                    form_data.append("signature", property);
                    $.ajax({
                        url: "<?= PROOT; ?>admin/auth/upload.signature.php",
                        method: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $("#upload-signature").html("<div class='text-success font-weight-bolder'>Uploading news image ...</div>");
                        },
                        success: function(data) {
                            $("#upload-signature").html(data);
                            $('#signature').css('visibility', 'hidden');
                        }
                    });
                }
            });

        });
    </script>    