<?php
session_start();
if(isset($_REQUEST['subbttn']))
{
    require '../../resources/config.php';
        $user_name=$_SESSION['user_username'];
        $user_institute=$_REQUEST['inst_txt'];
        $user_course=$_REQUEST['course_txt'];
        $user_stream=$_REQUEST['stream_txt'];
        $user_batch=$_REQUEST['batch_txt'];
        $user_location=$_REQUEST['location_txt'];
     
    $qr= "UPDATE user SET user_institute='$user_institute',user_course='$user_course',user_stream='$user_stream',user_batch='$user_batch',user_location='$user_location' WHERE user_username='$user_name'";
           // $qr="INSERT INTO user (user_institute,user_course,user_stream,user_batch,user_location) VALUES('$user_institute','$user_course','$user_stream','$user_batch','$user_location') WHERE user_username = $user_name";
            
            mysqli_query($database,$qr) or die(mysqli_error($database));
           
    header("location: ../../welcome_home.php");
   }

?>