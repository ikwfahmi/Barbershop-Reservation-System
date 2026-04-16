<?php

    session_start();
    if(!$_SESSION['login'])header("Location: login.php");
    if($_SESSION['role'] === 'admin')header("Location: admin.php");
    $_SESSION['judul'] = 'Dashboard';

    require 'header.php';
    require 'footer.php';