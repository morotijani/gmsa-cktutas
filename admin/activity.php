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
    $activity_date = ((isset($_POST['activity_date']) && !empty($_POST['activity_date'])) ? $post['activity_date'] : '');
    $activity_added_by = $admin_data['admin_id'];
    $createdAt = date("Y-m-d H:i:s A");

    // get activity on edit
    if (isset($_GET['edit']) && !empty($_GET['edit'])) {
        $id = sanitize($_GET['edit']);
        $find_activity = find_activity_by_id($id);

        if (is_array($find_activity)) {

            $activity = ((isset($_POST['activity']) && !empty($_POST['activity'])) ? $post['activity'] : $find_activity['activity']);
            $details = ((isset($_POST['details']) && !empty($_POST['details'])) ? $post['details'] : $find_activity['details']);
            $activity_date = ((isset($_POST['activity_date']) && !empty($_POST['activity_date'])) ? $post['activity_date'] : $find_activity['activity_date']);

        } else {
            $_SESSION['flash_error'] = 'Prayer was not found!';
            redirect(PROOT . 'admin/activity');
        }
    }

    //
    if (isset($_POST['submit'])) {

        $activity_id = guidv4();
        $query = "
            INSERT INTO `gmsa_news`(`activity`, `activity_details`, `activity_created_by`, `activity_date`, `createdAt`, `activity_id`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ";
        if (isset($_GET['edit']) && !empty($_GET['status'])) {
            $activity_id = $id;
            $query = "
                UPDATE gmsa_news 
                SET activity = ?, activity_details = ?, activity_updated_by = ?, activity_date  = ?, updatedAt = ?
                WHERE activity_id = ?
            ";
        }
        $statement = $conn->prepare($query);
        $result = $statement->execute([$activity, $details, $activity_added_by, $activity_date, $createdAt, $activity_id]);
        if (isset($result)) {
            $_SESSION['flash_success'] = ucwords($activity) . ' successfully ' . ((isset($_GET['status']) && $_GET['status'] == 'edit_news') ? 'updated' : 'added') . ' successfully!';
            redirect(PROOT . 'admin/activity');
        } else {
            $_SESSION['flash_error'] = 'Something went wrong, please try again';
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
                                <form method="POST" action="<?= ((isset($_GET['edit']) && !empty($_GET['edit'])) ? '?edit=' . sanitize($_GET['id']) : ''); ?>">
                                    <fieldset>
                                        <legend><?= (isset($_GET['edit']) && !empty($_GET['edit']) ? 'Update' : 'Add'); ?> activity</legend>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="text" class="form-control" id="activity" name="activity" placeholder="Activty heading" required="" value="<?= $activity; ?>"> <label for="activity">Activty</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <textarea type="text" class="form-control" id="details" name="details" required="" placeholder="Details"><?= $details; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <input type="date" class="form-control" id="activity_date" name="activity_date" placeholder="Prayer date" value="<?= $activity_date; ?>"> <label for="activity_date">Date</label>
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
                                                <th>Details</th>
                                                <th>Date</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($rows as $row): ?>
                                                        
                                        <?php endforeach; ?>
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