<?php

    // Executives page

    require_once ("db_connection/conn.php");
    $navTheme = "";
    $TITLE = "Prayer time";
    include ("inc/header.inc.php");
    include ("inc/nav.inc.php");

    $executives = fetch_all_executives($conn, 'all');

    $post = cleanPost($_GET);
    $name = (isset($_GET['name']) && !empty($_GET['name']) ? $post['name'] : '');
    $from = (isset($_GET['from']) && !empty($_GET['from']) ? $post['from'] : '');
    $to = (isset($_GET['to']) && !empty($_GET['to']) ? $post['to'] : '');
    if (isset($_GET['name'])) {
        // code...

        $sql = "
             SELECT * FROM gmsa_executives 
            INNER JOIN gmsa_positions 
            ON gmsa_positions.position_id = gmsa_executives.position_id 
            INNER JOIN gmsa_members 
            ON gmsa_members.member_id = gmsa_executives.member_id 
            WHERE (
                member_firstname LIKE '%".$name."%' 
                OR member_middlename LIKE '%".$name."%' 
                OR member_lastname LIKE '%".$name."%' 
                OR year_from = $from 
                OR year_to = $to 
                OR (
                    year_from = $from 
                    AND year_to = $to 
                )
            )
            AND gmsa_executives.status = ?
        ";
        $statement = $conn->prepare($sql);
        $executives = '';
        if ($statement->rowCount() > 0) {
            $executives = $statement->fetchAll();
        }
    }




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
                        <form method="GET">
                            <div class="row gutter-1">
                                <div class="form-group col-md-4">
                                    <input type="search" class="form-control-lg form-control" name="name" placeholder="Name">
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control form-control-lg" name="from">
                                        <option value="">From</option>
                                        <?php yearDropdown($startYear = 2013, $endYear = date('Y'), $id = "year", $class = "form-control form-control-lg"); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control form-control-lg" name="to">
                                        <option value="">To</option>
                                        <?php yearDropdown($startYear = 2013, $endYear = date('Y'), $id = "year", $class = "form-control form-control-lg"); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-lg btn-block btn-success">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>    
        </div>

        <section>
            <div class="container">
                <?php if (isset($_GET['name'])): ?>
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>Search results;</h4>
                        </div>
                        <div>
                            <a href="<?= goBack(); ?>"><< Go back</a>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row g-4 g-sm-6">
                    <?php if (is_array($executives)): ?>
                        <?php foreach ($executives as $executive): ?>
                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="card card-img-scale bg-transparent overflow-hidden">
                                    <div class="card-img-scale-wrapper rounded-3">
                                        <img src="<?= PROOT . $executive['member_picture']; ?>" class="img-scale" alt="card image">
                                    </div>
                                    <div class="card-body text-center px-0 pb-0">
                                        <h6 class="mb-0"><a href="javascript:;" class="stretched-link"><?= ucwords($executive['member_firstname'] . ' ' . $executive['member_middlename'] . ' ' . $executive['member_lastname']); ?></a></h6>
                                        <small><?= ucwords($executive['position']); ?> . <?= $executive['year_from'] . '/' . $executive['year_to']; ?></small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            No executives found!
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </section>
        

    </main>

   <?php include ("inc/footer.inc.php"); ?>

    <script type="text/javascript">
    </script>