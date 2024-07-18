<?php 

    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    // get prayer on edit
    if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    
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
                                    <a class="btn btn-success" href="<?= PROOT . 'admin/prayer-time' .((isset($_GET['edit'])) ? '?edit='.$id.'': ''); ?>"><span>Refresh</span> <i class="fa fa-fw fa-recycle"></i></a>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="about.php">
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
                                <form>
                                    <fieldset>
                                        <legend>Ads flyer</legend>
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
                                                                <button type="button" class="btn btn-sm btn-secondary removeImg" id="<?= $site_row['ads']; ?>">Remove</button>
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
                                        <div id="upload_file"></div>
                                    </fieldset>
                                </form>
                            </div>
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
    </script>
    <script type="text/javascript">
     
        $(document).ready(function() {

            // DELETE TEMPORARY UPLOADED IMAGE
            $(document).on('click', '.removeImg', function() {
                var tempuploded_file_id = $(this).attr('id');

                $.ajax ({
                    url: "<?= PROOT; ?>admin/auth/delete.temporary.uploaded.php",
                    method: "POST",
                    data:{
                        tempuploded_file_id : tempuploded_file_id
                    },
                    success: function(data) {
                        $('#removeTempuploadedFile').remove();

                        $('#ads').css('visibility', 'visible');
                        $('#ads').val('');
                    }
                });
            });


            // Upload IMAGE Temporary
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

        });
    </script>    