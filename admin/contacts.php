<?php 
    require_once ("../db_connection/conn.php");
    // if (!admin_is_logged_in()) {
    //     admn_login_redirect();
    // }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    // DELETE A MEMBER PERMANENTLY
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

?> 
    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Contacts </h1>
                            <div class="btn-toolbar">
                                <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></button> <button type="button" class="btn btn-light"> <span class="ml-1">Refresh</span></button>
                            </div>
                        </div>
                    </header>
                    <div><?= $flash; ?></div>
                    <div class="page-section">
                        <div class="card card-fluid">
                            <div id="load-content"></div>                                    
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