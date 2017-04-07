<?php
require $_SERVER['DOCUMENT_ROOT']."/resources/config.php";
        
        $institute_name= $college_name['college_name'];
        $sql ="SELECT user_firstname, user_lastname, user_username FROM user WHERE user_institute='$institute_name' order by user_username";
        $result= mysqli_query($database,$sql) or die(mysqli_errno());
        $trws= mysqli_num_rows($result);
        
        
        if($trws>0){
            while ($rws=  mysqli_fetch_array($result))
            {
            $user_fname['user_firstname']=$rws['user_firstname'];
            $user_lastname['user_lastname']=$rws['user_lastname'];
            $user_username['user_username']=$rws['user_username'];
         ?>
    <!--Result Body-->
<div class="col-md-10">
    <div class=" border-bottom">
        <div>
            <a href="/profiles/profile.php?user_username=<?php echo $user_username['user_username']; ?>">
            <h4><?php echo $user_fname['user_firstname'];?> <?php echo $user_lastname['user_lastname'];?></h4></a>
        </div>
        <div>
            <p class="text-gray"><span>@</span><?php echo $user_username['user_username']; ?></p>
        </div>
        <div>
            <hr class="featurette-divider"> </div>
    </div>
</div>
    <?php
            }
        }
   
   

       ?>