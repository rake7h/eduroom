<?php
    session_start();
    require 'config.php';
    if ($_SESSION['user_username']){
        header("location:../welcome_home.php");
    }
?>