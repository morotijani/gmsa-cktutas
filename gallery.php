<?php

    // Contact us page

    require_once ("db_connection/conn.php");
    $TITLE = "Gallery";
    $navTheme = "";
    include ("inc/header.inc.php");
    include ("inc/nav.inc.php");


?>
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/glightbox.css">
    <main>

        <section class="pt-8">
            <div class="container">
                <div class="inner-container text-center mb-6">
                    <h1 class="mb-0 lh-base position-relative">
                        <span class="position-absolute top-0 start-0 mt-n5 ms-n5 d-none d-sm-block">
                            <svg class="fill-primary" width="63.6px" height="93.3px" viewBox="0 0 63.6 93.3" style="enable-background:new 0 0 63.6 93.3;" xml:space="preserve">
                                <path d="M58.5,1.9c0.5,0,1.6,5.3,2.4,11.8c0.8,6.5,1.4,14,1.6,18.5c0.3,8.8-0.5,15.9-1.6,16c-1.1,0-2.1-7.1-2.4-15.8 c-0.2-4.4-0.3-12-0.4-18.4C57.9,7.3,57.9,1.9,58.5,1.9z"/>
                                <path d="M47.7,44.4c-0.5,0.1-1.5-2.1-2.8-4.7c-1.3-2.6-2.8-5.5-3.7-7.2c-1.7-3.4-2.9-6.4-2.1-7c0.8-0.6,3.4,1.5,5.3,5.1 c1,1.8,2.2,5.1,2.9,8.1C48.1,41.8,48.2,44.3,47.7,44.4z"/>
                                <path d="M36.2,53.4c-0.2,0.5-4.1-1.2-8.5-3.5c-4.4-2.3-9.5-5.4-12.3-7.3c-5.6-3.9-9.6-7.9-9-8.8c0.6-0.9,5.4,1.7,11,5.5 c2.8,1.9,7.5,5.3,11.6,8.2C33.1,50.5,36.4,53,36.2,53.4z"/>
                                <path d="M27.2,68.3c-0.1,0.5-2.1,0.7-4.4,0.6c-2.4,0-5.1-0.3-6.7-0.7c-3.1-0.6-5.4-2-5.2-3c0.2-1,2.9-1.2,5.9-0.5 c1.5,0.3,4.1,1,6.3,1.7C25.4,67.1,27.2,67.8,27.2,68.3z"/>
                                <path d="M30.8,83.2c0.1,0.5-3.5,1.7-7.7,3.1c-4.3,1.4-9.2,3.1-12.1,4.1c-5.7,1.9-10.6,3.1-11,2.1 c-0.4-0.9,3.9-3.6,9.8-5.6c2.9-1,8.1-2.4,12.6-3.2C26.9,83,30.7,82.7,30.8,83.2z"/>
                            </svg>
                        </span>
                        Explore our gallery filled with joy and happiness
                    </h1>

                    <form class="col-md-7 bg-light border rounded-2 position-relative mx-auto p-2 mt-4 mt-md-5">
                        <div class="input-group">
                            <input class="form-control focus-shadow-none bg-light border-0 me-1" type="email" placeholder="Search blog">
                            <button type="button" class="btn btn-dark rounded-2 mb-0"><i class="bi bi-search me-2"></i>Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="container-fluid overflow-hidden">
        <div class="row g-4 g-lg-3 justify-content-lg-between">

            <div class="col-6 col-sm-4 position-relative ms-lg-n5">
                
                <!-- SVG decoration -->
                <figure class="position-absolute top-0 end-0 me-n8 mt-4 z-index-1">
                    <svg width="222.93px" height="172.15px">
                        <path class="fill-primary" d="M0,152.3C25.31,99.13,142.25,26.36,187.95,4.96c21.41-10.03,48.53-5.45,27.23,19.21 c-11.03,12.77-28.92,28.13-37.16,35.18c-20.39,17.45-46.34,42.82-64.05,67.05c-13.98,19.11-10.02,14.46,6.64,0.11 c13.57-11.69,29.17-25.12,40.65-32.05c3.52-2.13,6.77-3.66,9.64-4.43c9.07-2.42,13,3.08,9.55,10.77 c-7.7,17.16-22.46,31.32-31.36,47.7c-4.97,9.14-13.24,28.13,7.7,16.79c3.8-2.05,7.36-4.37,9.99-5.45l0.79,1.35 c-2.43,0.88-36.48,26.3-27.52-3.45c5.4-17.94,19.83-32.81,29.27-48.73c5.34-9,8.21-13.61-3.32-6.64 c-10.7,6.46-26.03,19.67-39.37,31.15c-15.56,13.4-28.68,24.69-33.81,21.53c-11.43-7.04,27.26-51,35.01-59.53 c14.77-16.28,30.38-31.21,45.8-44.61c6.33-5.48,18.43-16.43,28.35-25.25c11.62-10.34,15.39-16.14-5.89-6.18 C152.63,39.83,42.78,111.18,18.54,162.1L0,152.3z"/>
                    </svg>
                </figure>

                <!-- Images -->
                <div class="row g-xl-7 align-items-center">
                    <div class="col-6 d-none d-md-block">
                        <a data-glightbox data-gallery="gallery" href="<?= PROOT; ?>assets/media/gallery/03.jpg">
                            <div class="card card-element-hover card-overlay-hover overflow-hidden">
                                <!-- Image -->
                                <img src="<?= PROOT; ?>assets/media/gallery/03.jpg" class="rounded-3" alt="">
                                <!-- Full screen button -->
                                <div class="hover-element w-100 h-100">
                                    <i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 mt-lg-8">
                        <!-- Image item -->
                        <a data-glightbox data-gallery="gallery" href="<?= PROOT; ?>assets/media/gallery/04.jpg">
                            <div class="card card-element-hover card-overlay-hover overflow-hidden mb-4 mb-xl-7">
                                <!-- Image -->
                                <img src="<?= PROOT; ?>assets/media/gallery/04.jpg" class="rounded-3" alt="">
                                <!-- Full screen button -->
                                <div class="hover-element w-100 h-100">
                                    <i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
                                </div>
                            </div>
                        </a>

                        <!-- Image item -->
                        <a data-glightbox data-gallery="gallery" href="<?= PROOT; ?>assets/media/gallery/05.jpg">
                            <div class="card card-element-hover card-overlay-hover overflow-hidden">
                                <!-- Image -->
                                <img src="<?= PROOT; ?>assets/media/gallery/05.jpg" class="rounded-3" alt="">
                                <!-- Full screen button -->
                                <div class="hover-element w-100 h-100">
                                    <i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Image -->
            <div class="col-sm-4 position-relative order-2 order-sm-1 z-index-9">
                <!-- Image item -->
                <a data-glightbox data-gallery="gallery" href="<?= PROOT; ?>assets/media/gallery/05.jpg">
                    <div class="card card-element-hover card-overlay-hover overflow-hidden">
                        <!-- Image -->
                        <img src="<?= PROOT; ?>assets/media/gallery/05.jpg" class="rounded-3" alt="">
                        <!-- Full screen button -->
                        <div class="hover-element w-100 h-100">
                            <i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-sm-4 position-relative me-lg-n5 order-1">
                <!-- Svg decoration -->
                <figure class="position-absolute end-0 top-0 d-none d-md-block">
                    <svg height="400" class="fill-primary opacity-2" viewBox="0 0 340 340">
                        <circle cx="194.2" cy="2.2" r="2.2"></circle>
                        <circle cx="2.2" cy="2.2" r="2.2"></circle>
                        <circle cx="218.2" cy="2.2" r="2.2"></circle>
                        <circle cx="26.2" cy="2.2" r="2.2"></circle>
                        <circle cx="242.2" cy="2.2" r="2.2"></circle>
                        <circle cx="50.2" cy="2.2" r="2.2"></circle>
                        <circle cx="266.2" cy="2.2" r="2.2"></circle>
                        <circle cx="74.2" cy="2.2" r="2.2"></circle>
                        <circle cx="290.2" cy="2.2" r="2.2"></circle>
                        <circle cx="98.2" cy="2.2" r="2.2"></circle>
                        <circle cx="314.2" cy="2.2" r="2.2"></circle>
                        <circle cx="122.2" cy="2.2" r="2.2"></circle>
                        <circle cx="338.2" cy="2.2" r="2.2"></circle>
                        <circle cx="146.2" cy="2.2" r="2.2"></circle>
                        <circle cx="170.2" cy="2.2" r="2.2"></circle>
                        <circle cx="194.2" cy="26.2" r="2.2"></circle>
                        <circle cx="2.2" cy="26.2" r="2.2"></circle>
                        <circle cx="218.2" cy="26.2" r="2.2"></circle>
                        <circle cx="26.2" cy="26.2" r="2.2"></circle>
                        <circle cx="242.2" cy="26.2" r="2.2"></circle>
                        <circle cx="50.2" cy="26.2" r="2.2"></circle>
                        <circle cx="266.2" cy="26.2" r="2.2"></circle>
                        <circle cx="74.2" cy="26.2" r="2.2"></circle>
                        <circle cx="290.2" cy="26.2" r="2.2"></circle>
                        <circle cx="98.2" cy="26.2" r="2.2"></circle>
                        <circle cx="314.2" cy="26.2" r="2.2"></circle>
                        <circle cx="122.2" cy="26.2" r="2.2"></circle>
                        <circle cx="338.2" cy="26.2" r="2.2"></circle>
                        <circle cx="146.2" cy="26.2" r="2.2"></circle>
                        <circle cx="170.2" cy="26.2" r="2.2"></circle>
                        <circle cx="194.2" cy="50.2" r="2.2"></circle>
                        <circle cx="2.2" cy="50.2" r="2.2"></circle>
                        <circle cx="218.2" cy="50.2" r="2.2"></circle>
                        <circle cx="26.2" cy="50.2" r="2.2"></circle>
                        <circle cx="242.2" cy="50.2" r="2.2"></circle>
                        <circle cx="50.2" cy="50.2" r="2.2"></circle>
                        <circle cx="266.2" cy="50.2" r="2.2"></circle>
                        <circle cx="74.2" cy="50.2" r="2.2"></circle>
                        <circle cx="290.2" cy="50.2" r="2.2"></circle>
                        <circle cx="98.2" cy="50.2" r="2.2"></circle>
                        <circle cx="314.2" cy="50.2" r="2.2"></circle>
                        <circle cx="122.2" cy="50.2" r="2.2"></circle>
                        <circle cx="338.2" cy="50.2" r="2.2"></circle>
                        <circle cx="146.2" cy="50.2" r="2.2"></circle>
                        <circle cx="170.2" cy="50.2" r="2.2"></circle>
                        <circle cx="194.2" cy="74.2" r="2.2"></circle>
                        <circle cx="2.2" cy="74.2" r="2.2"></circle>
                        <circle cx="218.2" cy="74.2" r="2.2"></circle>
                        <circle cx="26.2" cy="74.2" r="2.2"></circle>
                        <circle cx="242.2" cy="74.2" r="2.2"></circle>
                        <circle cx="50.2" cy="74.2" r="2.2"></circle>
                        <circle cx="266.2" cy="74.2" r="2.2"></circle>
                        <circle cx="74.2" cy="74.2" r="2.2"></circle>
                        <circle cx="290.2" cy="74.2" r="2.2"></circle>
                        <circle cx="98.2" cy="74.2" r="2.2"></circle>
                        <circle cx="314.2" cy="74.2" r="2.2"></circle>
                        <circle cx="122.2" cy="74.2" r="2.2"></circle>
                        <circle cx="338.2" cy="74.2" r="2.2"></circle>
                        <circle cx="146.2" cy="74.2" r="2.2"></circle>
                        <circle cx="170.2" cy="74.2" r="2.2"></circle>
                        <circle cx="194.2" cy="98.2" r="2.2"></circle>
                        <circle cx="2.2" cy="98.2" r="2.2"></circle>
                        <circle cx="218.2" cy="98.2" r="2.2"></circle>
                        <circle cx="26.2" cy="98.2" r="2.2"></circle>
                        <circle cx="242.2" cy="98.2" r="2.2"></circle>
                        <circle cx="50.2" cy="98.2" r="2.2"></circle>
                        <circle cx="266.2" cy="98.2" r="2.2"></circle>
                        <circle cx="74.2" cy="98.2" r="2.2"></circle>
                        <circle cx="290.2" cy="98.2" r="2.2"></circle>
                        <circle cx="98.2" cy="98.2" r="2.2"></circle>
                        <circle cx="314.2" cy="98.2" r="2.2"></circle>
                        <circle cx="122.2" cy="98.2" r="2.2"></circle>
                        <circle cx="338.2" cy="98.2" r="2.2"></circle>
                        <circle cx="146.2" cy="98.2" r="2.2"></circle>
                        <circle cx="170.2" cy="98.2" r="2.2"></circle>
                        <circle cx="194.2" cy="122.2" r="2.2"></circle>
                        <circle cx="2.2" cy="122.2" r="2.2"></circle>
                        <circle cx="218.2" cy="122.2" r="2.2"></circle>
                        <circle cx="26.2" cy="122.2" r="2.2"></circle>
                        <circle cx="242.2" cy="122.2" r="2.2"></circle>
                        <circle cx="50.2" cy="122.2" r="2.2"></circle>
                        <circle cx="266.2" cy="122.2" r="2.2"></circle>
                        <circle cx="74.2" cy="122.2" r="2.2"></circle>
                        <circle cx="290.2" cy="122.2" r="2.2"></circle>
                        <circle cx="98.2" cy="122.2" r="2.2"></circle>
                        <circle cx="314.2" cy="122.2" r="2.2"></circle>
                        <circle cx="122.2" cy="122.2" r="2.2"></circle>
                        <circle cx="338.2" cy="122.2" r="2.2"></circle>
                        <circle cx="146.2" cy="122.2" r="2.2"></circle>
                        <circle cx="170.2" cy="122.2" r="2.2"></circle>
                        <circle cx="194.2" cy="146.2" r="2.2"></circle>
                        <circle cx="2.2" cy="146.2" r="2.2"></circle>
                        <circle cx="218.2" cy="146.2" r="2.2"></circle>
                        <circle cx="26.2" cy="146.2" r="2.2"></circle>
                        <circle cx="242.2" cy="146.2" r="2.2"></circle>
                        <circle cx="50.2" cy="146.2" r="2.2"></circle>
                        <circle cx="266.2" cy="146.2" r="2.2"></circle>
                        <circle cx="74.2" cy="146.2" r="2.2"></circle>
                        <circle cx="290.2" cy="146.2" r="2.2"></circle>
                        <circle cx="98.2" cy="146.2" r="2.2"></circle>
                        <circle cx="314.2" cy="146.2" r="2.2"></circle>
                        <circle cx="122.2" cy="146.2" r="2.2"></circle>
                        <circle cx="338.2" cy="146.2" r="2.2"></circle>
                        <circle cx="146.2" cy="146.2" r="2.2"></circle>
                        <circle cx="170.2" cy="146.2" r="2.2"></circle>
                        <circle cx="194.2" cy="170.2" r="2.2"></circle>
                        <circle cx="2.2" cy="170.2" r="2.2"></circle>
                        <circle cx="218.2" cy="170.2" r="2.2"></circle>
                        <circle cx="26.2" cy="170.2" r="2.2"></circle>
                        <circle cx="242.2" cy="170.2" r="2.2"></circle>
                        <circle cx="50.2" cy="170.2" r="2.2"></circle>
                        <circle cx="266.2" cy="170.2" r="2.2"></circle>
                        <circle cx="74.2" cy="170.2" r="2.2"></circle>
                        <circle cx="290.2" cy="170.2" r="2.2"></circle>
                        <circle cx="98.2" cy="170.2" r="2.2"></circle>
                        <circle cx="314.2" cy="170.2" r="2.2"></circle>
                        <circle cx="122.2" cy="170.2" r="2.2"></circle>
                        <circle cx="338.2" cy="170.2" r="2.2"></circle>
                        <circle cx="146.2" cy="170.2" r="2.2"></circle>
                        <circle cx="170.2" cy="170.2" r="2.2"></circle>
                        <circle cx="194.2" cy="194.2" r="2.2"></circle>
                        <circle cx="2.2" cy="194.2" r="2.2"></circle>
                        <circle cx="218.2" cy="194.2" r="2.2"></circle>
                        <circle cx="26.2" cy="194.2" r="2.2"></circle>
                        <circle cx="242.2" cy="194.2" r="2.2"></circle>
                        <circle cx="50.2" cy="194.2" r="2.2"></circle>
                        <circle cx="266.2" cy="194.2" r="2.2"></circle>
                        <circle cx="74.2" cy="194.2" r="2.2"></circle>
                        <circle cx="290.2" cy="194.2" r="2.2"></circle>
                        <circle cx="98.2" cy="194.2" r="2.2"></circle>
                        <circle cx="314.2" cy="194.2" r="2.2"></circle>
                        <circle cx="122.2" cy="194.2" r="2.2"></circle>
                        <circle cx="338.2" cy="194.2" r="2.2"></circle>
                        <circle cx="146.2" cy="194.2" r="2.2"></circle>
                        <circle cx="170.2" cy="194.2" r="2.2"></circle>
                        <circle cx="194.2" cy="218.2" r="2.2"></circle>
                        <circle cx="2.2" cy="218.2" r="2.2"></circle>
                        <circle cx="218.2" cy="218.2" r="2.2"></circle>
                        <circle cx="26.2" cy="218.2" r="2.2"></circle>
                        <circle cx="242.2" cy="218.2" r="2.2"></circle>
                        <circle cx="50.2" cy="218.2" r="2.2"></circle>
                        <circle cx="266.2" cy="218.2" r="2.2"></circle>
                        <circle cx="74.2" cy="218.2" r="2.2"></circle>
                        <circle cx="290.2" cy="218.2" r="2.2"></circle>
                        <circle cx="98.2" cy="218.2" r="2.2"></circle>
                        <circle cx="314.2" cy="218.2" r="2.2"></circle>
                        <circle cx="122.2" cy="218.2" r="2.2"></circle>
                        <circle cx="338.2" cy="218.2" r="2.2"></circle>
                        <circle cx="146.2" cy="218.2" r="2.2"></circle>
                        <circle cx="170.2" cy="218.2" r="2.2"></circle>
                        <circle cx="194.2" cy="242.2" r="2.2"></circle>
                        <circle cx="2.2" cy="242.2" r="2.2"></circle>
                        <circle cx="218.2" cy="242.2" r="2.2"></circle>
                        <circle cx="26.2" cy="242.2" r="2.2"></circle>
                        <circle cx="242.2" cy="242.2" r="2.2"></circle>
                        <circle cx="50.2" cy="242.2" r="2.2"></circle>
                        <circle cx="266.2" cy="242.2" r="2.2"></circle>
                        <circle cx="74.2" cy="242.2" r="2.2"></circle>
                        <circle cx="290.2" cy="242.2" r="2.2"></circle>
                        <circle cx="98.2" cy="242.2" r="2.2"></circle>
                        <circle cx="314.2" cy="242.2" r="2.2"></circle>
                        <circle cx="122.2" cy="242.2" r="2.2"></circle>
                        <circle cx="338.2" cy="242.2" r="2.2"></circle>
                        <circle cx="146.2" cy="242.2" r="2.2"></circle>
                        <circle cx="170.2" cy="242.2" r="2.2"></circle>
                        <circle cx="194.2" cy="266.2" r="2.2"></circle>
                        <circle cx="2.2" cy="266.2" r="2.2"></circle>
                        <circle cx="218.2" cy="266.2" r="2.2"></circle>
                        <circle cx="26.2" cy="266.2" r="2.2"></circle>
                        <circle cx="242.2" cy="266.2" r="2.2"></circle>
                        <circle cx="50.2" cy="266.2" r="2.2"></circle>
                        <circle cx="266.2" cy="266.2" r="2.2"></circle>
                        <circle cx="74.2" cy="266.2" r="2.2"></circle>
                        <circle cx="290.2" cy="266.2" r="2.2"></circle>
                        <circle cx="98.2" cy="266.2" r="2.2"></circle>
                        <circle cx="314.2" cy="266.2" r="2.2"></circle>
                        <circle cx="122.2" cy="266.2" r="2.2"></circle>
                        <circle cx="338.2" cy="266.2" r="2.2"></circle>
                        <circle cx="146.2" cy="266.2" r="2.2"></circle>
                        <circle cx="170.2" cy="266.2" r="2.2"></circle>
                        <circle cx="194.2" cy="290.2" r="2.2"></circle>
                        <circle cx="2.2" cy="290.2" r="2.2"></circle>
                        <circle cx="218.2" cy="290.2" r="2.2"></circle>
                        <circle cx="26.2" cy="290.2" r="2.2"></circle>
                        <circle cx="242.2" cy="290.2" r="2.2"></circle>
                        <circle cx="50.2" cy="290.2" r="2.2"></circle>
                        <circle cx="266.2" cy="290.2" r="2.2"></circle>
                        <circle cx="74.2" cy="290.2" r="2.2"></circle>
                        <circle cx="290.2" cy="290.2" r="2.2"></circle>
                        <circle cx="98.2" cy="290.2" r="2.2"></circle>
                        <circle cx="314.2" cy="290.2" r="2.2"></circle>
                        <circle cx="122.2" cy="290.2" r="2.2"></circle>
                        <circle cx="338.2" cy="290.2" r="2.2"></circle>
                        <circle cx="146.2" cy="290.2" r="2.2"></circle>
                        <circle cx="170.2" cy="290.2" r="2.2"></circle>
                        <circle cx="194.2" cy="314.2" r="2.2"></circle>
                        <circle cx="2.2" cy="314.2" r="2.2"></circle>
                        <circle cx="218.2" cy="314.2" r="2.2"></circle>
                        <circle cx="26.2" cy="314.2" r="2.2"></circle>
                        <circle cx="242.2" cy="314.2" r="2.2"></circle>
                        <circle cx="50.2" cy="314.2" r="2.2"></circle>
                        <circle cx="266.2" cy="314.2" r="2.2"></circle>
                        <circle cx="74.2" cy="314.2" r="2.2"></circle>
                        <circle cx="290.2" cy="314.2" r="2.2"></circle>
                        <circle cx="98.2" cy="314.2" r="2.2"></circle>
                        <circle cx="314.2" cy="314.2" r="2.2"></circle>
                        <circle cx="122.2" cy="314.2" r="2.2"></circle>
                        <circle cx="338.2" cy="314.2" r="2.2"></circle>
                        <circle cx="146.2" cy="314.2" r="2.2"></circle>
                        <circle cx="170.2" cy="314.2" r="2.2"></circle>
                        <circle cx="194.2" cy="338.2" r="2.2"></circle>
                        <circle cx="2.2" cy="338.2" r="2.2"></circle>
                        <circle cx="218.2" cy="338.2" r="2.2"></circle>
                        <circle cx="26.2" cy="338.2" r="2.2"></circle>
                        <circle cx="242.2" cy="338.2" r="2.2"></circle>
                        <circle cx="50.2" cy="338.2" r="2.2"></circle>
                        <circle cx="266.2" cy="338.2" r="2.2"></circle>
                        <circle cx="74.2" cy="338.2" r="2.2"></circle>
                        <circle cx="290.2" cy="338.2" r="2.2"></circle>
                        <circle cx="98.2" cy="338.2" r="2.2"></circle>
                        <circle cx="314.2" cy="338.2" r="2.2"></circle>
                        <circle cx="122.2" cy="338.2" r="2.2"></circle>
                        <circle cx="338.2" cy="338.2" r="2.2"></circle>
                        <circle cx="146.2" cy="338.2" r="2.2"></circle>
                        <circle cx="170.2" cy="338.2" r="2.2"></circle>
                    </svg>
                </figure>

                <div class="row g-xl-7 position-relative">
                    <div class="col-md-6 mt-lg-8">
                        <!-- Image with play button -->
                        <a data-glightbox data-gallery="gallery" href="https://www.youtube.com/embed/tXHviS-4ygo">
                            <div class="card overflow-hidden mb-4 mb-xl-7">
                                <!-- Image -->
                                <img src="assets/images/bg/13.jpg" class="rounded-3" alt="">
                                <!-- Full screen button -->
                                <div class="w-100 h-100">
                                    <span class="btn btn-lg btn-round btn-dark position-absolute top-50 start-50 translate-middle mb-0"><i class="fas fa-play"></i></span>
                                </div>
                            </div>
                        </a>

                        <!-- Image item -->
                        <a data-glightbox data-gallery="gallery" href="<?= PROOT; ?>assets/media/gallery/06.jpg">
                            <div class="card card-element-hover card-overlay-hover overflow-hidden">
                                <!-- Image -->
                                <img src="<?= PROOT; ?>assets/media/gallery/06.jpg" class="rounded-3" alt="">
                                <!-- Full screen button -->
                                <div class="hover-element w-100 h-100">
                                    <i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 d-none d-md-block">
                        <!-- Image item -->
                        <a data-glightbox data-gallery="gallery" href="<?= PROOT; ?>assets/media/gallery/07.jpeg">
                            <div class="card card-element-hover card-overlay-hover overflow-hidden mb-4 mb-xl-7">
                                <!-- Image -->
                                <img src="<?= PROOT; ?>assets/media/gallery/07.jpeg" class="rounded-3" alt="">
                                <!-- Full screen button -->
                                <div class="hover-element w-100 h-100">
                                    <i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
                                </div>
                            </div>
                        </a>

                        <!-- Image item -->
                        <a data-glightbox data-gallery="gallery" href="<?= PROOT; ?>assets/media/gallery/09.jpeg">
                            <div class="card card-element-hover card-overlay-hover overflow-hidden">
                                <!-- Image -->
                                <img src="<?= PROOT; ?>assets/media/gallery/09.jpeg" class="rounded-3" alt="">
                                <!-- Full screen button -->
                                <div class="hover-element w-100 h-100">
                                    <i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </section>




    </main>

<?php include ("inc/footer.inc.php"); ?>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/glightbox.js"></script>
    <script src="<?= PROOT; ?>dist/js/functions.js"></script>
