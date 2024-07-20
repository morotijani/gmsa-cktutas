<?php 
    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    $total_data = $conn->query("SELECT * FROM gmsa_executives WHERE status = 0")->rowCount();

    $position_rows = get_positions($conn);

    $message = '';
    $position = (isset($_POST['position']) ? sanitize($_POST['position']) : '');

    // position edit
    if ((isset($_GET['status']) && $_GET['status'] == 'edit_position')) {
        $id = sanitize($_GET['id']);

        $sql = "
            SELECT * FROM gmsa_positions 
            WHERE position_id = ? 
            LIMIT 1
        ";
        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        $row = $statement->fetchAll();
        if ($statement->rowCount() > 0) {
            $position =  (isset($_POST['position']) ? sanitize($_POST['position']) : $row[0]['position']);
        } else {
            echo js_alert('Something went wrong, please try again');
            redirect(PROOT . 'admin/executives/position');
        }
    }

    // ADD POSITION
    if (isset($_POST['submit_position'])) {
        if (!empty($position)) {
            $check = $conn->query("SELECT * FROM gmsa_positions WHERE position = '".$position."'")->rowCount();
            if (isset($_GET['status']) && $_GET['status'] == 'edit') {
                $check = $conn->query("SELECT * FROM gmsa_positions WHERE position = '" . $position . "' AND position_id != " . $id . "")->rowCount();
            }
            if ($check > 0) {
                $message = $position . ' already exists!';
            } else {
                $position_id = guidv4();

                $q = "
                    INSERT INTO gmsa_positions (position, position_id) 
                    VALUES (?, ?)
                ";
                if (isset($_GET['status']) && $_GET['status'] == 'edit_position') {
                    $position_id = $id;
                    $q = "
                        UPDATE gmsa_positions 
                        SET position = ? 
                        WHERE position_id = ?
                    ";
                }
                $statement = $conn->prepare($q);
                $result = $statement->execute([$position, $position_id]);
                if (isset($result)) {
                    $_SESSION['flash_success'] = ucwords($position) . ' successfully ' . ((isset($_GET['status']) && $_GET['status'] == 'edit_position') ? 'updated' : 'added') . '!';        
                    redirect(PROOT . 'admin/executives/position');
                } else {
                    echo js_alert('Something went wrong, please try again');
                    redirect(PROOT . 'admin/executives/position');
                }
            }
        } else {
            $message = 'Position name required!';
        }
    }

    // DELETE A POSITION
    if ((isset($_GET['type']) && $_GET['type'] == 'position') && (isset($_GET['status']) && $_GET['status'] == 'delete')) {
        $delete = sanitize($_GET['id']);
        $result = $conn->query("DELETE FROM gmsa_positions WHERE position_id = '".$delete."'")->execute();
        if ($result) {
            $_SESSION['flash_success'] = 'Position deleted!';            
            redirect(PROOT . 'admin/executives/position');
        } else {
            echo js_alert('Something went wrong, please try again');
            redirect(PROOT . 'admin/executives/position');
        }
    }

    $news_title = (isset($_POST['news_title']) ? sanitize($_POST['news_title']) : '');
    $news_category = (isset($_POST['news_category']) ? sanitize($_POST['news_category']) : '');
    $news_content = (isset($_POST['news_content']) ? $_POST['news_content'] : '');
    $executive_media = '';
    $news_url = php_url_slug($news_title);
    $news_created_by = $admin_data['admin_id'];

    // news edit
    if (isset($_GET['status']) && $_GET['status'] == 'edit_news') { 
        $id = sanitize($_GET['id']);
        $sql = "
            SELECT * FROM gmsa_news 
            WHERE news_id = ? 
            LIMIT 1
        ";
        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        $row = $statement->fetchAll();
        
        if ($statement->rowCount() > 0) {
            $news_title = (isset($_POST['news_title']) ? sanitize($_POST['news_title']) : $row[0]['news_title']);
            $news_category = (isset($_POST['news_category']) ? sanitize($_POST['news_category']) : $row[0]['news_category']);
            $news_content = (isset($_POST['news_content']) ? $_POST['news_content'] : $row[0]['news_content']);
            $news_media = (($row[0]['news_media'] != '') ? $row[0]['news_media'] : '');
        } else {
            echo js_alert('Something went wrong, please try again');
            redirect(PROOT . 'admin/executives/add');
        }
    }

    if (isset($_POST['submitNews'])) {
        // UPLOAD PASSPORT PICTURE TO uploadedprofile IF FIELD IS NOT EMPTY
        if ($_POST['uploaded_news_media'] == '') {
            if (!empty($_FILES)) {

                $image_test = explode(".", $_FILES["news_media"]["name"]);
                $image_extension = end($image_test);
                $image_name = md5(microtime()).'.'.$image_extension;

                $news_media = 'assets/media/news/'.$image_name;
                move_uploaded_file($_FILES["news_media"]["tmp_name"], BASEURL . $news_media);
                
                if (isset($_POST['uploaded_image']) && $_POST['uploaded_image'] != '') {
                    unlink($_POST['uploaded_image']);
                }
            } else {
                $message = '<div class="alert alert-danger">Passport Picture Can not be Empty</div>';
            }
        } else {
            $news_media = $_POST['uploaded_news_media'];
        }

        $news_id = guidv4();
        $query = "
            INSERT INTO `gmsa_news`(`news_title`, `news_url`, `news_content`, `news_media`, `news_category`, `news_created_by`, `news_id`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ";
        if (isset($_GET['status']) && $_GET['status'] == 'edit_news') {
            $news_id = $id;
            $query = "
                UPDATE gmsa_news 
                SET news_title = ?, news_url = ?,  news_content = ?,  news_media = ?,  news_category = ?, news_updated_by = ?
                WHERE news_id = ?
            ";
        }
        $statement = $conn->prepare($query);
        $result = $statement->execute([$news_title, $news_url, $news_content, $news_media, $news_category, $news_created_by, $news_id]);
        if (isset($result)) {
            $_SESSION['flash_success'] = ucwords($news_title) . ' successfully ' . ((isset($_GET['status']) && $_GET['status'] == 'edit_news') ? 'updated' : 'added') . '!';
            redirect(PROOT . 'admin/executives/all');
        } else {
            $_SESSION['flash_error'] = 'Something went wrong, please try again';
            redirect(PROOT . 'admin/executives/all');
        }
    }


    // DELETE A picture on edit news post
    if ((isset($_GET['delete_np']) && !empty($_GET['delete_np'])) && (isset($_GET['image']) && !empty($_GET['image']))) {
        $result = $News->deleteNewsMedia($conn, sanitize($_GET['delete_np']), sanitize($_GET['image']));
        if ($result) {
            $_SESSION['flash_success'] = 'Media deleted, upload new one!';            
            redirect(PROOT . 'admin/executives/add/edit_news/' . sanitize($_GET['delete_np']));
        } else {
            $_SESSION['flash_error'] = 'Something went wrong, please try again';
            redirect(PROOT . 'admin/executives/add/edit_news/' . sanitize($_GET['delete_np']));
        }
    }

    // Delete news
    if (isset($_GET['type']) && $_GET['type'] == 'add') {
        if (isset($_GET['status']) && $_GET['status'] == 'delete') {
            // code...
            $delete = $News->deleteNews($conn, sanitize($_GET['id']));
            if (isset($delete)) {
                $_SESSION['flash_success'] = 'News deleted but temporary';
                redirect(PROOT . 'admin/executives/all');
            } else {
                $_SESSION['flash_error'] = 'Something went wrong, please try again';
                redirect(PROOT . 'admin/executives/all');
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
                            <h1 class="page-title mr-sm-auto"> Executives </h1>
                            <div class="btn-toolbar">
                                <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></button> <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-upload"></i> <span class="ml-1">Import</span></button>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-expanded="false"><span>More</span> <span class="fa fa-caret-down"></span></button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <div class="dropdown-arrow"></div>
                                        <a href="<?= PROOT; ?>admin/executives/add" class="dropdown-item">Add executive</a> 
                                        <a href="<?= PROOT; ?>admin/executives/position" class="dropdown-item">Add Position</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="<?= PROOT; ?>admin" class="dropdown-item">Dashboard</a> 
                                        <a href="<?= goBack(); ?>" class="dropdown-item">Go back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <?php if (isset($_GET['type'])): ?>
                            <?php if ($_GET['type'] == 'position' || (isset($_GET['status']) && $_GET['status'] == 'edit_position')): ?>
                                <div class="container-fluid mt-4">
                                    <div class="card card-body">
                                        <form method="POST" action="<?= ((isset($_GET['status']) && $_GET['status'] == 'edit_position') ? '?edit_position=' . sanitize($_GET['id']) : ''); ?>">
                                            <div class="bg-danger text-center"><?= $message; ?></div>
                                            <fieldset>
                                                <legend>Position</legend>
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" class="form-control" id="position" name="position" placeholder="Position name" required="" value="<?= $position; ?>"> <label for="position">Position</label>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-success" name="submit_position" id="submit_position"><?= (isset($_GET['status']) && $_GET['status'] == 'edit_position') ? 'Update': 'Add'; ?> position</button>
                                                    <?php if ((isset($_GET['status']) && $_GET['status'] == 'edit_position')): ?>
                                                        <a href="<?= PROOT; ?>admin/executives/position" class="btn">Cancel</a>
                                                    <?php endif; ?>
                                                </div>
                                            </fieldset>
                                        </form>
                                        <br>
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Position</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                                <?php if (is_array($position_rows)): ?>
                                                    <?php $i = 1; foreach ($position_rows as $position_row): ?>
                                                        <tr>
                                                            <td>
                                                                <a class='btn btn-secondary text-decoration-none' href='<?= PROOT; ?>admin/executives/position/edit_position/<?= $position_row['position_id']; ?>'>Edit</a>
                                                            </td>
                                                            <td><?= ucwords($position_row['position']); ?></td>
                                                            <td><?= pretty_date($position_row['createdAt']); ?></td>
                                                            <td>
                                                                <a href='javascript:;' class='btn btn-danger text-decoration-none' data-toggle='modal' data-target='#deleteModal<?= $i; ?>'>Delete</a>

                                                                <div class='modal fade' id='deleteModal<?= $i ;?>' tabindex='-1' aria-labelledby='subscribeModalLabel' aria-hidden='true'>
                                                                    <div class='modal-dialog modal-dialog-centered modal-sm'>
                                                                        <div class='modal-content'>
                                                                            <div class='modal-body'>
                                                                                <p>When you delete this position, all executives under it will be deleted as well.</p>
                                                                                <button type='button' class='btn' data-dismiss='modal'>Close</button>
                                                                                <a href='<?= PROOT; ?>admin/executives/position/delete/<?= $position_row['position_id']; ?>' class='btn btn-secondary'>Confirm Delete.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php $i++; endforeach ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="4">No positions found!</td>
                                                    </tr>
                                                <?php endif ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php 
                                elseif (($_GET['type'] == 'add' && $_GET['status'] == 'new') && isset($_GET['status']) || ($_GET['status'] == 'edit_executive')): 
                                    if ($_GET['status'] == 'new') {
                                        $id = sanitize($_GET['id']);
                                        $member_row = find_member_by_id($conn, $id);
                                        if (is_array($member_row)) {
                                            // code...
                                            $executive_media = $member_row['member_picture'];
                                        } else {
                                            $_SESSION['flash_error'] = 'Member not found!';
                                            redirect(PROOT . 'admin/members');
                                        }
                                    } else if ($_GET['status'] == 'edit_executive') {

                                    }
                            ?>
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST">
                                            <fieldset>
                                                <legend><?= (($_GET['status'] == 'new') ? 'Add' : 'Update'); ?> executive</legend>
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" class="form-control" id="prayer_name" name="prayer_name" placeholder="Prayer name" required="" value="<?= ucwords($member_row['member_firstname'] . ' ' . $member_row['member_middlename'] . ' ' . $member_row['member_lastname']); ?>"> <label for="prayer_name">File</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <select type="text" class="custom-select" name="news_category" id="news_category" required>
                                                           <option value="" <?= (($news_category == '') ? 'selected' : ''); ?>>...</option>
                                                            <?php foreach ($position_rows as $position_row): ?>
                                                                <option value="<?= $position_row['position_id']; ?>" <?= (($news_category == $position_row['position_id']) ? 'selected' : ''); ?>><?= ucwords($position_row['position']); ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                        <label for="news_category">Position</label>
                                                    </div>
                                                </div>

                                                <?php if ($executive_media != ''): ?>
                                                <div class="mb-3">
                                                    <label>Executive Image</label><br>
                                                    <img src="<?= PROOT . $executive_media; ?>" class="img-fluid img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;">
                                                    <a href="<?= PROOT; ?>admin/executive?delete_np=<?= $_GET['id']; ?>&image=<?= $executive_media; ?>" class="badge bg-danger">Change Image</a>
                                                </div>
                                                <?php else: ?>
                                                <div class="mb-3">
                                                    <div>
                                                        <label for="executive_media" class="form-label">Upload image</label>
                                                        <input type="file" class="form-control" id="executive_media" name="executive_media" required>
                                                        <span id="upload_file"></span>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <input type="hidden" name="uploaded_executive_media" id="uploaded_executive_media" value="<?= $executive_media; ?>">

                                                <div class="form-actions mb-2">
                                                    <button type="submit" class="btn btn-secondary" name="submitNews" id="submitNews"><?= (isset($_GET['status']) && $_GET['status'] == 'edit_news') ? 'Update': 'Add'; ?> executive</button>
                                                    <?php if (isset($_GET['status']) && $_GET['status'] == 'edit_news'): ?>
                                                        <br><br>
                                                        <a href="<?= PROOT; ?>admin/executive" class="btn">Cancel</a>
                                                    <?php endif ?>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card card-fluid">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs card-header-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="<?= PROOT; ?>admin/members">All (<?= $total_data; ?>)</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#tab2">Other</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                                </div>
                                                <input type="text" id="search" class="form-control" placeholder="Search record">
                                            </div>
                                        </div>
                                        <div id="load-content"></div>                                 
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php include ("includes/footer.php"); ?>
<script type="text/javascript">
    $(document).ready(function() {
    
        // SEARCH AND PAGINATION FOR LIST
        function load_data(page, query = '') {
            $.ajax({
                url : "<?= PROOT; ?>admin/auth/list.members.php",
                method : "POST",
                data : {
                    page : page, 
                    query : query
                },
                success : function(data) {
                    $("#load-content").html(data);
                }
            });
        }

        load_data(1);
        $('#search').keyup(function() {
            var query = $('#search').val();
            load_data(1, query);
        });

        $(document).on('click', '.page-link-go', function() {
            var page = $(this).data('page_number');
            var query = $('#search').val();
            load_data(page, query);
        });

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
                    $('#passport').css('visibility', 'visible');
                    $('#passport').val('');

                    $('#executive_media').css('visibility', 'visible');
                    $('#executive_media').val('');
                }
            });
        });


        // Upload IMAGE Temporary
        $(document).on('change','#executive_media', function() {

            var property = document.getElementById("executive_media").files[0];
            var image_name = property.name;

            var image_extension = image_name.split(".").pop().toLowerCase();
            if (jQuery.inArray(image_extension, ['jpeg', 'png', 'jpg', 'gif']) == -1) {
                alert("The file extension must be .jpg, .png, .jpeg, .gif");
                $('#executive_media').val('');
                return false;
            }

            var image_size = property.size;
            if (image_size > 15000000) {
                alert('The file size must be under 15MB');
                return false;
            } else {

                var form_data = new FormData();
                form_data.append("executive_media", property);
                $.ajax({
                    url: "<?= PROOT; ?>admin/auth/temporary.upload.executive.php",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $("#upload_file").html("<div class='text-success font-weight-bolder'>Uploading news image ...</div>");
                    },
                    success: function(data) {
                        $("#upload_file").html(data);
                        $('#executive_media').css('visibility', 'hidden');
                    }
                });
            }
        });
    });
</script>