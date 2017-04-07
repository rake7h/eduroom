<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
    <html>

    <head>
        <title>EduRoom | Search Projects</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/styles/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="/styles/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/styles/css/normalize.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="/styles/js/bootstrap.min.js"></script>
        <link href="/styles/css/main.css" rel="stylesheet">
        <link href="/styles/css/normalize.css" rel="stylesheet">
    </head>

    <body>
        <!--section navigation-->
        <div>
            <!--section navigation-->
            <nav class="navbar navbar-default ">
                <div class="container-fluid">
                    <!--eduroom logo-->
                    <div class="navbar-header"> <a class="navbar-brand" href="../index.php"> eduRoom</a> </div>
                </div>
            </nav>
        </div>

        <!--search header-->
        <div class="row">
            <div class="col-md-3 " style="padding-left:1cm; padding-bottom:10px;">
                <h3>Search</h3></div>
            <div class="col-md-5">
                <form accept-charset="UTF-8" name="search_frm" method="get">
                    <input type="text" class="form-control input-block" placeholder="Search eduroom" aria-describedby="basic-addon2" name="q" value="">
                </form>
            </div>
            <div class="col-md-">
                <input class="btn btn-default " type="submit" value="Search">
            </div>
        </div>
                <div class="border-bottom" style=" margin-bottom:10px;"></div>