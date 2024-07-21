<?php

    // Contact us page

    require_once ("db_connection/conn.php");
    $TITLE = "About us";
    $navTheme = "";
    include ("inc/header.inc.php");
    include ("inc/nav.inc.php");


?>
    <main>
        <section class="pt-8 pt-xl-9">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 text-center mx-auto">
                        <span class="font-heading heading-color d-inline-block bg-light px-3 py-2 rounded-3 mb-4">🕌 GMSA</span>
                        <h1 class="mb-4">We are Ghana Muslim Student Association, CKT-UTAS</h1>
                        <p class="lead mb-0"><?= nl2br($site_row['about_info']); ?></p>

                    </div>
                </div>
            </div>
        </section>

       
    </main>
<?php include ("inc/footer.inc.php"); ?>
