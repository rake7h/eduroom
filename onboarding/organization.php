<?php 
session_start(); 
    session_regenerate_id();
    if(!isset($_SESSION['user_username']))      // if there is no valid session
    {
    header("Location: ../index.php");
    }
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
        
        <!-- Latest compiled and minified JavaScript -->
        <script src="../styles/js/bootstrap.min.js"></script>
        <link href="/styles/css/main.css" rel="stylesheet"> 
         
    
    <script src="/onboarding/components/style/jQuery.min.js"></script>
	<script src="/onboarding/components/style/bootstrap3_typeahead.js"></script>
        

        </head>



    <body>
        <!--section navigation-->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!--eduroom logo-->
                <div class="navbar-header"> <a class="navbar-brand" href="../">eduRoom</a> </div>
            </div>
        </nav>
          
        
        <!--section page header -->
        <div class="cantainer center-block" style="max-width:600px;">
            <div class="page-header" style=text-align:left;>
                <h1>Institute Details<br><small>Enter college and your course details</small></h1> </div>
            
            <?php
        include '../resources/config.php';
        $user_username= $_SESSION['user_username'];
        $sql = "SELECT * FROM user where user_username='$user_username'";
        $result = mysqli_query($database,$sql) or die(mysqli_error($database)); 
        $rws = mysqli_fetch_array($result);
        $_SESSION['user_id']=$rws['user_id'];
       ?> 
            
            <!--form-->
           <?php include ('components/institute_form.php');
            
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
        <script src="https://cdn.jsdelivr.net/places.js/1/places.min.js"></script>
        <script src="/styles/js/bootstrap.min.js"></script>

<script>
(function() {
  var placesAutocomplete = places({
    container: document.querySelector('#address')
  });

  var $address = document.querySelector('#address-value')
  placesAutocomplete.on('change', function(e) {
    $address.textContent = e.suggestion.value 
  });

  placesAutocomplete.on('clear', function() {
    $address.textContent = 'none';
  });

})();
</script>
        
    </body>

    </html>