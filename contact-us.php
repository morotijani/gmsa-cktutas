<?php

    // Contact us page

    require_once ("db_connection/conn.php");
    $navTheme = "";
    include ("inc/header.inc.php");


?>


        <section class="pt-xl-8">
            <div class="container">
                <div class="row g-4 g-xxl-5">
                    <div class="col-xl-9 mx-auto">
                        <!-- Image -->
                        <img src="<?= PROOT; ?>assets/media/02.jpg" class="rounded" alt="contact-bg">

                        <!-- Contact form START -->
                        <div class="row mt-n5 mt-sm-n7 mt-md-n8">
                            <div class="col-11 col-lg-9 mx-auto">
                                <div class="card shadow p-4 p-sm-5 p-md-6">
                                    <!-- Card header -->
                                    <div class="card-header border-bottom px-0 pt-0 pb-5">
                                        <!-- Breadcrumb -->
                                        <nav class="mb-3" aria-label="breadcrumb">
                                            <ol class="breadcrumb breadcrumb-dots pt-0">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                                            </ol>
                                        </nav>
                                        <!-- Title -->
                                        <h1 class="mb-3 h3">Let's level up your brand, together</h1>
                                        <p class="mb-0">You can reach us anytime via <a href="#">example@gmail.com</a></p>
                                    </div>
                                    <!-- Card body & form -->
                                    <form class="card-body px-0 pb-0 pt-5">
                                        <!-- Name -->
                                        <div class="input-floating-label form-floating mb-4">
                                            <input type="text" class="form-control bg-transparent" id="floatingName" placeholder="Password">
                                            <label for="floatingName">Your name</label>
                                        </div>
                                        <!-- Email -->
                                        <div class="input-floating-label form-floating mb-4">
                                            <input type="email" class="form-control bg-transparent" id="floatingInput" placeholder="name@example.com">
                                            <label for="floatingInput">Email address</label>
                                        </div>
                                        <!-- Number -->
                                        <div class="input-floating-label form-floating mb-4">
                                            <input type="text" class="form-control bg-transparent" id="floatingNumber" placeholder="Password">
                                            <label for="floatingNumber">Phone number</label>
                                        </div>
                                        <!-- Message -->
                                        <div class="input-floating-label form-floating mb-4">
                                            <textarea class="form-control bg-transparent" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Message</label>
                                        </div>
                                        <!-- Button -->
                                        <button class="btn btn-lg btn-primary mb-0">Send a message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Contact form END -->
                    </div>
                </div> <!-- Row END -->
            </div>
        </section>

        <Section class="py-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-3 g-4">
                    <div class="col">
                        <div class="card card-body bg-light border p-sm-5">
                            <div class="mb-4"><i class="bi bi-geo-alt fa-xl text-primary"></i></div>
                            <h6 class="mb-4">Office Address</h6>
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar avatar-xxs me-2">
                                    <img class="avatar-img rounded-circle" src="<?= PROOT; ?>assets/media/ghana.png" alt="avatar">
                                </div>
                                <span class="heading-color fw-semibold mb-0">CKT-UTAS office:</span>
                            </div>
                            <address class="mb-0">1421 Coburn Hollow Road Metamora, Near Center Point, IL .</address>
                        </div>
                    </div>

                    <!-- Email info -->
                    <div class="col">
                        <div class="card card-body bg-light border p-sm-5">
                            <!-- Icon -->
                            <div class="mb-4"><i class="bi bi-envelope fa-xl text-primary"></i></div>
                            <!-- Title -->
                            <h6 class="mb-3">Email us</h6>
                            <p>We're on top of things and aim to respond to all inquiries within 24 hours.</p>
                            <a href="#" class="heading-color text-primary-hover text-decoration-underline mb-0">contact@gmsacktutas.org</a>
                        </div>
                    </div>

                    <!-- Contact info -->
                    <div class="col">
                        <div class="card card-body bg-light border p-sm-5">
                            <!-- Icon -->
                            <div class="mb-4"><i class="bi bi-telephone fa-xl text-primary"></i></div>
                            <!-- Title -->
                            <h6 class="mb-3">Call us</h6>
                            <p>Let's work together towards a common goal - get in touch!</p>
                            <a href="#" class="heading-color text-primary-hover text-decoration-underline mb-0">(233) 241 72 7274</a>
                        </div>
                    </div>

                </div> <!-- Row END -->
            </div>

            <!-- Map -->
            <iframe class="w-100 h-200px h-lg-400px grayscale d-block mt-8" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d221.61455527218982!2d-1.0799117690523523!3d10.866837179901394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2b5ba167c3ecf1%3A0x54af29111cb78a8b!2sCKt-UTAS%20Campus%20Mosque!5e1!3m2!1sen!2sgh!4v1720855199185!5m2!1sen!2sgh" style="margin-bottom: -5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" aria-hidden="false" tabindex="0"></iframe>

        </Section>

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

    <!-- <script type="text/javascript" src="<?= PROOT; ?>dist/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/bootstrap.min.js"></script> -->

    <script src="<?= PROOT; ?>dist/js/bootstrap.bundle.min.js"></script>


    <script src="<?= PROOT; ?>dist/js/purecounter_vanilla.js"></script>
    <script src="<?= PROOT; ?>dist/js/swiper-bundle.min.js"></script>
    <script src="<?= PROOT; ?>dist/js/jarallax.min.js"></script>
    <script src="<?= PROOT; ?>dist/js/jarallax-video.min.js"></script>

    <script src="<?= PROOT; ?>dist/js/mainfunctions.js"></script>

</body>
</html>