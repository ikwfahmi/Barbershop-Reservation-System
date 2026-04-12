<?php

    session_start();
    if(!$_SESSION['login'])header("Location: login.php");
    $_SESSION['judul'] = 'Dashboard';

    require 'header.php';
    require 'footer.php';