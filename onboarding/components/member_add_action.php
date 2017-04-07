<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
if(isset($_REQUEST['add_members']))
    {   //user will be added as invited member
    require '../../resources/config.php';
    $invite_by = $_SESSION['user_id'];
    $invite_project=$_SESSION['latest_project_id'];
    $invite_mem_email1 = $_REQUEST['email11'];
    $invite_mem_email2 = $_REQUEST['email12'];
    $invite_mem_email3 = $_REQUEST['email13'];
    function getDatetimeNow() {
    $tz_object = new DateTimeZone('Asia/Kolkata');
    //date_default_timezone_set('Brazil/East');
    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s');
    }
    $invite_date= getDatetimeNow();
        $qr= "INSERT INTO invited_member VALUES('','$invite_mem_email1','', '$invite_date' ,'$invite_by', '$invite_project') , ('','$invite_mem_email2','', '$invite_date' ,'$invite_by', '$invite_project') , ('','$invite_mem_email3','', '$invite_date' ,'$invite_by', '$invite_project')";
        mysqli_query($database,$qr) or die(mysqli_error($database));
            header("location: ../../dashboard.php");
}
if(isset($_REQUEST['skip'])){
    
   header("location: ../../dashboard.php");
}
