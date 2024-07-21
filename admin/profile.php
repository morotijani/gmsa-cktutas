<?php 
    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");



?> 
    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <?= $flash; ?>
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Profile </h1>
                            <div class="btn-toolbar">
                                <a href="<?= PROOT . 'admin/settings'; ?>" class="btn btn-light"> <span class="ml-1">Update</span></a>&nbsp;
                                <a href="<?= PROOT . 'admin/profile'; ?>" class="btn btn-light"> <span class="ml-1">Refresh</span></a>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <ul class="list-group p-4">
                                    <?= get_admin_profile($admin_data['admin_id']); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php include ("includes/footer.php"); ?>