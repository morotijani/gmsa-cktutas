<?php 

    require_once ("../db_connection/conn.php");
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    //dnd(guidv4());

    // get prayer on edit
    if (isset($_GET['edit']) && !empty($_GET['edit'])) {
        // code...
        $id = sanitize($_GET['edit']);
        $prayer = find_prayer_by_id($id);

        if (is_array($prayer)) {

            $prayer_name = $prayer['prayer_name'];
            $prayer_time = $prayer['prayer_time'];
            $prayer_date = $prayer['prayer_date'];
        } else {
            $_SESSION['flash_error'] = 'Prayer was not found!';
            redirect(PROOT . 'admin/prayer-time');
        }



    }

    // get all prayers
    $sql = "
        SELECT * FROM gmsa_prayer_time 
    ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $rows = $statement->fetchAll();
?>

    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-flex flex-column flex-md-row">
                            <p class="lead">
                                <span class="font-weight-bold">Prayer Time.</span>
                            </p>
                            <div class="ml-auto">
                                <div class="dropdown">
                                    <button class="btn btn-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Refresh</span> <i class="fa fa-fw fa-recycle"></i></button>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div><?= $flash; ?></div>
                    <div class="page-section">
                        <?php if (isset($_GET['edit']) && !empty($_GET['edit'])):

                        ?>
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <fieldset>
                                            <legend>Edit prayer</legend>
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <input type="text" class="form-control" id="fl2" placeholder="Password" required="" value="<?= $prayer_name; ?>"> <label for="fl2">Prayer</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <input type="time" class="form-control" id="fl2" placeholder="Time" required="" value="<?= $prayer_time; ?>"> <label for="fl2">Time</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <input type="date" class="form-control" id="fl2" placeholder="Password" value="<?= $prayer_date; ?>"> <label for="fl2">Date</label>
                                                    <small id="tf1Help" class="form-text text-muted">If prayer does not require any date, please leave this field empty..</small>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button class="btn btn-primary" type="submit">Update prayer</button>
                                                <a class="btn" type="submit">Cancel update</a>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php foreach ($rows as $row): ?>
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="card-title">
                                                <a href="user-profile.html">4:45 AM</a> <small class="text-muted">updated at: </small>
                                            </h3>
                                            <h6 class="card-subtitle text-muted"> @FAJR </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="?edit=<?= $row["prayer_id"]; ?>" class="btn btn-icon btn-secondary mr-1" data-toggle="tooltip" title="" data-original-title="Private message">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php include ("includes/footer.php"); ?>