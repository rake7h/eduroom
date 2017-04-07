<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<html>
<head>
        <title>EduRoom | Memebers</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/styles/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="/styles/css/bootstrap-theme.min.css ">
        <link rel="stylesheet" href="/styles/css/normalize.css ">
        <!-- Latest compiled and minified JavaScript -->
        <script src="/styles/js/bootstrap.min.js "></script>
        <link href="/styles/css/main.css" rel="stylesheet"> </head>
<body>
        <!--Header TOP-->
        <nav class="navbar navbar-default ">
            <div class="container-fluid ">
                <!--eduroom logo-->
                <div class="navbar-header "> <a class="navbar-brand " href="../ ">eduRoom</a> </div>
            </div>
        </nav>
        <!--Onboarding BODY -->
        <div class="cantainer center-block " style="max-width:600px; ">
            <div class="page-header " style=text-align: center;>
                <h1>Project Members<br>
            <small>Add your project team members</small></h1> </div>
        </div>
        <form class="form-signup" name="add_members" action="components/member_add_action.php" method="post">
            <div class="cantainer center-block " style="max-width:400px;">
                <div class="row">
                    <p>Registered members</p>
                    <div class="col-md-20">
                        <div class="input-group"> <span class="input-group-addon" id="basic-addon1">You</span>
                            <input type="text" class="form-control" placeholder="Email address" aria-describedby="basic-addon1" value="<?php echo $_SESSION['user_username']; ?>"> </div>
                    </div>
                    <br>
                    <p>You can add your all project member by their emails</p>
                    <div class="col-md-20">
                        <div class="input-group"> <span class="input-group-addon" id="basic-addon1">Members</span>
                            <input type="text" class="form-control" placeholder="Email address" aria-describedby="basic-addon1" name="email11"> </div>
                    </div>
                    <div class="col-md-20">
                        <div class="input-group"> <span class="input-group-addon" id="basic-addon1">Members</span>
                            <input type="text" class="form-control" placeholder="Email address" aria-describedby="basic-addon1" name="email12"> </div>
                    </div>
                    <div class="col-md-20">
                        <div class="input-group"> <span class="input-group-addon" id="basic-addon1">Members</span>
                            <input type="text" class="form-control" placeholder="Email address" aria-describedby="basic-addon1" name="email13"> </div>
                    </div>
                </div>
                <br>
                <div>
                <button class="btn btn-default" type="submit" name="add_members">Save</button>
                <!--//just me 
                //Invite as User (i) and add to the teams of the following projects-->
                    <a href="../../dashboard.php" class="skip_button pull-right" name="skip">I'll do it later</a>
                </div>
            </div>
        </form>
        
    
    <?php echo $_SESSION['latest_project_id'];?>
           
    
    <!--footer section---------------------->
            <hr class="featurette-divider">
            <footer>
                <p style="text-align: center;">&copy; 2017 eduroom </p>
            </footer>