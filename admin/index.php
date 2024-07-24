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
        ";
        $statement = $conn->prepare($thisYrQ);
        $statement->execute();
        $thisYr_result = $statement->fetchAll();
        

        $lastYrQ = "
            SELECT transaction_amount, createdAt 
            FROM gmsa_dues 
            WHERE YEAR(createdAt) = '{$lastYr}' 
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

        $thisMonth = date('m');
        $QUERY = "
            SELECT * FROM gmsa_dues 
            WHERE MONTH(createdAt) = '{$thisMonth}' 
            ORDER BY createdAt DESC
        ";
        $statement = $conn->prepare($QUERY);
        $statement->execute();
        $rows = $statement->fetchAll();
        $count_dues = $statement->rowCount();
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
                                    <a class="btn btn-secondary" href="<?= PROOT; ?>admin"><span>Refresh</span> <i class="fa fa-fw fa-recycle"></i></a>
                                </div>
                            </div>
                        </div>
                    </header>

                    <div class="page-section">
                        <div class="section-block">
                            <div class="metric-row">
                                <div class="col-lg-<?= ((!admin_has_permission()) ? '12' : '9'); ?>">
                                    <div class="metric-row metric-flush">
                                        <div class="col">
                                            <a href="<?= PROOT; ?>admin/members" class="metric metric-bordered align-items-center">
                                                <h2 class="metric-label"> Members </h2>
                                                <p class="metric-value h3">
                                                    <sub><i class="oi oi-people"></i></sub> <span class="value"><?= count_members($conn, 0); ?></span>
                                                </p>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="<?= PROOT; ?>admin/blog/all" class="metric metric-bordered align-items-center">
                                                <h2 class="metric-label"> News </h2>
                                                <p class="metric-value h3">
                                                  <sub><i class="oi oi-fork"></i></sub> <span class="value"><?= count_news($conn, 0); ?></span>
                                                </p>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="<?= PROOT; ?>admin/activity" class="metric metric-bordered align-items-center">
                                                <h2 class="metric-label"> Active Tasks </h2>
                                                <p class="metric-value h3">
                                                    <sub><i class="fa fa-tasks"></i></sub> <span class="value"><?= count_activities($conn, 0); ?></span>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php if (admin_has_permission()): ?>
                                    <div class="col-lg-3">
                                        <a href="<?= PROOT; ?>admin/dues" class="metric metric-bordered">
                                            <div class="metric-badge">
                                                <span class="badge badge-lg badge-success"><span class="oi oi-media-record pulse mr-1"></span> PAID DUES THIS YEAR</span>
                                            </div>
                                            <p class="metric-value h3">
                                                <sub><i class="fa fa-money-bill-trend-up"></i></sub> <span class="value"><?= total_dues_this_year($conn); ?></span>
                                            </p>
                                        </a>
                                    </div>
                                <?php endif ?>
                            </div>
                            <?php if (admin_has_permission()): ?>
                            <div class="card card-body">
                                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
                            </div>
                            <hr class="my-5">
                            <div class="section-block">
                                <h2 class="section-title"> Payment made in this month (<?= date('F'); ?>) </h2>
                            </div>
                            <div class="card card-fluid">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Trasaction ID</th>
                                                    <th>Student ID</th>
                                                    <th>Level</th>
                                                    <th>Reference</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($count_dues > 0): ?>
                                                    <?php $i = 1; foreach ($rows as $key => $row): ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= $row['dues_id']; ?></td>
                                                            <td><?= $row['student_id']; ?></td>
                                                            <td><?= $row['level']; ?></td>
                                                            <td><?= $row['transaction_reference']; ?></td>
                                                            <td><?= pretty_date($row['createdAt']); ?></td>
                                                        </tr>
                                                    <?php $i++; endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="6">No dues paid this month.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php include ("includes/footer.php"); ?>
    
    <?php if (admin_has_permission()): ?>
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
<?php endif; ?>