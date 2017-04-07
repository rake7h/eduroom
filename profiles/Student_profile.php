<?php
session_start();
?>
<html>
<head>
    <title>EduRoom | Student Projects</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/styles/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="/styles/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/styles/css/normalize.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="/styles/js/bootstrap.min.js"></script>
    <link href="/styles/css/main.css" rel="stylesheet"> 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="/styles/js/jquery-3.0.0.min.js"><\/script>')
    </script>
    <script src="/styles/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="sp.css">

    </head>

<body>
<!--section navigation-->
  
        <nav class="navbar navbar-default ">
            <div class="container-fluid">
                <!--eduroom logo-->
                <div class="navbar-header"> <a class="navbar-brand" href="../index.php"> eduRoom</a> </div>
                <form class="navbar-form navbar-left" role="search" action="search/search.php" role="search" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search eduRoom" name="q"> </div>
                </form>
                <!--user dropdown menu right end-->
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown  "> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php
                    $loged_user = $_SESSION['user_username'];
                     echo $loged_user ?> 
                    
                    <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="../profiles/Student_profile.php">Your Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Activities</a></li>
                            <li><a href="#">Teams Members</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="../logout.php">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
 <?php 
        include '../resources/config.php';
        $user_username= $_SESSION['user_username'];
        $sql = "SELECT * FROM user where user_username='$user_username'";
        $result = mysqli_query($database,$sql) or die(mysqli_error($database)); 
        $rws = mysqli_fetch_array($result);
        //echo $_SESSION['user_username'];
        
?>   
    
<div class="container" >
  <h1 class="page-header">Edit Profile</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
          <div class="col-lg-6 col-md-4">
        <img src="/styles/images/student.png" class="avatar img-circle img-thumbnail" alt="avatar">
          <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block well well-sm">
          </div>
        
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <!--div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        This is an <strong>.alert</strong>. Use this to show important messages to the user.
      </div-->
      <h3>Personal info</h3>
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">First Name</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php echo $rws['user_firstname'];?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php echo $rws['user_lastname'];?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Institute</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php echo $rws['user_institute'];?>" type="text">
          </div>
        </div>
          <div class="form-group">
          <label class="col-lg-3 control-label">Course</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php echo $rws['user_course'];?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Stream</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php echo $rws['user_stream'];?>" type="text">
          </div>
        </div>
          <div class="form-group">
          <label class="col-lg-3 control-label">Batch</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php echo $rws['user_batch'];?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php echo $rws['user_email'];?>" type="text">
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-md-3 control-label">Username:</label>
          <div class="col-md-8">
            <input class="form-control" value="<?php echo $rws['user_username'];?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="button">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
    