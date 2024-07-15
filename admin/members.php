<?php 
    require_once ("../db_connection/conn.php");
    // if (!admin_is_logged_in()) {
    //     admn_login_redirect();
    // }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    // DELETE A MEMBER PERMANENTLY
    if (isset($_GET['permanent_delete']) && !empty($_GET['permanent_delete'])) {
        $permanent_delete = (int)$_GET['permanent_delete'];
        $permanent_delete = sanitize($permanent_delete);

        $uploaded_passport_location = BASEURL . $_GET['uploaded_passport'];
        $DEL = unlink($uploaded_passport_location);

        if ($DEL) {
            $query = "
                DELETE FROM gmsa_members 
                WHERE id = ?
            ";
            $statement = $conn->prepare($query);
            $statement->execute([$permanent_delete]);
            $_SESSION['flash_success'] = 'Member permanently <span class="bg-info">DELETED</span>';
            redirect(PROOT . '.in/members');
        }
    }

    $query = "
        SELECT * FROM gmsa_members 
        WHERE status = ?
        ORDER BY id DESC 
    ";
    $statement = $conn->prepare($query);
    $statement->execute([0]);
    $count_members = $statement->rowCount();
    $result = $statement->fetchAll();
?> 
 <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Members Table </h1><!-- .btn-toolbar -->
                            <div class="btn-toolbar">
                                <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></button> <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-upload"></i> <span class="ml-1">Import</span></button>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-expanded="false"><span>More</span> <span class="fa fa-caret-down"></span></button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <div class="dropdown-arrow"></div>
                                        <a href="#" class="dropdown-item">Add tasks</a> 
                                        <a href="#" class="dropdown-item">Invite members</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">Share</a> 
                                        <a href="#" class="dropdown-item">Archive</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div><?= $flash; ?></div>
                    <div class="page-section">
                        <div class="card card-fluid">
                            <div id="load-content"></div>                                    
                        </div>
                    </div>
       

            <div class="text-white w-100 h-100" style="z-index: 5; padding: 4px 0px; margin-bottom: 20px; transition: all 0.2s ease-in-out; background: #3B3B3B; border-radius: 4px; box-shadow: 0px 1.6px 3.6px rgb(0 0 0 / 25%), 0px 0px 2.9px rgb(0 0 0 / 22%);">
                <div class="container-fluid mt-4">
                    <div class="table-responsive">
                         <table class="table table-sm text-white table-bordered">
                            <thead>
                                <tr style="color: #A7A7A7; font-weight: 700;">
                                    <th></th>
                                    <th>Membership Id</th>
                                    <th>Student Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Sex</th>
                                    <th>Department</th>
                                    <th>Programme</th>
                                    <th>Level</th>
                                    <th>Name of Hostel</th>
                                    <th>WhatsApp Contact</th>
                                    <th>Telephone Number</th>
                                    <th>Passport</th>
                                    <th>Registered Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($count_members > 0): ?>
                                    
                                    <?php $i = 1; foreach ($result as $row): ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td>
                                                <?= $row['membership_identity']; ?>
                                                <?= ($row['membership_paid'] == 1) ? '<span class="badge bg-success">Paid</span>' : ''; ?>        
                                                <?= ($row['membership_executive'] == 'Yes') ? '<span class="badge bg-info">' . ucwords($row["membership_position"]) . '</span>' : ''; ?>        
                                            </td>
                                            <td><?= $row['membership_student_id']; ?></td>
                                            <td><?= ucwords($row['membership_fname']); ?></td>
                                            <td><?= ucwords($row['membership_lname']); ?></td>
                                            <td><?= $row['membership_email']; ?></td>
                                            <td><?= ucwords($row['membership_sex']); ?></td>
                                            <td><?= ucwords($row['membership_department']); ?></td>
                                            <td><?= ucwords($row['membership_programme']); ?></td>
                                            <td><?= ucwords($row['membership_level']); ?></td>
                                            <td><?= ucwords($row['membership_name_of_hostel']); ?></td>
                                            <td><?= $row['membership_whatsapp_contact']; ?></td>
                                            <td><?= $row['membership_telephone_number']; ?></td>
                                            <td>
                                                <a href="<?= PROOT . $row['membership_passport']; ?>" target="_blank">
                                                    <img src="<?= PROOT . $row['membership_passport']; ?>" width="100" height="100" class="img-thumbnail">  
                                                </a>
                                            </td>
                                            <td><?= pretty_date_notime($row['membership_registered_date']); ?></td>
                                            <td>
                                                <a class="badge bg-dark text-decoration-none" href="javascript:;" data-bs-toggle="modal" data-bs-target="#memberModal<?= $row['id']; ?>">Details</a>
                                                
                                                <a class="badge bg-secondary text-decoration-none" href="<?= PROOT; ?>.in/add.member?edit=1&id=<?= $row['id']; ?>">Edit</a>
                                                <!-- <a class="badge bg-danger text-decoration-none" href="<?= PROOT; ?>.in/members?delete=1&id=<?= $row['id']; ?>">Delete</a> -->
                                                <a class="badge bg-danger text-decoration-none" href="javascript:;" data-bs-toggle='modal' data-bs-target='#deleteModal<?= $i; ?>'>Delete</a>

                                                <div class='modal fade' id='deleteModal<?= $i; ?>' tabindex='-1' aria-labelledby='subscribeModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog modal-dialog-centered modal-sm'>
                                                        <div class='modal-content' style='background-color: rgb(51, 51, 51);'>
                                                            <div class='modal-body'>
                                                                <p>Are you sure you want to delete this member.</p>
                                                                <button type='button' class='btn btn-sm btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                                <a href='<?= PROOT; ?>.in/members?permanent_delete=<?= $row['id']; ?>&uploaded_passport=<?= $row['membership_passport']; ?>' class='btn btn-sm btn-outline-secondary'>Confirm Delete.</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="memberModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="memberModalLabel<?= $row['id']; ?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content" style="background: #3B3B3B;">
                                                            <div class="modal-body text-center">
                                                                <div>
                                                                    <?= ($row['membership_paid'] == 1) ? '<span class="badge bg-success mb-2">Paid</span>' : ''; ?>        
                                                                    <?= ($row['membership_executive'] == 'Yes') ? '<span class="badge bg-info mb-2">' . ucwords($row["membership_position"]) . '</span>' : ''; ?>
                                                                </div>
                                                                <img src="<?= PROOT . $row['membership_passport']; ?>" alt="" class="img-fluid rounded" style="height: 200px; width: auto; margin: 0 auto;">
                                                                <table class="table table-sm table-bordered mt-3" style="width: auto; margin: 0 auto;">
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">Identity</td>
                                                                        <td><?= $row['membership_identity']; ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">Full name</td>
                                                                        <td><?= ucwords($row['membership_fname'] . ' ' . $row['membership_lname']); ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">Email</td>
                                                                        <td><?= $row['membership_email']; ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">Sex</td>
                                                                        <td><?= ucwords($row['membership_sex']); ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">School</td>
                                                                        <td><?= ucwords($row['membership_school']); ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">Department</td>
                                                                        <td><?= ucwords($row['membership_department']); ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">Programme</td>
                                                                        <td><?= ucwords($row['membership_programme']); ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">Level</td>
                                                                        <td><?= ucwords($row['membership_level']); ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">Year of Admission</td>
                                                                        <td><?= $row['membership_yoa']; ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">Year of Completion</td>
                                                                        <td><?= $row['membership_yoc']; ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">Name of Hostel</td>
                                                                        <td><?= ucwords($row['membership_name_of_hostel']); ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">Region</td>
                                                                        <td><?= ucwords($row['membership_region']); ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">Constituency</td>
                                                                        <td><?= ucwords($row['membership_constituency']); ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">WhatsApp Contact</td>
                                                                        <td><?= $row['membership_whatsapp_contact']; ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">Telephone Number</td>
                                                                        <td><?= $row['membership_telephone_number']; ?></td>
                                                                    </tr>
                                                                    <tr class="text-white">
                                                                        <td style="color: #A7A7A7; font-weight: 700;">Card Type</td>
                                                                        <td><?= $row['membership_card_type']; ?></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Print</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php $i++; endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="16">No data found!</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
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