<?php
session_start();
    
    require('../../../resources/config.php');
    $user_name = strip_tags($_POST['name']);
    $colleg_guide=$_SESSION['college_profile_id'];
    //$fetch_user_id="SELECT user_id FROM user WHERE user_username='$user_name'";
    $fetch_user_id="SELECT user_id FROM user WHERE user_email='$user_name'";
    $resuilt_a=mysqli_query($database,$fetch_user_id) or die(mysqli_error($database));
    $trws_result_a=mysqli_num_rows($resuilt_a);
    if($trws_result_a > 0)
    {
        while($rws_result_a=mysqli_fetch_array($resuilt_a))
        {
            $user_id_guide['user_id']=$rws_result_a['user_id'];
            $user_id_guide=$user_id_guide['user_id'];
            //echo $user_id;
            
        }
    }
    //INSERT INTO `college_guide` (`user_id_guide`, `college_id_guide`) VALUES ('1532', '222');//
    $add_member_q="INSERT INTO college_guide VALUES ('$user_id_guide', '$colleg_guide')";
    mysqli_query($database,$add_member_q) or die(mysqli_error($database));

    $update_user_role="UPDATE user SET user_role='1201' WHERE user_id='$user_id_guide'";
    mysqli_query($database,$update_user_role) or die(mysqli_error($database));
    

    echo $user_name; echo "guide added";
 
 ?>