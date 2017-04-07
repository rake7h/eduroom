<?php
ob_start();
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

if(isset($_REQUEST['signup_bttn'])){
    
        require '../resources/config.php';
        $user_email=$_REQUEST['email'];
        $user_firstname=$_REQUEST['firstname'];
        $user_lastname=$_REQUEST['lastname'];
        $user_username=$_REQUEST['username'];
        $user_password=$_REQUEST['password'];

    $query="INSERT INTO user(user_firstname,user_lastname,user_email,user_username,user_password,user_joindate,user_avatar) VALUES('$user_firstname','$user_lastname','$user_email','$user_username','$user_password',CURRENT_TIMESTAMP,'default.jpg')";
    
    mysqli_query($database,$query) or die(mysqli_error($database));
        $_SESSION['user_username'] = $user_username;

    header('Location: /onboarding/organization.php?user_username='.$user_username);
   }
 ob_end_flush();
?>