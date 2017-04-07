<?php
session_start();

//error reporting 
error_reporting(E_ALL);
ini_set("display_errors", 1);

if(isset($_REQUEST['add_bttn']))
{
$user_name = $_SESSION['user_username'];
$user_id =   $_SESSION['user_id'];
require '../../resources/config.php';
$user_project_title= $_REQUEST['project_title'];
$user_project_des= $_REQUEST['project_des'];


    $query_project="INSERT INTO project_student(project_name,project_des,project_date) VALUES('$user_project_title', '$user_project_des',CURRENT_TIMESTAMP)";
    mysqli_query($database,$query_project) or die(mysqli_error($database));
    
    $project_id=mysqli_insert_id($database);
    
    $query_project_relation ="INSERT INTO project_relation(user_id, project_id) VALUES('$user_id','$project_id')";
    mysqli_query($database,$query_project_relation) or die(mysqli_error($database));
    
    //$latest_project=$project_id;
    $_SESSION['latest_project_id']= $project_id;
    
    header("location: ../members.php");
    
}
?>