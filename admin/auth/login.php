<?php 
    require_once ("../../db_connection/conn.php");
    if (admin_is_logged_in()) {
        redirect(PROOT . 'admin/auth/index');
    }
    include ("../includes/head.php");

    $error = '';
    if ($_POST) {
        if (empty($_POST['admin_email']) || empty($_POST['admin_password'])) {
            $error = 'You must provide email and password.';
        }
        $query = "
            SELECT * FROM gmsa_admin 
            WHERE admin_email = :admin_email 
            LIMIT 1
        ";
        $statement = $conn->prepare($query);
        $statement->execute(['admin_email' => $_POST['admin_email']]);
        $count_row = $statement->rowCount();
        $result = $statement->fetchAll();

        if ($count_row < 1) {
            $error = 'Unkown admin.';
        }

        foreach ($result as $row) {
            if (!password_verify($_POST['admin_password'], $row['admin_password'])) {
                $error = 'Unkown admin.';
            }

            if (!empty($error)) {
                $error;
            } else {
                $admin_id = $row['admin_id'];
                adminLogin($admin_id);
            }
        }
        
    }

?>
    <main class="auth">
        <header id="auth-header" class="auth-header bg-success">
            <div class="text-center"><img src="<?= PROOT; ?>assets/media/logo/logo.png" /></div>
            <h1><span class="sr-only">Sign In</span></h1>
            <p> Log on to the GMSA dashboard. </p>
        </header>
        
        <form class="auth-form" method="POST">
            <code><?= $error; ?></code>
            <div class="form-group">
                <div class="form-label-group">
                    <input type="text" id="admin_email" name="admin_email" class="form-control" placeholder="Username" autofocus autocomplete="off"> <label for="admin_email">Username</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input type="password" id="admin_password" name="admin_password" class="form-control" placeholder="Password"> <label for="admin_password">Password</label>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-success btn-block" type="submit">Sign In</button>
            </div>
            <div class="text-center pt-3">
                <a href="<?= PROOT; ?>" class="link">Visit site</a> <span class="mx-2">·</span>
            </div>
        </form>
        <footer class="auth-footer" id="copyright"> &copy; 2021 - <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script>
    </main>

    <script src="<?= PROOT; ?>admin/dist/js/jquery.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/popper.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/bootstrap.min.js"></script>
    <script src="<?= PROOT; ?>admin/dist/js/particles.js"></script>
    <script type="text/javascript">
         /**
       * Keep in mind that your scripts may not always be executed after the theme is completely ready,
       * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
       */
      $(document).on('theme:init', () =>
      {
        /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        particlesJS.load('auth-header', '<?= PROOT; ?>admin/dist/js/particles.json');
      })
    </script>
    <!-- BEGIN THEME JS -->
    <script src="<?= PROOT; ?>admin/dist/js/theme.js"></script>
    <script>

        // $('#temporary').parent().fadeOut('');
        // Fade out messages
        $("#temporary").fadeOut(6000);

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
    </script>
</body>
</html>
