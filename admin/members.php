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
        $member_media = '';

        $member = find_by_member_id($id);
        if (is_array($member)) {
            $post = cleanPost($_POST);
            $firstname = (isset($_POST['firstname']) ? $post['firstname'] : $member['member_firstname']);
            $middlename = (isset($_POST['middlename']) ? $post['middlename'] : $member['member_middlename']);
            $lastname = (isset($_POST['lastname']) ? $post['lastname'] : $member['member_lastname']);
            $email = (isset($_POST['email']) ? $post['email'] : $member['member_email']);
            $phone = (isset($_POST['phone']) ? $post['phone'] : $member['member_phone']);
            $gender = (isset($_POST['gender']) ? $post['gender'] : $member['member_gender']);
            $dob = (isset($_POST['dob']) ? $post['dob'] : $member['member_dob']);
            $region = (isset($_POST['region']) ? $post['region'] : $member['member_region']);
            $city = (isset($_POST['city']) ? $post['city'] : $member['member_city']);
            $digitaladdress = (isset($_POST['digitaladdress']) ? $post['digitaladdress'] : $member['member_digitaladdress']);
            $studentid = (isset($_POST['studentid']) ? $post['studentid'] : $member['member_studentid']);
            $programme = (isset($_POST['programme']) ? $post['programme'] : $member['member_programme']);
            $department = (isset($_POST['department']) ? $post['department'] : $member['member_department']);
            $admissiontype = (isset($_POST['admissiontype']) ? $post['admissiontype'] : $member['member_admissiontype']);
            $admissionyear = (isset($_POST['admissionyear']) ? $post['admissionyear'] : $member['member_admissionyear']);
            $hostel = (isset($_POST['hostel']) ? $post['hostel'] : $member['member_hostel']);
            $level = (isset($_POST['level']) ? $post['level'] : $member['member_level']);
            $guardianfullname = (isset($_POST['guardianfullname']) ? $post['guardianfullname'] : $member['member_guardianfullname']);
            $guardianphonenumber = (isset($_POST['guardianphonenumber']) ? $post['guardianphonenumber'] : $member['member_guardianphonenumber']);
            $member_media = $member['member_picture'];

            if (isset($_POST['firstname'])) {
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
                    } 
                    // else {
                    //     $message = '<div class="alert alert-danger">Picture cannot be empty!</div>';
                    // }
                } else {
                    $member_media = $_POST['uploaded_member_media'];
                }

                $data = [$firstname, $middlename, $lastname, $email, $phone, $gender, $dob, $region, $city, $digitaladdress, $studentid, $programme, $department, $admissiontype, $admissionyear, $hostel, $level, $guardianfullname, $guardianphonenumber, $member_media, $id];
                $sql = "
                    UPDATE `gmsa_members` 
                    SET `member_firstname` = ?, `member_middlename` = ?, `member_lastname` = ?, `member_email` = ?, `member_phone`= ?, `member_gender`= ?,`member_dob`= ?,`member_region`= ?,`member_city`= ?,`member_digitaladdress`= ?,`member_studentid`= ?,`member_programme`= ?,`member_department`= ?,`member_admissiontype`= ?,`member_admissionyear`= ?,`member_hostel`= ?,`member_level`= ?,`member_guardianfullname`= ?,`member_guardianphonenumber`= ?,`member_picture`= ?
                    WHERE member_id = ?
                ";
                $statement = $conn->prepare($sql);
                $result = $statement->execute($data);
                if (isset($result)) {
                    // code...
                    $_SESSION['flash_success'] = 'Member updated successfully!';
                    redirect(PROOT . 'admin/members');
                } else {
                    $_SESSION['flash_error'] = 'Something went wrong, please try again!';
                    redirect(PROOT . 'admin/members');
                }
            }
        } else {
            $_SESSION['flash_error'] = 'Member not found!';
            redirect(PROOT . 'admin/members');
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
                $_SESSION['flash_success'] = 'Member profile picture deleted, upload new one!';            
                redirect(PROOT . 'admin/members/edit/' . sanitize($_GET['delete_np']));
            } else {
                $_SESSION['flash_error'] = 'Something went wrong, please try again';
                redirect(PROOT . 'admin/members/edit/' . sanitize($_GET['delete_np']));
            }
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
                                <a href="<?= PROOT . 'admin/export/members.export?export=' . ((isset($_GET['type']) && $_GET['type'] == 'archive') ? 'archive ': 'all'); ?>" class="btn btn-light"><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></a>
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
                                <form method="POST" class="p-3" enctype="multipart/form-data">
                                    <fieldset>
                                        <legend>Edit <?= $firstname; ?></legend>

                                        <h4 class="mb-3 fw-light">Personal Details</h4>
                                         <?php if ($member_media != ''): ?>
                                        <div class="mb-3">
                                            <label>Profile picture</label><br>
                                            <img src="<?= PROOT . $member_media; ?>" class="img-fluid img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;">
                                            <a href="<?= PROOT; ?>admin/members?delete_np=<?= $_GET['id']; ?>&image=<?= $member_media; ?>" class="badge bg-danger">Change Image</a>
                                        </div>
                                        <?php else: ?>
                                        <div class="mb-3">
                                            <div>
                                                <label for="member_media" class="form-label">Upload image</label>
                                                <input type="file" class="form-control" id="member_media" name="member_media">
                                                <span id="upload_file"></span>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <input type="hidden" name="uploaded_member_media" id="uploaded_member_media" value="<?= $member_media; ?>">
                                        <div class="row g-3">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" value="<?= $firstname; ?>">
                                                        <label for="firstname">First name *</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" class="form-control" id="middlename" name="middlename" placeholder="" value="<?= $middlename; ?>">
                                                        <label for="middlename">Middle name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" value="<?= $lastname; ?>">
                                                        <label for="lastname">Last name *</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?= $email; ?>">
                                                        <label for="email">Email *</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="tel" inputmode="" class="form-control" id="phone" name="phone" placeholder="" value="<?= $phone; ?>">
                                                        <label for="phone">Phone *</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <select type="text" class="form-control form-control-lg" id="gender" name="gender">
                                                        <option value="" selected>Gender *</option>
                                                        <option value="Male"<?= (($gender == 'Male') ? ' selected': ''); ?>>Male</option>
                                                        <option value="Female"<?= (($gender == 'Female') ? ' selected': ''); ?>>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="date" class="form-control" id="dob" name="dob" placeholder="" value="<?= $dob; ?>">
                                                        <label for="dob">Date of Birth *</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" class="form-control" id="region" name="region" placeholder="" value="<?= $region; ?>">
                                                        <label for="region">Region</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" class="form-control" id="city" name="city" placeholder="" value="<?= $city; ?>">
                                                        <label for="city">City</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" class="form-control" id="digitaladdress" name="digitaladdress" placeholder="" value="<?= $digitaladdress; ?>">
                                                        <label for="digitaladdress">Digital Address (optional)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-3">
                                            <h4 class="mb-3 fw-light">School Details</h4>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" class="form-control" id="studentid" name="studentid" placeholder="" value="<?= $studentid; ?>">
                                                        <label for="studentid">Student ID *</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" class="form-control" id="programme" name="programme" placeholder="" value="<?= $programme; ?>">
                                                        <label for="programme">Programme *</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="tel" class="form-control" id="department" name="department" placeholder="" value="<?= $department; ?>">
                                                        <label for="department">Department *</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-floating">
                                                    <select type="tel" class="form-control form-control-lg" id="admissiontype" name="admissiontype">
                                                        <option value="" selected>Admission type *</option>
                                                        <option value="Diploma"<?= (($admissiontype == 'Diploma') ? ' selected': ''); ?>>Diploma</option>
                                                        <option value="Undergraduate"<?= (($admissiontype == 'Undergraduate') ? ' selected': ''); ?>>Undergraduate</option>
                                                        <option value="Postgraduate"<?= (($admissiontype == 'Postgraduate') ? ' selected': ''); ?>>Postgraduate</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="tel" class="form-control" id="admissionyear" name="admissionyear" placeholder="" value="<?= $admissionyear; ?>">
                                                        <label for="admissionyear">Admission year *</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="number" min="0" class="form-control" id="level" name="level" placeholder="" value="<?= $level; ?>">
                                                        <label for="level">Level *</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text"  class="form-control" id="hostel" name="hostel" value="<?= $hostel; ?>">
                                                        <label for="level">Hostel</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="mb-3 fw-light">Parent/Guardian Details</h4>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="text" class="form-control" id="guardianfullname" name="guardianfullname" placeholder="" value="<?= $guardianfullname; ?>">
                                                <label for="guardianfullname">Full name *</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="tel" inputmode="" class="form-control" id="guardianphonenumber" name="guardianphonenumber" placeholder="" value="<?= $guardianphonenumber; ?>">
                                                <label for="guardianphonenumber">Phone number *</label>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button class="btn btn-success" type="submit" name="submit">Edit member</button>
                                            <a class="btn" href="<?= PROOT; ?>admin/members">Cancel</a>
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
    })
</script>