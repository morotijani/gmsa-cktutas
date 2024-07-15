<?php 

    require_once ("../db_connection/conn.php");
    // if (!admin_is_logged_in()) {
    //     admn_login_redirect();
    // }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    $sql = "
        SELECT * FROM gmsa_gallery 
        ORDER BY id DESC
    ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $images = $statement->fetchAll();

    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
        // code..
        $id = sanitize((int)$_GET['delete']);
        $delete_image = unlink(BASEURL . $_GET['location']);

        if ($delete_image) {
            // code...
            $deleteQuery = "
                DELETE FROM gmsa_gallery 
                WHERE id = ?
            ";
            $statement = $conn->prepare($deleteQuery);
            $result = $statement->execute([$id]);
            if ($result) {
                // code...
                redirect(PROOT . '.in/Gallery');
            }
        }
    }

?>

    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Gallary </h1>
                            <div class="btn-toolbar">
                                <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-upload"></i> <span class="ml-1">Import</span></button>
                            </div>
                        </div>
                    </header>
                    <div><?= $flash; ?></div>
                    <div class="page-section">
                        

                        <div class="card card-fluid">
                            <div class="card-body">
                                <div id="uploaded_image_info"></div>
                                <label>Using dropzone</label>
                                <div id="dropzone" class="fileinput-dropzone">
                                    <span>Drop files or click to upload.</span> <!-- The file input field used as target for the file upload widget -->
                                    <input id="select_file" type="file" name="files[]" multiple="">
                                </div>
                            </div>
                            <div class="progress progress-xs rounded-0 fade" id="progress_bar" style="">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" id="progress_bar_process" role="progressbar" style="width: 0%;"></div>
                            </div>
                            <div id="uploadList" class="list-group list-group-flush list-group-divider">
                                <div id="uploaded_image" class="row mt-5">
                                    <?php 
                                        foreach ($images as $image) {
                                            echo '
                                                <div class="col-md-4 mb-2">
                                                    <div class="card">
                                                        <img class="img-fluid" src="' . PROOT . $image['gallery_media'].'">
                                                        <a href="?delete='.$image['id'].'&location='.$image['gallery_media'].'" class="badge badge-danger">delete</a>
                                                    </div>
                                                </div>
                                            ';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </main>
    </div>

<?php include ("includes/footer.php"); ?>
    <script>

        function _(element) {
            return document.getElementById(element);
        }

        _('select_file').onchange = function(event) {

            var form_data = new FormData();

            var image_number = 1;

            var error = '';

            for (var count = 0; count < _('select_file').files.length; count++) {
                if (!['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'video/mp4'].includes(_('select_file').files[count].type)) {
                    error += '<div class="alert alert-danger"><b>'+image_number+'</b> Selected File must be .jpg or .png Only.</div>';
                } else {
                    form_data.append("images[]", _('select_file').files[count]);
                }

                image_number++;
            }

            if (error != '') {
                _('uploaded_image_info').innerHTML = error;

                _('select_file').value = '';
            } else {
                _('progress_bar').style.opacity = 1;

                var ajax_request = new XMLHttpRequest();

                ajax_request.open("POST", "auth/gallery.upload.php");

                ajax_request.upload.addEventListener('progress', function(event){

                var percent_completed = Math.round((event.loaded / event.total) * 100);

                _('progress_bar_process').style.width = percent_completed + '%';

               _('progress_bar_process').innerHTML = percent_completed + '% completed';

            });

            ajax_request.addEventListener('load', function(event) {

                _('uploaded_image_info').innerHTML = '<div class="alert alert-success">Files Uploaded Successfully</div>';

                _('select_file').value = '';
                
                setTimeout(function () {
                    window.location = '<?= PROOT; ?>admin/gallery';
                }, 1050);

            });

            ajax_request.send(form_data);
        }

    };

    </script>
