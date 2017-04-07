<?php 
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);
$loged_user = $_SESSION['user_username'];
$project_id=$_REQUEST['project'];
?>
    <html>

    <head>
        <title>EduRoom | Calendar</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../../styles/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="../../styles/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../styles/css/normalize.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="../../styles/js/bootstrap.min.js"></script>
        <link href="../../profiles/style.css" rel="stylesheet">
        <link href="../../styles/css/grd.css" rel="stylesheet">
        <link href="../../styles/font/css/font-awesome.min.css" rel="stylesheet">
        <link href ="../style/css/files.css" rel="stylesheet">
    </head>

    <body>
        
        <!--section navigation-->
        <nav class="navbar navbar-default  navbar-fixed-top">
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
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo $loged_user ?>

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
            
        <!--project header hero-->
        <div style="margin:3%;">
        <div class="container-fluid">
            
        </div>
            </div>

        <!--Menu bar body-->
    <div class="container-fluid">
      <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li role="navigation"> <a href="index.php?project=<?php echo $project_id;?>"><i class="fa fa-rss" aria-hidden="true"></i>  Activity feed</a></li>
                    <li role="navigation"><a href="task.php?project=<?php echo $project_id;?>"><i class="fa fa-tasks" aria-hidden="true"></i>  Task & milestones</a></li>
                    <li role="navigation" class="active"><a href=""><i class="fa fa-folder-o" aria-hidden="true"></i> Documents</a></li>
                    <li role="navigation" ><a href="discussions.php?project=<?php echo $project_id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i> Discussion</a>
                    <li role="navigation" ><a href="calendar.php?project=<?php echo $project_id;?>"><i class="fa fa-calendar" aria-hidden="true"></i> Calendar</a>
                    <li role="navigation"><a href="notice.php?project=<?php echo $project_id;?>"><i class="fa fa-bullhorn" aria-hidden="true"></i>  Notice</a></li>
                    <li role="navigation"><a href="settings.php?project=<?php echo $project_id;?>"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a> </li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                   <?php
                    include ('../../resources/config.php');
                    
                    $project_details= "SELECT * FROM project_student WHERE project_id='$project_id'";
                    $result_project_q = mysqli_query($database,$project_details) or die(mysqli_errno());
                    $trws_project_q= mysqli_num_rows($result_project_q);
                    if($trws_project_q>0){
                        while ($rws_project_q=  mysqli_fetch_array($result_project_q))
                            { 
                            $project_name['project_name']=$rws_project_q['project_name'];
                            $project_des['project_des']=$rws_project_q['project_des'];
                            $project_date['project_date']=$rws_project_q['project_date'];
                            $project_avatar['project_avatar']=$rws_project_q['project_avatar'];
                            $project_cover['project_cover_img']=$rws_project_q['project_cover_img'];
                            $project_name['project_short_des']=$rws_project_q['project_short_des'];
                            $project_lastactive['project_last_active_date']=$rws_project_q['project_last_active_date'];

                        }
                    }
                    ?>
                <div class="container-fluid">
                    <div class="row">
                <div class="col-md-2">
                    <div class="container">
                        <img src="../<?php echo $project_avatar['project_avatar'];?>" height="80px" width="80px">
                    </div>
                </div>
                    <div class="col-md-10">
                        <div class="container">
                            <div><h3><?php echo $project_name['project_name'];?></h3></div>
                            <div><h5><?php echo $project_des['project_des'];?></h5></div>
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
                    <div><hr class="featurette-divider"> </div>
                </div>
        <!--Content body for menu-->
                <div class="container-fluid">
                    <div class="row">
                <div class="col-md-12">
                    
                    <div>
                     <div class="pull-left"><h4 >Project files</h4></div>
                    </div>
                        </div>
        <div class="container-fluid">
        <div class="row">
             <div class="col-md-12">
            
                 <div class="container-fluid" style="margin-top:2%;">
                 <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name</strong></p>
                    </div>
                    <div class="col-md-2">
                        <p><strong>Size</strong></p>
                    </div>
                    <div class="col-md-2">
                        <p><strong>Date</strong></p>
                    </div>
                    <div class="col-md-2">
                        <p><strong>Uploaded by</strong></p>
                    </div>
                    </div>
                     
                 </div>
                 <div style="height:500px;overflow-y:scroll">
                        <?php
                        require('../../resources/config.php');
                        $file_q="SELECT file_id,file_name,file_size,file_type,file_url,file_date,file_file_id,file_id,file_project_id,file_user_id, user_firstname,user_lastname FROM files NATURAL JOIN file_relation INNER JOIN user ON file_relation.file_user_id=user.user_id WHERE file_relation.file_project_id='$project_id' AND file_relation.file_file_id=files.file_id";
                        $result= mysqli_query($database,$file_q) or dia(mysqli_error($database));
                        $wrs=mysqli_num_rows($result);
                        if($wrs>0){
                            while($rows=mysqli_fetch_array($result)){
                                $file_name['file_name']=$rows['file_name'];
                                $file_size['file_size']=$rows['file_size'];
                                $file_date['file_date']=$rows['file_date'];
                                $uploader_fname['user_firstname']=$rows['user_firstname'];
                                $uploader_lname['user_lastname']=$rows['user_lastname'];
                                $file_type['file_type']=$rows['file_type'];
                        ?>
         
           <div class="container-fluid">
               <div  class="filerow">
               <div><hr class="featurette-divider"></div>
                <div class="row">
                    <div class="col-md-6 wordb">
                        <a href="../files/view.php?doc=<?php echo $file_name['file_name']; ?>"><p><?php echo $file_name['file_name']; ?></p></a>
                    </div>
                    <div class="col-md-2 wordb">
                        <p><?php echo $file_size['file_size']; ?> KB</p>
                    </div>
                    <div class="col-md-2 wordb">
                        <p><?php echo $file_date['file_date']; ?></p>
                    </div>
                    <div class="col-md-2 wordb">
                        <p><?php echo $uploader_fname['user_firstname']." ".$uploader_lname['user_lastname']; ?></p>
                    </div>
                    </div>
                    </div>
                     </div>
            
                 <?php
                       
                   }
                }
            
            ?>
                 
                
                 </div>  
            </div>
            </div>
        
        </div>
                    
                    </div>
                    <div class="col-md-12">
                    
                    </div>
                </div>
                </div>
        </div>
         </div>
        
       
        
        
        
        
        <!--Page footer section-->
            <footer>
                <div><hr class="featurette-divider"> </div>
                <p style="text-align: center;">2017 eduroom &copy;</p>
            </footer>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            
            <script src="../../styles/js/bootstrap.min.js"></script>
        <link href="../style/css/guidedash.css" rel="stylesheet">
        <style>
            
            </style>
    </body>

    </html>
        