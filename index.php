<?php

    require_once ("db_connection/conn.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Welcome - GMSA CKTUTAS</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Technology and Corporate Bootstrap Theme">

    <!-- Dark mode -->
    <script src="<?= PROOT; ?>dist/js/dark-mode.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= PROOT; ?>assets/media/logo/logo-1.jpeg">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/swiper-bundle.min.css">
    
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/gmsa.css">
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/main.css">

</head>
<body>

    <!-- Header START -->
    <header class="header-sticky header-absolute" data-bs-theme="dark">
        <!-- Logo Nav START -->
        <nav class="navbar navbar-expand-xl px-lg-5">
            <div class="container-fluid">
                <a class="navbar-brand me-5" href="index.html">
                    <img class="light-mode-item navbar-brand-item" src="<?= PROOT; ?>assets/media/logo/logo.png" alt="logo">
                    <img class="dark-mode-item navbar-brand-item" src="<?= PROOT; ?>assets/media/logo/logo-1.jpeg" alt="logo">
                </a>
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="navbar-nav navbar-nav-scroll dropdown-hover mx-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Demos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">Pages</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Portfolio</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="contact-v1.html">Contact us</a> </li>
                    </ul>
                </div>

                <!-- Buttons -->
                <ul class="nav align-items-center dropdown-hover ms-sm-2">
                    <li class="nav-item dropdown dropdown-animation">
                        <button class="btn btn-link mb-0 px-2 lh-1" id="bd-theme"
                        type="button"
                        aria-expanded="false"
                        data-bs-toggle="dropdown"
                        data-bs-display="static">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"  class="bi bi-circle-half theme-icon-active fill-mode fa-fw" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
                            <use href="#"></use>
                        </svg>
                        </button>

                        <ul class="dropdown-menu min-w-auto dropdown-menu-end" aria-labelledby="bd-theme">
                            <li class="mb-1">
                                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
                                    <svg width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                        <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                                        <use href="#"></use>
                                    </svg>Light
                                </button>
                            </li>
                            <li class="mb-1">
                                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
                                        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
                                        <use href="#"></use>
                                    </svg>Dark
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
                                        <use href="#"></use>
                                    </svg>Auto
                                </button>
                            </li>
                        </ul>
                    </li>

                    <li class="nav nav-item dropdown nav-search px-1 px-lg-3">
                        <a class="btn btn-light border btn-round mb-0" role="button" href="#" id="navSearch" data-bs-toggle="dropdown" aria-expanded="true" data-bs-auto-close="outside" data-bs-display="static">
                            <i class="bi bi-search"> </i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow rounded p-2" aria-labelledby="navSearch" data-bs-popper="none">
                            <form class="input-group">
                                <input class="form-control border-primary" type="search" placeholder="Search..." aria-label="Search">
                                <button class="btn btn-primary m-0" type="submit">Search</button>
                            </form>
                        </div>
                    </li>

                    <li class="nav-item position-relative ms-2 ms-sm-3 d-none d-sm-block">
                        <a class="btn btn-dark mb-0">pay dues</a>
                    </li>

                    <li class="nav-item">
                        <button class="navbar-toggler ms-3 p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-animation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    </li>   
                </ul>

            </div>
        </nav>
    </header>

    <main>

        <!-- Main Banner START -->
        <section class="pt-0">
            <div class="swiper overflow-hidden" data-swiper-options='{
                "effect": "fade",
                "speed":"1000",
                "autoplay":{
                    "delay": 3000, 
                    "disableOnInteraction": false
                },
                "pagination":{
                    "el":".swiper-pagination",
                    "clickable":"true"
                }}'>

                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card overflow-hidden min-vh-100 rounded-0" style="background:url(<?= PROOT; ?>assets/media/10.jpg) no-repeat; background-size:cover; background-position:center;">
                            <div class="bg-overlay bg-linear-overlay"></div>
                
                            <!-- Card image overlay -->
                            <div class="position-relative z-index-2 d-flex flex-column m-auto h-100 py-9"> 
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-11 col-lg-8 col-xl-7 text-center m-auto">
                                            <span class="bg-white bg-opacity-10 text-white small rounded-3 px-3 py-2">🚀 #World's best software agency</span>
                                            <!-- Title -->
                                            <h1 class="text-white display-4 my-4">Leading the Way in <span class="text-primary">software</span> innovation</h1>
                                            <p class="text-white mb-5"> Whether you're a gaming enthusiast or simply seeking an extraordinary escape from reality, our Virtual VR product is your portal to endless excitement. </p>
                                            <a class="btn btn-lg btn-white icon-link icon-link-hover mb-0" href="#">Get started now<i class="bi bi-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card overflow-hidden min-vh-100 rounded-0" style="background:url(<?= PROOT; ?>assets/media/09.jpg) no-repeat; background-size:cover; background-position:center;">
                            <!-- Bg overlay -->
                            <div class="bg-overlay bg-linear-overlay"></div>
                
                            <!-- Content -->
                            <div class="position-relative z-index-2 d-flex flex-column m-auto h-100 py-9"> 
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-11 col-lg-8 mt-auto">
                                            <!-- Title -->
                                            <h1 class="text-white display-4 mb-4">Empower Your <span class="fw-light">Business</span> with <span class="fw-light">Innovation</span></h1>
                                            <p class="text-white mb-5"> Whether you're a gaming enthusiast or simply seeking an extraordinary escape from reality, our Virtual VR product is your portal to endless excitement. </p>
                                            <a class="btn btn-lg btn-primary icon-link icon-link-hover mb-0" href="#">Explore Our Services<i class="bi bi-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  

                <div class="swiper-pagination swiper-pagination-line position-absolute bottom-0 mb-3"></div>
            </div>  
        </section>

        <section class="pb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 mb-2 mb-md-0">
                        <h5 class="pe-6">400+ members from societies</h5>
                    </div>

                    <div class="col-md-9">
                        <!-- Slider START -->
                        <div class="swiper" data-swiper-options='{
                                "slidesPerView": 2, 
                                "spaceBetween": 50,
                                "breakpoints": { 
                                    "576": {"slidesPerView": 3}, 
                                    "992": {"slidesPerView": 4}, 
                                    "1200": {"slidesPerView": 5}
                                }}'>

                            <!-- Slider items -->
                            <div class="swiper-wrapper align-items-center">
                                <!-- Image -->
                                <div class="swiper-slide">
                                    <img src="assets/images/client/01.svg" class="grayscale" alt="client-img">
                                </div>
                                <!-- Image -->
                                <div class="swiper-slide">
                                    <img src="assets/images/client/02.svg" class="grayscale" alt="client-img">
                                </div>
                                <!-- Image -->
                                <div class="swiper-slide">
                                    <img src="assets/images/client/03.svg" class="grayscale" alt="client-img">
                                </div>
                                <!-- Image -->
                                <div class="swiper-slide">
                                    <img src="assets/images/client/04.svg" class="grayscale" alt="client-img">
                                </div>
                                <!-- Image -->
                                <div class="swiper-slide">
                                    <img src="assets/images/client/05.svg" class="grayscale" alt="client-img">
                                </div>
                                <!-- Image -->
                                <div class="swiper-slide">
                                    <img src="assets/images/client/01.svg" class="grayscale" alt="client-img">
                                </div>
                            </div>
                        </div>
                        <!-- Slider END -->
                    </div>
                </div> <!-- Row END -->
            </div>
        </section>

        <!-- About START -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-11 mx-auto">
                        <div class="row g-4 g-lg-6">
                            <!-- Title content -->
                            <div class="col-xl-5">
                                <h3>We're a dynamic, innovative digital agency rooted in the vibrant heart of <span class="text-primary">California</span></h3>
                            </div>

                            <!-- Years content -->
                            <div class="col-md-6 col-xl-3">
                                <div class="bg-light rounded p-4 overflow-hidden">
                                    <h6 class="mb-5 mb-sm-8">Since</h6>
                                    <div class="display-1 text-primary text-end mb-n5 mb-md-n6 me-n4">2013</div>
                                </div>
                            </div>
                            
                            <!-- Info content -->
                            <div class="col-md-6 col-xl-4">
                                <h6 class="fw-semibold mb-5">28 Years of working experience</h6>
                            
                                <!-- Accordion START -->
                                <div class="accordion accordion-icon accordion-border-bottom" id="accordionFaq">
                                    <!-- Item -->
                                    <div class="accordion-item mb-3">
                                        <div class="accordion-header font-base" id="heading-1">
                                            <button class="accordion-button fw-semibold rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                <i class="bi bi-bullseye text-primary me-2"></i>Our Mission
                                            </button>
                                        </div>
                                        <!-- Body -->
                                        <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1" data-bs-parent="#accordionFaq">
                                            <div class="accordion-body pb-0">
                                                Effective design communicates your brand's identity, cultivates trust, and can significantly impact conversion rates and customer loyalty.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Item -->
                                    <div class="accordion-item mb-3">
                                        <div class="accordion-header font-base" id="heading-2">
                                            <button class="accordion-button fw-semibold rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                <i class="bi bi-trophy text-primary me-2"></i>Our Goal
                                            </button>
                                        </div>
                                        <!-- Body -->
                                        <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#accordionFaq">
                                            <div class="accordion-body pb-0">
                                                We provide a range of tools, guides, and best practices to help you create designs, websites.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-0">
            <div class="container">
                <div class="row g-0 bg-light rounded overflow-hidden">
                    <!-- Content -->
                    <div class="col-md-6">
                        <div class="card card-body bg-transparent d-block p-4 p-md-5 p-lg-7 h-100">
                            <!-- Title -->
                            <h2 class="mb-4">C. K. TEDAM UNIVERSITY OF TECHNOLOGY & APPLIED SCIENCES</h2>
                            <p class="mb-4">
                                Welcome to C. K. Tedam University of Technology and Applied Sciences (CKT-UTAS), the premier public university of the Upper East Region of Ghana established at Navrongo in the Kassena-Nankana District.
                            <br>
                            <br>
                            We are dedicated to the well-being and success of our students, providing them with extraordinary experiences and networks that allow them to grow and develop …
                            </p>

                            <!-- Button -->
                            <a href="https://cktutas.edu.gh/" class="btn btn-dark mb-0">Click here for more detail</a>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="col-md-6"> 
                        <div class="h-100 py-8 py-md-0" style="background:url(<?= PROOT; ?>assets/media/ckt-bg.jpg) no-repeat; background-size:cover;"></div>
                    </div>
                </div> <!-- Row END -->
            </div>
        </section>

        <section>
            <div class="container">
                <div class="bg-light rounded position-relative overflow-hidden p-4 p-sm-6">
                    <!-- Decoration -->
                    <div class="position-absolute end-0 bottom-0 me-5">
                        <img src="<?= PROOT; ?>assets/media/cta-vector.svg" class="h-200px" alt="vector-img">
                    </div>

                    <div class="row g-4">
                        <!-- Title and inputs -->
                        <div class="col-lg-5">
                            <!-- Title -->
                            <h2 class="mb-4">Pay, Your, Dues</h2>
                            <p class="mb-4">Supposing so be resolving breakfast am or perfectly. It drew a hill from me. Valley by oh twenty direct me so.</p>
                            <!-- Download button -->
                            <div class="row g-4 mb-4 mb-lg-0">
                                <!-- Google play store button -->
                                <div class="col-6 col-sm-4">
                                    <a href="#" class="btn btn-success"> <i class="bi bi-cash-coin btn-transition"></i> Pay here</a>
                                </div>
                                <!-- App store button -->
                                <div class="col-6 col-sm-4">
                                    <a href="#" class="btn btn-dark"> <i class="bi bi-person-arms-up btn-transition"></i> Register </a>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="col-lg-5">
                            <!-- Mobile image -->
                            <div class="iphone-x iphone-x-small ms-lg-auto m-0 mb-n9" style="background: url(<?= PROOT; ?>assets/media/dues.jpg); background-size: 100%; width: 280px; height:430px">
                                <i></i>
                                <b style="left:6%;"></b>
                            </div>
                        </div>
                    </div> <!-- Row END -->
                </div>
            </div>
        </section>



    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    <!-- =======================
    Footer START -->
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