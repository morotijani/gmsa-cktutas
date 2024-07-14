<?php

    // Contact us page

    require_once ("db_connection/conn.php");
    $TITLE = "Contacts us";
    $navTheme = "";
    include ("inc/header.inc.php");
    include ("inc/nav.inc.php");


?>
<style type="text/css">
    *, body {
    font-family: "Montserrat" !important;
    font-optical-sizing: auto;
/*      font-weight: <weight>;*/
    font-style: normal;
}
</style>
    
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
                        Thoughts, stories and ideas from GMSA - CKTUTAS
                    </h1>

                    <form class="col-md-7 bg-light border rounded-2 position-relative mx-auto p-2 mt-4 mt-md-5">
                        <div class="input-group">
                            <input class="form-control focus-shadow-none bg-light border-0 me-1" type="email" placeholder="Search blog">
                            <button type="button" class="btn btn-dark rounded-2 mb-0"><i class="bi bi-search me-2"></i>Search</button>
                        </div>
                    </form>
                </div>

                <h6 class="mb-4">Blog category</h6>
                <!-- Slider START -->
                <div class="swiper" data-swiper-options='{
                    "slidesPerView": 2, 
                    "spaceBetween": 30,
                    "pagination":{
                        "el":".swiper-pagination",
                        "clickable":"true"
                    },
                    "breakpoints": {
                        "576": {"slidesPerView": 3},
                        "992": {"slidesPerView": 5}
                    }}'>

                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#" class="card card-img-scale overflow-hidden">
                                <img src="assets/images/blog/4by4/01.jpg" class="img-scale" alt="category-img">
                                <div class="card-img-overlay">
                                    <div class="badge text-bg-dark">Lifestyle</div>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a href="#" class="card card-img-scale overflow-hidden">
                                <img src="assets/images/blog/4by4/02.jpg" class="img-scale" alt="category-img">
                                <div class="card-img-overlay">
                                    <div class="badge text-bg-dark">Technology</div>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a href="#" class="card card-img-scale overflow-hidden">
                                <img src="assets/images/blog/4by4/03.jpg" class="img-scale" alt="category-img">
                                <div class="card-img-overlay">
                                    <div class="badge text-bg-dark">Design</div>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a href="#" class="card card-img-scale overflow-hidden">
                                <img src="assets/images/blog/4by4/04.jpg" class="img-scale" alt="category-img">
                                <div class="card-img-overlay">
                                    <div class="badge text-bg-dark">Marketing</div>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a href="#" class="card card-img-scale overflow-hidden">
                                <img src="assets/images/blog/4by4/05.jpg" class="img-scale" alt="category-img">
                                <div class="card-img-overlay">
                                    <div class="badge text-bg-dark">Research</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-pagination swiper-pagination-primary position-relative mt-4"></div>
                </div>
            </div>
        </section>


        <section class="pt-0">
            <div class="container">
                <div class="row g-xl-7">
                    <div class="col-lg-8">
                        <!-- Title -->
                        <h4 class="mb-4">Our Blog</h4>

                        <article class="card card-hover-shadow border p-3 mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="assets/images/blog/4by4/06.jpg" class="img-fluid card-img" alt="blog-img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body d-flex flex-column h-100 ps-0 pe-3">
                                        <div><span class="badge text-bg-dark mb-3">Technology</span></div>
                                        <h5 class="card-title mb-3 mb-md-0">The Power of Gratitude: Cultivating Joy and Abundance</h5>
                                        <div class="d-sm-flex justify-content-between align-items-center mt-auto">
                                            <p class="mb-2 heading-color fw-semibold">By Carolyn Ortiz</p>
                                            <a class="icon-link icon-link-hover stretched-link" href="blog-single-v1.html">Read more<i class="bi bi-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="card card-hover-shadow border p-3 mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="assets/images/blog/4by4/07.jpg" class="img-fluid card-img" alt="blog-img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body d-flex flex-column h-100 ps-0 pe-3">
                                        <div class="d-flex justify-content-between position-relative z-index-2">
                                            <span class="badge text-bg-dark mb-3">Lifestyle</span>
                                            <a href="#!" class="mb-0 text-body small" tabindex="0" role="button" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-content="You're seeing this ad because your activity meets the intended audience of our site.">
                                                <i class="bi bi-info-circle ps-1"></i> Sponsored
                                            </a>
                                        </div>
                                        <h5 class="card-title mb-3 mb-md-0">5 investment doubts you should clarify</h5>
                                        <div class="d-sm-flex justify-content-between align-items-center mt-auto">
                                            <p class="mb-2 heading-color fw-semibold">By Amanda Reed</p>
                                            <a class="icon-link icon-link-hover stretched-link" href="blog-single-v2.html">Read more<i class="bi bi-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="card card-hover-shadow border p-3 mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="assets/images/blog/4by4/08.jpg" class="img-fluid card-img" alt="blog-img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body d-flex flex-column h-100 ps-0 pe-3">
                                        <div><span class="badge text-bg-dark mb-3">Design</span></div>
                                        <h5 class="card-title mb-3 mb-md-0">Mastering Responsive Web Design with Bootstrap</h5>
                                        <div class="d-sm-flex justify-content-between align-items-center mt-auto">
                                            <p class="mb-2 heading-color fw-semibold">By Joan Wallace</p>
                                            <a class="icon-link icon-link-hover stretched-link" href="blog-single-v1.html">Read more<i class="bi bi-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="card card-hover-shadow border p-3 mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="assets/images/blog/4by4/09.jpg" class="img-fluid card-img" alt="blog-img">
                                </div>
                                <div class="col-md-8">
                                    <!-- Content -->
                                    <div class="card-body d-flex flex-column h-100 ps-0 pe-3">
                                        <div><span class="badge text-bg-dark mb-3">Marketing</span></div>
                                        <h5 class="card-title mb-3 mb-md-0">Effortless Web Development with Mizzle</h5>
                                        <!-- Author name and button -->
                                        <div class="d-sm-flex justify-content-between align-items-center mt-auto">
                                            <p class="mb-2 heading-color fw-semibold">By Lori Stevens</p>
                                            <a class="icon-link icon-link-hover stretched-link" href="blog-single-v2.html">Read more<i class="bi bi-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="card card-hover-shadow border p-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="assets/images/blog/4by4/10.jpg" class="img-fluid card-img" alt="blog-img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body d-flex flex-column h-100 ps-0 pe-3">
                                        <div><span class="badge text-bg-dark mb-3">Research</span></div>
                                        <h5 class="card-title mb-3 mb-md-0">Ten questions you should answer truthfully.</h5>
                                        <div class="d-sm-flex justify-content-between align-items-center mt-auto">
                                            <p class="mb-2 heading-color fw-semibold">By Louis Crawford</p>
                                            <a class="icon-link icon-link-hover stretched-link" href="blog-single-v2.html">Read more<i class="bi bi-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-4 mt-5 mt-lg-0">
                        <div class="card card-body bg-light p-4">
                            <svg class="mb-3" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1113_392)">
                                <path class="fill-primary" d="M22.5492 24.7427C23.8548 25.6131 26.1456 25.6132 27.4515 24.7426C27.4517 24.7425 27.452 24.7423 27.4522 24.7422L49.7048 9.90706C48.9749 7.79611 46.9686 6.27539 44.6128 6.27539H5.38754C3.03156 6.27539 1.0254 7.79611 0.29541 9.90706L22.5485 24.7423C22.5488 24.7425 22.549 24.7425 22.5492 24.7427Z"/>
                                <path class="fill-mode" d="M29.077 27.1812C29.0767 27.1814 29.0765 27.1816 29.0763 27.1817C27.9335 27.9435 26.4665 28.3244 25 28.3244C23.5332 28.3244 22.0668 27.9436 20.9239 27.1816C20.9237 27.1815 20.9236 27.1814 20.9234 27.1813L0 13.2324V38.3373C0 41.3077 2.41672 43.7244 5.38735 43.7244H44.6128C47.5834 43.7244 50 41.3077 50 38.3373V13.2324L29.077 27.1812Z"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_1113_392">
                                <rect width="50" height="50" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>
                            <h6 class="mb-3">Get the latest Mizzle article delivered to your inbox</h6>
                            <form>
                                <input type="email" class="form-control mb-2" placeholder="Email address">
                                <button type="submit" class="btn btn-dark mb-0">Subscribe</button>
                            </form>
                        </div>

                        <div class="card text-bg-dark mt-5">
                            <img src="assets/images/blog/adv.jpg" class="card-img" alt="adv image">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Advertisement</h5>
                            </div>
                        </div>

                        <div class="mt-5">
                            <h6 class="mb-3">Follow us on:</h6>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"> <a class="btn btn-round bg-facebook" href="#"><i class="fab fa-fw fa-facebook-f lh-base"></i></a> </li>
                                <li class="list-inline-item"> <a class="btn btn-round bg-instagram" href="#"><i class="fab fa-fw fa-instagram lh-base"></i></a> </li>
                                <li class="list-inline-item"> <a class="btn btn-round bg-twitter" href="#"><i class="fab fa-fw fa-twitter lh-base"></i></a> </li>
                                <li class="list-inline-item"> <a class="btn btn-round bg-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in lh-base"></i></a> </li>
                                <li class="list-inline-item"> <a class="btn btn-round bg-youtube" href="#"><i class="fab fa-fw fa-youtube lh-base"></i></a> </li>
                            </ul>
                        </div>

                        <div class="align-items-center mt-5">
                            <h6 class="mb-3 d-inline-block">Popular Tags:</h6>
                            <ul class="list-inline mb-0 social-media-btn">
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">blog</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">business</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">bootstrap</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">data science</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">deep learning</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">Adventure</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">Community</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">Tutorials</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">Interview</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">Photography</a> </li>
                                <li class="list-inline-item"> <a class="btn btn-light btn-sm" href="#">Classic</a> </li>
                            </ul>
                        </div>

                    </div>

                    <div class="col-12 mt-6">
                        <ul class="pagination pagination-primary-soft d-flex justify-content-sm-between flex-wrap mb-0">
                            <li>
                                <ul class="list-unstyled">
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-long-arrow-alt-left me-2 rtl-flip"></i>Prev</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="list-unstyled">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">..</a></li>
                                    <li class="page-item"><a class="page-link" href="#">22</a></li>
                                    <li class="page-item"><a class="page-link" href="#">23</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul class="list-unstyled">
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next<i class="fas fa-long-arrow-alt-right ms-2 rtl-flip"></i></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
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
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <script type="text/javascript">
    </script>

</body>
</html>