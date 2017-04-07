<?php
session_start();

//error reporting 
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<html>
<head>
    <title>EduRoom | New Project</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/styles/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="/styles/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/styles/css/normalize.css">
    <!link rel="stylesheet" href="/styles/css/bulma.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="/styles/js/bootstrap.min.js"></script>
    <script src="/onboarding/style/validate.js"></script>

    <link href="/styles/css/main.css" rel="stylesheet"> </head>
<body>

    
    <!--section navigation-->
    
    
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!--eduroom logo-->
            <div class="navbar-header">
                <a class="navbar-brand" href="../">eduRoom</a>
            </div>
            
        </div>
    </nav>
    
    
    
    
    <!--section page header -->
   <div class="cantainer center-block" style="max-width:600px;">
        <div class="page-header" style=text-align:left;>
            <h1>Create new project <br><small>A place where you can build your project</small></h1> </div>
       <!--form-->
        <?php
              //You can't have project management software without projects, so let's create one!

       include 'components/newproject_form.php';
       echo $_SESSION['user_username'];
       echo $_SESSION['user_id'];
        ?>
       
             </div>
     
    <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="/js/jquery-3.0.0.min.js"><\/script>')
        </script>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>