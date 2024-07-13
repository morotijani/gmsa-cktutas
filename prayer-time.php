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
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: xx-large; font-weight: 900">Fajr</h5>
                            <p class="card-text fw-light lh-base lead">12:22 AM.</p>
                        </div>
                    </div>
                    <div class="card text-end" style="">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: xx-large; font-weight: 900">Zuhr</h5>
                            <p class="card-text fw-light lh-base lead">43:43 PM.</p>
                        </div>
                    </div>
                    <div class="card text-end" style="">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: xx-large; font-weight: 900">Magrib</h5>
                            <p class="card-text fw-light lh-base lead">43:43 PM.</p>
                        </div>
                    </div>
                    <div class="card text-end" style="">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: xx-large; font-weight: 900">Isha</h5>
                            <p class="card-text fw-light lh-base lead">43:43 PM.</p>
                        </div>
                    </div>
                    <div class="card text-end" style="">
                        <div class="card-body">
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
                                    <div class="badge text-bg-dark mb-3">Information Technology</div>
                                    <h5 class="mb-0"><a href="career-single.html" class="stretched-link">UI/UX and Product Designer</a></h5>
                                    <div class="hstack gap-3 gap-sm-4 flex-wrap mt-3">
                                        <span><i class="bi bi-geo-alt me-2"></i>USA, ontario</span>
                                        <span><i class="bi bi-clock me-2"></i>San Francisco</span>
                                        <span><i class="bi bi-briefcase me-2"></i>$32,000</span>
                                    </div>
                                </div>
                                <div><a href="#" class="btn btn-primary mb-0">Apply now<i class="bi bi-arrow-right ms-2"></i></a></div>
                            </div>

                            <div class="card card-body bg-light d-md-flex justify-content-md-between align-items-md-center flex-md-row p-4 mb-3">
                                <div class="mb-4 mb-md-0">
                                    <div class="badge text-bg-dark mb-3">Business</div>
                                    <h5 class="mb-0"><a href="career-single.html" class="stretched-link">General Office Manager</a></h5>
        
                                    <div class="hstack gap-3 gap-sm-4 flex-wrap mt-3">
                                        <span><i class="bi bi-geo-alt me-2"></i>USA, New York</span>
                                        <span><i class="bi bi-clock me-2"></i>Full time</span>
                                        <span><i class="bi bi-briefcase me-2"></i>$41,000</span>
                                    </div>
                                </div>
                                <div><a href="#" class="btn btn-primary mb-0">Apply now<i class="bi bi-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-dark position-relative overflow-hidden pt-6" data-bs-theme="dark">

        <div class="container position-relative mt-5">
            <!-- Widgets -->
            <div class="row g-4">
                <!-- Widget 1 START -->
                <div class="col-xl-3 text-lg-center text-xl-start mb-4 mb-xl-0">
                    <!-- logo -->
                    <a href="index.html">
                        <img class="light-mode-item h-40px" src="assets/images/logo.svg" alt="logo">
                        <img class="dark-mode-item h-40px" src="assets/images/logo-light.svg" alt="logo">
                    </a>
                </div>
                <!-- Widget 1 END -->

                <!-- Widget START -->
                <div class="col-6 col-md-4 col-lg-5 col-xl-4">
                    <h6 class="mb-2 mb-md-4">Quick links</h6>
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <ul class="nav flex-column">
                                <li class="nav-item"><a class="nav-link pt-0" href="about-v1.html">About us</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact-v1.html">Contact us</a></li>
                                <li class="nav-item"><a class="nav-link" href="services-v1.html">Services</a></li>
                                <li class="nav-item"><a class="nav-link" href="career.html">Career <span class="badge text-bg-danger ms-2">2 Job</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="career-single.html">Career detail</a></li>
                                <li class="nav-item"><a class="nav-link" href="portfolio-showcase.html">Case studies</a></li>
                                <li class="nav-item"><a class="nav-link" href="portfolio-showcase.html">Team</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav flex-column">
                                <li class="nav-item"><a class="nav-link" href="contact-v1.html">Become a partner</a></li>
                                <li class="nav-item"><a class="nav-link" href="customer-stories.html">Customer stories</a></li>
                                <li class="nav-item"><a class="nav-link" href="sign-in.html">Sign in</a></li>
                                <li class="nav-item"><a class="nav-link" href="sign-up.html">Sign up</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Widget END -->

                <!-- Widget START -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <h6 class="mb-2 mb-md-4">Resources</h6>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="#">Privacy Policy</a></li>
                        <li class="nav-item"><a class="nav-link pt-0" href="#">Legal</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Supports <i class="bi bi-box-arrow-up-right small ms-1"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.html">Faqs</a></li>
                        <li class="nav-item"><a class="nav-link" href="blog-grid.html">News and blogs</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Terms &amp; condition</a></li>
                    </ul>
                </div>
                <!-- Widget END -->

                <!-- Widget START -->
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <h6 class="mb-2 mb-md-4">Community</h6>
                    <!-- Document -->
                    <div class="position-relative d-flex align-items-center py-2 my-2">
                        <div class="icon-lg bg-warning rounded-circle flex-shrink-0">
                            <i class="bi bi-file-earmark-text-fill heading-color"></i>
                        </div>
                        <div class="nav flex-column ps-3">
                            <h6 class="mb-2"><a href="#" class=" stretched-link p-0">Documentation</a></h6>
                            <div class="small text-body-secondary">API, knowledge base, tutorials</div>
                        </div>
                    </div>

                    <!-- Snippets -->
                    <div class="position-relative d-flex align-items-center py-2 my-2">
                        <div class="icon-lg bg-success rounded-circle flex-shrink-0">
                            <i class="bi bi-stickies-fill heading-color"></i>
                        </div>
                        <div class="nav flex-column ps-3">
                            <h6 class="mb-2"><a href="#" class=" stretched-link p-0">Snippets</a></h6>
                            <div class="small text-body-secondary">API, knowledge base, tutorials</div>
                        </div>
                    </div>

                    <!-- Snippets -->
                    <div class="position-relative d-flex align-items-center py-2 my-2">
                        <div class="icon-lg bg-info rounded-circle flex-shrink-0">
                            <i class="bi bi-puzzle-fill heading-color"></i>
                        </div>
                        <div class="nav flex-column ps-3">
                            <h6 class="mb-2"><a href="#" class="stretched-link p-0">Components</a></h6>
                            <div class="small text-body-secondary">API, knowledge base, tutorials</div>
                        </div>
                    </div>
                </div>
                <!-- Widget END -->
            </div>

            <!-- Divider -->
            <hr class="opacity-1 my-5 my-sm-6">

            <!-- Contact detail -->
            <div class="row g-4 align-items-center">
                <!-- Title -->
                <div class="col-xl-3 text-lg-center text-xl-start mb-4 mb-xl-0">
                    <h5 class="mb-1">Get in touch with us</h5>
                    <p class="mb-0">We look forward to hearing from you!</p>
                </div>

                <!-- Mobile number -->
                <div class="col-sm-6 col-md-4 col-xl-3 d-flex justify-content-md-center">
                    <div class="position-relative d-flex align-items-center">
                        <div class="icon-lg bg-body rounded-circle flex-shrink-0">
                            <i class="bi bi-telephone heading-color"></i>
                        </div>
                        <div class="nav flex-column ps-3">
                            <div class="small text-body-secondary">Give us a call</div>
                            <p class="fw-semibold mt-1 mb-0"><a href="#" class="heading-color text-primary-hover stretched-link p-0">469-537-2410</a></p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-sm-6 col-md-4 col-xl-3 d-flex justify-content-md-center">
                    <div class="position-relative d-flex align-items-center">
                        <div class="icon-lg bg-body rounded-circle flex-shrink-0">
                            <i class="bi bi-envelope heading-color"></i>
                        </div>
                        <div class="nav flex-column ps-3">
                            <div class="small text-body-secondary">Send us an email</div>
                            <p class="fw-semibold mt-1 mb-0"><a href="#" class="heading-color text-primary-hover stretched-link p-0">example@gmail.com</a></p>
                        </div>
                    </div>
                </div>

                <!-- Address -->
                <div class="col-sm-6 col-md-4 col-xl-3 d-flex justify-content-md-center">
                    <div class="position-relative d-flex align-items-center">
                        <div class="icon-lg bg-body rounded-circle flex-shrink-0">
                            <i class="bi bi-geo-alt heading-color"></i>
                        </div>
                        <div class="nav flex-column ps-3">
                            <div class="small text-body-secondary">Visit us in</div>
                            <p class="fw-semibold heading-color mt-1 mb-0">55/123 Norman street, Banking road</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr class="opacity-1 mt-6 mb-0">

            <!-- Bottom footer -->
            <div class="d-md-flex justify-content-between align-items-center text-center text-lg-start py-4">
                <!-- copyright text -->
                <div class="text-body mb-3 mb-md-0"> Copyrights ©2024 Mizzle. Build by <a href="https://www.webestica.com/" class="text-body text-primary-hover">Webestica</a>. </div>

                <!-- Social links -->
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"> <a class="btn btn-xs btn-icon btn-light" href="#"><i class="fab fa-fw fa-facebook-f lh-base"></i></a> </li>
                    <li class="list-inline-item"> <a class="btn btn-xs btn-icon btn-light" href="#"><i class="fab fa-fw fa-instagram lh-base"></i></a> </li>
                    <li class="list-inline-item"> <a class="btn btn-xs btn-icon btn-light" href="#"><i class="fab fa-fw fa-twitter lh-base"></i></a> </li>
                    <li class="list-inline-item"> <a class="btn btn-xs btn-icon btn-light" href="#"><i class="fab fa-fw fa-linkedin-in lh-base"></i></a> </li>
                    <li class="list-inline-item"> <a class="btn btn-xs btn-icon btn-light" href="#"><i class="fab fa-fw fa-youtube lh-base"></i></a> </li>
                </ul>
            </div>
            
        </div>
    </footer>

    <div class="back-top"></div>

    <script type="text/javascript" src="<?= PROOT; ?>dist/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/bootstrap.min.js"></script>



    <script src="<?= PROOT; ?>dist/js/purecounter_vanilla.js"></script>
    <script src="<?= PROOT; ?>dist/js/swiper-bundle.min.js"></script>
    <script src="<?= PROOT; ?>dist/js/jarallax.min.js"></script>
    <script src="<?= PROOT; ?>dist/js/jarallax-video.min.js"></script>

    <script src="<?= PROOT; ?>dist/js/mainfunctions.js"></script>

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

</body>
</html>