<?php 
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
    <html>

    <head>
        <title>EduRoom | Student Projects</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../../../styles/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="../../../styles/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../../styles/css/normalize.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="../../../styles/js/bootstrap.min.js"></script>
        <link href="../../style.css" rel="stylesheet">

        
        
    </head>

    <body>
        
        <!--section navigation-->
        <nav class="navbar navbar-default" style="margin-bottom:0">
            <div class="container-fluid">
                <!--eduroom logo-->
                <div class="navbar-header"> <a class="navbar-brand" href="../../../index.php"> eduRoom</a> </div>
                <form class="navbar-form navbar-left" role="search" action="../../search/search.php" role="search" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search eduRoom" name="q"> </div>
                </form>
                <!--user dropdown menu right end-->
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown  ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php
                        @$loged_user = $_SESSION['user_username'];
                        echo $loged_user ?>

                                <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="Student_profile.php">Your Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Activities</a></li>
                            <li><a href="#">Teams Members</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="../../logout.php">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
       
            
        <!--institute header_wall-->
        <div class="container-fluid" style="background-color:#FAFBFC;">
            <div class="row" style="">
                    <?php
                    include ('../../../resources/config.php');
                    $college_id =$_REQUEST['college'];
                    $_SESSION['college_profile_id']=$college_id;
                    //echo $college_id;
                    $college_q= "SELECT * FROM colleges WHERE college_id='$college_id'";
                    $result_college_q = mysqli_query($database,$college_q) or die(mysqli_errno());
                    $trws_college_q= mysqli_num_rows($result_college_q);
                    if($trws_college_q>0){
                        while ($rws_college_q=  mysqli_fetch_array($result_college_q))
                            { 
                            $college_name['college_name']=$rws_college_q['college_name'];
                            $college_district['college=_district']=$rws_college_q['college_district'];
                            $college_state['college_state']=$rws_college_q['college_state'];
                            $colleg_logo['college_logo']=$rws_college_q['college_logo'];
                        }
                    }
                    ?>
                <div class="col-md-1"style=" margin:2% 0 2% 5%;">
                    <div>
                        <img src="../../<?php echo $colleg_logo['college_logo'];?>"  height="60px" width="60px">
                    </div>
                </div>
                    <div class="col-md-6" style="margin:1% 0 1% 0;">
                            <div>
                                <h3><?php echo $college_name['college_name'];?></h3>

                            </div>
                            <div>
                                <h4><?php echo $college_district['college=_district'],", ",$college_state['college_state'];?></h4>
                            </div>
                            <div>
                            </div>
                    </div>
                </div>
            </div>
        <div class="container-flude" style="">
            <div class="row">
               
            </div>
        </div>
        <div class="container" style="margin-top:5%;">
            <div class="row">
                <div class="col-md-12 col-md-offset-1" style="margin-bottom:2%;">
                    <form class="form-inline">
                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search a project" style="width:400px;">
                    <div class="dropdown form-group">
                         <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Areas<span class="caret"></span></button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Computer Science</a></li>
                        <li><a href="#">Electronics</a></li>
                        <li><a href="#">Electrical</a></li>
                        <li><a href="#">Mechanical</a></li>
                        <li><a href="#">Civil</a></li>
                        
                    </ul>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container" style=" margin-top:1%;">
            <div class="row">
            <div class="col-md-6 col-md-offset-1" >
            
                        <?php include '../../../institutes/institute_project.php'; ?>
                
                </div>
                <div class="col-md-3 col-md-offset-1" style="border:dotted;" >
                    <div class="panel panel-default">
                        <div class="panel-body">
                            Filter and options for student view
                        </div>
                    </div>                
                
                </div>
                </div>
            </div>
        <!--Page footer section-->
            <footer>
                <p style="text-align: center;">2017 eduRoom &copy;</p>
            </footer>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            
            <script src="../../../styles/js/bootstrap.min.js"></script>
    </body>

    </html>
        
        