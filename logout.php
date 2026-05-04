<?php
    session_start();
    require 'autoload.php';
    $database = new Database();
    $db = $database->connect();
    $user = new User($db);
    $user->logout();
?>