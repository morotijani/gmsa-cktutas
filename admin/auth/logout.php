<?php 

	// ADMIN SIGNOUT PAGE

    require_once ("../../db_connection/conn.php");

    unset($_SESSION['GMAdmin']);

    session_destroy();

	redirect(PROOT . 'admin/auth/login');