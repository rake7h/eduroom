<?php 
session_start(); 
    session_regenerate_id();
    if(!isset($_SESSION['user_username']))      // if there is no valid session
    {
    header("Location:login.php");
    }
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
    <html>

    <head>
        <title>Eduroom | Student Projects</title>
        <!-- Latest compiled and minified CSS -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/styles/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="/styles/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/styles/css/normalize.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="/styles/js/bootstrap.min.js"></script>
        <link href="/styles/css/main.css" rel="stylesheet">
        <link href="/styles/css/grd.css" rel="stylesheet"> </head>

    <body>
        <!--section navigation-->
        <nav class="navbar navbar-default ">
            <div class="container-fluid">
                <!--eduroom logo-->
                <div class="navbar-header"> <a class="navbar-brand" href="../index.php"> eduroom</a> </div>
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
                            <li><a href="profiles/Student_profile.php">Your Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/onboarding/new.php">Add Project</a></li>
                            <li><a href="#">Activities</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="logout.php">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        
        
        
        <!--Section project list-->
        
    <div class="row">
     <div class="col-lg-5">
    <div class="container pull-right" style="max-width:320px">
        <div class="list-group">
            <a class="list-group-item active"> 
                <h4 class="list-group-item-heading">Working Projects</h4></a>
                            <?php
                            error_reporting(E_ALL);
                            ini_set("display_errors", 1);
                            require 'resources/config.php';
                            $user_id=$_SESSION['user_id'];
        $query ="select * from project_student NATURAL JOIN project_relation WHERE user_id=$user_id";
        $result=mysqli_query($database,$query) or die(mysqli_error($database));
        $trws=mysqli_num_rows($result);
         if($trws>0){
             while($rws=mysqli_fetch_array($result)){
            $project_id['project_id']=$rws['project_id'];
            $project_name['project_name']=$rws['project_name'];
            $project_des['project_des']=$rws['project_des'];
            $project_date['project_date']=$rws['project_date'];
            
           ?>
            <a href="app/project_dashboard.php?project_name=<?php echo $project_name['project_name']; ?>&project_id=<?php echo $project_id['project_id']; ?>" class="list-group-item"><h3><?php echo $project_name['project_name']; ?></h3>
            <p class="list-group-item-text"><?php echo $project_des['project_des']; ?></p></a>


                       
                
            
            <?php
             }
         }
             
        ?>
            </div>
            </div>
        </div>
        </div>
        <!--section team members-->
        
        <!--div class="row">
        
            <div class="col-lg-1  pull-right">
                <div class="container  pull-right" style="max-width:320px">
                    <div class="list-group">
                        <a class="list-group-item active"> <span class="badge">4</span> Team members </a> <a href="#" class="list-group-item">Rakesh singh</a> <a href="#" class="list-group-item">Dhanjay rai</a> <a href="#" class="list-group-item">Rishi agrawal</a> <a href="#" class="list-group-item">Abhay</a> </div>
                </div>
            </div>
        </div-->
        
        
        
        
        <!--footer section---------------------->
        <div><hr class="featurette-divider"></div>
    <footer>
        <p style="text-align: center;">2017 eduroom &copy;</p>
    </footer>
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="/styles/js/jquery-3.0.0.min.js"><\/script>')
        </script>
        <script src="/styles/js/bootstrap.min.js"></script>
    </body>

    </html>