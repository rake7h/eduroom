<?php
session_start();
if (isset($_POST['name']))
{
    
    require('../../resources/config.php');
    $invite_by = $_SESSION['user_id'];
    $invite_member = strip_tags($_POST['name2']);
    $invite_mem_email = strip_tags($_POST['email']);
    $invite_project = strip_tags($_POST['p']);

    function getDatetimeNow() {
    $tz_object = new DateTimeZone('Asia/Kolkata');
    //date_default_timezone_set('Brazil/East');
    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s');
    }
    $invite_date= getDatetimeNow();
    $invite_q="INSERT INTO invited_member VALUES('','$invite_mem_email','$invite_member', '$invite_date' ,'$invite_by', '$invite_project')";   
    mysqli_query($database,$invite_q) or die(mysqli_error($database));

   

    echo "invitation sent to  "; echo $invite_mem_email; 
    //header("location: ../../index.php");
 }
?>