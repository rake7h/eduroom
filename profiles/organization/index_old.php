<?php 
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
    <html>

    <head>
        <title>EduRoom | Student Projects</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../../styles/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="../../styles/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../styles/css/normalize.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="../../styles/js/bootstrap.min.js"></script>
        <link href="../style.css" rel="stylesheet">
        
    </head>

    <body>
        
        <!--section navigation-->
        <nav class="navbar navbar-default ">
            <div class="container-fluid">
                <!--eduroom logo-->
                <div class="navbar-header"> <a class="navbar-brand" href="../../../index.php"> eduRoom</a> </div>
                <form class="navbar-form navbar-left" role="search" action="../../search/search.php" role="search" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search eduRoom" name="q"> </div>
                </form>
                <!--user dropdown menu right end-->
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown  ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php
                        $loged_user = $_SESSION['user_username'];
                        echo $loged_user ?>

                                <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="Student_profile.php">Your Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Activities</a></li>
                            <li><a href="#">Teams Members</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="../../logout.php">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
       
        <!--section page header-->
            
        <!--institute header_wall-->
        <div class="container-fluid">
            <div class="row">
                    <?php
                    include ('../../resources/config.php');
                    $college_id =$_REQUEST['college'];
                    $_SESSION['college_profile_id']=$college_id;
                    //echo $college_id;
                    $college_q= "SELECT * FROM colleges WHERE college_id='$college_id'";
                    $result_college_q = mysqli_query($database,$college_q) or die(mysqli_errno());
                    $trws_college_q= mysqli_num_rows($result_college_q);
                    if($trws_college_q>0){
                        while ($rws_college_q=  mysqli_fetch_array($result_college_q))
                            { 
                            $college_name['college_name']=$rws_college_q['college_name'];
                            $college_district['college=_district']=$rws_college_q['college_district'];
                            $college_state['college_state']=$rws_college_q['college_state'];
                            $colleg_logo['college_logo']=$rws_college_q['college_logo'];
                        }
                    }
                    ?>
                <div class="col-md-2">
                    <div class=".container" style="height:140px; width:140px;">
                        <img src="../<?php echo $colleg_logo['college_logo'];?>"  height="140px" width="140px">
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-10">
                        <div class=".container" style="height:180px; width:870px;">
                            <div>
                                <h3><?php echo $college_name['college_name'];?></h3>

                            </div>
                            <div>
                                <h4><?php echo $college_district['college=_district'],", ",$college_state['college_state'];?></h4>
                            </div>
                            <div>

                                <ul class="ui_institute">
                                    <li><span style="font-size:12px">@bitdurg</span></li>
                                    <li><a href="http://bitdurg.ac.in" class="text-gray">http://bitdurg.ac.in</a></li>
                                    <li><a href="bit@bitdurg.ac.in" class="text-gray">bit@bitdurg.ac.in</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <div class="container">
                            <div class="row">
                                <div class="container">
                                    <div class="col-sm-6 col-md-3">
                                        <a href="#" class="thumbnail">
                                            <img src="/institutes/streams/cs.png" alt="Computer Science"></a>

                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <a href="#" class="thumbnail">
                                            <img src="/institutes/streams/ee.png" alt="Computer Science"></a>

                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <a href="#" class="thumbnail">
                                            <img src="/institutes/streams/ee1.png" alt="Computer Science"></a>

                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <a href="#" class="thumbnail">
                                            <img src="/institutes/streams/ce.png" alt="Computer Science"></a>

                                    </div>
                                </div>
                            </div>
                        </div>
        <!--Tab Options menu-->
        <div>
                
            <?php //Checking loged user is HOD or not
            $user_id_hod=$_SESSION['user_id']; 

            $hod_check_q= "SELECT * FROM user INNER JOIN college_hod ON user.user_id=college_hod.college_hod_id WHERE college_hod.college_hod_id='$user_id_hod' AND college_hod.college_hod_college_id='$college_id' AND college_hod.college_hod_dep_id='1'";
            $result_hod= mysqli_query($database,$hod_check_q) or die(mysqli_errno());
            $trws_hod= mysqli_num_rows($result_hod);
            if($trws_hod>0){ //if hod 
                ?>
            
            
           <!--TABS for hod-->
            <div class="container" >
                <ul class="nav nav-tabs" style=" margin-bottom: 10px;">
                    <li class="active"><a href="">Projects</a></li>
                    <li><a href="student/student.php?college=<?php echo $_SESSION['college_profile_id'];?>">Student & Alumni</a></li>
                    <li><a href="activity/activity.php?college=<?php echo $_SESSION['college_profile_id'];?>">Activity</a></li>
                    <li><a href="settings/settings.php?college=<?php echo $_SESSION['college_profile_id'];?>">Settings</a></li>
                </ul>
            </div>
            <?php
            }
            else{ //NOT AND HOD 
                ?>
            
            
            <!--TABS FOR STUDNET USER-->
            <div class="container" >
                <ul class="nav nav-tabs" style=" margin-bottom: 10px;">
                    <li class="active"><a href="">Projects</a></li>
                    <li><a href="student/student.php?college=<?php echo $_SESSION['college_profile_id'];?>" >Student & Alumni</a></li>
                    <li><a href="member/member.php?college=<?php echo $_SESSION['college_profile_id'];?>" >Members</a></li>
                </ul>
            </div>            
            <?php } 
            
            ?>
            
            </div>
        
        <div><hr class="featurette-divider"> </div>
        <div style="margin:0 10% 25% 20%;">
<?php include '../../institutes/institute_project.php'; ?>


        </div>
        <div>
           
        </div>
        <!--Page footer section-->
            <footer>
                <p style="text-align: center;">2017 eduRoom &copy;</p>
            </footer>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            
            <script src="../../styles/js/bootstrap.min.js"></script>
    </body>

    </html>