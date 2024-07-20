<?php 

// USER SIGNIN

require_once ('../db_connection/conn.php');
include ('inc/header-topnav.inc.php');


?>

    <!-- BREADCRUMB -->
    <nav class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Breadcrumb -->
                    <ol class="breadcrumb mb-0 fs-xs text-gray-400">
                        <li class="breadcrumb-item">
                            <a class="text-gray-400" href="<?= PROOT; ?>store/index">Account</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Verify
                        </li>
                    </ol>

                </div>
            </div>
        </div>
    </nav>
    
        <!-- hero -->
    <section class="pt-7 pb-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <h2>VERY YOUR EMAIL.</h2>
                    <h5>A verification link has been sent to your email account. Please check your <b>spam folder</b> if not found in your <b>inbox</b> to verify your Gary Pie account.</h5>
                </div>
            </div>
        </div>
    </section>


<?php include ('inc/footer.inc.php'); ?>