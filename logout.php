<?php
    session_start();
    require 'autoload.php';
    $database = new Database();
    $db = $database->connect();
    $user = new User($db);
    if($user->logout()){
        header("Location: login.php");
        exit;
    }
?>