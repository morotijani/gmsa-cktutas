<?php

    // Executives page

    require_once ("db_connection/conn.php");
    $navTheme = "";
    $TITLE = "Prayer time";
    // $activeNav = "active";
    include ("inc/header.inc.php");
    include ("inc/nav.inc.php");


?>
    <main>
        <section class="pt-7 pb-0">
            <div class="container-fluid pt-3 pt-xl-5">
                <div class="row">
                    <div class="col-xxl-11 mx-auto">
                        <div class="card bg-parallax h-300px h-md-400px h-xl-500px overflow-hidden" style="background:url(<?= PROOT; ?>assets/media/04.jpg) no-repeat; background-size:cover; background-position:center;">
                            <div class="bg-overlay bg-dark bg-opacity-50"></div>
                            <div class="card-img-overlay d-flex align-items-center justify-content-center text-center z-index-2">
                                <h1 class="display-4 text-white">Our executives</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="py-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <span class="eyebrow mb-1 text-success">Current year, <?= date('Y'); ?></span>
                        <h1 class="display-2"><b>Search; name or</b> year.</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row gutter-1">
                            <div class="form-group col-md-5">
                                <input type="search" class="form-control-lg form-control" id="inputEmail4" placeholder="Name">
                            </div>
                            <div class="form-group col-md-5">
                                <select class="form-control form-control-lg">
                                    <?php yearDropdown($startYear = 2013, $endYear = date('Y'), $id = "year", $class = "form-control form-control-lg"); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-lg btn-block btn-success">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>

        <section>
            <div class="container">
                <div class="row g-4 g-sm-6">
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <div class="card card-img-scale bg-transparent overflow-hidden">
                            <div class="position-absolute top-0 end-0 z-index-2 m-3">
                                <ul class="list-inline mb-0 mb-2 mb-sm-0">
                                    <li class="list-inline-item"> <a class="btn-icon btn-sm rounded mb-2 bg-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
                                </ul>
                            </div>
                            <div class="card-img-scale-wrapper rounded-3">
                                <img src="<?= PROOT; ?>assets/media/executives/07.jpeg" class="img-scale" alt="card image">
                            </div>
                            <div class="card-body text-center px-0 pb-0">
                                <h6 class="mb-0"><a href="#" class="stretched-link">Emma Watson</a></h6>
                                <small>President . 2024</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <div class="card card-img-scale bg-transparent overflow-hidden">
                            <div class="position-absolute top-0 end-0 z-index-2 m-3">
                                <ul class="list-inline mb-0 mb-2 mb-sm-0">
                                    <li class="list-inline-item"> <a class="btn-icon btn-sm rounded mb-2 bg-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
                                </ul>
                            </div>
                            <div class="card-img-scale-wrapper rounded-3">
                                <img src="<?= PROOT; ?>assets/media/executives/07.jpeg" class="img-scale" alt="card image">
                            </div>
                            <div class="card-body text-center px-0 pb-0">
                                <h6 class="mb-0"><a href="#" class="stretched-link">Emma Watson</a></h6>
                                <small>President . 2024</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <div class="card card-img-scale bg-transparent overflow-hidden">
                            <div class="position-absolute top-0 end-0 z-index-2 m-3">
                                <ul class="list-inline mb-0 mb-2 mb-sm-0">
                                    <li class="list-inline-item"> <a class="btn-icon btn-sm rounded mb-2 bg-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
                                </ul>
                            </div>
                            <div class="card-img-scale-wrapper rounded-3">
                                <img src="<?= PROOT; ?>assets/media/executives/07.jpeg" class="img-scale" alt="card image">
                            </div>
                            <div class="card-body text-center px-0 pb-0">
                                <h6 class="mb-0"><a href="#" class="stretched-link">Emma Watson</a></h6>
                                <small>President . 2024</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <div class="card card-img-scale bg-transparent overflow-hidden">
                            <div class="position-absolute top-0 end-0 z-index-2 m-3">
                                <ul class="list-inline mb-0 mb-2 mb-sm-0">
                                    <li class="list-inline-item"> <a class="btn-icon btn-sm rounded mb-2 bg-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
                                </ul>
                            </div>
                            <div class="card-img-scale-wrapper rounded-3">
                                <img src="<?= PROOT; ?>assets/media/executives/07.jpeg" class="img-scale" alt="card image">
                            </div>
                            <div class="card-body text-center px-0 pb-0">
                                <h6 class="mb-0"><a href="#" class="stretched-link">Emma Watson</a></h6>
                                <small>President . 2024</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <div class="card card-img-scale bg-transparent overflow-hidden">
                            <div class="position-absolute top-0 end-0 z-index-2 m-3">
                                <ul class="list-inline mb-0 mb-2 mb-sm-0">
                                    <li class="list-inline-item"> <a class="btn-icon btn-sm rounded mb-2 bg-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
                                </ul>
                            </div>
                            <div class="card-img-scale-wrapper rounded-3">
                                <img src="<?= PROOT; ?>assets/media/executives/07.jpeg" class="img-scale" alt="card image">
                            </div>
                            <div class="card-body text-center px-0 pb-0">
                                <h6 class="mb-0"><a href="#" class="stretched-link">Emma Watson</a></h6>
                                <small>President . 2024</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <div class="card card-img-scale bg-transparent overflow-hidden">
                            <div class="position-absolute top-0 end-0 z-index-2 m-3">
                                <ul class="list-inline mb-0 mb-2 mb-sm-0">
                                    <li class="list-inline-item"> <a class="btn-icon btn-sm rounded mb-2 bg-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
                                </ul>
                            </div>
                            <div class="card-img-scale-wrapper rounded-3">
                                <img src="<?= PROOT; ?>assets/media/executives/07.jpeg" class="img-scale" alt="card image">
                            </div>
                            <div class="card-body text-center px-0 pb-0">
                                <h6 class="mb-0"><a href="#" class="stretched-link">Emma Watson</a></h6>
                                <small>President . 2024</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <div class="card card-img-scale bg-transparent overflow-hidden">
                            <div class="position-absolute top-0 end-0 z-index-2 m-3">
                                <ul class="list-inline mb-0 mb-2 mb-sm-0">
                                    <li class="list-inline-item"> <a class="btn-icon btn-sm rounded mb-2 bg-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
                                </ul>
                            </div>
                            <div class="card-img-scale-wrapper rounded-3">
                                <img src="<?= PROOT; ?>assets/media/executives/07.jpeg" class="img-scale" alt="card image">
                            </div>
                            <div class="card-body text-center px-0 pb-0">
                                <h6 class="mb-0"><a href="#" class="stretched-link">Emma Watson</a></h6>
                                <small>President . 2024</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        

    </main>

   <?php include ("inc/footer.inc.php"); ?>

    <script type="text/javascript">
    </script>