<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

if(isset($_REQUEST['login_button']))
{
    require 'config.php';
    //$_SESSION['user_username']=$_POST['usertxt'];

        $errflag = false;
        $username=  mysqli_real_escape_string($database,$_REQUEST['usertxt']);
        $password=  mysqli_real_escape_string($database,$_REQUEST['passtxt']);

        if($username == '') {
            $errmsg_arr[] = 'Username missing';
            $errflag = true;
            
        }
        if($password == '') {
            $errmsg_arr[] = 'Password missing';
            $errflag = true;
        }
        if($errflag) {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            header( "refresh:1;url=../login.php" );
            exit();
        }
    
        $sql="SELECT user_id, user_username, user_password FROM user WHERE user_username='$username'AND user_password='$password'";
        $result=  mysqli_query($database,$sql) or die(mysqli_errno());
        $trws= mysqli_num_rows($result);
        if($trws==1){
            $rws=  mysqli_fetch_array($result);
            $_SESSION['user_id']=$rws['user_id'];
            $_SESSION['user_username']=$rws['user_username'];
            
            header("location: ../welcome_home.php");
            
        }
        else {
            $errmsg_arr[] = 'user name and password not found';
            $errflag = true;
            if($errflag) {
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                session_write_close();
               header("refresh:1;url=../login.php");
                exit();
            }
        }
}
?>