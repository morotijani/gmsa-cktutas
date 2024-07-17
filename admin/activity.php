<?php 

    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    // get activity on edit
    if (isset($_GET['edit']) && !empty($_GET['edit'])) {
        $id = sanitize($_GET['edit']);
        $prayer = find_activity_by_id($id);

        if (is_array($prayer)) {

            $prayer_name = ((isset($_POST['prayer_name']) && !empty($_POST['prayer_name'])) ? sanitize($_POST['prayer_name']) : $prayer['prayer_name']);
            $prayer_time = ((isset($_POST['prayer_time']) && !empty($_POST['prayer_time'])) ? sanitize($_POST['prayer_time']) : $prayer['prayer_time']);
            $prayer_date = ((isset($_POST['prayer_date']) && !empty($_POST['prayer_date'])) ? sanitize($_POST['prayer_date']) : $prayer['prayer_date']);


            if (isset($_POST['submit'])) {
                $query = "
                    UPDATE gmsa_prayer_time 
                    SET prayer_name = ?, prayer_time = ?, prayer_date = ? 
                    WHERE prayer_id = ?
                ";
                $statement = $conn->prepare($query);
                $result = $statement->execute([$prayer_name, $prayer_time, $prayer_date, $id]);
                if ($result) {
                    // code...
                    $_SESSION['flash_success'] = strtoupper($prayer_name) . ', updated successfully!';
                    redirect(PROOT . 'admin/prayer-time');
                } else {
                    $_SESSION['flash_error'] = 'Something went wromg, please try again!';
                    redirect(PROOT . 'admin/prayer-time');
                }
            }
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
                <?= $flash; ?>
                <div class="page-inner">

                    <header class="page-title-bar">
                        <div class="d-flex flex-column flex-md-row">
                            <p class="lead">
                                <span class="font-weight-bold">Prayer Time.</span>
                            </p>
                            <div class="ml-auto">
                                <div class="dropdown">
                                    <a class="btn btn-success" href="<?= PROOT . 'admin/prayer-time' .((isset($_GET['edit'])) ? '?edit='.$id.'': ''); ?>"><span>Refresh</span> <i class="fa fa-fw fa-recycle"></i></a>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST">
                                    <fieldset>
                                        <legend><?= (isset($_GET['edit']) && !empty($_GET['edit']) ? 'Update' : 'Add'); ?> activity</legend>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="text" class="form-control" id="prayer_name" name="prayer_name" placeholder="Prayer name" required="" value="<?= $prayer_name; ?>"> <label for="prayer_name">Prayer</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="time" class="form-control" id="prayer_time" name="prayer_time" placeholder="Time" required="" value="<?= $prayer_time; ?>"> <label for="prayer_time">Time</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="date" class="form-control" id="prayer_date" name="prayer_date" placeholder="Prayer date" value="<?= $prayer_date; ?>"> <label for="prayer_date">Date</label>
                                                <small id="" class="form-text text-muted">If prayer does not require any date, please leave this field empty.</small>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button class="btn btn-success" type="submit" name="submit">Update prayer</button>
                                            <a class="btn" href="<?= PROOT; ?>admin/prayer-time">Cancel update</a>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <?php foreach ($rows as $row): ?>
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="card-title">
                                                <a href="user-profile.html"> <?= (($row['prayer_date'] == null) ? $row["prayer_time"] : pretty_date_notime($row['prayer_date'])); ?> </a> <small class="text-muted"> <?= (($row['prayer_date'] == null) ? '' : 'on: ' . $row['prayer_time']); ?> </small>
                                            </h3>
                                            <h6 class="card-subtitle text-muted"> @<?= strtoupper($row['prayer_name']); ?> </h6>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block">
                                                <h6 class="card-subtitle text-muted"> <?= (($row['updatedAt'] == null) ? '' : 'updated at: ' . pretty_date($row['updatedAt'])); ?> </h6>
                                            </div>
                                            <a href="?edit=<?= $row["prayer_id"]; ?>" class="btn btn-icon btn-secondary mr-1" data-toggle="tooltip" title="" data-original-title="Edit Prayer">
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