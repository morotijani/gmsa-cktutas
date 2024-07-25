<?php 

	// ADMIN SIGNOUT PAGE

    require_once ("../../db_connection/conn.php");

    $log_message = "logged out admin " . $_SESSION['GMAdmin'];
    add_to_log($log_message, $admin_data['admin_id']);
    
    unset($_SESSION['GMAdmin']);


    session_destroy();

	redirect(PROOT . 'admin/auth/login');
    