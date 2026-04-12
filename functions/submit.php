<?php
    session_start();
    require 'function.php';
    
    if(isset($_POST['login'])){
        if(login($_POST) > 0){
            header("Location: ../index.php");
            exit;
        }else{
            header("Location: ../login.php");
            exit;
        }
    }
    
    if(isset($_POST['daftar'])){
      if(tambahUser($_POST) > 0){
        header("Location: ../login.php");
        exit;
      }elseif(tambahUser($_POST) === -1){
        header("Location: ../login.php");
        exit;
      }else{
        header("Location: ../daftar.php");
        exit;
      }
    }