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
                <?= $flash; ?>
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Members Table </h1>
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
                    <div class="page-section">
                        <div class="card card-fluid">
                            <?php if (isset($_GET['edit']) && !empty($_GET['edit'])): ?>
                            
                            <?php else: ?>
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
                            <?php endif ?>
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