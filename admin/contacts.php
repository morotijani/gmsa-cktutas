<?php 
    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    // DELETE CONTACTS
    if (isset($_GET['remove']) && !empty($_GET['remove'])) {
        $id = sanitize($_GET['remove']);
        $contact = find_contact_by_id($id);

        if (is_array($contact)) {
            // code...
            $query = "
                DELETE FROM gmsa_contacts 
                WHERE message_id = ?
            ";
            $statement = $conn->prepare($query);
            $result = $statement->execute([$id]);
            if ($result) {
                // code...
                $_SESSION['flash_success'] = 'Contact deleted successfully!';
                redirect(PROOT . 'admin/contacts');
            } else {
                echo js_alert('Something went wrong, please try again!');   
            }
        } else {
            $_SESSION['flash_error'] = 'Contact was not found!';
            redirect(PROOT . 'admin/contacts');
        }
    }

    if (isset($_GET['update-contact']) && !empty($_GET['update-contact'])) {
        $errors = '';
        $post = cleanPost($_POST);
        $country = ((isset($_POST['country']))? $post["country"] : $site_row["about_country"]);
        $state = ((isset($_POST['state']))? $post["state"] : $site_row["about_state"]);
        $city = ((isset($_POST['city']))? $post["city"] : $site_row["about_city"]);
        $email = ((isset($_POST['email']))? $post["email"] : $site_row["about_email"]);
        $phone_1 = ((isset($_POST['phone_1']))? $post["phone_1"] : $site_row["about_phone"]);
        $phone_2 = ((isset($_POST['phone_2']))? $post["phone_2"] : $site_row["about_phone2"]);
        $fax = ((isset($_POST['fax']))? $post["fax"] : $site_row["about_fax"]);
        $street_1 = ((isset($_POST['street_1']))? $post["street_1"] : $site_row["about_street1"]);
        $street_2 = ((isset($_POST['street_2']))? $post["street_2"] : $site_row["about_street2"]);
       
        if ($_POST) {
            $post = array(
                'country'           => 'Country',
                'state'             => 'State',
                'city'              => 'City',
                'email'             => 'Email',
                'phone_1'           => 'Phone_1',
                'fax'               => 'Fax',
                'street_1'          => 'Street_1',
            );
            foreach ($post as $k => $v) {
                if (empty($_POST[$k])) {
                    $errors = '<span class="bg-info">'.$v.'</span> is required.';
                } else {
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $errors = 'Please enter a valid email address.';
                    }
                }
            }

            if (empty($errors)) {
                $data = array(
                    ':about_street1'            => sanitize($_POST["street_1"]),
                    ':about_street2'            => sanitize($_POST["street_2"]),
                    ':about_country'            => sanitize($_POST["country"]),
                    ':about_state'              => sanitize($_POST["state"]),
                    ':about_city'               => sanitize($_POST["city"]),
                    ':about_phone'              => sanitize($_POST["phone_1"]),
                    ':about_email'              => sanitize($_POST["email"]),
                    ':about_phone2'             => sanitize($_POST["phone_2"]),
                    ':about_fax'                => sanitize($_POST["fax"]),
                );

                $sql = "
                    UPDATE gmsa_about 
                    SET about_street1 = :about_street1, about_street2 = :about_street2, about_country = :about_country, about_state = :about_state, about_city = :about_city, about_phone = :about_phone, about_email = :about_email, about_phone2 = :about_phone2, about_fax = :about_fax
                ";
                $statement = $conn->prepare($sql);
                $result = $statement->execute($data);
                if (isset($result)) {
                    $_SESSION['flash_success'] = 'Contact page successfully updated!';
                    redirect(PROOT . 'admin/contacts?update-contact=1');
                }
            }
        }

    }

    $total_data = $conn->query("SELECT * FROM gmsa_contacts WHERE status = 0")->rowCount();

?> 
    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <?= $flash; ?>
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Contacts </h1>
                            <div class="btn-toolbar">
                                <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></button> <a href="<?= PROOT . 'admin/contacts' . ((isset($_GET['update-contact']) && !empty($_GET['update-contact'])) ? '' : '?update-contact=1'); ?>" class="btn btn-light"> <span class="ml-1"><?= ((isset($_GET['update-contact']) && !empty($_GET['update-contact'])) ? '' : 'Update'); ?> Contact</span></a>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <?php if (isset($_GET['update-contact']) && !empty($_GET['update-contact'])): ?>
                            <div class="card card-body">
                                <form method="POST" action="contacts.php?update-contact=1" id="updateForm">
                                    <p class="bg-danger text-white text-center"><?= $errors; ?></p>
                                    <fieldset>
                                        <legend>Update site contact details</legend>
                                        <div class="row">
                                            <div class="col-md-4 mb-2">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" name="country" id="country" class="form-control" value="<?= $country; ?>">
                                                        <label for="country">Country</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" name="state" id="state" class="form-control" value="<?= $state; ?>">
                                                        <label for="state">State</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                    <input type="text" name="city" id="city" class="form-control" value="<?= $city; ?>">
                                                    <label for="city">City</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <input type="email" name="email" id="email" class="form-control" value="<?= $email; ?>">
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <input type="text" name="phone_1" id="phone_1" class="form-control" value="<?= $phone_1; ?>">
                                                    <label for="phone_1">Phone 1</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <input type="text" name="phone_2" id="phone_2" class="form-control" value="<?= $phone_2; ?>">
                                                    <label for="phone_2">Phone 2 (Optional)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <input type="text" name="fax" id="fax" class="form-control" value="<?= $fax; ?>">
                                                    <label for="fax">Fax</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <input type="text" name="street_1" id="street_1" class="form-control" value="<?= $street_1; ?>">
                                                    <label for="street_1">Address 1 (Street)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <input type="text" name="street_2" id="street_2" class="form-control" value="<?= $street_2; ?>">
                                                    <label for="street_2">Address 2 (Optional)</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="update_contact" id="update_contact" class="btn btn-dark">Update</button>
                                    </div>
                                    <p class="my-1">visit <a href="<?= PROOT; ?>contact-us" target="blank">contact us</a> page to see changer</p>
                                </form>
                            </div>
                        <?php else: ?>
                            <div class="card card-fluid">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= PROOT; ?>admin/contacts">All (<?= $total_data; ?>)</a>
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
                            </div>
                        <?php endif; ?>
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
            url : "<?= PROOT; ?>admin/auth/list.contacts.php",
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