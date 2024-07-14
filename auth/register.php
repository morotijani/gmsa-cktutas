<?php
    // REGITER PAGE

    require_once ("./../db_connection/conn.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register - GMSA CKTUTAS</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="gmsacktutas.com">
    <meta name="description" content="">

    <!-- Dark mode -->
    <script src="<?= PROOT; ?>dist/js/dark-mode.js"></script>

    <link rel="shortcut icon" href="<?= PROOT; ?>assets/media/logo/logo-1.jpeg">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/swiper-bundle.min.css">
    
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/gmsa.css">
    <link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/main.css">
    
    <style type="text/css">
    *, body {
        font-family: "Montserrat" !important;
        font-optical-sizing: auto;
        /*      font-weight: <weight>;*/
            font-style: normal;
        }
    </style>
    
</head>
<body>
<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
            id="bd-theme"
            type="button"
            aria-expanded="false"
            data-bs-toggle="dropdown"
            aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
                        Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                </button>
            </li>
        </ul>
    </div>

    <main>
        <center>
            <img src="<?= PROOT; ?>assets/media/logo/logo-1.jpeg" class="bi mt-1 rounded-3" width="60" height="60" />
        </center>

        <section class="pt-1">
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
                        Register, your account details to join GMSA - CKTUTAS
                    </h1>
                </div>

                <form class="col-md-10 mx-auto p-2 mt-4 mt-md-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <div id="step-1">
                                <h4 class="mb-3 fw-light">Personal Details</h4>
                                <div class="row g-3">
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="">
                                            <label for="firstname">First name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="middlename" name="middlename" placeholder="">
                                            <label for="middlename">Middle name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="">
                                            <label for="lastname">Last name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="lastname" name="lastname" placeholder="name@example.com">
                                            <label for="lastname">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="tel" class="form-control" id="lastname" name="lastname" placeholder="">
                                            <label for="lastname">Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <select type="email" class="form-select" id="lastname" name="lastname">
                                                <option selected>Open this menu</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                            <label for="lastname">Gender</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="lastname" name="lastname" placeholder="">
                                            <label for="lastname">Date of Birth</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="">
                                            <label for="lastname">Region</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="">
                                            <label for="lastname">City</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="">
                                            <label for="lastname">Digital Address (optional)</label>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-primary-soft icon-link icon-link-hover mb-0" id="next-1">Next <i class="bi bi-arrow-right"></i></button>
                            </div>

                            <div id="step-2">
                                <div class="row g-3">
                                    <h4 class="mb-3 fw-light">School Details</h4>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="">
                                        <label for="firstname">Student ID</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="lastname" name="lastname" placeholder="name@example.com">
                                            <label for="lastname">Course</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="tel" class="form-control" id="lastname" name="lastname" placeholder="">
                                            <label for="lastname">Department</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <select type="tel" class="form-select" id="lastname" name="lastname">
                                                <option selected>Open this select menu</option>
                                                <option>Undergraduate</option>
                                                <option>Postgraduate</option>
                                            </select>
                                            <label for="floatingSelect">Admission type</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="tel" class="form-control" id="lastname" name="lastname" placeholder="">
                                            <label for="lastname">Admission year</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="lastname" name="lastname" placeholder="name@example.com">
                                            <label for="lastname">Level</label>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-dark-soft icon-link icon-link-hover mb-0" id="prev-1">Back <i class="bi bi-arrow-left"></i></button>
                                <button class="btn btn-lg btn-primary-soft icon-link icon-link-hover mb-0" id="next-3">Next <i class="bi bi-arrow-right"></i></button>
                            </div>

                            <div id="step-3">
                                <h4 class="mb-3 fw-light">Parent/Guardian Details</h4>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="name@example.com">
                                    <label for="firstname">Full name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="middlename" name="middlename" placeholder="name@example.com">
                                    <label for="middlename">Phone number</label>
                                </div>
                                <button class="btn btn-lg btn-dark-soft icon-link icon-link-hover mb-0" id="prev-1">Back <i class="bi bi-arrow-left"></i></button>
                                <button class="btn btn-lg btn-success icon-link icon-link-hover mb-0" id="next-3">Submit <i class="bi bi-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </main>

    <footer class="my-5 pt-5 text-body-secondary text-center text-small">
        <p class="mb-1" id="copyright">Copyrights &copy; 2002 - <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script> GMSA-CKTUTAS. <br>Build by <a href="https://www.gmsa-cktutas.org/" class="text-body">IT & Publicity Committe</a>. </p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>

    <script type="text/javascript" src="<?= PROOT; ?>dist/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/bootstrap.min.js"></script>
    <script src="<?= PROOT; ?>dist/js/checkout.js"></script></body>

    <script type="text/javascript">
        
        // Fade out messages
        $("#temporary").fadeOut(5000);

    </script>
</body>
</html>
