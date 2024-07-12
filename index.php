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
    <script>
        const storedTheme = localStorage.getItem('theme')
 
        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if(el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                const activeThemeIcon = document.querySelector('.theme-icon-active use')
                const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                    element.classList.remove('active')
                })

                btnToActive.classList.add('active')
                activeThemeIcon.setAttribute('href', svgOfActiveBtn)
            }

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                if (storedTheme !== 'light' || storedTheme !== 'dark') {
                    setTheme(getPreferredTheme())
                }
            })

            showActiveTheme(getPreferredTheme())

            document.querySelectorAll('[data-bs-theme-value]')
                .forEach(toggle => {
                    toggle.addEventListener('click', () => {
                        const theme = toggle.getAttribute('data-bs-theme-value')
                        localStorage.setItem('theme', theme)
                        setTheme(theme)
                        showActiveTheme(theme)
                    })
                })

            }
        })
        
    </script>

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
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/gmsa.css">

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
                        <a class="btn btn-dark mb-0">free consultation</a>
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

    <!-- =======================
    Main Banner START -->
    <section class="pt-0">
        <!-- Slider START -->
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
                <!-- Slider item -->
                <div class="swiper-slide">
                    <div class="card overflow-hidden min-vh-100 rounded-0" style="background:url(<?= PROOT; ?>assets/media/10.jpg) no-repeat; background-size:cover; background-position:center;">
                        <!-- Bg overlay -->
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
                
                <!-- Slider item -->
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

            <!-- Slider Pagination -->
            <div class="swiper-pagination swiper-pagination-line position-absolute bottom-0 mb-3"></div>
        </div>  
        <!-- Slider END -->
    </section>
    <!-- =======================
    Main Banner END -->

    <!-- =======================
    About START -->
    <section class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <div class="row g-4 g-lg-5 align-items-center">
                        <!-- Years content -->
                        <div class="col-md-6 col-lg-4 text-center">
                            <div class="icon-xxl bg-primary rounded-circle mx-auto mb-n7" style="width: 150px; height:150px;"></div>
                            <span class="heading-color fw-bold" style="font-size: 6rem; line-height: 1.25;">28</span>
                            <h6 class="w-50 mx-auto">Years of working experience</h6>
                        </div>
                        
                        <!-- Title content -->
                        <div class="col-md-6 col-lg-4">
                            <h6 class="text-body fw-normal">Since 1996</h6>
                            <h3>Genuinely corporate UK-based enterprises</h3>
                        </div>
                        
                        <!-- Info content -->
                        <div class="col-lg-4">
                            <p class="mb-4">Embrace a new era of digital success with Mizzle. Our team combines cutting-edge design with robust development to deliver websites that captivate and convert.</p>
                            <a href="#" class="btn btn-dark mb-0">Know more about us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    About END -->

    <!-- =======================
    Services START -->
    <section class="bg-light overflow-hidden">
        <div class="container">
            <!-- Title and content -->
            <div class="row mb-4 mb-md-6">
                <div class="col-md-6 col-lg-5">
                    <h2 class="mb-0">Accelerating your digital transformation</h2>
                </div>

                <div class="col-md-6 col-lg-4 ms-auto">
                    <p>Our team of experts specializes in delivering tailored services designed to propel your organization forward in today's fast-paced digital landscape. </p>

                    <!-- Slider arrow -->
                    <div class="d-flex gap-3 position-relative mt-3">
                        <a href="#" class="btn btn-white border btn-icon rounded-circle mb-0 swiper-button-prev-team"><i class="bi bi-arrow-left"></i></a>
                        <a href="#" class="btn btn-white border btn-icon rounded-circle mb-0 swiper-button-next-team"><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Service start -->
            <div class="swiper swiper-outside-end-n20" data-swiper-options='{
                "spaceBetween": 50,
                "loop": false,
                "navigation":{
                    "nextEl":".swiper-button-next-team",
                    "prevEl":".swiper-button-prev-team"
                },
                "breakpoints": { 
                    "576": {"slidesPerView": 1},
                    "768": {"slidesPerView": 3},
                    "992": {"slidesPerView": 3},
                    "1200": {"slidesPerView": 4}
                }}'>
                
                <div class="swiper-wrapper">

                    <!-- Service item -->
                    <div class="swiper-slide">
                        <div class="card card-img-scale bg-body overflow-hidden">
                            <!-- Image -->
                            <div class="card-img-scale-wrapper">
                                <img src="assets/images/services/4by3/01.jpg" class="card-img-top img-scale" alt="service image">
                            </div>
                            <!-- Card body -->
                            <div class="card-body p-4">
                                <h6><a href="service-single.html">Custom Software Development</a></h6>
                                <p class="mb-0">We prioritize user experience, scalability, and security to ensure your.</p>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer border-top bg-body p-4">
                                <a class="icon-link icon-link-hover stretched-link p-0 m-0" href="#">Explore this service<i class="bi bi-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>

                    <!-- Service item -->
                    <div class="swiper-slide">
                        <div class="card card-img-scale bg-body overflow-hidden">
                            <!-- Image -->
                            <div class="card-img-scale-wrapper">
                                <img src="assets/images/services/4by3/02.jpg" class="card-img-top img-scale" alt="service image">
                            </div>
                            <!-- Card body -->
                            <div class="card-body p-4">
                                <h6><a href="service-single.html">Web Design and Development</a></h6>
                                <p class="mb-0">From responsive websites to e-commerce platforms.</p>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer border-top bg-body p-4">
                                <a class="icon-link icon-link-hover stretched-link p-0 m-0" href="#">Explore this service<i class="bi bi-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>

                    <!-- Service item -->
                    <div class="swiper-slide">
                        <div class="card card-img-scale bg-body overflow-hidden">
                            <!-- Image -->
                            <div class="card-img-scale-wrapper">
                                <img src="assets/images/services/4by3/03.jpg" class="card-img-top img-scale" alt="service image">
                            </div>
                            <!-- Card body -->
                            <div class="card-body p-4">
                                <h6><a href="service-single.html">Digital Marketing Strategies</a></h6>
                                <p class="mb-0">Reach your target drive results with our comprehensive digital marketing.</p>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer border-top bg-body p-4">
                                <a class="icon-link icon-link-hover stretched-link p-0 m-0" href="#">Explore this service<i class="bi bi-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>

                    <!-- Service item -->
                    <div class="swiper-slide">
                        <div class="card card-img-scale bg-body overflow-hidden">
                            <!-- Image -->
                            <div class="card-img-scale-wrapper">
                                <img src="assets/images/services/4by3/04.jpg" class="card-img-top img-scale" alt="service image">
                            </div>
                            <!-- Card body -->
                            <div class="card-body p-4">
                                <h6><a href="service-single.html">Cybersecurity Solutions</a></h6>
                                <p class="mb-0">Protect your business from cyber threats with our cybersecurity solutions.</p>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer border-top bg-body p-4">
                                <a class="icon-link icon-link-hover stretched-link p-0 m-0" href="#">Explore this service<i class="bi bi-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>

                    <!-- Service item -->
                    <div class="swiper-slide">
                        <div class="card card-img-scale bg-body overflow-hidden">
                            <!-- Image -->
                            <div class="card-img-scale-wrapper">
                                <img src="assets/images/services/4by3/05.jpg" class="card-img-top img-scale" alt="service image">
                            </div>
                            <!-- Card body -->
                            <div class="card-body p-4">
                                <h6><a href="service-single.html">IT Consulting and Support</a></h6>
                                <p class="mb-0">Leverage our expertise to optimize your IT infrastructure and operations.</p>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer border-top bg-body p-4">
                                <a class="icon-link icon-link-hover stretched-link p-0 m-0" href="#">Explore this service<i class="bi bi-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>

                    <!-- Service item -->
                    <div class="swiper-slide">
                        <div class="card card-img-scale bg-body overflow-hidden">
                            <!-- Image -->
                            <div class="card-img-scale-wrapper">
                                <img src="assets/images/services/4by3/06.jpg" class="card-img-top img-scale" alt="service image">
                            </div>
                            <!-- Card body -->
                            <div class="card-body p-4">
                                <h6><a href="service-single.html">UI/UX Design Services</a></h6>
                                <p class="mb-0">Enhance user satisfaction and engagement with our services.</p>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer border-top bg-body p-4">
                                <a class="icon-link icon-link-hover stretched-link p-0 m-0" href="#">Explore this service<i class="bi bi-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Service END -->

            <!-- CTA -->
            <div class="d-flex align-items-center gap-2 mt-6">
                <ul class="avatar-group mb-0">
                    <li class="avatar avatar-sm">
                        <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                    </li>
                    <li class="avatar avatar-sm">
                        <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
                    </li>
                    <li class="avatar avatar-sm">
                        <div class="avatar-img rounded-circle text-bg-dark">
                            <i class="bi bi-telephone text-white position-absolute top-50 start-50 translate-middle"></i>
                        </div>
                    </li>
                </ul>
                <p class="fw-normal mb-0">Maximize Productivity by Simplifying Solution Search <a href="#" class="text-decoration-underline text-primary-hover fw-semibold">Got a project in mind?</a></p>
            </div>
        </div>
    </section>
    <!-- =======================
    Services END -->

    <!-- =======================
    Why us START -->
    <section class="overflow-hidden pb-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Image -->
                <div class="col-lg-6 text-center position-relative mb-5 mb-lg-0">
                    <!-- Image -->
                    <div class="pe-lg-6 pe-xl-8"><img src="assets/images/about/20.jpg" class="rounded" alt=""></div>
                    <!-- Decoration -->
                    <figure class="position-absolute bottom-0 end-0 rotate-13 mb-n6">
                        <svg class="text-primary" width="297" height="294" viewBox="0 0 297 294" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M146.895 166.815C146.895 166.815 146.818 166.922 146.667 167.128C146.519 167.339 146.299 167.651 146.012 168.06C145.456 168.873 144.652 170.064 143.691 171.61C142.719 173.152 141.589 175.05 140.352 177.258C139.105 179.46 137.794 181.994 136.408 184.778C135.066 187.583 133.626 190.629 132.282 193.927C131.573 195.559 130.945 197.278 130.253 199.013C129.62 200.77 128.939 202.554 128.333 204.397C127.719 206.238 127.092 208.108 126.54 210.027C125.944 211.933 125.431 213.888 124.907 215.855C124.631 216.835 124.401 217.831 124.169 218.829C123.935 219.827 123.7 220.827 123.464 221.83C123.06 223.849 122.622 225.87 122.265 227.906L121.757 230.963L121.507 232.489L121.307 234.021C121.042 236.062 120.754 238.091 120.596 240.119C120.501 241.131 120.407 242.139 120.313 243.142C120.231 244.146 120.194 245.148 120.133 246.142C120.078 247.136 120.023 248.124 119.969 249.105C119.951 250.087 119.933 251.063 119.915 252.03C119.9 252.997 119.884 253.956 119.868 254.906C119.869 255.856 119.907 256.797 119.925 257.727C119.971 259.587 119.989 261.408 120.136 263.175C120.194 264.059 120.251 264.931 120.308 265.79C120.365 266.648 120.408 267.495 120.512 268.322C120.692 269.979 120.866 271.58 121.032 273.116C121.213 274.65 121.474 276.109 121.675 277.502C121.892 278.894 122.067 280.217 122.337 281.444C122.58 282.674 122.809 283.826 123.021 284.891C123.227 285.957 123.42 286.934 123.652 287.805C124.511 291.301 125.001 293.299 125.001 293.299C125.001 293.299 124.556 291.291 123.778 287.777C123.567 286.903 123.395 285.922 123.214 284.853C123.027 283.785 122.825 282.631 122.61 281.397C122.37 280.167 122.225 278.842 122.04 277.449C121.871 276.055 121.644 274.596 121.499 273.063C121.368 271.529 121.232 269.93 121.09 268.276C121.005 267.45 120.982 266.606 120.944 265.75C120.908 264.894 120.871 264.025 120.833 263.144C120.726 261.383 120.751 259.571 120.747 257.72C120.751 256.795 120.734 255.86 120.755 254.915C120.792 253.972 120.829 253.019 120.867 252.059C120.906 251.099 120.947 250.131 120.987 249.156C121.063 248.183 121.14 247.203 121.217 246.217C121.3 245.232 121.359 244.239 121.463 243.245C121.579 242.252 121.695 241.254 121.812 240.253C122.014 238.246 122.347 236.24 122.655 234.224L122.888 232.711L123.171 231.204L123.743 228.188C124.142 226.18 124.622 224.189 125.067 222.201C125.322 221.214 125.577 220.23 125.832 219.249C126.084 218.267 126.334 217.287 126.629 216.324C127.191 214.39 127.742 212.471 128.375 210.601C128.963 208.718 129.624 206.884 130.272 205.081C130.912 203.275 131.625 201.529 132.289 199.81C133.011 198.113 133.668 196.433 134.405 194.839C135.803 191.619 137.291 188.651 138.674 185.921C140.101 183.213 141.446 180.751 142.718 178.619C143.982 176.481 145.131 174.648 146.112 173.167C147.086 171.679 147.891 170.543 148.442 169.777C148.718 169.402 148.93 169.115 149.072 168.921C149.219 168.728 149.295 168.629 149.295 168.629L146.895 166.815Z" fill="#202124"/>
                            <path d="M140.483 162.473C140.483 162.473 140.366 162.714 140.145 163.166C139.928 163.622 139.609 164.289 139.204 165.14C138.402 166.837 137.284 169.27 135.994 172.211C134.7 175.149 133.243 178.599 131.748 182.32C130.992 184.177 130.263 186.118 129.495 188.077C128.77 190.054 128.008 192.051 127.298 194.068C126.608 196.092 125.862 198.094 125.233 200.103C124.588 202.107 123.922 204.066 123.371 205.993C122.803 207.915 122.223 209.761 121.769 211.541C121.308 213.319 120.81 214.98 120.462 216.545C120.097 218.104 119.761 219.533 119.465 220.799C119.181 222.068 118.988 223.186 118.802 224.101C118.444 225.932 118.239 226.978 118.239 226.978C118.239 226.978 118.49 225.942 118.928 224.128C119.154 223.224 119.396 222.118 119.734 220.864C120.085 219.615 120.483 218.205 120.915 216.668C121.33 215.126 121.9 213.489 122.438 211.741C122.967 209.99 123.626 208.176 124.275 206.289C124.908 204.398 125.657 202.476 126.385 200.513C127.098 198.545 127.929 196.583 128.703 194.603C129.497 192.63 130.342 190.678 131.147 188.747C131.997 186.833 132.805 184.94 133.638 183.128C135.285 179.498 136.882 176.139 138.293 173.282C139.7 170.424 140.914 168.063 141.779 166.424C142.213 165.608 142.554 164.967 142.786 164.531C143.024 164.094 143.15 163.862 143.15 163.862L140.483 162.473Z" fill="#202124"/>
                            <path d="M110.185 155.966C110.185 155.966 110.135 156.087 110.036 156.324C109.941 156.563 109.8 156.918 109.616 157.382C109.264 158.302 108.759 159.647 108.183 161.375C107.596 163.101 106.938 165.209 106.248 167.644C105.546 170.075 104.86 172.845 104.159 175.875C103.506 178.915 102.814 182.212 102.272 185.731C101.962 187.485 101.751 189.302 101.481 191.15C101.273 193.007 101.025 194.9 100.864 196.834C100.694 198.767 100.52 200.731 100.428 202.726C100.291 204.718 100.247 206.738 100.194 208.774C100.154 209.79 100.161 210.813 100.167 211.838C100.171 212.863 100.176 213.89 100.179 214.92C100.256 216.979 100.299 219.046 100.426 221.109L100.642 224.201L100.753 225.744L100.915 227.28C101.132 229.327 101.323 231.368 101.64 233.377C101.783 234.383 101.926 235.385 102.068 236.382C102.221 237.378 102.419 238.361 102.591 239.342C102.768 240.322 102.944 241.296 103.119 242.263C103.33 243.222 103.539 244.175 103.746 245.12C103.956 246.064 104.164 247.001 104.369 247.928C104.591 248.852 104.847 249.758 105.079 250.659C105.557 252.457 105.997 254.224 106.552 255.909C106.813 256.755 107.071 257.59 107.326 258.412C107.581 259.234 107.819 260.047 108.114 260.827C108.673 262.397 109.214 263.912 109.733 265.369C110.266 266.819 110.859 268.177 111.378 269.485C111.912 270.788 112.391 272.035 112.938 273.165C113.461 274.306 113.951 275.372 114.404 276.359C114.852 277.347 115.268 278.253 115.695 279.046C117.343 282.247 118.284 284.076 118.284 284.076C118.284 284.076 117.385 282.227 115.812 278.99C115.403 278.188 115.008 277.274 114.583 276.276C114.154 275.281 113.689 274.205 113.193 273.055C112.673 271.916 112.224 270.659 111.721 269.349C111.234 268.032 110.673 266.665 110.175 265.207C109.691 263.746 109.187 262.223 108.665 260.647C108.39 259.863 108.171 259.047 107.936 258.223C107.701 257.399 107.464 256.563 107.222 255.714C106.709 254.027 106.312 252.258 105.877 250.46C105.666 249.559 105.432 248.653 105.233 247.73C105.05 246.804 104.865 245.869 104.678 244.926C104.493 243.983 104.308 243.032 104.12 242.074C103.968 241.11 103.815 240.14 103.661 239.162C103.513 238.185 103.339 237.206 103.21 236.215C103.092 235.222 102.972 234.224 102.853 233.223C102.584 231.224 102.441 229.196 102.272 227.163L102.147 225.638L102.072 224.106L101.927 221.04C101.849 218.995 101.853 216.946 101.824 214.909C101.843 213.89 101.862 212.873 101.882 211.86C101.899 210.846 101.914 209.835 101.977 208.83C102.074 206.819 102.164 204.824 102.345 202.858C102.479 200.89 102.697 198.953 102.907 197.048C103.11 195.143 103.398 193.28 103.644 191.453C103.952 189.635 104.201 187.848 104.547 186.127C105.159 182.67 105.916 179.437 106.626 176.461C107.384 173.495 108.121 170.789 108.864 168.419C109.595 166.046 110.287 163.997 110.898 162.327C111.498 160.654 112.018 159.362 112.375 158.488C112.557 158.06 112.696 157.731 112.79 157.51C112.887 157.288 112.938 157.173 112.938 157.173L110.185 155.966Z" fill="#202124"/>
                            <path d="M88.2712 185.715C88.2712 185.715 87.8487 190.344 82.8754 188.082C77.9011 185.822 75.8344 160.469 78.6732 150.762C85.2516 128.215 103.057 119.184 128.652 121.19L119.769 151.631C110.583 157.603 92.8266 160.553 88.2712 185.715Z" fill="currentColor"/>
                            <path d="M81.2664 152.553C81.4076 151.802 81.5652 151.104 81.7502 150.479C87.9579 129.205 104.758 120.683 128.909 122.577L127.37 127.852C104.471 126.057 88.1895 133.632 81.2664 152.553Z" fill="#202124"/>
                            <path d="M82.8749 188.082L82.7758 188.02L82.7754 188.023C82.9456 187.976 83.1259 187.96 83.2888 187.887L83.5371 187.789L83.7692 187.657C83.922 187.567 84.0636 187.455 84.1942 187.335C84.3265 187.215 84.4441 187.08 84.5532 186.938C84.7665 186.652 84.9372 186.334 85.0676 186.001C85.1965 185.667 85.2947 185.323 85.3444 184.963L85.3434 184.968C85.5964 183.868 85.7992 182.757 86.1096 181.672C86.3783 180.577 86.7237 179.503 87.0615 178.429C87.4392 177.369 87.8059 176.304 88.2585 175.275C88.4682 174.753 88.6938 174.239 88.9434 173.735C89.1877 173.23 89.414 172.716 89.6911 172.228C90.2075 171.231 90.7805 170.268 91.3826 169.324C91.6994 168.862 91.9998 168.39 92.3279 167.937C92.666 167.492 92.9906 167.036 93.3395 166.6C94.0415 165.73 94.7753 164.888 95.5528 164.087C96.3345 163.291 97.1439 162.522 97.9973 161.804C98.4221 161.442 98.849 161.084 99.2952 160.749C99.7308 160.401 100.182 160.072 100.637 159.75C101.542 159.097 102.484 158.496 103.433 157.908C105.345 156.751 107.333 155.717 109.352 154.724C111.371 153.729 113.427 152.79 115.455 151.721C115.964 151.46 116.465 151.174 116.969 150.894L117.716 150.447L117.902 150.336L117.914 150.329C117.95 150.307 117.878 150.351 117.89 150.344L117.913 150.331L117.96 150.306L118.052 150.255L118.423 150.049L121.388 148.405L120.488 146.841L117.575 148.575L117.211 148.791L116.994 148.922L116.821 149.033L116.126 149.478C115.649 149.761 115.178 150.051 114.69 150.321C112.752 151.42 110.724 152.424 108.721 153.489C106.716 154.552 104.723 155.668 102.805 156.91C101.852 157.542 100.907 158.187 99.9996 158.885C99.5429 159.229 99.0915 159.581 98.6549 159.952C98.2082 160.31 97.7808 160.691 97.3568 161.076C96.5043 161.84 95.6975 162.654 94.9222 163.495C94.1508 164.339 93.4253 165.225 92.7358 166.136C92.3926 166.592 92.0756 167.068 91.7448 167.533C91.4239 168.005 91.132 168.496 90.8243 168.976C90.2413 169.955 89.6892 170.953 89.1967 171.979C88.9317 172.483 88.7178 173.011 88.4865 173.53C88.249 174.047 88.0374 174.574 87.8413 175.108C87.4163 176.162 87.0798 177.247 86.7325 178.326C86.4256 179.418 86.1123 180.507 85.8758 181.616C85.5982 182.714 85.4284 183.835 85.2095 184.945L85.2089 184.946L85.2084 184.95C85.1264 185.635 84.8944 186.323 84.4954 186.897C84.3931 187.039 84.2818 187.175 84.1562 187.297C84.0314 187.419 83.8959 187.533 83.7479 187.626L83.5225 187.763L83.2799 187.867C83.1208 187.945 82.942 187.966 82.7734 188.019L82.7689 188.02L82.773 188.022L82.8749 188.082Z" fill="#202124"/>
                            <path d="M149.602 203.619C149.602 203.619 147.47 207.747 152.878 208.517C158.287 209.29 173.668 189.026 176.501 179.318C183.082 156.772 172.932 139.578 150.276 127.501L141.387 157.942C145.918 167.92 159.296 179.957 149.602 203.619Z" fill="currentColor"/>
                            <path d="M173.344 179.431C173.631 178.724 173.873 178.049 174.057 177.424C180.267 156.152 170.689 139.928 149.312 128.533L147.771 133.807C168.038 144.613 177.691 159.759 173.344 179.431Z" fill="#202124"/>
                            <path d="M152.878 208.517L152.993 208.523L152.998 208.524L152.995 208.521C152.881 208.385 152.742 208.272 152.65 208.12L152.501 207.902L152.385 207.665C152.311 207.506 152.258 207.337 152.219 207.167C152.178 206.996 152.158 206.822 152.148 206.647C152.121 205.948 152.295 205.244 152.595 204.621L152.597 204.617L152.597 204.616C153.009 203.563 153.469 202.527 153.825 201.451C154.223 200.39 154.544 199.303 154.873 198.218C155.161 197.122 155.46 196.026 155.669 194.909C155.791 194.354 155.896 193.795 155.974 193.232C156.059 192.67 156.162 192.109 156.21 191.542C156.347 190.412 156.418 189.274 156.453 188.134C156.452 187.564 156.47 186.993 156.453 186.423C156.424 185.853 156.413 185.282 156.369 184.712C156.279 183.573 156.143 182.437 155.948 181.31C155.746 180.184 155.505 179.064 155.197 177.962C155.046 177.409 154.891 176.858 154.707 176.316C154.538 175.769 154.347 175.23 154.148 174.694C153.758 173.617 153.308 172.565 152.845 171.52C151.897 169.44 150.817 167.429 149.699 165.453C148.583 163.479 147.415 161.541 146.372 159.572C146.105 159.082 145.863 158.585 145.615 158.09L145.268 157.341L145.182 157.154L145.069 156.928L144.879 156.549L143.359 153.519L141.759 154.353L143.372 157.334L143.573 157.707L143.655 157.857L143.753 158.052L144.142 158.829C144.416 159.336 144.685 159.847 144.974 160.341C146.11 162.332 147.336 164.23 148.503 166.155C149.671 168.077 150.791 170.019 151.78 172.023C152.264 173.029 152.735 174.043 153.146 175.079C153.356 175.596 153.559 176.116 153.739 176.643C153.934 177.166 154.102 177.697 154.265 178.23C154.598 179.295 154.867 180.378 155.097 181.47C155.322 182.564 155.488 183.668 155.612 184.779C155.671 185.335 155.699 185.893 155.745 186.451C155.778 187.008 155.778 187.568 155.796 188.128C155.796 189.247 155.76 190.368 155.66 191.485C155.63 192.046 155.545 192.601 155.479 193.159C155.419 193.717 155.332 194.272 155.229 194.825C155.056 195.937 154.792 197.03 154.54 198.127C154.247 199.214 153.961 200.305 153.599 201.372C153.277 202.454 152.851 203.5 152.472 204.563L152.475 204.558C152.323 204.889 152.22 205.231 152.149 205.583C152.08 205.933 152.053 206.293 152.078 206.65C152.094 206.829 152.12 207.005 152.167 207.178C152.212 207.35 152.272 207.52 152.352 207.679L152.477 207.915L152.633 208.131C152.73 208.281 152.874 208.391 152.992 208.522L152.993 208.52L152.878 208.517Z" fill="#202124"/>
                            <path d="M108.925 159.993C104.719 143.438 108.268 111.042 115.987 84.6068C128.572 41.4869 155.858 1.80709 173.712 7.02119C191.563 12.2295 193.222 60.3566 180.634 103.477C172.916 129.917 158.48 159.131 146.033 170.828L108.925 159.993Z" fill="#202124"/>
                            <path d="M165.49 141.712C164.734 142.971 163.951 144.216 163.215 145.486C162.477 146.755 161.679 147.98 160.916 149.226C160.53 149.846 160.151 150.468 159.738 151.073L158.526 152.899C158.112 153.5 157.746 154.131 157.329 154.729L156.096 156.531C155.682 157.129 155.281 157.737 154.856 158.326L153.557 160.073C153.119 160.652 152.701 161.246 152.249 161.811L150.877 163.489C150.413 164.041 149.983 164.625 149.484 165.141L148.033 166.73C147.791 166.993 147.564 167.274 147.313 167.527L146.553 168.274L145.038 169.768L146.44 169.432L141.823 168.004C140.286 167.521 138.74 167.068 137.197 166.607L127.933 163.853L118.642 161.193C115.549 160.291 112.433 159.47 109.329 158.606L110.324 159.638L109.854 157.58L109.618 156.55C109.545 156.205 109.501 155.85 109.434 155.502L109.067 153.4C108.926 152.702 108.876 151.985 108.782 151.275L108.528 149.141C108.451 148.428 108.417 147.709 108.36 146.992L108.203 144.839C108.161 144.12 108.151 143.399 108.122 142.678L108.05 140.514C108.023 139.792 108.045 139.069 108.019 138.346L107.977 136.174C107.954 135.449 107.968 134.725 107.976 134C108.001 132.551 107.987 131.097 108.044 129.647C108.103 128.197 108.113 126.74 108.15 125.284L107.97 125.266L107.576 129.61C107.444 131.058 107.382 132.511 107.281 133.962C107.234 134.688 107.183 135.413 107.168 136.141L107.096 138.322C107.078 139.049 107.033 139.775 107.038 140.503L107.039 142.685C107.044 143.412 107.032 144.14 107.05 144.867L107.136 147.048C107.171 147.775 107.181 148.502 107.236 149.228L107.421 151.403C107.493 152.128 107.519 152.857 107.64 153.575L107.944 155.739C107.999 156.099 108.035 156.462 108.106 156.819L108.331 157.89L108.781 160.03L108.798 160.11L108.884 160.136L127.429 165.583L145.992 170.97L146.078 170.995L146.136 170.935L147.679 169.359L148.45 168.571C148.704 168.305 148.931 168.016 149.173 167.739L150.604 166.064C151.096 165.517 151.514 164.91 151.968 164.334L153.304 162.582C153.743 161.995 154.146 161.381 154.569 160.781L155.823 158.972C156.232 158.363 156.616 157.737 157.013 157.12L158.196 155.265C158.593 154.648 158.949 154.006 159.327 153.377L160.447 151.483C160.828 150.856 161.176 150.21 161.53 149.567C162.23 148.278 162.965 147.006 163.635 145.703L165.65 141.794L165.49 141.712Z" fill="currentColor"/>
                            <path d="M152.164 163.889C150.091 166.596 148.037 168.94 146.033 170.828L108.925 159.994C108.245 157.329 107.775 154.244 107.484 150.849L152.164 163.889Z" fill="#202124"/>
                            <path d="M188.095 43.245C187.255 23.0233 181.977 10.0597 173.543 7.59944C168.858 6.23093 163.351 8.0277 157.174 12.9399C152.255 16.8525 147.185 22.5267 142.095 29.8178C145.436 29.6496 154.998 29.5472 166.185 32.8119C177.366 36.0734 185.369 41.3044 188.095 43.245Z" fill="currentColor"/>
                            <path d="M157.549 13.4102C152.973 17.0498 148.075 22.4661 143.297 29.159C147.416 29.0375 156.123 29.248 166.353 32.2342C176.579 35.2169 184.031 39.7244 187.438 42.044C186.456 22.8001 181.378 10.5118 173.374 8.17634C168.888 6.86561 163.564 8.62674 157.549 13.4102ZM156.8 12.4686C162.829 7.67397 168.649 5.54348 173.712 7.02176C183.195 9.78926 188.107 24.6674 188.742 44.471C188.742 44.471 179.927 37.447 166.017 33.3889C152.099 29.3269 140.891 30.5023 140.891 30.5023C146.108 22.878 151.534 16.6571 156.8 12.4686Z" fill="#202124"/>
                            <path d="M155.25 13.7639C161.827 8.06993 168.214 5.41285 173.711 7.02079C179.204 8.62223 183.163 14.2983 185.649 22.6374C185.649 22.6374 179.861 18.9779 170.978 16.3838C162.094 13.7912 155.25 13.7639 155.25 13.7639Z" fill="#202124"/>
                            <path d="M136.366 118.881C133.578 118.811 130.906 119.837 129.727 123.876L113.277 207.305C113.277 207.305 112.25 210.607 115.57 211.578C118.889 212.546 119.8 209.212 119.8 209.212L150.814 130.034C151.85 126.491 150.668 124.284 148.752 122.823" fill="currentColor"/>
                            <path d="M136.366 118.881C135.988 118.868 135.61 118.866 135.231 118.897C135.043 118.918 134.852 118.924 134.665 118.96C134.478 118.992 134.289 119.018 134.105 119.069C133.734 119.153 133.37 119.276 133.022 119.435C132.842 119.504 132.68 119.607 132.51 119.698C132.338 119.785 132.189 119.909 132.028 120.014C131.718 120.243 131.434 120.506 131.173 120.79C130.919 121.08 130.685 121.388 130.484 121.718C130.373 121.877 130.297 122.055 130.202 122.223C130.106 122.391 130.031 122.567 129.955 122.744C129.79 123.093 129.679 123.461 129.55 123.824L129.549 123.827L129.547 123.84C128.076 130.773 126.548 137.694 125.124 144.636L120.804 165.453C119.351 172.389 117.978 179.34 116.561 186.284L112.401 207.131L112.424 207.039C112.331 207.367 112.295 207.598 112.264 207.88C112.233 208.15 112.228 208.425 112.241 208.702C112.257 208.98 112.293 209.261 112.363 209.542C112.436 209.82 112.524 210.104 112.667 210.368C112.79 210.639 112.975 210.884 113.16 211.118C113.364 211.338 113.573 211.552 113.815 211.714C114.045 211.904 114.301 212.016 114.55 212.152C114.802 212.27 115.059 212.348 115.315 212.443L115.707 212.532C115.829 212.554 115.902 212.585 116.066 212.601C116.369 212.628 116.687 212.673 116.972 212.636C117.263 212.63 117.554 212.563 117.844 212.487C118.126 212.389 118.413 212.283 118.664 212.121C118.926 211.976 119.153 211.784 119.364 211.589C119.574 211.39 119.757 211.173 119.92 210.948C120.08 210.721 120.224 210.487 120.343 210.242C120.469 209.989 120.563 209.773 120.661 209.448L120.631 209.538L128.337 189.724C130.878 183.11 133.46 176.511 135.963 169.88L143.518 150.008L145.399 145.037L147.256 140.056L150.97 130.095L150.974 130.084L150.975 130.081L151.185 129.081C151.223 128.915 151.258 128.748 151.26 128.576L151.293 128.065C151.299 127.895 151.324 127.725 151.315 127.555L151.266 127.045C151.248 126.876 151.238 126.705 151.212 126.537L151.079 126.043C151.029 125.881 151.001 125.711 150.933 125.555L150.716 125.094C150.641 124.942 150.583 124.78 150.476 124.647L150.187 124.229C150.008 123.941 149.739 123.726 149.52 123.471C149.409 123.344 149.265 123.252 149.14 123.141L148.751 122.822L149.126 123.158C149.246 123.274 149.385 123.371 149.49 123.503C149.696 123.765 149.952 123.988 150.116 124.281L150.381 124.703C150.48 124.837 150.529 124.999 150.596 125.15L150.787 125.607C150.847 125.761 150.866 125.928 150.908 126.087L151.017 126.569C151.034 126.733 151.036 126.899 151.046 127.063L151.071 127.555C151.073 127.719 151.041 127.884 151.028 128.048L150.976 128.539C150.969 128.704 150.929 128.864 150.887 129.024L150.652 129.986L150.657 129.972L146.617 139.805L144.598 144.722L142.602 149.649L134.65 169.365C131.984 175.931 129.397 182.528 126.769 189.109L118.968 208.885L118.959 208.907L118.938 208.975C118.904 209.084 118.823 209.291 118.742 209.442C118.662 209.606 118.565 209.759 118.464 209.904C118.36 210.045 118.249 210.177 118.128 210.29C118.007 210.4 117.883 210.507 117.745 210.578C117.615 210.667 117.468 210.711 117.324 210.766C117.173 210.8 117.023 210.842 116.857 210.841C116.688 210.868 116.554 210.828 116.403 210.831C116.255 210.818 115.914 210.724 115.821 210.711C115.653 210.642 115.471 210.593 115.312 210.518C115.166 210.432 114.995 210.369 114.878 210.261C114.736 210.173 114.634 210.057 114.524 209.947C114.433 209.823 114.332 209.707 114.271 209.562C114.193 209.428 114.148 209.271 114.105 209.113C114.063 208.953 114.04 208.782 114.029 208.606C114.02 208.43 114.022 208.249 114.042 208.068C114.056 207.897 114.099 207.68 114.129 207.57L114.148 207.5L114.153 207.477L118.217 186.61C119.542 179.648 120.911 172.696 122.199 165.728L126.104 144.829C127.421 137.867 128.635 130.883 129.906 123.911L129.903 123.927C130.017 123.573 130.112 123.212 130.26 122.872C130.327 122.699 130.394 122.525 130.481 122.362C130.568 122.198 130.635 122.023 130.737 121.869C130.92 121.547 131.129 121.241 131.361 120.952C131.6 120.669 131.86 120.404 132.149 120.171C132.3 120.065 132.438 119.937 132.601 119.846C132.761 119.751 132.915 119.644 133.086 119.569C133.418 119.4 133.768 119.263 134.131 119.165C134.31 119.107 134.494 119.073 134.678 119.034C134.861 118.989 135.05 118.975 135.236 118.945C135.609 118.9 135.988 118.884 136.366 118.881Z" fill="#202124"/>
                            <path d="M141.312 123.394C138.61 122.606 134.76 121.41 131.548 121.815C134.37 119.085 138.982 120.555 141.892 121.404C144.8 122.257 149.478 123.496 150.386 127.316C147.896 125.246 144.01 124.184 141.312 123.394Z" fill="#202124"/>
                            <path d="M138.367 58.5032C135.199 69.3847 141.13 80.6949 151.611 83.7628C162.092 86.837 173.156 80.5052 176.322 69.6196C179.49 58.741 173.56 47.4318 163.079 44.3583C152.598 41.2862 141.532 47.6243 138.367 58.5032Z" fill="white"/>
                            <path d="M144.242 60.2227C142.057 67.7342 146.15 75.5408 153.387 77.6604C160.618 79.7782 168.258 75.4124 170.443 67.9001C172.629 60.389 168.535 52.5802 161.302 50.4614C154.067 48.3428 146.43 52.7135 144.242 60.2227Z" fill="#202124"/>
                            <path d="M161.658 51.4717C162.74 51.7912 163.74 52.2561 164.657 52.8214C164.431 52.7421 164.209 52.6491 163.974 52.5804C157.23 50.606 149.999 55.0671 147.825 62.5461C146.706 66.383 147.145 70.2632 148.743 73.405C145.683 70.1452 144.382 65.2982 145.757 60.5698C147.796 53.5715 154.915 49.4975 161.658 51.4717Z" fill="currentColor"/>
                            <path d="M160.488 47.2784C160.218 48.1988 160.72 49.1571 161.608 49.4138C162.494 49.6728 163.427 49.1417 163.694 48.2193C163.963 47.3017 163.465 46.343 162.576 46.0845C161.692 45.8257 160.754 46.3575 160.488 47.2784Z" fill="currentColor"/>
                            <path d="M150.994 79.9036C150.724 80.8231 151.226 81.781 152.112 82.0399C153 82.2983 153.935 81.7636 154.201 80.8445C154.47 79.9256 153.968 78.9661 153.082 78.7058C152.195 78.4472 151.26 78.9844 150.994 79.9036Z" fill="currentColor"/>
                            <path d="M173.542 66.9971C172.654 66.7391 171.716 67.2735 171.451 68.1935C171.184 69.1135 171.684 70.069 172.572 70.3321C173.457 70.5901 174.391 70.0541 174.66 69.1326C174.929 68.2151 174.428 67.2603 173.542 66.9971Z" fill="currentColor"/>
                            <path d="M142.115 57.7932C141.233 57.5343 140.296 58.0687 140.027 58.9863C139.758 59.9089 140.262 60.865 141.146 61.1241C142.032 61.3852 142.966 60.8508 143.234 59.9294C143.504 59.006 143.004 58.0555 142.115 57.7932Z" fill="currentColor"/>
                            <path d="M171.018 54.2726C170.205 54.7394 169.897 55.7959 170.333 56.6289C170.769 57.4617 171.787 57.76 172.602 57.2939C173.418 56.8257 173.724 55.7685 173.288 54.938C172.851 54.1014 171.835 53.8041 171.018 54.2726Z" fill="currentColor"/>
                            <path d="M142.084 70.8319C141.27 71.2959 140.961 72.355 141.398 73.1882C141.835 74.0201 142.853 74.3194 143.668 73.8533C144.486 73.3848 144.791 72.3302 144.356 71.4955C143.918 70.6586 142.901 70.3608 142.084 70.8319Z" fill="currentColor"/>
                            <path d="M166.574 78.0063C166.14 77.1721 165.121 76.8732 164.303 77.3399C163.491 77.8055 163.183 78.8628 163.623 79.6955C164.055 80.5308 165.072 80.8273 165.889 80.3615C166.707 79.8952 167.011 78.8374 166.574 78.0063Z" fill="currentColor"/>
                            <path d="M151.07 48.4278C150.63 47.592 149.613 47.2968 148.797 47.7637C147.984 48.2308 147.678 49.2867 148.112 50.1192C148.551 50.9535 149.567 51.2512 150.383 50.7852C151.199 50.317 151.505 49.2611 151.07 48.4278Z" fill="currentColor"/>
                            <path d="M174.461 119.899C174.884 118.721 175.358 117.565 175.819 116.443C176.541 114.68 177.224 113.016 177.73 111.276C178.082 110.069 178.888 107.258 179.319 105.691C172.735 100.436 162.792 95.9139 148.943 91.8726C135.092 87.8276 124.277 86.2906 115.903 87.1792C115.429 88.7077 114.605 91.4768 114.236 92.7392C113.731 94.4726 113.409 96.2476 113.069 98.1271C112.851 99.3368 112.625 100.582 112.346 101.812C113.59 102.07 114.88 102.334 116.213 102.606C123.944 104.184 133.567 106.149 143.899 109.164C154.432 112.239 163.743 115.801 171.226 118.664C172.336 119.089 173.414 119.501 174.461 119.899Z" fill="currentColor"/>
                            <path d="M116.361 87.7377C115.879 89.3061 115.154 91.7465 114.815 92.9077C114.317 94.6109 113.999 96.3708 113.662 98.2344C113.478 99.2557 113.288 100.302 113.065 101.347C114.123 101.566 115.213 101.788 116.333 102.017C124.076 103.597 133.712 105.564 144.068 108.587C154.624 111.668 163.948 115.236 171.441 118.102C172.351 118.451 173.24 118.791 174.107 119.121C174.478 118.131 174.875 117.162 175.263 116.215C175.98 114.467 176.657 112.817 177.154 111.107C177.479 109.995 178.188 107.519 178.633 105.915C172.111 100.815 162.331 96.4058 148.776 92.4497C135.219 88.4913 124.602 86.9465 116.361 87.7377ZM115.447 86.6254C125.056 85.5103 136.701 87.6711 149.113 91.296C161.523 94.9172 172.504 99.3623 180.004 105.47C179.627 106.868 178.722 110.03 178.309 111.445C177.404 114.559 175.906 117.523 174.825 120.681C166.489 117.525 156.053 113.339 143.732 109.743C131.404 106.144 120.347 104.099 111.62 102.276C112.411 99.0327 112.75 95.6886 113.66 92.571C114.072 91.1604 115.01 88.0096 115.447 86.6254Z" fill="#202124"/>
                            <path d="M173.254 116.773C173.032 117.292 173.343 117.904 173.948 118.146C174.547 118.381 175.217 118.157 175.445 117.641C175.669 117.124 175.359 116.508 174.754 116.268C174.145 116.027 173.474 116.255 173.254 116.773Z" fill="#202124"/>
                            <path d="M169.326 115.264C169.115 115.789 169.436 116.396 170.039 116.627C170.644 116.858 171.312 116.625 171.525 116.104C171.746 115.583 171.427 114.974 170.815 114.741C170.203 114.504 169.54 114.745 169.326 115.264Z" fill="#202124"/>
                            <path d="M165.386 113.808C165.184 114.333 165.512 114.938 166.118 115.162C166.727 115.387 167.386 115.141 167.594 114.62C167.805 114.095 167.475 113.484 166.864 113.261C166.249 113.035 165.588 113.283 165.386 113.808Z" fill="#202124"/>
                            <path d="M161.425 112.397C161.231 112.924 161.57 113.529 162.182 113.744C162.791 113.958 163.446 113.71 163.647 113.182C163.846 112.653 163.509 112.047 162.892 111.831C162.275 111.614 161.619 111.868 161.425 112.397Z" fill="#202124"/>
                            <path d="M157.447 111.036C157.261 111.567 157.611 112.165 158.222 112.371C158.835 112.582 159.486 112.323 159.677 111.794C159.868 111.264 159.523 110.659 158.904 110.45C158.288 110.242 157.633 110.505 157.447 111.036Z" fill="#202124"/>
                            <path d="M153.452 109.725C153.277 110.258 153.63 110.85 154.248 111.05C154.863 111.253 155.506 110.984 155.69 110.452C155.874 109.922 155.52 109.321 154.899 109.121C154.274 108.916 153.629 109.189 153.452 109.725Z" fill="#202124"/>
                            <path d="M149.443 108.461C149.277 108.999 149.638 109.587 150.259 109.78C150.875 109.974 151.517 109.698 151.69 109.164C151.865 108.625 151.5 108.032 150.877 107.839C150.255 107.643 149.61 107.922 149.443 108.461Z" fill="#202124"/>
                            <path d="M145.417 107.246C145.256 107.787 145.631 108.369 146.253 108.555C146.875 108.741 147.507 108.459 147.674 107.921C147.837 107.383 147.464 106.79 146.84 106.607C146.215 106.421 145.575 106.706 145.417 107.246Z" fill="#202124"/>
                            <path d="M141.379 106.082C141.23 106.626 141.614 107.208 142.232 107.386C142.856 107.564 143.488 107.271 143.643 106.727C143.799 106.187 143.416 105.603 142.79 105.425C142.16 105.243 141.53 105.544 141.379 106.082Z" fill="#202124"/>
                            <path d="M137.325 104.969C137.184 105.512 137.571 106.09 138.2 106.26C138.824 106.432 139.45 106.13 139.596 105.587C139.745 105.045 139.355 104.463 138.725 104.289C138.093 104.12 137.466 104.423 137.325 104.969Z" fill="#202124"/>
                            <path d="M133.258 103.904C133.125 104.452 133.527 105.025 134.151 105.187C134.778 105.351 135.396 105.04 135.538 104.492C135.675 103.947 135.277 103.373 134.643 103.207C134.012 103.046 133.391 103.358 133.258 103.904Z" fill="#202124"/>
                            <path d="M129.178 102.891C129.052 103.439 129.462 104.009 130.093 104.16C130.719 104.314 131.335 104 131.465 103.451C131.592 102.904 131.186 102.331 130.552 102.176C129.918 102.02 129.303 102.34 129.178 102.891Z" fill="#202124"/>
                            <path d="M125.088 101.928C124.969 102.476 125.388 103.042 126.017 103.186C126.651 103.335 127.259 103.012 127.378 102.458C127.499 101.908 127.083 101.344 126.444 101.192C125.811 101.044 125.198 101.372 125.088 101.928Z" fill="#202124"/>
                            <path d="M120.98 101.012C120.876 101.566 121.301 102.125 121.938 102.264C122.567 102.402 123.171 102.072 123.281 101.517C123.393 100.967 122.97 100.403 122.328 100.262C121.691 100.119 121.087 100.459 120.98 101.012Z" fill="#202124"/>
                            <path d="M116.869 100.15C116.769 100.704 117.203 101.257 117.841 101.391C118.473 101.518 119.07 101.18 119.175 100.629C119.275 100.073 118.842 99.5174 118.2 99.3783C117.56 99.2496 116.964 99.5944 116.869 100.15Z" fill="#202124"/>
                            <path d="M112.743 99.3354C112.654 99.895 113.097 100.445 113.733 100.566C114.367 100.688 114.96 100.342 115.053 99.7841C115.147 99.2281 114.705 98.6793 114.063 98.551C113.421 98.4281 112.83 98.7781 112.743 99.3354Z" fill="#202124"/>
                            <path d="M184.216 23.5232C184.032 23.8498 184.196 24.2688 184.584 24.4658C184.968 24.6586 185.431 24.5569 185.625 24.2369C185.82 23.9145 185.658 23.4915 185.263 23.2898C184.871 23.0901 184.403 23.2016 184.216 23.5232Z" fill="#202124"/>
                            <path d="M181.665 22.322C181.496 22.655 181.681 23.0695 182.071 23.2505C182.459 23.4305 182.922 23.3137 183.1 22.9842C183.276 22.6555 183.101 22.2352 182.7 22.0525C182.296 21.8635 181.833 21.9858 181.665 22.322Z" fill="#202124"/>
                            <path d="M179.068 21.1998C178.914 21.5415 179.116 21.9464 179.513 22.1187C179.91 22.2877 180.363 22.1536 180.529 21.8189C180.692 21.4796 180.494 21.0688 180.087 20.8943C179.678 20.7167 179.219 20.8571 179.068 21.1998Z" fill="#202124"/>
                            <path d="M176.432 20.1652C176.291 20.5134 176.508 20.9132 176.912 21.0692C177.317 21.2237 177.764 21.0773 177.911 20.7315C178.059 20.3918 177.847 19.9849 177.431 19.8241C177.02 19.6637 176.569 19.8187 176.432 20.1652Z" fill="#202124"/>
                            <path d="M173.758 19.2167C173.635 19.5704 173.867 19.9625 174.276 20.1059C174.686 20.2485 175.126 20.0872 175.257 19.7353C175.394 19.3878 175.16 18.9844 174.744 18.8398C174.322 18.6919 173.878 18.864 173.758 19.2167Z" fill="#202124"/>
                            <path d="M171.053 18.3559C170.944 18.7121 171.197 19.1022 171.611 19.2312C172.027 19.3599 172.456 19.1811 172.573 18.8289C172.691 18.4746 172.441 18.0772 172.017 17.944C171.594 17.8144 171.163 17.9999 171.053 18.3559Z" fill="#202124"/>
                            <path d="M168.324 17.5875C168.23 17.9467 168.495 18.3296 168.913 18.4432C169.333 18.5578 169.756 18.3655 169.855 18.0048C169.958 17.6466 169.693 17.2582 169.263 17.138C168.836 17.0255 168.41 17.224 168.324 17.5875Z" fill="#202124"/>
                            <path d="M165.569 16.9067C165.492 17.2724 165.772 17.6447 166.195 17.7447C166.616 17.8471 167.028 17.6372 167.112 17.2774C167.197 16.9128 166.919 16.5323 166.488 16.4322C166.052 16.3265 165.642 16.5416 165.569 16.9067Z" fill="#202124"/>
                            <path d="M162.793 16.322C162.734 16.6873 163.031 17.0542 163.455 17.1386C163.882 17.2266 164.279 17.0027 164.349 16.6386C164.418 16.2728 164.123 15.9 163.688 15.8081C163.255 15.7232 162.853 15.9509 162.793 16.322Z" fill="#202124"/>
                            <path d="M160.007 15.8283C159.964 16.1963 160.276 16.5542 160.7 16.6257C161.126 16.6978 161.517 16.4619 161.569 16.0903C161.624 15.7233 161.312 15.3586 160.875 15.283C160.439 15.2115 160.048 15.4546 160.007 15.8283Z" fill="#202124"/>
                            <path d="M157.208 15.4292C157.181 15.8007 157.507 16.1473 157.936 16.207C158.362 16.2633 158.742 16.0129 158.778 15.639C158.813 15.2671 158.489 14.9139 158.049 14.8543C157.612 14.795 157.236 15.0553 157.208 15.4292Z" fill="#202124"/>
                            <path d="M154.406 15.1242C154.397 15.4999 154.737 15.8353 155.167 15.88C155.592 15.9217 155.955 15.6579 155.974 15.2816C155.996 14.9056 155.661 14.5674 155.22 14.5206C154.78 14.4764 154.415 14.7469 154.406 15.1242Z" fill="#202124"/>
                            <path d="M185.836 35.778C185.588 36.2125 185.811 36.7743 186.324 37.0335C186.842 37.2929 187.463 37.1565 187.721 36.7283C187.981 36.2974 187.767 35.7288 187.238 35.46C186.712 35.1959 186.084 35.3405 185.836 35.778Z" fill="#202124"/>
                            <path d="M182.417 34.1621C182.189 34.61 182.436 35.1647 182.962 35.407C183.484 35.6485 184.099 35.4934 184.338 35.0536C184.583 34.6127 184.343 34.0516 183.804 33.8035C183.266 33.5504 182.644 33.7162 182.417 34.1621Z" fill="#202124"/>
                            <path d="M178.943 32.6634C178.736 33.1162 179.003 33.6643 179.534 33.8917C180.069 34.1159 180.675 33.9367 180.897 33.4906C181.116 33.0383 180.852 32.4825 180.305 32.2498C179.756 32.0164 179.147 32.2055 178.943 32.6634Z" fill="#202124"/>
                            <path d="M175.41 31.2748C175.224 31.7408 175.514 32.2764 176.055 32.4858C176.597 32.6936 177.195 32.4959 177.392 32.0351C177.595 31.5791 177.306 31.0312 176.751 30.8182C176.195 30.6032 175.594 30.81 175.41 31.2748Z" fill="#202124"/>
                            <path d="M171.831 30.007C171.666 30.4761 171.979 31.0076 172.528 31.1981C173.077 31.3861 173.667 31.1704 173.841 30.7014C174.018 30.2357 173.712 29.694 173.15 29.4989C172.587 29.3059 171.997 29.5331 171.831 30.007Z" fill="#202124"/>
                            <path d="M168.21 28.854C168.067 29.3329 168.401 29.8539 168.956 30.0259C169.513 30.1973 170.087 29.9571 170.244 29.4844C170.401 29.0126 170.067 28.481 169.502 28.3044C168.929 28.1235 168.353 28.3755 168.21 28.854Z" fill="#202124"/>
                            <path d="M164.552 27.821C164.433 28.308 164.786 28.8174 165.346 28.9707C165.91 29.1262 166.469 28.8646 166.606 28.3853C166.741 27.9054 166.388 27.3849 165.813 27.2273C165.239 27.0693 164.673 27.3409 164.552 27.821Z" fill="#202124"/>
                            <path d="M160.862 26.9114C160.762 27.403 161.138 27.9009 161.703 28.0364C162.268 28.1685 162.821 27.8942 162.931 27.4068C163.046 26.9224 162.674 26.4103 162.092 26.2729C161.513 26.1341 160.963 26.4251 160.862 26.9114Z" fill="#202124"/>
                            <path d="M157.15 26.1296C157.071 26.6218 157.469 27.1103 158.035 27.2223C158.604 27.3446 159.139 27.0439 159.233 26.5524C159.327 26.0597 158.929 25.5631 158.347 25.4449C157.765 25.3264 157.232 25.6359 157.15 26.1296Z" fill="#202124"/>
                            <path d="M153.418 25.4667C153.359 25.9639 153.777 26.4422 154.347 26.5379C154.92 26.635 155.439 26.3174 155.508 25.8215C155.582 25.3269 155.166 24.8398 154.58 24.7426C153.996 24.6418 153.474 24.9705 153.418 25.4667Z" fill="#202124"/>
                            <path d="M149.674 24.9368C149.634 25.434 150.07 25.8972 150.644 25.9729C151.216 26.0518 151.722 25.7174 151.772 25.2188C151.82 24.7208 151.387 24.2493 150.797 24.1685C150.212 24.0851 149.704 24.4308 149.674 24.9368Z" fill="#202124"/>
                            <path d="M145.922 24.5273C145.907 25.0285 146.36 25.4782 146.932 25.5363C147.506 25.5931 147.992 25.2389 148.022 24.738C148.048 24.2371 147.595 23.7788 147.008 23.7191C146.419 23.658 145.932 24.0232 145.922 24.5273Z" fill="#202124"/>
                            <path d="M117.506 200.941C117.506 200.941 116.845 203.144 117.939 203.461C119.031 203.78 119.656 201.57 119.656 201.57L137.82 148.274C139.194 143.567 136.931 143.066 135.674 142.696C134.416 142.333 132.24 141.539 130.869 146.244L117.506 200.941Z" fill="#202124"/>
                            <path d="M112.392 177.829C112.392 177.829 112.278 178.099 112.063 178.607C111.843 179.115 111.577 179.877 111.219 180.842C110.887 181.815 110.464 182.995 110.075 184.373C109.66 185.746 109.241 187.308 108.829 189.024C108.406 190.738 108.028 192.612 107.648 194.599C107.309 196.591 106.93 198.693 106.704 200.888C106.589 201.985 106.473 203.1 106.356 204.229C106.283 205.362 106.209 206.508 106.135 207.663C105.957 209.972 105.951 212.325 105.871 214.673C105.816 215.847 105.849 217.022 105.856 218.192C105.866 219.362 105.876 220.526 105.887 221.682C105.943 223.992 106.1 226.263 106.198 228.46C106.23 229.56 106.379 230.634 106.463 231.689C106.565 232.743 106.663 233.774 106.759 234.777C106.917 236.787 107.258 238.665 107.492 240.407C107.618 241.276 107.739 242.109 107.854 242.903C107.911 243.299 107.967 243.685 108.021 244.06C108.093 244.432 108.162 244.794 108.229 245.145C108.501 246.546 108.738 247.768 108.933 248.774C109.323 250.785 109.546 251.933 109.546 251.933L109.723 251.898C109.723 251.898 109.545 250.743 109.233 248.72C109.077 247.71 108.888 246.483 108.671 245.076C108.618 244.724 108.562 244.361 108.506 243.988C108.466 243.612 108.425 243.225 108.384 242.828C108.299 242.034 108.211 241.2 108.12 240.329C107.954 238.586 107.686 236.707 107.606 234.701C107.506 232.698 107.308 230.592 107.243 228.408C107.209 226.222 107.119 223.964 107.129 221.671C107.152 220.525 107.175 219.369 107.198 218.209C107.226 217.049 107.224 215.884 107.313 214.722C107.476 212.399 107.544 210.071 107.821 207.795C107.933 206.655 108.045 205.525 108.156 204.408C108.296 203.296 108.434 202.196 108.57 201.114C108.789 198.945 109.132 196.867 109.37 194.881C109.496 193.89 109.672 192.934 109.813 192.004C109.954 191.074 110.077 190.172 110.242 189.316C110.391 188.455 110.534 187.631 110.671 186.847C110.822 186.065 110.964 185.323 111.099 184.627C111.225 183.927 111.355 183.275 111.49 182.676C111.613 182.073 111.726 181.519 111.828 181.018C112.274 179.025 112.562 177.889 112.562 177.889L112.392 177.829Z" fill="#202124"/>
                        </svg>
                            
                    </figure>
                </div>

                <!-- Content -->
                <div class="col-lg-6 ms-auto">
                    <!-- Title and content -->
                    <h2 class="mb-lg-4">Choose us for your digital journey</h2>
                    <p class="mb-lg-4">Our commitment to excellence, expertise in cutting-edge technologies, and dedication to client.</p>
                    <a href="portfolio-list.html" class="btn btn-dark mb-0">Explore our projects</a>
                    <hr class="my-4 my-lg-5"> <!-- Divider -->

                    <!-- List -->
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-group list-group-borderless">
                                <li class="list-group-item heading-color fw-normal d-flex mb-0"><i class="bi bi-patch-check text-primary me-2"></i>Tailored Solutions</li>
                                <li class="list-group-item heading-color fw-normal d-flex mb-0"><i class="bi bi-patch-check text-primary me-2"></i>Client-Centric Approach</li>
                                <li class="list-group-item heading-color fw-normal d-flex mb-0"><i class="bi bi-patch-check text-primary me-2"></i>Proven Track Record</li>
                                <li class="list-group-item heading-color fw-normal d-flex mb-0"><i class="bi bi-patch-check text-primary me-2"></i>Scalability</li>
                            </ul>
                        </div>

                        <div class="col-sm-6">
                            <ul class="list-group list-group-borderless">
                                <li class="list-group-item heading-color fw-normal d-flex mb-0"><i class="bi bi-patch-check text-primary me-2"></i>Quality Assurance</li>
                                <li class="list-group-item heading-color fw-normal d-flex mb-0"><i class="bi bi-patch-check text-primary me-2"></i>Cost-Effectiveness</li>
                                <li class="list-group-item heading-color fw-normal d-flex mb-0"><i class="bi bi-patch-check text-primary me-2"></i>Long-Term Partnership</li>
                                <li class="list-group-item heading-color fw-normal d-flex mb-0"><i class="bi bi-patch-check text-primary me-2"></i>24/7 tech & business support</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Why us END -->

    <!-- =======================
    Work START -->
    <section>
        <div class="container">
            <!-- Title -->
            <div class="inner-container-small text-center mb-4 mb-md-6">
                <h2>How it works in <span class="text-primary">4</span> easy steps</h2>
            </div>

            <div class="row step-process">
                <!-- Step item -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-body bg-transparent text-center">
                        <!-- Icon -->
                        <div class="icon-lg bg-dark text-white rounded-circle mb-3 mx-auto">
                            <i class="bi bi-search fa-lg"></i>
                        </div>
                        <h5>Discovery and Consultation</h5>
                        <p>We begin by getting to know your unique requirements, goals, and challenges. </p>
                    </div>
                </div>

                <!-- Step item -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-body bg-transparent text-center">
                        <!-- Icon -->
                        <div class="icon-lg bg-dark text-white rounded-circle mb-3 mx-auto">
                            <i class="bi bi-bullseye fa-lg"></i>
                        </div>
                        <h5>Planning and Strategy</h5>
                        <p>We define project milestones and deliverables to keep the process on track.</p>
                    </div>
                </div>

                <!-- Step item -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-body bg-transparent text-center">
                        <!-- Icon -->
                        <div class="icon-lg bg-dark text-white rounded-circle mb-3 mx-auto">
                            <i class="bi bi-rocket-takeoff fa-lg"></i>
                        </div>
                        <h5>Deployment and Launch</h5>
                        <p>We ensure a smooth transition to the live, providing support every step of the way.</p>
                    </div>
                </div>

                <!-- Step item -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-body bg-transparent text-center">
                        <!-- Icon -->
                        <div class="icon-lg bg-dark text-white rounded-circle mb-3 mx-auto">
                            <i class="bi bi-headset fa-lg"></i>
                        </div>
                        <h5>Support and Maintenance</h5>
                        <p>We offer ongoing support and maintenance services to keep your software running.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- =======================
    Work END -->

    <!-- =======================
    Video START -->
    <section class="bg-parallax position-relative h-400px h-xl-750px" data-jarallax-video="https://www.youtube.com/watch?v=O41Nm6l0sbY">
        <div class="bg-overlay bg-dark opacity-3"></div>
    </section> 
    <!-- =======================
    Video END -->

    <!-- =======================
    Latest projects START -->
    <section class="pb-0">
        <div class="container">
            <!-- Title -->
            <div class="row align-items-center g-4 mb-4 mb-sm-5">
                <div class="col-md-6 col-lg-5">
                    <h2 class="mb-0">Our latest projects</h2>
                </div>
                <div class="col-md-6 col-lg-4 ms-auto text-md-end">
                    <a href="portfolio-showcase.html" class="btn btn-lg btn-dark mb-0">View all projects</a>
                </div>
            </div>

            <!-- Projects START -->
            <div class="row g-4 g-md-5">
                <div class="col-lg-6">
                    <div class="card bg-light p-3 p-sm-4 card-img-scale overflow-hidden">
                        <div class="card-img-scale-wrapper rounded-3">
                            <!-- Card Image -->              
                            <img src="assets/images/portfolio/list/02.jpg" class="img-scale" alt="portfolio-img">
                        </div>
                        <!-- Card body -->
                        <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                            <div class="me-3">
                                <h5 class="mb-0"><a href="portfolio-case-studies-v2.html" class="heading-color stretched-link">Website optimization for techWave</a></h5>
                                <small>Graphic design</small>
                            </div>
                            <a href="#" class="btn btn-round btn-dark flex-shrink-0"><i class="bi bi-arrow-up-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card bg-light p-3 p-sm-4 card-img-scale overflow-hidden">
                        <div class="card-img-scale-wrapper rounded-3">
                            <!-- Card Image -->              
                            <img src="assets/images/portfolio/list/03.jpg" class="img-scale" alt="portfolio-img">
                        </div>
                        <!-- Card body -->
                        <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                            <div class="me-3">
                                <h5 class="mb-0"><a href="portfolio-case-studies-v2.html" class="heading-color stretched-link">Transforming ideas into reality</a></h5>
                            <small>UI/UX design</small>
                            </div>
                            <a href="#" class="btn btn-round btn-dark flex-shrink-0"><i class="bi bi-arrow-up-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Projects END -->
        </div>
    </section>
    <!-- =======================
    Latest projects END -->

    <!-- =======================
    Counter START -->
    <section class="pb-0">
        <div class="container">
            <div class="row g-4 g-lg-5 justify-content-center">
                <!-- Counter item -->
                <div class="col-sm-6 col-md-4 text-center">
                    <div class="display-1 heading-color d-flex justify-content-center">
                        <span class="text-primary">></span>
                        <span class="purecounter" data-purecounter-start="0" data-purecounter-end="30"  data-purecounter-delay="300">0</span>
                        <span class="mb-0">K</span>
                    </div>
                    <h6 class="text-body fw-normal position-relative">Worldwide client</h6>
                </div>

                <!-- Counter item -->
                <div class="col-sm-6 col-md-4 text-center">
                    <div class="display-1 heading-color d-flex justify-content-center">
                        <span class="purecounter" data-purecounter-start="0" data-purecounter-end="99"  data-purecounter-delay="300">0</span>
                        <span class="text-primary">%</span>
                    </div>
                    <h6 class="text-body fw-normal position-relative">Analyze business reports</h6>
                </div>

                <!-- Counter item -->
                <div class="col-sm-6 col-md-4 text-center">
                    <div class="display-1 heading-color d-flex justify-content-center">
                        <span class="purecounter" data-purecounter-start="0" data-purecounter-end="350" data-purecounter-delay="300">0</span>
                        <span class="text-primary">+</span>
                    </div>
                    <h6 class="text-body fw-normal position-relative">Worldwide projects</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Counter END -->

    <!-- =======================
    Testimonials START -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Title and content -->
                <div class="col-lg-4">
                    <!-- Avatar Slider START -->
                    <div class="avatar avatar-xl mb-md-4">
                        <div class="swiper swiper-img-scale overflow-hidden" data-swiper-options='{
                            "effect": "fade",
                            "autoplay":{
                                "delay": 1500, 
                                "disableOnInteraction": false
                            }}'>
                            <div class="swiper-wrapper">
                                <!-- Slider item -->
                                <div class="swiper-slide">
                                    <img class="avatar-img rounded-circle border border-2 border-white" src="assets/images/avatar/09.jpg" alt="avatar">
                                </div>

                                <!-- Slider item -->
                                <div class="swiper-slide">
                                        <img class="avatar-img rounded-circle border border-2 border-white" src="assets/images/avatar/01.jpg" alt="avatar">
                                </div>

                                <!-- Slider item -->
                                <div class="swiper-slide">
                                        <img class="avatar-img rounded-circle border border-2 border-white" src="assets/images/avatar/10.jpg" alt="avatar">
                                </div>

                                <!-- Slider item -->
                                <div class="swiper-slide">
                                        <img class="avatar-img rounded-circle border border-2 border-white" src="assets/images/avatar/05.jpg" alt="avatar">
                                </div>
                            </div>
                        </div>
                    </div>  
                    <!-- Avatar Slider END -->

                    <h2 class="mb-lg-4">Hear from our satisfied clients ❤️</h2>
                    <p class="mb-5">Read what our satisfied clients have to say about their experiences with our platform.</p>
                </div>

                <div class="col-lg-7 d-flex flex-column ms-auto">
                    <!-- Tab content START -->
                    <div class="tab-content mb-lg-3" id="pills-tabContent">
                        <!-- Tab content -->
                        <div class="tab-pane fade" id="testi-one" role="tabpanel" aria-labelledby="testi-one-tab" tabindex="0">
                            <!-- Icon -->
                            <div class="icon-lg bg-dark text-white rounded-circle mb-3 mb-lg-4"><i class="bi bi-quote fa-xl"></i></div>
                            <!-- Rating -->
                            <ul class="list-inline mb-3 mb-lg-4">
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                            </ul>
                            <h6 class="mb-2">"Transformed My Agency's Results"</h6>
                            <p class="heading-color">As an employer, the platform exceeded my expectations. We swiftly found top-tier talent for our company, thanks to the user-friendly interface and the ability to connect with candidates that perfectly fit our requirements.</p>
                        </div>

                        <!-- Tab content -->
                        <div class="tab-pane fade show active" id="testi-two" role="tabpanel" aria-labelledby="testi-two-tab" tabindex="0">
                            <!-- Icon -->
                            <div class="icon-lg bg-dark text-white rounded-circle mb-3 mb-lg-4"><i class="bi bi-quote fa-xl"></i></div>
                            <!-- Rating -->
                            <ul class="list-inline mb-3 mb-lg-4">
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                            </ul>
                            <h6 class="mb-2">"Transformed My Agency's Results"</h6>
                            <p class="heading-color">As an employer, the platform exceeded my expectations. We swiftly found top-tier talent for our company, thanks to the user-friendly interface and the ability to connect with candidates that perfectly fit our requirements.</p>
                        </div>

                        <!-- Tab content -->
                        <div class="tab-pane fade" id="testi-three" role="tabpanel" aria-labelledby="testi-three-tab" tabindex="0">
                            <!-- Icon -->
                            <div class="icon-lg bg-dark text-white rounded-circle mb-3 mb-lg-4"><i class="bi bi-quote fa-xl"></i></div>
                            <!-- Rating -->
                            <ul class="list-inline mb-3 mb-lg-4">
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                            </ul>
                            <h6 class="mb-2">"Transformed My Agency's Results"</h6>
                            <p class="heading-color">As an employer, the platform exceeded my expectations. We swiftly found top-tier talent for our company, thanks to the user-friendly interface and the ability to connect with candidates that perfectly fit our requirements.</p>
                        </div>
                    </div>
                    <!-- Tab content END -->

                    <!-- Tab START -->
                    <div class="nav nav-pills nav-pills-testimonial nav-justified mb-4 mb-lg-0" id="pills-tab" role="tablist">
                        <!-- Tab item -->
                        <div class="nav-item" role="presentation">
                            <div class="nav-link d-flex align-items-center text-start p-3" id="testi-one-tab" data-bs-toggle="pill" data-bs-target="#testi-one" role="tab" aria-controls="testi-one" aria-selected="true">
                                <!-- Avatar -->
                                <div class="avatar flex-shrink-0">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
                                </div>
                                <!-- Info -->
                                <div class="ms-2">
                                    <h6 class="mb-0">Louis Ferguson</h6>
                                    <p class="mb-0 small">Web Developer</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tab item -->
                        <div class="nav-item" role="presentation">
                            <div class="nav-link d-flex align-items-center text-start p-3 active" id="testi-two-tab" data-bs-toggle="pill" data-bs-target="#testi-two" role="tab" aria-controls="testi-two" aria-selected="false">
                                <!-- Avatar -->
                                <div class="avatar flex-shrink-0">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
                                </div>
                                <!-- Info -->
                                <div class="ms-2">
                                    <h6 class="mb-0">Emma Watson</h6>
                                    <p class="mb-0 small">Co-Founder</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tab item -->
                        <div class="nav-item" role="presentation">
                            <div class="nav-link d-flex align-items-center text-start p-3" id="testi-three-tab" data-bs-toggle="pill" data-bs-target="#testi-three" role="tab" aria-controls="testi-three" aria-selected="false">
                                <!-- Avatar -->
                                <div class="avatar flex-shrink-0">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                                </div>
                                <!-- Info -->
                                <div class="ms-2">
                                    <h6 class="mb-0">Samuel Bishop</h6>
                                    <p class="mb-0 small">Product designer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tab END -->
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Testimonials END -->

    <!-- =======================
    CTA START -->
    <section class="position-relative z-index-2 pt-0">
        <div class="container position-relative">
            <div class="bg-dark rounded position-relative overflow-hidden p-4 p-sm-6"style="background:url(assets/images/bg/15.jpg) no-repeat; background-size:cover; background-position:center;">
                <div class="row align-items-center position-relative">
                    <!-- Title and content -->
                    <div class="col-md-6 col-xl-7 mb-4 mb-xl-0">
                        <h2 class="text-white">Subscribe to our newsletter</h2>
                        <p class="text-white mb-0">We've always worked very hard to give our customers the best experience.</p>
                    </div>
        
                    <!-- Input -->
                    <form class="col-md-6 col-xl-4 ms-xl-auto">
                        <input class="form-control mb-3" type="email" placeholder="Enter your email address">
                        <a href="#" class="btn btn-primary mb-0 d-grid">Subscribe now!</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    CTA END -->

    <!-- =======================
    Blog START -->
    <section class="pt-0">
        <div class="container">

            <!-- Title -->
            <div class="inner-container-small text-center mb-4 mb-sm-5">
                <h2 class="mb-0">Explore our latest blogs</h2>
            </div>

            <!-- Slider START -->
            <div class="swiper" data-swiper-options='{
                "loop": false,
                "spaceBetween": 30,
                "pagination":{
                    "el":".swiper-pagination"
                },
                "breakpoints": {
                    "576": {"slidesPerView": 1}, 
                    "768": {"slidesPerView": 2}, 
                    "992": {"slidesPerView": 3}
                }}'>

                <!-- Slider items -->
                <div class="swiper-wrapper">
                    <!-- Blog item -->
                    <div class="swiper-slide">
                        <article class="card card-img-scale border p-2 h-100">
                            <!-- Card image and badge -->
                            <div class="card-img-scale-wrapper position-relative rounded overflow-hidden">
                                <img src="assets/images/blog/4by3/03.jpg" class="card-img img-scale" alt="service image">
                                <!-- Badge -->
                                <div class="badge text-bg-dark position-absolute top-0 start-0 m-3">Technology</div>
                            </div>

                            <!-- Card body -->
                            <div class="card-body d-flex flex-column px-2">
                                <div class="small mb-3"><i class="bi bi-calendar me-1"></i>April 15, 2024</div>
                                <h6 class="card-title mb-3"><a href="blog-single-v2.html" class="stretched-link">Sleek and Responsive - Designing with Bootstrap and Mizzle</a></h6>
                                <!-- Author info and button -->
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <!-- Author -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xs flex-shrink-0 me-2">
                                            <img class="avatar-img rounded" src="assets/images/avatar/02.jpg" alt="avatar">
                                        </div>
                                        <p class="mb-0">By Emma Watson</p>
                                    </div>
                                    <!-- Button -->
                                    <a href="#" class="btn btn-round btn-dark flex-shrink-0"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Blog item -->
                    <div class="swiper-slide">
                        <article class="card card-img-scale border p-2 h-100">
                            <!-- Card image and badge -->
                            <div class="card-img-scale-wrapper position-relative rounded overflow-hidden">
                                <img src="assets/images/blog/4by3/08.jpg" class="card-img img-scale" alt="service image">
                                <!-- Badge -->
                                <div class="badge text-bg-dark position-absolute top-0 start-0 m-3">Research</div>
                            </div>

                            <!-- Card body -->
                            <div class="card-body d-flex flex-column px-2">
                                <div class="small mb-3"><i class="bi bi-calendar me-1"></i>April 12, 2024</div>
                                <h6 class="card-title mb-3"><a href="blog-single-v2.html" class="stretched-link">Mastering HTML Website Templates - Unleash Your Creativity with Bootstrap</a></h6>
                                <!-- Author info and button -->
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <!-- Author -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xs flex-shrink-0 me-2">
                                            <img class="avatar-img rounded" src="assets/images/avatar/04.jpg" alt="avatar">
                                        </div>
                                        <p class="mb-0">By Louis Ferguson</p>
                                    </div>
                                    <!-- Button -->
                                    <a href="#" class="btn btn-round btn-dark flex-shrink-0"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Blog item -->
                    <div class="swiper-slide">
                        <article class="card card-img-scale border p-2 h-100">
                            <!-- Card image and badge -->
                            <div class="card-img-scale-wrapper position-relative rounded overflow-hidden">
                                <img src="assets/images/blog/4by3/07.jpg" class="card-img img-scale" alt="service image">
                                <!-- Badge -->
                                <div class="badge text-bg-dark position-absolute top-0 start-0 m-3">Design</div>
                            </div>

                            <!-- Card body -->
                            <div class="card-body d-flex flex-column px-2">
                                <div class="small mb-3"><i class="bi bi-calendar me-1"></i>April 08, 2024</div>
                                <h6 class="card-title mb-3"><a href="blog-single-v2.html" class="stretched-link">Effortless Web Design with Mizzle - Unlock Your Creative Potential</a></h6>
                                <!-- Author info and button -->
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <!-- Author -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xs flex-shrink-0 me-2">
                                            <img class="avatar-img rounded" src="assets/images/avatar/09.jpg" alt="avatar">
                                        </div>
                                        <p class="mb-0">By Allen Smith</p>
                                    </div>
                                    <!-- Button -->
                                    <a href="#" class="btn btn-round btn-dark flex-shrink-0"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <!-- Slider Pagination -->
                <div class="swiper-pagination swiper-pagination-primary position-relative mt-4"></div>
            </div>
        </div>
    </section>
    <!-- =======================
    Blog END -->

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

    <script type="text/javascript" src="<?= PROOT; ?>dist/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/bootstrap.min.js"></script>

    <script src="<?= PROOT; ?>dist/js/purecounter_vanilla.js"></script>
    <script src="<?= PROOT; ?>dist/js/swiper-bundle.min.js"></script>
    <script src="<?= PROOT; ?>dist/js/jarallax.min.js"></script>
    <script src="<?= PROOT; ?>dist/js/jarallax-video.min.js"></script>

    <script src="<?= PROOT; ?>dist/js/functions.js"></script>

</body>
</html>