<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

    session_start();
    require 'resources/config.php';
    if  (isset($_SESSION['user_username'])){
        header("location:../welcome_home.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eduroom | Student Projects</title>
    <link rel="stylesheet" type="text/css" href="styles/css/main.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/styles/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="/styles/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/styles/css/normalize.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="/styles/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default" style="margin-bottom:0;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">eduroom</a>
            </div>
              <ul class="nav navbar-nav navbar-left">
                <li><a href="explore.php">Explore</a></li>
                <li><a href="institutes/explore.php">Colleges</a></li>

            </ul>
            <form class="navbar-form navbar-left" action="search/search.php" role="search" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search eduRoom" name="q"></div>
            </form>
            
            
            <ul class="nav navbar-nav pull-right">
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </nav>
    <!--  Join eduRoom main page-->
    <div class="jumbotron">
        <div class="container">
            <h1>Connecting students</h1>
            <p></p>
            <p><a class="btn btn-lg btn-success pull-right" href="signup.php" role="button">Sign Up</a></p>
        </div>
    </div>
    <!--footer section---------------------->
    <hr class="featurette-divider">
    <footer>
        <p style="
         text-align: center;
         ">&copy; 2017 eduroom</p>
    </footer>
</body>

</html>