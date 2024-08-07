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
                $log_msg = 'creat';
                if (isset($_GET['status']) && $_GET['status'] == 'edit_position') {
                    $position_id = $id;
                    $q = "
                        UPDATE gmsa_positions 
                        SET position = ? 
                        WHERE position_id = ?
                    ";
                    $log_msg = 'updat';
                }
                $statement = $conn->prepare($q);
                $result = $statement->execute([$position, $position_id]);
                if (isset($result)) {

                    $log_message = $log_msg . "ed position with id " . $position_id . "";
                    add_to_log($log_message, $admin_data['admin_id']);

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

            $log_message = "deleted a position with id " . $delete . "";
            add_to_log($log_message, $admin_data['admin_id']);

            $_SESSION['flash_success'] = 'Position deleted!';            
            redirect(PROOT . 'admin/executives/position');
        } else {
            echo js_alert('Something went wrong, please try again');
            redirect(PROOT . 'admin/executives/position');
        }
    }


    $member_media = '';
    if (isset($_GET['type']) && $_GET['type'] == 'add' && $_GET['status'] == 'new') {
        $id = sanitize($_GET['id']);
        $member_row = find_member_by_id($conn, $id);
        if (is_array($member_row)) {
            $member_id = $id;
            $member_media = $member_row['member_picture'];
        } else {
            $_SESSION['flash_error'] = 'Member not found!';
            redirect(PROOT . 'admin/members');
        }
    }
    $executive_position = (isset($_POST['executive_position']) ? sanitize($_POST['executive_position']) : '');
    $year_from = (isset($_POST['year_from']) ? sanitize($_POST['year_from']) : '');
    $year_to = (isset($_POST['year_to']) ? sanitize($_POST['year_to']) : '');
    $createdAt = date("Y-m-d H:i:s A");
    $executive_id = guidv4();

    if (isset($_POST['submitExecutive'])) {
        
        if ($_POST['uploaded_member_media'] == '') {
            if (!empty($_FILES)) {

                $image_test = explode(".", $_FILES["member_media"]["name"]);
                $image_extension = end($image_test);
                $image_name = md5(microtime()) . '.' . $image_extension;

                $member_media = 'assets/media/members/' . $image_name;
                move_uploaded_file($_FILES["member_media"]["tmp_name"], BASEURL . $member_media);
                
                if (isset($_POST['uploaded_image']) && $_POST['uploaded_image'] != '') {
                    unlink($_POST['uploaded_image']);
                }
            } else {
                $message = '<div class="alert alert-danger">Picture cannot be empty!</div>';
            }
        } else {
            $member_media = $_POST['uploaded_member_media'];
        }

        $query = "
            INSERT INTO `gmsa_executives`(`member_id`, `position_id`, `year_from`, `year_to`, `createdAt`, `executive_id`) 
            VALUES (?, ?, ?, ?, ?, ?)
        ";
        $statement = $conn->prepare($query);
        $result = $statement->execute([$member_id, $executive_position, $year_from, $year_to, $createdAt, $executive_id]);
        if (isset($result)) {
            $sql = "
                UPDATE gmsa_members 
                SET member_picture = ? 
                WHERE member_id = ?
            ";
            $statement = $conn->prepare($sql);
            $statement->execute([$member_media, $member_id]);

            $log_message = "added an executive with id " . $executive_id . "";
            add_to_log($log_message, $admin_data['admin_id']);

            $_SESSION['flash_success'] = 'Executive successfully added!';
            redirect(PROOT . 'admin/executives/all');
        } else {
            $_SESSION['flash_error'] = 'Something went wrong, please try again!';
            redirect(PROOT . 'admin/executives/all');
        }
    }

    // Delete executive
    if ((isset($_GET['type']) && $_GET['type'] == 'remove') && !empty($_GET['status'])) {
        // code...
        $delete = sanitize($_GET['status']);
        $result = $conn->query("DELETE FROM gmsa_executives WHERE executive_id = '".$delete."'")->execute();
        if (isset($result)) {
            $log_message = "deleted an executive with id " . $delete . "";
            add_to_log($log_message, $admin_data['admin_id']);

            $_SESSION['flash_success'] = 'Executive deleted successfully!';
            redirect(PROOT . 'admin/executives/all');
        } else {
            $_SESSION['flash_error'] = 'Something went wrong, please try again';
            redirect(PROOT . 'admin/executives/all');
        }
    }

    // DELETE A executive picture
    if ((isset($_GET['delete_np']) && !empty($_GET['delete_np'])) && (isset($_GET['image']) && !empty($_GET['image']))) {

        $mediaLocation = BASEURL . sanitize($_GET['image']);
        $delete = unlink($mediaLocation);
        unset($mediaLocation);

        if ($delete) {
            $update = "
                UPDATE gmsa_members 
                SET member_picture = ? 
                WHERE member_id = ?
            ";
            $statement = $conn->prepare($update);
            $result = $statement->execute([NULL, sanitize($_GET['delete_np'])]);
            if ($result) {
                $log_message = "deleted an executive picture with id " . $_GET['delete_np'] . " to upload new one";
                add_to_log($log_message, $admin_data['admin_id']);

                $_SESSION['flash_success'] = 'Executive profile picture deleted, upload new one!';            
                redirect(PROOT . 'admin/executives/add/new/' . sanitize($_GET['delete_np']));
            } else {
                $_SESSION['flash_error'] = 'Something went wrong, please try again';
                redirect(PROOT . 'admin/executives/add/new/' . sanitize($_GET['delete_np']));
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
                                <?php if (isset($_GET['type']) && $_GET['type'] == 'all'): ?>
                                    <a href="<?= PROOT . 'admin/export/executives.export'; ?>" class="btn btn-light"><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></a>
                                <?php endif ?>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-expanded="false"><span>More</span> <span class="fa fa-caret-down"></span></button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <div class="dropdown-arrow"></div>
                                        <a href="<?= PROOT; ?>admin/members" class="dropdown-item">Add executive</a> 
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

                                                                <div class='modal fade' id='deleteModal<?= $i ;?>' tabindex='-1' role="dialog" aria-labelledby='subscribeModalLabel' aria-hidden='true'>
                                                                    <div class='modal-dialog modal-dialog-centered modal-sm' role="document">
                                                                        <div class='modal-content'>
                                                                            <div class='modal-body p-2'>
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
                                elseif (isset($_GET['status']) && (($_GET['type'] == 'add' && $_GET['status'] == 'new'))):

                                $findExecutive = find_executive_by_member_id($conn, $member_id);
                                if (is_array($findExecutive)) {
                                    $_SESSION['flash_error'] = 'Selected member is already added as an executive!';
                                    redirect(PROOT . 'admin/members');
                                }
                            ?>
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data">
                                            <fieldset>
                                                <legend>Add executive</legend>
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" class="form-control" readonly placeholder="Prayer name" required="" value="<?= ucwords($member_row['member_firstname'] . ' ' . $member_row['member_middlename'] . ' ' . $member_row['member_lastname']); ?>"> <label for="">Member Name</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <select type="text" class="custom-select" name="executive_position" id="executive_position" required>
                                                           <option value="" <?= (($executive_position == '') ? 'selected' : ''); ?>>...</option>
                                                            <?php foreach ($position_rows as $position_row): ?>
                                                                <option value="<?= $position_row['position_id']; ?>" <?= (($executive_position == $position_row['position_id']) ? 'selected' : ''); ?>><?= ucwords($position_row['position']); ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                        <label for="executive_position">Position</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="year_from">Year from</label>
                                                    <select type="year" class="form-control" id="year_from" name="year_from" required="" value="<?=$year_from; ?>"></select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="year_to">Year to</label>
                                                    <select type="year" class="form-control" id="year_to" name="year_to" required="" value="<?= $year_to; ?>"></select>
                                                </div>
                                                <?php if ($member_media != ''): ?>
                                                <div class="mb-3">
                                                    <label>Executive Image</label><br>
                                                    <img src="<?= PROOT . $member_media; ?>" class="img-fluid img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;">
                                                    <a href="<?= PROOT; ?>admin/executives?delete_np=<?= $_GET['id']; ?>&image=<?= $member_media; ?>" class="badge bg-danger">Change Image</a>
                                                </div>
                                                <?php else: ?>
                                                <div class="mb-3">
                                                    <div>
                                                        <label for="member_media" class="form-label">Upload image</label>
                                                        <input type="file" class="form-control" id="member_media" name="member_media" required>
                                                        <span id="upload_file"></span>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <input type="hidden" name="uploaded_member_media" id="uploaded_member_media" value="<?= $member_media; ?>">

                                                <div class="form-actions mb-2">
                                                    <button type="submit" class="btn btn-secondary" name="submitExecutive" id="submitExecutive">Add executive</button>
                                                    <br><br>
                                                    <a href="<?= PROOT; ?>admin/executives/all" class="btn">Cancel</a>
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

        $('#year_from').each(function() {
            var year = (new Date()).getFullYear();
            var current = year;
            year -= 3;
            for (var i = 0; i < 5; i++) {
                if ((year+i) == current)
                    $(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
                else
                    $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
            }
        })

        $('#year_to').each(function() {
            var year = (new Date()).getFullYear();
            var current = year + 1;
            year -= 3;
            for (var i = 0; i < 5; i++) {
                if ((year+i) == current)
                    $(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
                else
                    $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
            }
        })

    
        // SEARCH AND PAGINATION FOR LIST
        function load_data(page, query = '') {
            $.ajax({
                url : "<?= PROOT; ?>admin/auth/list.executives.php",
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
                    $('#member_media').css('visibility', 'visible');
                    $('#member_media').val('');
                }
            });
        });


        // Upload IMAGE Temporary
        $(document).on('change','#member_media', function() {

            var property = document.getElementById("member_media").files[0];
            var image_name = property.name;

            var image_extension = image_name.split(".").pop().toLowerCase();
            if (jQuery.inArray(image_extension, ['jpeg', 'png', 'jpg', 'gif']) == -1) {
                alert("The file extension must be .jpg, .png, .jpeg, .gif");
                $('#member_media').val('');
                return false;
            }

            var image_size = property.size;
            if (image_size > 15000000) {
                alert('The file size must be under 15MB');
                return false;
            } else {

                var form_data = new FormData();
                form_data.append("member_media", property);
                $.ajax({
                    url: "<?= PROOT; ?>admin/auth/temporary.upload.member.php",
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
                        $('#member_media').css('visibility', 'hidden');
                    }
                });
            }
        });
    });
</script>