<?php 
    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }

    // check for permissions
    if (!admin_has_permission()) {
        admin_permission_redirect('index');
    }

    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    $total_data = $conn->query("SELECT * FROM gmsa_logs WHERE status = 0")->rowCount();


?> 
    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <?= $flash; ?>
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Logs </h1>
                            <div class="btn-toolbar">
                                <a href="<?= PROOT . 'admin/export/logs.export'; ?>" class="btn btn-light"><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></a> <a href="<?= PROOT . 'admin/logs'; ?>" class="btn btn-light"> <span class="ml-1">Refresh</span></a>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <div class="card card-fluid">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?php echo PROOT; ?>admin/logs">All (<?= $total_data; ?>)</a>
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
            url : "<?= PROOT; ?>admin/auth/list.logs.php",
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