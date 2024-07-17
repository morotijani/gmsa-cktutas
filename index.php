<?php

    // Index page

    require_once ("db_connection/conn.php");
    $TITLE = "Welcome";
    $navTheme = "dark";
    include ("inc/header.inc.php");
    include ("inc/nav.inc.php");


?>
    <main>
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
                        <div class="card overflow-hidden min-vh-100 rounded-0" style="background:url(<?= PROOT; ?>assets/media/01.jpg) no-repeat; background-size:cover; background-position:center;">
                            <div class="bg-overlay bg-linear-overlay"></div>
                
                            <div class="position-relative z-index-2 d-flex flex-column m-auto h-100 py-9"> 
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-11 col-lg-8 col-xl-7 text-center m-auto">
                                            <span class="bg-white bg-opacity-10 text-white small rounded-3 px-3 py-2">🚀 #Ghana Muslim Students Association</span>
                                            <!-- Title -->
                                            <h1 class="text-white display-4 my-4">Ghana Muslims <span class="text-primary">Student</span> Association</h1>
                                            <p class="text-white mb-5"> Whether you're a gaming enthusiast or simply seeking an extraordinary escape from reality, our Virtual VR product is your portal to endless excitement. </p>
                                            <a class="btn btn-lg btn-white icon-link icon-link-hover mb-0" href="#">Get started now<i class="bi bi-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card overflow-hidden min-vh-100 rounded-0" style="background:url(<?= PROOT; ?>assets/media/03.jpg) no-repeat; background-size:cover; background-position:center;">
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
                    <div class="swiper-slide">
                        <div class="card overflow-hidden min-vh-100 rounded-0" style="background:url(<?= PROOT; ?>assets/media/04.jpg) no-repeat; background-size:cover; background-position:center;">
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

                <div class="swiper-pagination swiper-pagination-line position-absolute bottom-0 mb-3"></div>
            </div>  
        </section>

        <div class="pb-0">
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
                            <div class="swiper-wrapper align-items-center">
                                <div class="swiper-slide">
                                    <img src="assets/media/css.jpg" class="grayscale" alt="client-img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/media/infotes.jpg" class="grayscale" alt="client-img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/media/ghabsa.jpg" class="grayscale" alt="client-img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/media/css.jpg" class="grayscale" alt="client-img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/media/infotes.jpg" class="grayscale" alt="client-img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/media/ghabsa.jpg" class="grayscale" alt="client-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About START -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-11 mx-auto">
                        <div class="row g-4 g-lg-6">
                            <div class="col-xl-5">
                                <h3>We're Ghana Muslim Student Accociation, from CKT - UTAS in the vibrant heart of <span class="text-primary">Navrongo</span></h3>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="bg-light rounded p-4 overflow-hidden">
                                    <h6 class="mb-5 mb-sm-8">Since</h6>
                                    <div class="display-1 text-primary text-end mb-n5 mb-md-n6 me-n4">2013</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-xl-4">
                                <h6 class="fw-semibold mb-5">28 Years of working experience</h6>
                            
                                <div class="accordion accordion-icon accordion-border-bottom" id="accordionFaq">
                                    <!-- Item -->
                                    <div class="accordion-item mb-3">
                                        <div class="accordion-header font-base" id="heading-1">
                                            <button class="accordion-button fw-semibold rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                <i class="bi bi-bullseye text-primary me-2"></i>Our Mission
                                            </button>
                                        </div>
                                        <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1" data-bs-parent="#accordionFaq">
                                            <div class="accordion-body pb-0">
                                                Effective design communicates your brand's identity, cultivates trust, and can significantly impact conversion rates and customer loyalty.
                                            </div>
                                        </div>
                                    </div>

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

                            <a href="https://cktutas.edu.gh/" class="btn btn-dark mb-0">Click here for more detail</a>
                        </div>
                    </div>

                    <div class="col-md-6"> 
                        <div class="h-100 py-8 py-md-0" style="background:url(<?= PROOT; ?>assets/media/ckt-bg.jpg) no-repeat; background-size:cover;"></div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="bg-light rounded position-relative overflow-hidden p-4 p-sm-6">
                    <div class="position-absolute end-0 bottom-0 me-5">
                        <img src="<?= PROOT; ?>assets/media/cta-vector.svg" class="h-200px" alt="vector-img">
                    </div>

                    <div class="row g-4">
                        <div class="col-lg-5">
                            <h2 class="mb-4">Pay, Your, Dues</h2>
                            <p class="mb-4">Supposing so be resolving breakfast am or perfectly. It drew a hill from me. Valley by oh twenty direct me so.</p>
                            <div class="row g-4 mb-4 mb-lg-0">
                                <div class="col-6 col-sm-5">
                                    <a href="<?= PROOT; ?>auth/pay-dues" class="btn btn-lg btn-success"> <i class="bi bi-cash-coin btn-transition"></i> Pay here</a>
                                </div>
                                <div class="col-6 col-sm-5">
                                    <a href="<?= PROOT; ?>auth/register" class="btn btn-lg btn-dark"> <i class="bi bi-person-arms-up btn-transition"></i> Register </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="iphone-x iphone-x-small ms-lg-auto m-0 mb-n9" style="background: url(<?= PROOT; ?>assets/media/digital-wallet.jpg); background-size: cover; background-position:center; background-repeat: no-repeat; width: 280px; height:430px">
                                <i></i>
                                <b style="left:6%;"></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section>
            <div class="container">
                <div class="inner-container-small text-center">
                    <figure class="mb-4">
                        <svg width="223.6px" height="87.2px" viewBox="0 0 223.6 87.2" style="enable-background:new 0 0 223.6 87.2;" xml:space="preserve">
                            <path class="fill-mode" d="M222.9,53.8c-13.2-3-28-3-41,0.9c-5.5,1.7-11,4.3-14.9,8.7c-1.3-0.1-2.6-0.2-3.8-0.1 c-5.8,0.1-11.6,1.5-16.9,3.7c-2.9,1.2-5.7,2.9-8.5,4.4c-3.7,1.9-7.4,3.8-11.3,5.3c-7.3,2.9-16,5-23.5,1.7c-1.5-0.6-2.9-1.5-4.1-2.6 c6.5-2.6,12.2-7.9,13.2-15c0.8-6.6-5.1-12.1-11.6-11.4c-5,0.6-7.5,5.6-8.3,10.1c-0.9,4.9-0.3,10.8,2.7,14.9 c0.2,0.2,0.4,0.5,0.5,0.7c-0.4,0.1-0.8,0.2-1.3,0.3c-6.6,1.5-14.3,0.3-20.3-2.9c-6.1-3.3-10.3-9.1-12.3-15.6 c-0.2-0.7-1.2-0.4-1,0.3c2.1,7.3,6.7,13.4,13.4,17.1c6.8,3.7,15.4,4.5,22.7,2.4c0,0,0.1,0,0.1,0c4.5,4.4,11.2,5.9,17.3,5.4 c8-0.6,15.6-4.1,22.7-7.7c5.6-2.9,10.8-6,17-7.6c3.8-0.9,7.8-1.5,11.8-1.3c-3.3,4.8-4.6,11.1-2.3,16.5c2.8,6.4,11.3,6.7,16.3,2.8 c5.1-4,2.8-12.4-1-16.4c-2.4-2.5-5.7-3.9-9.1-4.5c0.2-0.2,0.3-0.3,0.5-0.4c4.3-4,10.2-6.2,15.9-7.5c11.8-2.8,24.9-2.7,36.7,0 C223.6,56,224.1,54,222.9,53.8z M95.5,71.6c-1.2-2.4-1.7-5.1-1.8-7.8c-0.1-4.5,1.1-11.2,6.1-12.6c2.4-0.7,5.2,0.4,7.2,1.7 c2.9,1.9,3.5,5.5,2.9,8.7c-1.2,6.2-6.8,10.5-12.6,12.6C96.7,73.4,96,72.5,95.5,71.6z M171.5,66.3c5.7,1.8,10.3,7.8,8.5,14 c-1.1,3.9-6.1,5.2-9.6,4.8c-3.5-0.4-5.5-3.4-6.2-6.5c-1.1-4.7,0.6-9.5,3.5-13.1C169,65.7,170.2,65.9,171.5,66.3z"></path>
                            <polygon class="fill-primary" points="65.3,39 61,56.8 0.7,0.7"></polygon>
                            <path class="fill-mode" d="M60.6,57.3L0.2,1.1C0,0.9-0.1,0.5,0.1,0.3C0.3,0,0.7-0.1,1,0.1l64.7,38.3c0.2,0.1,0.4,0.4,0.3,0.7l-4.3,17.8 c-0.1,0.2-0.2,0.4-0.4,0.5c-0.1,0-0.1,0-0.2,0C60.9,57.4,60.7,57.4,60.6,57.3z M5.6,4.3l55.1,51.2l3.9-16.3L5.6,4.3z"></path>
                            <polygon class="fill-primary" points="56.5,42.4 61,56.8 0.7,0.8"></polygon>
                            <path class="fill-mode" d="M60.6,57.3L0.2,1.3C0,1.1-0.1,0.7,0.2,0.4c0.2-0.3,0.6-0.3,0.9-0.1l55.8,41.5c0.1,0.1,0.2,0.2,0.2,0.3 l4.6,14.4c0.1,0.3,0,0.6-0.3,0.8c-0.1,0.1-0.2,0.1-0.4,0.1C60.9,57.4,60.7,57.4,60.6,57.3z M10.1,8.7l49.6,45.9l-3.8-11.8 L10.1,8.7z"></path>
                            <polygon class="fill-primary" points="0.7,0.7 91.5,28.5 65.2,38.8           "></polygon>
                            <path class="fill-mode" d="M64.9,39.4L0.3,1.2C0,1.1-0.1,0.7,0.1,0.4C0.2,0.1,0.5-0.1,0.9,0l90.9,27.8c0.3,0.1,0.5,0.3,0.5,0.6 c0,0.3-0.2,0.5-0.4,0.6L65.4,39.4c-0.1,0-0.2,0-0.2,0C65.1,39.4,65,39.4,64.9,39.4z M5.8,2.9l59.5,35.2l24.3-9.5L5.8,2.9z"></path>
                            <polygon class="fill-primary" points="56.3,42.4 26.5,57.6 0.7,0.7           "></polygon>
                            <path class="fill-mode" d="M26.3,58.3c-0.2-0.1-0.3-0.2-0.4-0.3L0.1,0.9c-0.1-0.3,0-0.6,0.2-0.8C0.5,0,0.8,0,1.1,0.1l55.7,41.8 c0.2,0.1,0.3,0.4,0.3,0.6c0,0.2-0.2,0.4-0.4,0.5L26.8,58.2c-0.1,0-0.2,0.1-0.3,0.1C26.5,58.3,26.4,58.3,26.3,58.3z M2.3,2.7 l24.5,54l28.2-14.4L2.3,2.7z"></path>
                        </svg>
                    </figure>

                    <h2>Let's stay in touch</h2>
                    <p>Receive news, stay updated, and special offers</p>

                    <div class="position-relative mt-5">
                        <figure class="position-absolute top-100 start-100 translate-middle d-none d-lg-block">
                            <svg class="opacity-1" width="148" height="140" viewBox="0 0 148 140" xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-primary" d="m9.95 131.41c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <circle class="fill-primary" cx="25.86" cy="131.41" r="2.95"></circle>
                                <circle class="fill-primary" cx="44.71" cy="131.41" r="2.95"></circle>
                                <circle class="fill-primary" cx="63.57" cy="131.41" r="2.95"></circle>
                                <circle class="fill-primary" cx="82.43" cy="131.41" r="2.95"></circle>
                                <circle class="fill-primary" cx="101.29" cy="131.41" r="2.95"></circle>
                                <circle class="fill-primary" cx="120.14" cy="131.41" r="2.95"></circle>
                                <path class="fill-primary" d="m141.95 131.41c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m9.95 113.61c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <circle class="fill-primary" cx="25.86" cy="113.61" r="2.95"></circle>
                                <circle class="fill-primary" cx="44.71" cy="113.61" r="2.95"></circle>
                                <circle class="fill-primary" cx="63.57" cy="113.61" r="2.95"></circle>
                                <circle class="fill-primary" cx="82.43" cy="113.61" r="2.95"></circle>
                                <circle class="fill-primary" cx="101.29" cy="113.61" r="2.95"></circle>
                                <circle class="fill-primary" cx="120.14" cy="113.61" r="2.95"></circle>
                                <path class="fill-primary" d="m141.95 113.61c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m9.95 95.81c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <circle class="fill-primary" cx="25.86" cy="95.81" r="2.95"></circle>
                                <circle class="fill-primary" cx="44.71" cy="95.81" r="2.95"></circle>
                                <circle class="fill-primary" cx="63.57" cy="95.81" r="2.95"></circle>
                                <circle class="fill-primary" cx="82.43" cy="95.81" r="2.95"></circle>
                                <circle class="fill-primary" cx="101.29" cy="95.81" r="2.95"></circle>
                                <circle class="fill-primary" cx="120.14" cy="95.81" r="2.95"></circle>
                                <path class="fill-primary" d="m141.95 95.81c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m9.95 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"></path>
                                <path class="fill-primary" d="m28.8 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"></path>
                                <path class="fill-primary" d="m47.66 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"></path>
                                <path class="fill-primary" d="m66.52 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"></path>
                                <path class="fill-primary" d="m85.37 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.64 0.01 2.95 1.33 2.95 2.95z"></path>
                                <path class="fill-primary" d="m104.23 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"></path>
                                <path class="fill-primary" d="m123.09 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"></path>
                                <path class="fill-primary" d="m141.95 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"></path>
                                <path class="fill-primary" d="m9.95 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m28.8 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m47.66 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m66.52 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m85.37 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.64 0 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m104.23 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m123.09 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m141.95 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m9.95 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m28.8 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m47.66 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m66.52 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m85.37 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.64 0 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m104.23 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m123.09 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m141.95 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m9.95 24.62c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <circle class="fill-primary" cx="25.86" cy="24.62" r="2.95"></circle>
                                <circle class="fill-primary" cx="44.71" cy="24.62" r="2.95"></circle>
                                <circle class="fill-primary" cx="63.57" cy="24.62" r="2.95"></circle>
                                <circle class="fill-primary" cx="82.43" cy="24.62" r="2.95"></circle>
                                <circle class="fill-primary" cx="101.29" cy="24.62" r="2.95"></circle>
                                <circle class="fill-primary" cx="120.14" cy="24.62" r="2.95"></circle>
                                <path class="fill-primary" d="m141.95 24.62c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"></path>
                                <path class="fill-primary" d="m9.95 6.82c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95c0-1.62 1.32-2.94 2.95-2.94s2.95 1.32 2.95 2.94z"></path>
                                <circle class="fill-primary" cx="25.86" cy="6.82" r="2.95"></circle>
                                <circle class="fill-primary" cx="44.71" cy="6.82" r="2.95"></circle>
                                <circle class="fill-primary" cx="63.57" cy="6.82" r="2.95"></circle>
                                <circle class="fill-primary" cx="82.43" cy="6.82" r="2.95"></circle>
                                <circle class="fill-primary" cx="101.29" cy="6.82" r="2.95"></circle>
                                <circle class="fill-primary" cx="120.14" cy="6.82" r="2.95"></circle>
                                <path class="fill-primary" d="m141.95 6.82c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"></path>
                            </svg>
                        </figure>

                        <!-- Input -->
                        <div class="bg-light border rounded-2 position-relative z-index-2 p-2 mb-2">
                            <form class="input-group">
                                <input class="form-control form-control-lg focus-shadow-none bg-light border-0 me-1" type="email" id="subscribe" name="subscribe" placeholder="Enter your email address" onkeypress="return event.keyCode != 13;">
                                <button type="button" onclick="subscribe_news(); return false;" class="btn btn-lg btn-dark rounded-2 mb-0">Subscribe!</button>
                            </form>
                        </div>
                    </div>
                    <p class="small mb-0 px-4">Subscribe now and receive weekly newsletter with educational materials, prayer times, activity calendar, Friday news, and much more!</p>
                </div>
            </div>
        </section>


    </main>

<?php include ("inc/footer.inc.php"); ?>

<script type="text/javascript">
    // SUBSCRIBE TO NEW PRODUCTS
    function subscribe_news() {
        var email = $('#subscribe').val();

        if (email == '') {
            alert('Enter email to subscribe');
            return false;
        } else if (!isEmail(email)) {
            alert('Please enter a valid email.');
            return false;
        } else {
            $.ajax({
                url : '<?= PROOT; ?>auth/subscriber.php',
                method : 'POST',
                data : {email : email},
                success : function(data) {
                    alert(data);
                    location.reload();
                },
                error : function() {
                    alert('Something went wrong.');
                }
            });
        }

    }
</script>