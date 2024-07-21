<?php 
    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    $total_data = $conn->query("SELECT * FROM gmsa_dues WHERE status = 0")->rowCount();

    $fresher = ((isset($_POST['fresher']) && !empty($_POST['fresher'])) ? sanitize($_POST['fresher']) : $site_row['dues_for_fresher']);
    $continuing = ((isset($_POST['continuing']) && !empty($_POST['continuing'])) ? sanitize($_POST['continuing']) : $site_row['dues_for_continue']);
    if (isset($_POST['submit'])) {
        if (!empty($fresher) || $fresher != '' && $fresher > 0) {
            if (!empty($continuing) || $continuing != '' && $continuing > 0) {
                //dnd($_POST);
                $sql = "
                    UPDATE `gmsa_about` 
                    SET `dues_for_fresher` = ?, `dues_for_continue` = ? 
                    WHERE 1
                ";
                $statement = $conn->prepare($sql);
                $result = $statement->execute([$fresher, $continuing]);
                if ($result) {
                    $_SESSION['flash_success'] = 'Dues payment amount updated successfully!';
                    redirect(PROOT . 'admin/dues');
                } else {
                    $_SESSION['flash_error'] = 'Something went wrong, please try again!';
                    redirect(PROOT . 'admin/dues');
                }
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
                            <h1 class="page-title mr-sm-auto"> Dues </h1>
                            <div class="btn-toolbar">
                                <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></button> <a href="<?= PROOT . 'admin/dues?update=1'; ?>" class="btn btn-light"> <span class="ml-1">Update dues amount</span></a>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <?php if (isset($_GET['update']) && !empty($_GET['update'])): ?>
                           <div class="card">
                                <div class="card-body">
                                    <form method="POST">
                                        <fieldset>
                                            <legend>Update dues payment amounts</legend>
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <input type="tel" class="form-control" id="fresher" name="fresher" placeholder="0.00" required="" value="<?= $fresher; ?>"> <label for="fresher">Fresher</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <input type="tel" class="form-control" id="continuing" name="continuing" placeholder="0.00" required="" value="<?= $continuing; ?>"> <label for="continuing">Continuing</label>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button class="btn btn-success" type="submit" name="submit">Update amounts</button>
                                                <a class="btn" href="<?= PROOT; ?>admin/dues">Cancel update</a>
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
                                        <a class="nav-link active" href="<?php echo PROOT; ?>admin/dues">All (<?= $total_data; ?>)</a>
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
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>
<?php include ("includes/footer.php"); ?>
<script type="text/javascript">
     // SEARCH AND PAGINATION FOR LIST
    function load_data(page, query = '') {
        $.ajax({
            url : "<?= PROOT; ?>admin/auth/list.dues.php",
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