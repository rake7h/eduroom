<?php require '../resources/config.php'; 
$q=$_GET['q']; //getting search string from search box
?>
<div class="row">
<div class="col-md-3" style="">

    <div class="list-group">
        <a href="search.php?q=<?php echo $q;?>&type=project" class="list-group-item">Project <span class="badge">
            <?php $sql = "SELECT count(*) as total_project FROM project_relation INNER JOIN user ON user.user_id=project_relation.user_id INNER JOIN project_student ON project_student.project_id=project_relation.project_id WHERE project_name like '%$q%' or project_des like '%$q%'";   
            $result= mysqli_query($database,$sql) or die(mysqli_errno());
            $rws=  mysqli_fetch_array($result);
            $total['total_project']=$rws['total_project'];
            echo $rws['total_project'];
            ?></span></a>
        <a href="search.php?q=<?php echo $q;?>&type=college" class="list-group-item">College<span class="badge">
            <?php $sql ="SELECT count(*) as total_college FROM colleges WHERE college_name like '$q%'";   
            $result= mysqli_query($database,$sql) or die(mysqli_errno());
            $rws=  mysqli_fetch_array($result);
            $total['total_college']=$rws['total_college'];
            echo $rws['total_college']; ?></span></a>
        <a href="search.php?q=<?php echo $q;?>&type=student" class="list-group-item">Student <span class="badge">
            <?php
            
            $sql ="SELECT count(*) as total_users FROM user WHERE user_firstname like '%$q%' or user_lastname like '%$q%' order by user_id";
            $result= mysqli_query($database,$sql) or die(mysqli_errno());
            $rws=mysqli_fetch_array($result);
            $total['total_users']=$rws['total_users'];
            echo $rws['total_users'];
            ?>
            </span></a>
        <a href="search.php?q=<?php echo $q;?>&type=location" class="list-group-item">Location</a>

    </div>
</div>
<?php
switch(@$_GET['type']){            //ohhhh... need to improve
                
                case "project":
                    
                    $sql = "SELECT  project_student.project_name, project_student.project_des, user.user_username FROM project_relation INNER JOIN user ON user.user_id=project_relation.user_id INNER JOIN project_student ON project_student.project_id=project_relation.project_id WHERE project_name like '%$q%' or project_des like '%$q%'";   
                    $result= mysqli_query($database,$sql) or die(mysqli_errno());
                    $trws= mysqli_num_rows($result);
                    if($trws>0){
                        while ($rws=  mysqli_fetch_array($result))
                        {
                            $project_name['project_name']=$rws['project_name'];
                            $project_des['project_des']=$rws['project_des'];
                            $project_user['project_user']=$rws['user_username'];
                ?>

    <!--Result Body-->
    <div class="col-md-offset-4 border-bottom">
        
        <div><a href=""><h1><?php echo $project_name['project_name'];?></h1></a></div>
        <div><p><?php echo $project_des['project_des'];?></p></div>
        <div><p><span>@</span><?php echo $project_user['project_user'];?></p></div>

    </div>
    <?php
            }
                }
    else{
        ?>
        <div class="jumbotron col-md-7">
            <div class="container">
                <center>
                    <h3>We couldn’t find any projects matching <strong>'<?php echo $q; ?>'</strong></h3></center>
            </div>
        </div>
        <?php
                }
                    break;
                    
                case "college":  //college case
                    
                    $sql ="SELECT * FROM colleges WHERE college_name like '$q%' order by college_id";
                    $result= mysqli_query($database,$sql) or die(mysqli_errno());
                    $trws= mysqli_num_rows($result);
                    if($trws>0){
                        while ($rws=  mysqli_fetch_array($result))
                        {   $college_id['college_id']=$rws['college_id'];
                            $college_name['college_name']=$rws['college_name'];
                            $college_district['college=_district']=$rws['college_district'];
                            $college_state['college_state']=$rws['college_state'];
?>

            <!--Result Body-->
            <div class="col-md-offset-4 border-bottom">
                <div>
                    <a href="/profiles/organization/index.php?college=<?php echo $college_id['college_id']; ?>"><h4><?php echo $college_name['college_name'];?></h4></a>
                </div>
                <div>
                    <p>
                        <?php echo $college_district['college=_district'];?>, <?php echo $college_state['college_state'];?>
                    </p>
                </div>
            </div>
            <?php
                                }
                                }
                      else{
                                ?>
                <div class="jumbotron col-md-7">
                    <div class="container">
                        <center>
                            <h4>We couldn’t find any colleges matching <strong>'<?php echo $q; ?>'</strong></h4></center>
                    </div>
                </div>
                <?php
                            }
                    break;
                    
                case "student":  //students case 
                    
                        $sql ="SELECT * FROM user WHERE user_firstname like '%$q%' or user_lastname like '%$q%' order by user_id";
                        $result= mysqli_query($database,$sql) or die(mysqli_errno());
                        $trws= mysqli_num_rows($result);
                        if($trws>0){
                                while ($rws=  mysqli_fetch_array($result))
                                {
                                    $user_fname['user_firstname']=$rws['user_firstname'];
                                    $username['user_username']=$rws['user_username'];
                                    $user_institute['user_institute']=$rws['user_institute'];?>
                    <!--Result Body-->
                    <div class="col-md-offset-4 border-bottom">
                        <div>
                            <a href="/profiles/profile.php?user_username=<?php echo $username['user_username']; ?>"><h3><?php echo $user_fname['user_firstname'];?></h3></a>
                        </div>

                        <div><p>@<?php echo $username['user_username'];?></p></div>

                        <div><p><?php echo $user_institute['user_institute']; ?></p>
                        </div>
                    </div>
                    <?php }} //double }}
                       else{
                                ?>
                <div class="jumbotron col-md-7">
                    <div class="container">
                        <center>
                            <h4>We couldn’t find any student matching <strong>'<?php echo $q; ?>'</strong></h4></center>
                    </div>
                </div>
                <?php
                            }
                    break;
                    
                case "location":
                     echo "location";
                     break;
                    
                default:
                    $sql = "SELECT  project_student.project_name, project_student.project_des, user.user_username FROM project_relation INNER JOIN user ON user.user_id=project_relation.user_id INNER JOIN project_student ON project_student.project_id=project_relation.project_id WHERE project_name like '%$q%' or project_des like '%$q%'";   
                    $result= mysqli_query($database,$sql) or die(mysqli_errno());
                    $trws= mysqli_num_rows($result);
                    if($trws>0){
                        while ($rws=  mysqli_fetch_array($result))
                        {
                            $project_name['project_name']=$rws['project_name'];
                            $project_des['project_des']=$rws['project_des'];
                            $project_user['project_user']=$rws['user_username'];
                ?>

                        <!--Result Body-->
                        <div class="col-md-offset-4 border-bottom">
                            <div>
                                <a href=""><h1><?php echo $project_name['project_name'];?></h1></a>
                            </div>

                            <div>
                                <p>
                                    <?php echo $project_des['project_des'];?>
                                </p>
                            </div>

                            <div>
                                <p><span>@</span>
                                    <?php echo $project_user['project_user'];?>
                                </p>
                            </div>

                        </div>
                        <?php
                            }
                            }
                           else{
                                ?>
                <div class="jumbotron col-md-7">
                    <div class="container">
                        <center>
                            <h4>We couldn’t find any project matching <strong>'<?php echo $q; ?>'</strong></h4></center>
                    </div>
                </div>
                <?php
                            }
            }
    ?>
</div>
    