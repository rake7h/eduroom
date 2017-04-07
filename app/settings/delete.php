<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_REQUEST['delete_project']))
{
include('../../resources/config.php');

$project_id=$_SESSION['project_id'];
$project_name=$_SESSION['project_name'];

$delete_child= "DELETE t1,t2 FROM  project_relation as t1 
        LEFT JOIN  ur_project_relation as t2 on t1.project_id = t2.project_id
     	WHERE  t1.project_id='$project_id'";

$delete_parent ="DELETE FROM project_student WHERE project_id='$project_id'";

   
    mysqli_query($database,$delete_child) or die(mysqli_error($database));
    mysqli_query($database,$delete_parent) or die(mysqli_error($database));

    header("location: ../../dashboard.php");

}
else{
    
   echo":/";
    
}

?>