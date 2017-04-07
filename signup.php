<?php
include 'components/session_check.php';
include 'resources/config.php';
?>
<html>

<head>
    <title>EduRoom | Student Projects</title>
    <!-- Latest compiled and minified CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles/css/bootstrap.min.css">
    <link href="/styles/css/main.css" rel="stylesheet">
    <!-- Optional theme -->
    <link rel="stylesheet" href="/styles/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/styles/css/normalize.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="/styles/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            padding-bottom: 40px;
            background-color: #eee;
        }
        
        .form-signup {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        
        .form-signip .form-signin-heading,
        .form-signup .checkbox {
            margin-bottom: 10px;
        }
        
        .form-signup .checkbox {
            font-weight: normal;
        }
        
        .form-signup .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }
        
        .form-signup .form-control:focus {
            z-index: 2;
        }
        
        .form-signip input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        
        .form-signup input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body>
    <!--Navigation bar-->
    <nav class="navbar navbar-default ">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">eduroom</a>
            </div>
            <ul class="nav navbar-nav pull-right">
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </nav>
    
    <!--heading signup -->
    <div class="head_signup">
        <br>
        <center>
            <h2>Sign Up</h2>
            <p>Keep connected with your project team members with eduroom </p>
        </center>
    </div>
    <br>
    <!--Input Form-->
    <div class="container"><?php include'components/form/user_signup.php';
        ?>
    </div>
</body>

</html>