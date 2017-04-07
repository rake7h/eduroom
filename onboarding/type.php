<!DOCTYPE html>
<?php
session_start();
?>
    <html>

    <head>
        <title>EduRoom | Project Type</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/styles/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="/styles/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/styles/css/normalize.css">
        <!link rel="stylesheet" href="/styles/css/bulma.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="/styles/js/bootstrap.min.js"></script>
        <link href="/styles/css/main.css" rel="stylesheet"> </head>

    <body>
        <!--Header TOP-->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!--eduroom logo-->
                <div class="navbar-header"> <a class="navbar-brand" href="../">eduRoom</a> </div>
            </div>
        </nav>
        
        <!--Onboarding BODY -->
        <div class="cantainer center-block" style="max-width:600px; text-align:center;">
            <div class="page-header" style=text-align:center;>
                <h1>Project type<br>
            <small>Choose your project type and category</small></h1> </div>
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail"> <img src="../styles/images/developer.png" alt="..."> </a>
                    <h1 class="text-center">Developer</h1> </div>
                <div class="col-xs-6 col-md-3">
                    <a href="/onboarding/members.php" class="thumbnail"> <img src="../styles/images/student.png" alt="..."> </a>
                    <h1 class="text-center">Student</h1> </div>
            </div>
        </div>

    </html>