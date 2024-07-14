<?php

    // Contact us page

    require_once ("db_connection/conn.php");
    $navTheme = "";
    $TITLE = "Prayer time";
    // $activeNav = "active";
    include ("inc/header.inc.php");
    include ("inc/nav.inc.php");


?>
    <main>

        // get with time zone
          https://timeapi.io/api/Time/current/zone?timeZone=Africa/Accra

        // get with ip
        https://timeapi.io/api/Time/current/ip?ipAddress=237.71.232.203
        
        <section class="pt-20">
            <div class="container mt-10">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                            <time id="clock" class="fw-bolder" style="font-size: 242px; line-height: 99px;"></time>
                    </div>
                </div>
                <div class="d-flex flex-row-reverse mt-5">
                    <div class="p-2" id="today-date" style="font-size: 48px; font-weight: 400;"></div>
                </div>

                <div class="d-flex flex-row-reverse gap-3 mt-3">
                    <div class="card text-end" style="">
                        <div class="card-body bg-light">
                            <h5 class="card-title" style="font-size: xx-large; font-weight: 900">Fajr</h5>
                            <p class="card-text fw-light lh-base lead">12:22 AM.</p>
                        </div>
                    </div>
                    <div class="card text-end" style="">
                        <div class="card-body bg-light">
                            <h5 class="card-title" style="font-size: xx-large; font-weight: 900">Zuhr</h5>
                            <p class="card-text fw-light lh-base lead">43:43 PM.</p>
                        </div>
                    </div>
                    <div class="card text-end" style="">
                        <div class="card-body bg-light">
                            <h5 class="card-title" style="font-size: xx-large; font-weight: 900">Magrib</h5>
                            <p class="card-text fw-light lh-base lead">43:43 PM.</p>
                        </div>
                    </div>
                    <div class="card text-end" style="">
                        <div class="card-body bg-light">
                            <h5 class="card-title" style="font-size: xx-large; font-weight: 900">Isha</h5>
                            <p class="card-text fw-light lh-base lead">43:43 PM.</p>
                        </div>
                    </div>
                    <div class="card text-end" style="">
                        <div class="card-body bg-light">
                            <h5 class="card-title" style="font-size: xx-large; font-weight: 900">Jumm'ah</h5>
                            <p class="card-text fw-light lh-base lead">43:43 PM.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-0">
            <div class="container">
                <!-- Title -->
                <div class="inner-container-small text-center mb-4 mb-sm-6">
                    <h2 class="mb-3">General Time</h2>
                    <p class="mb-0">Our friendly team members are always willing to help you understand your present technology requirements and provide suggestions on your future needs.</p>
                </div>
    
                <div class="row g-4 g-lg-6">
                    <div class="col-lg-9 mx-auto">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="card card-body bg-light d-md-flex justify-content-md-between align-items-md-center flex-md-row p-4 mb-3">
                                <div class="mb-4 mb-md-0">
                                    <div class="badge text-bg-dark mb-3">Jumm'ah</div>
                                    <h5 class="mb-0"><a href="javascript:;" class="stretched-link fw-bolder" style="font-size: xxx-large;">1:10 PM </a></h5>
                                    <div class="hstack gap-3 gap-sm-4 flex-wrap mt-3">
                                        <span><i class="bi bi-geo-alt me-2"></i>Navrongo, Ghana</span>
                                        <span><i class="bi bi-clock me-2"></i>Kasena Nankana</span>
                                        <span><i class="bi bi-table me-2"></i>Every Friday</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-body bg-light d-md-flex justify-content-md-between align-items-md-center flex-md-row p-4 mb-3">
                                <div class="mb-4 mb-md-0">
                                    <div class="badge text-bg-dark mb-3">Ramadan</div>
                                    <h5 class="mb-0"><a href="javascript:;" class="stretched-link fw-bolder" style="font-size: xxx-large;">23rd / 24 April</a></h5>
                                    <div class="hstack gap-3 gap-sm-4 flex-wrap mt-3">
                                        <span><i class="bi bi-geo-alt me-2"></i>Navrongo, Ghana</span>
                                        <span><i class="bi bi-clock me-2"></i>Kasena Nankana</span>
                                        <span><i class="bi bi-table me-2"></i>Every month of Ramadan (April)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-body bg-light d-md-flex justify-content-md-between align-items-md-center flex-md-row p-4 mb-3">
                                <div class="mb-4 mb-md-0">
                                    <div class="badge text-bg-dark mb-3">Taahajud</div>
                                    <h5 class="mb-0"><a href="javascript:;" class="stretched-link fw-bolder" style="font-size: xxx-large;">20th / 21st May</a></h5>
                                    <div class="hstack gap-3 gap-sm-4 flex-wrap mt-3">
                                        <span><i class="bi bi-geo-alt me-2"></i>Navrongo, Ghana</span>
                                        <span><i class="bi bi-clock me-2"></i>Kasena Nankana</span>
                                        <span><i class="bi bi-table me-2"></i>Every month of Ramadan (May)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-body bg-light d-md-flex justify-content-md-between align-items-md-center flex-md-row p-4 mb-3">
                                <div class="mb-4 mb-md-0">
                                    <div class="badge text-bg-dark mb-3">Eid'ul Fitr</div>
                                    <h5 class="mb-0"><a href="javascript:;" class="stretched-link fw-bolder" style="font-size: xxx-large;">30th / 1st June, 8:00 AM</a></h5>
                                    <div class="hstack gap-3 gap-sm-4 flex-wrap mt-3">
                                        <span><i class="bi bi-geo-alt me-2"></i>Navrongo, Ghana</span>
                                        <span><i class="bi bi-clock me-2"></i>Kasena Nankana</span>
                                        <span><i class="bi bi-table me-2"></i>Every month of May</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-body bg-light d-md-flex justify-content-md-between align-items-md-center flex-md-row p-4 mb-3">
                                <div class="mb-4 mb-md-0">
                                    <div class="badge text-bg-dark mb-3">Eid'ul Adhar</div>
                                    <h5 class="mb-0"><a href="javascript:;" class="stretched-link fw-bolder" style="font-size: xxx-large;">30th / 1st July, 8:00 AM</a></h5>
                                    <div class="hstack gap-3 gap-sm-4 flex-wrap mt-3">
                                        <span><i class="bi bi-geo-alt me-2"></i>Navrongo, Ghana</span>
                                        <span><i class="bi bi-clock me-2"></i>Kasena Nankana</span>
                                        <span><i class="bi bi-table me-2"></i>Every month of July</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

  <?php include ("inc/footer.inc.php"); ?>

    <script type="text/javascript">
        $(document).ready(function() {

            // timer
            timer()
            function timer() {
                $.ajax({
                    "url": "<?= PROOT; ?>auth/gettime.php",
                    "method": "POST",
                    success: function(data) {
                        const obj = JSON.parse(data);
                        $('#clock').text(obj.time + ':' + obj.seconds);
                        $('#today-date').text(obj.dayOfWeek + ', ' + obj.date);
                        console.log();
                    }
                });
            }

            //
            setInterval(function() {
                timer();
            }, 1000);
            
        });
    </script>