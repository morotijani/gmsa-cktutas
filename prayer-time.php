<?php

    // Prayer time page

    require_once ("db_connection/conn.php");
    $navTheme = "";
    $TITLE = "Prayer time";
    include ("inc/header.inc.php");
    include ("inc/nav.inc.php");

    $prayers = get_prayer_time($conn);

?>
    <main>
        
        <section class="pt-20">
            <div class="container mt-10">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                        <a href="https://time.is/Accra" id="time_is_link"></a>
                        <h1 id="Accra_z001" class="fw-bolder display-5 text-center" style="font-size: calc(2.525rem + 4.3vw);"></h1>
                    </div>
                </div>
                <div class="hstack gap-3 flex-wrap align-items-center justify-content-center mt-4">
                    <h6 class="mb-0 small">Today date:</h6>
                    <a href="javascript:;" class=" mb-0">
                        <h5 style="font-weight: 900;" id="today-date"><?= date('jS F, Y'); ?></h5>
                    </a>
                </div>
            </div>
        </section>

        <section class="pt-0">
            <div class="container">
    
                <div class="row g-4 g-lg-6">
                    <div class="col-lg-9 mx-auto">
                        <div class="tab-content" id="pills-tabContent">
                            <?php if (is_array($prayers)): ?>
                                <?php foreach ($prayers as $prayer): ?>
                                    <div class="card card-body bg-light d-md-flex justify-content-md-between align-items-md-center flex-md-row p-4 mb-3">
                                        <div class="mb-4 mb-md-0">
                                            <div class="badge text-bg-dark mb-3"><?= strtoupper($prayer['prayer_name']); ?></div>
                                            <h5 class="mb-0"><a href="javascript:;" class="stretched-link fw-bolder" style="font-size: xxx-large;"><?= $prayer['prayer_time']; ?> </a></h5>
                                            <div class="hstack gap-3 gap-sm-4 flex-wrap mt-3">
                                                <span><i class="bi bi-geo-alt me-2"></i>Navrongo, Ghana</span>
                                                <span><i class="bi bi-clock me-2"></i>Kasena Nankana</span>
                                                <span><i class="bi bi-table me-2"></i>Last update: <?= pretty_date_notime($prayer['updatedAt']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include ("inc/footer.inc.php"); ?>
    <script src="//widget.time.is/en.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            time_is_widget.init({
                Accra_z001:{
                    template:"TIME", 
                    // date_format:"dayname, monthname dnum, year",
                }
            });


            // timer
            // timer()
            // function timer() {
            //     $.ajax({
            //         "url": "<?= PROOT; ?>auth/gettime.php",
            //         "method": "POST",
            //         success: function(data) {
            //             const obj = JSON.parse(data);
            //             $('#clock').text(obj.time + ':' + obj.seconds);
            //             $('#today-date').text(obj.dayOfWeek + ', ' + obj.date);
            //             console.log();
            //         }
            //     });
            // }

            // //
            // setInterval(function() {
            //     timer();
            // }, 1000);
            
        });
    </script>