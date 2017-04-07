<?php
session_start();
if (isset($_POST['name']))
{
    
    require('../../resources/config.php');
    $user_name = strip_tags($_POST['name']);
    $project = strip_tags($_POST['p']);


    //$fetch_user_id="SELECT user_id FROM user WHERE user_username='$user_name'";
    $fetch_user_id="SELECT user_id FROM user WHERE user_email='$user_name'";
    $resuilt_a=mysqli_query($database,$fetch_user_id) or die(mysqli_error($database));
    $trws_result_a=mysqli_num_rows($resuilt_a);
    if($trws_result_a > 0)
    {
        while($rws_result_a=mysqli_fetch_array($resuilt_a))
        {
            $user_id['user_id']=$rws_result_a['user_id'];

            $user_id=$user_id['user_id'];
            }
    }
    
    //INSERT INTO `guide_relation` (`project_id`, `user_id`) VALUES ('74', '1573');
   
    $add_member_q="INSERT INTO guide_relation VALUES ('$project', '$user_id')";
    mysqli_query($database,$add_member_q) or die(mysqli_error($database));

   

    echo $user_name; echo " added as guide";
    //header("location: ../../index.php");
 
 

}
?>