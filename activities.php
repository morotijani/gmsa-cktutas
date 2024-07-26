<?php

    // Activities page

    require_once ("db_connection/conn.php");
    $TITLE = "Activities";
    $navTheme = "";
    include ("inc/header.inc.php");
    include ("inc/nav.inc.php");

    // get activities
    $rows = fetch_activities($conn, '');


?>
    <main>
        <section class="pt-lg-8">
            <div class="container pt-4 pt-lg-0">
                <div class="row align-items-center mb-7">
                    <div class="col-xl-6">
                        <div class="d-flex position-relative z-index-9">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dots mb-1">
                                    <li class="breadcrumb-item"><a href="<?= PROOT; ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Activities</li>
                                </ol>
                            </nav>
                        </div>
                        <h1 class="display-5">Highlights of activities</h1>
                    </div>
                    <div class="col-xl-5 ms-auto">
                        <p class="mb-4">Stay upated with all our upcoming events on campus and all other GMSA activities.</p>
                        <div class="text-center d-inline-block bg-light border rounded px-5 py-3">
                            <span class="heading-color">Have any queries for us?</span> <a class="ms-2" href="<?= PROOT; ?>contact-us">Contact us now <span class="bi-chevron-right small ms-1"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-0">
            <div class="container">
                <div class="row g-4 g-lg-6">
                    <div class="col-lg-9 mx-auto">
                        <div class="tab-content" id="pills-tabContent">
                            <?php if (is_array($rows) > 0): ?>
                                <?php foreach ($rows as $row): ?>
                                    <div class="card card-body bg-light d-md-flex justify-content-md-between align-items-md-center flex-md-row p-4 mb-3">
                                        <div class="mb-4 mb-md-0">
                                            <div class="badge text-bg-dark mb-3">GMSA</div>
                                            <h5 class="mb-0"><a href="javascript:;" class="stretched-link fw-bolder" style="font-size: xxx-large;"><?= ucwords($row['activity']); ?> </a></h5>
                                            <p><?= nl2br($row['activity_details']); ?></p>
                                            <div class="hstack gap-3 gap-sm-4 flex-wrap mt-3">
                                                <span><i class="bi bi-geo-alt me-2"></i><?= ucwords($row['activity_venue']); ?></span>
                                                <span><i class="bi bi-clock me-2"></i><?= $row["activity_time"]; ?></span>
                                                <span><i class="bi bi-table me-2"></i><?= $row["activity_date"]; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            <?php else: ?>
                                <div class="card card-body bg-light d-md-flex justify-content-md-between align-items-md-center flex-md-row p-4 mb-3">
                                    <div class="alert alert-info">
                                        No activies available
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>  
            </div>
        </section>
    </main>
<?php include ("inc/footer.inc.php"); ?>