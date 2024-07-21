<?php 
    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    //
    $total_data = $conn->query("SELECT * FROM gmsa_subscribers WHERE status = 0")->rowCount();

    // DELETE SUBSCRIBER
    if (isset($_GET['remove']) && !empty($_GET['remove'])) {
        $id = sanitize($_GET['remove']);
        $subscriber = find_subscriber_by_id($id);

        if (is_array($subscriber)) {
            // code...
            $query = "
                DELETE FROM gmsa_subscribers 
                WHERE subscriber_id = ?
            ";
            $statement = $conn->prepare($query);
            $result = $statement->execute([$id]);
            if ($result) {
                // code...
                $_SESSION['flash_success'] = 'Subscriber deleted successfully!';
                redirect(PROOT . 'admin/subscribers');
            } else {
                echo js_alert('Something went wrong, please try again!');   
            }
        } else {
            $_SESSION['flash_error'] = 'Subscriber was not found!';
            redirect(PROOT . 'admin/subscribers');
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
                            <h1 class="page-title mr-sm-auto"> Subscribers </h1>
                            <div class="btn-toolbar">
                                <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></button> <a href="<?= PROOT; ?>admin/subscribers" class="btn btn-light"> <span class="ml-1">Refresh</span></a>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <div class="card card-fluid">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?= PROOT; ?>admin/subscribers">All (<?= $total_data; ?>)</a>
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
            url : "<?= PROOT; ?>admin/auth/list.subscribers.php",
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
