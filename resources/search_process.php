<?php
    require '../resources/config.php';
   if($_GET)
    {
        $q= $_GET['q'];
       if($q=="")
       {
           header("refresh:1;url=../login.php");
       }
   
        $sql ="SELECT project_des FROM project_student WHERE project_name='$q'";
        $result= mysqli_query($database,$sql) or die(mysqli_errno());
        $trws= mysqli_num_rows($result);
        
        
        if($trws==1){
             $rws=  mysqli_fetch_array($result);
            $project_des['project_des']=$rws['project_des'];
            }
    else
    {
     $errmsg_arr[] = 'user name and password not found';
            $errflag = true;
            if($errflag) {
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                
    }
    }
   }