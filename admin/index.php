<?php 

    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");


     $thisYr = date("Y");
        $lastYr = $thisYr - 1;

        $thisYrQ = "
            SELECT transaction_amount, createdAt 
            FROM gmsa_dues 
            WHERE YEAR(createdAt) = '{$thisYr}' 
            AND transaction_intent = 'paid'
        ";
        $statement = $conn->prepare($thisYrQ);
        $statement->execute();
        $thisYr_result = $statement->fetchAll();
        

        $lastYrQ = "
            SELECT transaction_amount, createdAt 
            FROM gmsa_dues 
            WHERE YEAR(createdAt) = '{$lastYr}' 
            AND transaction_intent = 'paid'
        ";
        $statement = $conn->prepare($lastYrQ);
        $statement->execute();
        $lastYr_result = $statement->fetchAll();

        $current = array();
        $last = array();

        $currentTotal = 0;
        $lastTotal = 0;

        foreach ($thisYr_result as $thisYr_row) {
            $month = date("m", strtotime($thisYr_row['createdAt']));
            if (!array_key_exists((int)$month, $current)) {
                $current[(int)$month] = $thisYr_row['transaction_amount'];
            } else {
                $current[(int)$month] += $thisYr_row['transaction_amount'];
            }
            $currentTotal += $thisYr_row['transaction_amount'];
        }

        foreach ($lastYr_result as $lastYr_row) {
            $month = date("m", strtotime($lastYr_row['createdAt']));
            if (!array_key_exists((int)$month, $last)) {
                $last[(int)$month] = $lastYr_row['transaction_amount'];
            } else {
                $last[(int)$month] += $lastYr_row['transaction_amount'];
            }
            $currentTotal += $lastYr_row['transaction_amount'];
        }
?>

    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <?= $flash; ?>
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-flex flex-column flex-md-row">
                            <p class="lead">
                                <span class="font-weight-bold">Hi, <?= ucwords($admin_data['first']); ?>.</span> <span class="d-block text-muted">Here’s what’s happening with GMSA organization today.</span>
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
                                                <h2 class="metric-label"> Members </h2>
                                                <p class="metric-value h3">
                                                    <sub><i class="oi oi-people"></i></sub> <span class="value"><?= count_members($conn, 0); ?></span>
                                                </p>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="user-projects.html" class="metric metric-bordered align-items-center">
                                                <h2 class="metric-label"> News </h2>
                                                <p class="metric-value h3">
                                                  <sub><i class="oi oi-fork"></i></sub> <span class="value"><?= count_news($conn, 0); ?></span>
                                                </p>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="user-tasks.html" class="metric metric-bordered align-items-center">
                                                <h2 class="metric-label"> Active Tasks </h2>
                                                <p class="metric-value h3">
                                                    <sub><i class="fa fa-tasks"></i></sub> <span class="value"><?= count_activities($conn, 0); ?></span>
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
                                    </a>
                                </div>
                            </div>

                            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php include ("includes/footer.php"); ?>
    <script type="text/javascript" src="<?= PROOT; ?>assets/js/Chart.min.js"></script>
    <script>
    (function () {
    'use strict'

      // Graphs
    var ctx = document.getElementById('myChart')
      // eslint-disable-next-line no-unused-vars
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php 
                    for ($i = 1; $i <= 12; $i++) {
                        $dt = dateTime::createFromFormat('!m',$i);
                        $m = $dt->format("F");
                        echo json_encode($m).',';
                    }
                ?>
            ],
            datasets: [{
                label: '<?= $thisYr; ?>, Amount ₵',
                data: [
                    <?php 
                        for ($i = 1; $i <= 12; $i++) {
                            $mn = (array_key_exists($i, $current)) ? $current[$i] : 0;
                            echo json_encode($mn).',';
                        }
                    ?>
                ],
                lineTension: 0,
                backgroundColor: 'rgba(225, 0.1, 0.3, 0.1)',
                borderColor: 'tomato',
                borderWidth: 3,
                pointBackgroundColor: 'red'
            },{
                label: '<?= $lastYr; ?>, Amount ₵',
                data : [
                    <?php 
                        for ($i = 1; $i <= 12; $i++) {
                            $mn = (array_key_exists($i, $last)) ? $last[$i] : 0;
                            echo json_encode($mn).',';
                        }
                    ?>
                ],
                backgroundColor: 'rgba(0, 225, 0, 0.1)',
                borderColor: 'gold',
                pointBackgroundColor: 'brown',
                borderWidth: 3
            }]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: true,
                position: 'top',
            },
            title: {
                display: true,
                text: 'Dues By Month - GMSA.'
            }
        }
    })
})()

</script>