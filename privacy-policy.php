<?php

    // Privacy policy page

    require_once ("db_connection/conn.php");
    $TITLE = "Privacy Policy";
    $navTheme = "";
    include ("inc/header.inc.php");
    include ("inc/nav.inc.php");


?>
    <main>
        <section class="pt-lg-8 pt-xl-9">
            <div class="container pt-4 pt-lg-0">
                <div class="row">
                    <div class="col-xl-8 mx-auto">
                        <!-- Main title -->
                        <div class="text-center mb-6">
                            <h1>Privacy Policy</h1>
                            <p class="lead mb-0">Last update on Dec 2023</p>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-0">
            <div class="container">
                <div class="bg-dark rounded p-4 p-sm-6" data-bs-theme="dark">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2>Pay your GMSA yearly dues.</h2>
                            <p class="mb-0">Dues payment made easily! Kindly pay your GMSA dues at the comfort of your home. Remember to register before proceeding with payment.</p>
                        </div>

                        <div class="col-md-6 text-end">
                            <a href="<?= PROOT; ?>auth/pay-dues" class="btn btn-lg btn-primary mb-0">Pay dues</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       
    </main>
<?php include ("inc/footer.inc.php"); ?>
