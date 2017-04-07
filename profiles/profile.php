<?php
    session_start();
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    
    if (isset($_GET['user_username'])) {
        $user_username = $_GET['user_username'];
    }
    require '../resources/config.php';
    $user_username = mysqli_real_escape_string($database,$_REQUEST['user_username']);

    $sql = "SELECT * FROM user where user_username='$user_username'";
    $result = mysqli_query($database,$sql) or die(mysqli_error()); 
    $rws = mysqli_fetch_array($result);       

    
    //$current_user = $_SESSION['user_username'];
    $user_username = mysqli_real_escape_string($database,$_REQUEST['user_username']);
    $profile_username= $rws['user_username'];
    //if(!$_SESSION['user_username']){
      //  header("location: /index.php");
    //}?>
<html>
<head>
        <title>EduRoom | Student Projects</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/styles/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="/styles/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/styles/css/normalize.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="/styles/js/bootstrap.min.js"></script>
        <link href="/styles/css/main.css" rel="stylesheet">
        <link href="/styles/css/grd.css" rel="stylesheet">
        <link href="/profiles/sp.css" rel="stylesheet">

    </head>
    <body>
        <!--section navigation-->
        <nav class="navbar navbar-default ">
            <div class="container-fluid">
                <!--eduroom logo-->
                <div class="navbar-header"> <a class="navbar-brand" href="../index.php"> eduRoom</a> </div>
                <form class="navbar-form navbar-left" role="search" action="../search/search.php" role="search" method="get">
                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search eduRoom" name="q">
                    </div>
                </form>
                <!--user dropdown menu right end-->
                <!--ul class="nav navbar-nav pull-right">
                    <li class="dropdown"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php $loged_user = $_SESSION['user_username']; echo $loged_user ?><span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="profiles/Student_profile.php">Your Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Activities</a></li>
                            <li><a href="#">Teams Members</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="..//logout.php">Log out</a></li>
                        </ul>
                    </li>
                </ul-->
            </div>
        </nav>
        <!--section page header-->
        <div class="col-md-3" style="">
            <div>   
                <a href="https://avatars0.githubusercontent.com/u/20952577?v=3&amp;s=400" aria-hidden="true" class="vcard-avatar d-block position-relative" itemprop="image">
                <img alt="" class="avatar width-full rounded-2" height="230" src="https://avatars2.githubusercontent.com/u/20952577?v=3&amp;s=460" width="230"></a>
                
                <div class="vcard-names-container py-3 js-sticky js-user-profile-sticky-fields" style="position: static;">
                    <h1 class="vcard-names"><span class="vcard-fullname d-block" itemprop="name">
                    <?php echo $rws['user_firstname'];?> <?php echo $rws['user_lastname'];?></span>
                    <span class="vcard-username d-block" itemprop="additionalName"><?php echo $rws['user_username']?></span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div>
            <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">PROJECTS</h3>
                </div>
                <div class="panel-body">
    <div class="row">
            <?php 
            
            $sql = "SELECT  project_student.project_name, project_student.project_des, user.user_username FROM project_relation INNER JOIN user ON user.user_id=project_relation.user_id INNER JOIN project_student ON project_student.project_id=project_relation.project_id WHERE user_username ='$user_username'";   
                    $result= mysqli_query($database,$sql) or die(mysqli_errno());
                    $trws= mysqli_num_rows($result);
                    if($trws>0){
                        while ($rws=  mysqli_fetch_array($result))
                        {
                            $project_name['project_name']=$rws['project_name'];
                            $project_des['project_des']=$rws['project_des'];
                            $project_user['project_user']=$rws['user_username'];
            ?>
            
            
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="/styles/images/Computer-Science-2.jpg" alt="...">
      <div class="caption">
        <h4><?php echo $project_name['project_name']; ?></h4>
        <p><?php echo $project_des['project_des']; ?></p>
        
      </div>
    </div>
  </div>
      <?php
                            }
                            }
                             else{
                                ?>
        
                <center>
                    <h3>No project yet!</h3></center>
          
        <?php
                            } ?>    
</div>
                    
            </div>
            </div>
            </div>
            
            
            <div>
                <div>
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">EDUCATION</h3>
                    </div>
                            <div class="panel-body">
                                
                                    <div class="col-sm-1">
                                        <img src="/styles/images/photo.jpg.png" width="30" height="30">
                                    </div>
                                    <div class="col-sm-7">
                                        <div>
                                            <a href="#"><h4>Bhilai institute of technology, durg </h4></a>
                                        </div>
                                        <div><p>Computer Science and Engineering</p></div>
                                        <div><p>B. Tech 2017</p></div>

                                </div>
                                
                                
                        </div>
                    </div>
                </div>
            </div>
        
        
            
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <!--footer section---------------------->
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="/styles/js/jquery-3.0.0.min.js"><\/script>')
        </script>
        <script src="/styles/js/bootstrap.min.js"></script>
    </body>

    </html>