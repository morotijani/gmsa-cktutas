<?php 
    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    $total_data = $conn->query("SELECT * FROM gmsa_members WHERE status = 0")->rowCount();

    // DELETE A MEMBER PERMANENTLY
    if (isset($_GET['permanent_delete']) && !empty($_GET['permanent_delete'])) {
        $permanent_delete = (int)$_GET['permanent_delete'];
        $permanent_delete = sanitize($permanent_delete);

        $uploaded_passport_location = BASEURL . $_GET['member_picture'];
        $DEL = unlink($uploaded_passport_location);

        if ($DEL) {
            $query = "
                DELETE FROM gmsa_members 
                WHERE id = ?
            ";
            $statement = $conn->prepare($query);
            $statement->execute([$permanent_delete]);
            $_SESSION['flash_success'] = 'Member permanently deleted!';
            redirect(PROOT . 'admin/members');
        }
    }

    // edit a member
    if (isset($_GET['type']) && $_GET['type'] == 'edit' && !empty($_GET['id'])) {
        $id = sanitize($_GET['id']);

        $member = find_by_member_id($id);
        if (is_array($member)) {


            $sql = "
                UPDATE `gmsa_members` 
                SET `member_firstname`= ?,`member_middlename`= ?,`member_lastname`= ?,`member_email`= ?,`member_phone`= ?,`user_password`= ?,`member_gender`= ?,`member_dob`= ?,`member_region`= ?,`member_city`= ?,`member_digitaladdress`= ?,`member_studentid`= ?,`member_programme`= ?,`member_department`= ?,`member_admissiontype`= ?,`member_admissionyear`= ?,`member_hostel`= ?,`member_level`= ?,`member_guardianfullname`= ?,`member_guardianphonenumber`= ?,`member_picture`= ?
                WHERE member_id = ?
            ";
            // $status = 1;
            // if ($_GET['type'] == 'restore') {
            //     $status = 0;
            // }
            // $query = "
            //     UPDATE gmsa_members 
            //     SET status = ? 
            //     WHERE member_id = ? 
            // ";
            // $statement = $conn->prepare($query);
            // $result = $statement->execute([$status, $id]);
            // if (isset($result)) {
            //     // code...
            //     $_SESSION['flash_success'] = 'Member ' . (($_GET['type'] == 'restore') ? 'restored' : 'removed temporary') . '!';
            //     redirect(PROOT . 'admin/members');
            // } else {
            //     $_SESSION['flash_error'] = 'Something went wrong, please try again!';
            //     redirect(PROOT . 'admin/members');
            // }
        } else {
            $_SESSION['flash_error'] = 'Member not found!';
            redirect(PROOT . 'admin/members');
        }
    }


    // temporary delete a member
    if (isset($_GET['type']) && ($_GET['type'] == 'remove' || $_GET['type'] == 'restore') && !empty($_GET['id'])) {
        $id = sanitize($_GET['id']);

        $member = find_by_member_id($id);
        if (is_array($member)) {
            $status = 1;
            if ($_GET['type'] == 'restore') {
                $status = 0;
            }
            $query = "
                UPDATE gmsa_members 
                SET status = ? 
                WHERE member_id = ? 
            ";
            $statement = $conn->prepare($query);
            $result = $statement->execute([$status, $id]);
            if (isset($result)) {
                // code...
                $_SESSION['flash_success'] = 'Member ' . (($_GET['type'] == 'restore') ? 'restored' : 'removed temporary') . '!';
                redirect(PROOT . 'admin/members');
            } else {
                $_SESSION['flash_error'] = 'Something went wrong, please try again!';
                redirect(PROOT . 'admin/members');
            }
        } else {
            $_SESSION['flash_error'] = 'Member not found!';
            redirect(PROOT . 'admin/members');
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
                            <h1 class="page-title mr-sm-auto text-<?= ((isset($_GET['type']) && $_GET['type'] == 'archive' && !empty($_GET['id'])) ? 'danger ': ''); ?>"> <?= ((isset($_GET['type']) && $_GET['type'] == 'archive' && !empty($_GET['id'])) ? 'Archive ': ''); ?>Members Table </h1>
                            <div class="btn-toolbar">
                                <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></button>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-expanded="false"><span>More</span> <span class="fa fa-caret-down"></span></button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <div class="dropdown-arrow"></div>
                                        <a href="<?= PROOT; ?>auth/register" class="dropdown-item">Add member</a> 
                                        <a href="<?= PROOT; ?>admin/executives/all" class="dropdown-item">Executives</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="<?= PROOT; ?>admin/members/archive/1" class="dropdown-item">Archive</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <div class="card card-fluid">
                            <?php if (isset($_GET['type']) && $_GET['type'] == 'edit' && !empty($_GET['id'])): ?>
                                <form method="POST" class="p-3">
                                    <fieldset>
                                        <legend>Edit <?= $prayer_name; ?></legend>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="text" class="form-control" id="prayer_name" name="prayer_name" placeholder="Prayer name" required="" value="<?= $prayer_name; ?>"> <label for="prayer_name">Prayer</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="time" class="form-control" id="prayer_time" name="prayer_time" placeholder="Time" required="" value="<?= $prayer_time; ?>"> <label for="prayer_time">Time</label>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button class="btn btn-success" type="submit" name="submit">Update prayer</button>
                                            <a class="btn" href="<?= PROOT; ?>admin/prayer-time">Cancel update</a>
                                        </div>
                                    </fieldset>
                                </form>
                            <?php elseif (isset($_GET['type']) && $_GET['type'] == 'archive' && !empty($_GET['id'])):
                                $query = "
                                    SELECT * FROM gmsa_members 
                                    WHERE status = ? 
                                ";
                                $statement = $conn->prepare($query);
                                $statement->execute([1]);

                            ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> &nbsp; </th>
                                            <th> Name </th>
                                            <th> Level </th>
                                            <th> Programme </th>
                                            <th> Department </th>
                                            <th> Phone </th>
                                            <th> Hostel </th>
                                            <th style="width:100px; min-width:100px;"> &nbsp; </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($statement->rowCount() > 0): ?>
                                        <?php $i = 1; foreach ($statement->fetchAll() as $row): ?>
                                        <tr>
                                            <tr>
                                                <td> <?= $i; ?> </td>
                                                <td>
                                                    <a href="javascript:;" class="tile tile-img mr-1">
                                                        <img class="img-fluid" src="<?= PROOT . (($row["member_picture"] == '') ? 'assets/media/default.png' : $row['member_picture']); ?>" alt="Card image cap">
                                                    </a> 
                                                    <a href="javascript:;"><?= ucwords($row["member_firstname"] . ' ' . $row["member_middlename"] . '  ' . $row["member_lastname"]); ?></a>
                                                </td>
                                                <td class="align-middle"> <?= $row["member_level"]; ?> </td>
                                                <td class="align-middle"> <?= ucwords($row["member_programme"]); ?> </td>
                                                <td class="align-middle"> <?= ucwords($row["member_department"]); ?> </td>
                                                <td class="align-middle"> <?= $row["member_phone"]; ?> </td>
                                                <td class="align-middle"> <?= ucwords($row["member_hostel"]); ?> </td>
                                                <td class="align-middle text-right">
                                                    <a title="Permenantly delete" href="<?= PROOT; ?>admin/members/delete/<?= $row["member_id"]; ?>" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-trash-alt"></i> <span class="sr-only">Delete</span></a> 
                                                    <a title="Restore" href="<?= PROOT; ?>admin/members/restore/<?= $row["member_id"]; ?>" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-recycle"></i> <span class="sr-only">Restore</span></a> 
                                                </td>
                                            </tr>
                                        </tr>
                                        <?php $i++; endforeach ?>
                                    <?php else:  ?>
                                        <tr>
                                            <td colspan="8">No data found!</td>
                                        </tr>
                                    <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else: ?>
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= PROOT; ?>admin/members">All (<?= $total_data; ?>)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= PROOT; ?>admin/members/archive/1">Archive</a>
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
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php include ("includes/footer.php"); ?>
<script type="text/javascript">
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
</script>