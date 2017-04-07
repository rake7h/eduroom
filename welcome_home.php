<?php
ob_start();
session_start();
    session_regenerate_id();
    if(!isset($_SESSION['user_username']))      // if there is no valid session
    {
    header("Location: /index.php");
    }
error_reporting(E_ALL);
ini_set("display_errors", 1);
//check session
if (isset($_SESSION['user_username'])==false) 
{
header("locaion: login.php");
}?>
        
<html>
<head>
    <title>eduroom </title>
    

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="styles/font/css/font-awesome.min.css" rel="stylesheet">    
    
    </head>
<body>
<?php
    
    include ('resources/config.php');
    $user_username= $_SESSION['user_username'];
    $user_details = "SELECT * FROM user where user_username='$user_username'";
        
    $result = mysqli_query($database,$user_details) or die(mysqli_error($database)); 
        $rws = mysqli_fetch_array($result);
        $loged_userid['user_id']=$rws['user_id'];
        $loged_user_role['user_role']=$rws['user_role'];
        $_SESSION['user_id']=$rws['user_id'];
        $_SESSION['loged_user_user_name']=$rws['user_username'];
        
    switch($loged_user_role['user_role'])
    {
            
        case "12100":
            $_SESSION['user_id']=$rws['user_id'];
            $_SESSION['loged_user_user_name']=$rws['user_username'];
            ?><?php include ('components/nav/12100_nav.php');?><?php
    break;
            case "1201":
            $_SESSION['user_id']=$rws['user_id'];
            $_SESSION['loged_user_user_name']=$rws['user_username'];
                ?><?php include ('components/nav/1201_nav.php'); ?><?php
        break;
            case "122":
            $_SESSION['user_id']=$rws['user_id'];
            $_SESSION['loged_user_user_name']=$rws['user_username'];
                ?><?php  include ('components/nav/122_nav.php'); ?><?php
        break;
            case "10010":
            $_SESSION['user_id']=$rws['user_id'];
            $_SESSION['loged_user_user_name']=$rws['user_username'];
                ?><?php  include ('components/nav/10010_nav.php'); ?><?php
        break;
            
            default:
                echo "default not match any role";
                
        }
    $user_id= $_SESSION['user_id'];
    $check_project="select * from project_student NATURAL JOIN project_relation WHERE user_id='$user_id'";
    $result=mysqli_query($database,$check_project) or die(mysqli_error($database));
      $trws=mysqli_num_rows($result);
         if($trws!=0){
           header('location: dashboard.php');
         }
    ob_end_flush();
    ?>
<!--section page header -->
    <div class="jumbotron" style=" text-align:center; background-color: transparent;">
        <h2>Stay connected </h2>
        <p class="lead">Build your project easily with eduroom we help you to connect with your project team members</p>
        <p>Create your first project</p>
        <p><a class="btn btn-lg btn-success" href="/onboarding/new.php" role="button">Add Project</a></p>
    </div>
    

    <div>
    <!--footer section---------------------->
    <hr class="featurette-divider"> </div>
    <footer>
        <p style="
         text-align: center;
         "> 2017 eduRoom &copy;</p>
        <p><?php echo $user_id; ?></p>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>   
    <script>
        window.jQuery || document.write('<script src="/styles/js/jquery-3.0.0.min.js"><\/script>')
    </script>
    <script src="/styles/js/bootstrap.min.js"></script>

    <script>
    $(function(){
    $("[data-toggle=popover]").popover({
        html : true,
        content: function() {
          var content = $(this).attr("data-popover-content");
          return $(content).children(".popover-body").html();
        },
        title: function() {
          var title = $(this).attr("data-popover-content");
          return $(title).children(".popover-heading").html();
        }
    });
});
    </script>
    
</body>

</html>