<?php 

    require_once ("../db_connection/conn.php");
    if (!admin_is_logged_in()) {
        admn_login_redirect();
    }
    include ("includes/head.php");
    include ("includes/header.php");
    include ("includes/aside.php");

    $post = cleanPost($_POST);
    $activity = ((isset($_POST['activity']) && !empty($_POST['activity'])) ? $post['activity'] : '');
    $details = ((isset($_POST['details']) && !empty($_POST['details'])) ? $post['details'] : '');
    $activity_venue = ((isset($_POST['activity_venue']) && !empty($_POST['activity_venue'])) ? $post['activity_venue'] : '');
    $activity_date = ((isset($_POST['activity_date']) && !empty($_POST['activity_date'])) ? $post['activity_date'] : '');
    $activity_time = ((isset($_POST['activity_time']) && !empty($_POST['activity_time'])) ? $post['activity_time'] : '');
    $activity_added_by = $admin_data['admin_id'];
    $createdAt = date("Y-m-d H:i:s A");
    $message = '';

    // get activity on edit
    if (isset($_GET['edit']) && !empty($_GET['edit'])) {
        $id = sanitize($_GET['edit']);
        $find_activity = find_activity_by_id($id);

        if (is_array($find_activity)) {

            $activity = ((isset($_POST['activity']) && !empty($_POST['activity'])) ? $post['activity'] : $find_activity['activity']);
            $details = ((isset($_POST['details']) && !empty($_POST['details'])) ? $post['details'] : $find_activity['activity_details']);
            $activity_date = ((isset($_POST['activity_date']) && !empty($_POST['activity_date'])) ? $post['activity_date'] : $find_activity['activity_date']);

        } else {
            $_SESSION['flash_error'] = 'Activity was not found!';
            redirect(PROOT . 'admin/activity');
        }
    }

    //
    if (isset($_POST['submit'])) {

        if (empty($activity) || $activity == '') {
            // code...
            $message = 'Activity field required!';
        }
        
        if (empty($activity_venue) || $activity_venue == '') {
            // code...
            $message = 'Activity venue field required!';
        }
        
        if (empty($activity_date) || $activity_date == '') {
            // code...
            $message = 'Activity date field required!';
        }
        
        if (empty($activity_time) || $activity_time == '') {
            // code...
            $message = 'Activity time field required!';
        }


        $check = $conn->query("SELECT * FROM gmsa_activities WHERE activity = '".$activity."'")->rowCount();
        if (isset($_GET['edit']) && !empty($_GET['edit'])) {
            $check = $conn->query("SELECT * FROM gmsa_activities WHERE activity = '" . $activity . "' AND activity_id != '" . $id . "'")->rowCount();
        }

        if ($check > 0) {
            $message = $activity . ' already exists.';
        } else {

            if (empty($message)) {
                // code...
                $activity_id = guidv4();
                $query = "
                    INSERT INTO `gmsa_activities`(`activity`, `activity_details`, `activity_venue`, `activity_created_by`, `activity_date`, `activity_time`, `createdAt`, `activity_id`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
                ";
                if (isset($_GET['edit']) && !empty($_GET['edit'])) {
                    $activity_id = $id;
                    $query = "
                        UPDATE gmsa_activities 
                        SET activity = ?, activity_details = ?, activity_venue = ?, activity_updated_by = ?, activity_date  = ?, activity_time = ?, updatedAt = ?
                        WHERE activity_id = ?
                    ";
                }
                $statement = $conn->prepare($query);
                $result = $statement->execute([$activity, $details, $activity_venue, $activity_added_by, $activity_date, $activity_time, $createdAt, $activity_id]);
                if (isset($result)) {
                    $_SESSION['flash_success'] = ucwords($activity) . ' successfully ' . ((isset($_GET['edit']) && !empty($_GET['edit'])) ? 'updated' : 'added') . ' successfully!';
                    redirect(PROOT . 'admin/activity');
                } else {
                    $_SESSION['flash_error'] = 'Something went wrong, please try again';
                    redirect(PROOT . 'admin/activity');
                }
            }
        }
    }

    // delete activity

    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
        // code...
        $id = sanitize($_GET['delete']);


        $find_activity = find_activity_by_id($id);

        if (is_array($find_activity)) {
            $sql = "
                DELETE FROM gmsa_activities 
                WHERE activity_id = ?
            ";
            $statement = $conn->prepare($sql);
            $result = $statement->execute([$id]);
            if ($result) {
                // code...
                $_SESSION['flash_success'] = 'Activity deleted successfully!';
                redirect(PROOT . 'admin/activity');
            } else {
                $_SESSION['flash_error'] = 'Something went wrong, please try again!';
                redirect(PROOT . 'admin/activity');
            }
        } else {
            $_SESSION['flash_error'] = 'Activity was not found!';
            redirect(PROOT . 'admin/activity');
        }
    }

    // get all prayers
    $sql = "
        SELECT * FROM gmsa_activities 
        WHERE status = ? 
    ";
    $statement = $conn->prepare($sql);
    $statement->execute([0]);
    $count_activity = $statement->rowCount();
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
                                    <a class="btn btn-success" href="<?= PROOT . 'admin/activity' .((isset($_GET['edit'])) ? '?edit='.$id.'': ''); ?>"><span>Refresh</span> <i class="fa fa-fw fa-recycle"></i></a>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="<?= ((isset($_GET['edit']) && !empty($_GET['edit'])) ? '?edit=' . sanitize($_GET['edit']) : ''); ?>">
                                    <fieldset>
                                        <legend><?= (isset($_GET['edit']) && !empty($_GET['edit']) ? 'Update' : 'Add'); ?> activity</legend>
                                        <div class="bg-danger text-center mb-2"><?= $message; ?></div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" class="form-control" id="activity" name="activity" placeholder="Activty heading" required value="<?= $activity; ?>"> <label for="activity">Activty</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="text" class="form-control" id="activity_venue" name="activity_venue" required placeholder="Prayer date" value="<?= $activity_venue; ?>"> <label for="activity_venue">Venue</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="date" class="form-control" id="activity_date" name="activity_date" required placeholder="Prayer date" value="<?= $activity_date; ?>"> <label for="activity_date">Date</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <input type="time" class="form-control" id="activity_time" name="activity_time" required placeholder="Prayer date" value="<?= $activity_time; ?>"> <label for="activity_time">Time</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <textarea type="text" class="form-control" id="details" name="details" placeholder="Details"><?= $details; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button class="btn btn-success" type="submit" name="submit"><?= (isset($_GET['edit']) && !empty($_GET['edit']) ? 'Update' : 'Add'); ?> activity</button>
                                            <?php if (isset($_GET['edit']) && !empty($_GET['edit'])): ?>
                                                <a class="btn" href="<?= PROOT; ?>admin/activity">Cancel update</a>
                                            <?php endif; ?>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Activity</th>
                                                <th>Venue</th>
                                                <th>Details</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if ($count_activity > 0): ?>
                                            <?php $i = 1; foreach ($rows as $row): ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= ucwords($row['activity']); ?></td>
                                                    <td><?= ucwords($row['activity_venue']); ?></td>
                                                    <td><?= $row['activity_details']; ?></td>
                                                    <td><?= pretty_date_notime($row['activity_date']); ?></td>
                                                    <td><?= $row['activity_time']; ?></td>
                                                    <td>
                                                        <a href="?edit=<?= $row['activity_id']; ?>" class="btn btn-dark">Edit</a>&nbsp;
                                                        <a href="?delete=<?= $row['activity_id']; ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>         
                                            <?php $i++; endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5">No data found under activity table.</td>
                                            </tr>
                                        <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include ("includes/footer.php"); ?>