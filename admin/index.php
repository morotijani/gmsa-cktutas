<?php 

    require_once ("../db_connection/conn.php");
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");
?>

    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-flex flex-column flex-md-row">
                            <p class="lead">
                                <span class="font-weight-bold">Hi, Ibrahim.</span> <span class="d-block text-muted">Here’s what’s happening with GMSA organization today.</span>
                            </p>
                            <div class="ml-auto">
                                <div class="dropdown">
                                    <button class="btn btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Refresh</span> <i class="fa fa-fw fa-recycle"></i></button>
                                </div>
                            </div>
                        </div>
                    </header>

                    <div class="page-section">
                        <div class="section-block">
                            <div class="metric-row">
                                <div class="col-lg-9">
                                    <div class="metric-row metric-flush">
                                        <div class="col">
                                            <a href="user-teams.html" class="metric metric-bordered align-items-center">
                                                <h2 class="metric-label"> Teams </h2>
                                                <p class="metric-value h3">
                                                    <sub><i class="oi oi-people"></i></sub> <span class="value">8</span>
                                                </p>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="user-projects.html" class="metric metric-bordered align-items-center">
                                                <h2 class="metric-label"> Projects </h2>
                                                <p class="metric-value h3">
                                                  <sub><i class="oi oi-fork"></i></sub> <span class="value">12</span>
                                                </p>
                                            </a>
                                        </div>
                                        <div class="col">
                                              <a href="user-tasks.html" class="metric metric-bordered align-items-center">
                                    <h2 class="metric-label"> Active Tasks </h2>
                                    <p class="metric-value h3">
                                      <sub><i class="fa fa-tasks"></i></sub> <span class="value">64</span>
                                    </p>
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <a href="user-tasks.html" class="metric metric-bordered">
                                <div class="metric-badge">
                                  <span class="badge badge-lg badge-success"><span class="oi oi-media-record pulse mr-1"></span> ONGOING TASKS</span>
                                </div>
                                <p class="metric-value h3">
                                  <sub><i class="oi oi-timer"></i></sub> <span class="value">8</span>
                        </p>
                      </a> <!-- /.metric -->
                    </div><!-- /metric column -->
                  </div><!-- /metric row -->
                </div><!-- /.section-block -->
                <!-- grid row -->


              </div><!-- /.page-section -->
            </div><!-- /.page-inner -->
          </div><!-- /.page -->
        </div><!-- .app-footer -->
        <footer class="app-footer">
          <ul class="list-inline">
            <li class="list-inline-item">
              <a class="text-muted" href="#">Support</a>
            </li>
            <li class="list-inline-item">
              <a class="text-muted" href="#">Help Center</a>
            </li>
            <li class="list-inline-item">
              <a class="text-muted" href="#">Privacy</a>
            </li>
            <li class="list-inline-item">
              <a class="text-muted" href="#">Terms of Service</a>
            </li>
          </ul>
          <div class="copyright"> Copyright © 2018. All right reserved. </div>
        </footer><!-- /.app-footer -->
        <!-- /.wrapper -->
      </main><!-- /.app-main -->
    </div><!-- /.app -->
    <!-- BEGIN BASE JS -->
    <script src="<?= PROOT; ?>admin/dist/js/jquery.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/popper.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/bootstrap.min.js"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="<?= PROOT; ?>admin/dist/js/pace.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/stacked-menu.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/perfect-scrollbar.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/flatpickr.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/jquery.easypiechart.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/Chart.min.js"></script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="<?= PROOT; ?>admin/dist/js/theme.min.js"></script> <!-- END THEME JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= PROOT; ?>admin/dist/js/dashboard-demo.js"></script> 
    <!-- END PAGE LEVEL JS -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116692175-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-116692175-1');
    </script>
  </body>
</html>