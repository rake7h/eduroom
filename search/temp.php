<?php 
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
    <html>

    <head>
        <title>EduRoom | Student Projects</title>
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
        <div class="col-md-3" style="">

            <div class="list-group">
                <a href="search.php?q=<?php echo $q_project=$_GET['q'];?>&type=project" class="list-group-item">Project</a>
                <a href="search.php?q=<?php echo $q_project=$_GET['q'];?>&type=college" class="list-group-item">College</a>
                <a href="search.php?q=<?php echo $q_project=$_GET['q'];?>&type=student" class="list-group-item">Student</a>
                <a href="search.php?q=<?php echo $q_project=$_GET['q'];?>&type=location" class="list-group-item">Location</a>

            </div>
        </div>

        <?php
        
        require '../resources/config.php';
            if($_GET)
            {
                $q=$_GET['q'];
                $type=$_GET['type'];
               
            switch($type){
                
                case "project":
                    
                    $sql = "SELECT  project_student.project_name, project_student.project_des, user.user_username FROM project_relation INNER JOIN user ON user.user_id=project_relation.user_id INNER JOIN project_student ON project_student.project_id=project_relation.project_id WHERE project_name like '%$q_project%' or project_des like '%$q_project%'";   
                    $result= mysqli_query($database,$sql) or die(mysqli_errno());
                    $trws= mysqli_num_rows($result);
                    if($trws>0){
                        while ($rws=  mysqli_fetch_array($result))
                        {
                            $project_name['project_name']=$rws['project_name'];
                            $project_des['project_des']=$rws['project_des'];
                            $project_user['project_user']=$rws['user_username'];
                ?>

                <!--Result Body-->
                <div class="col-md-offset-4 border-bottom">
                    <div>
                        <a href=""><h1><?php echo $project_name['project_name'];?></h1></a>
                    </div>

                    <div>
                        <p><?php echo $project_des['project_des'];?></p>
                    </div>

                    <div>
                        <p><span>@</span>
                            <?php echo $project_user['project_user'];?>
                        </p>
                    </div>

                </div>
                <?php
                            }
                            }
                    break;
                    
                case "college":
                    
                    $sql ="SELECT * FROM user WHERE user_institute like '%$q%' order by user_id";
                    $result= mysqli_query($database,$sql) or die(mysqli_errno());
                    $trws= mysqli_num_rows($result);
                    if($trws>0){
                        while ($rws=  mysqli_fetch_array($result))
                        {
                            $user_institute['user_institute']=$rws['user_institute'];
                            $user_location['user_location']=$rws['user_location']; ?>
                    <!--Result Body-->
                    <div class="col-md-offset-4 border-bottom">
                        <div>
                            <a href="/profiles/institute_profile.php"><h3><?php echo $user_institute['user_institute'];?></h3></a>
                        </div>
                        <div>
                            <p>
                                <?php echo $user_location['user_location'];?>
                            </p>
                        </div>
                    </div>
                    <?php
                                }
                                }
                    break;
                    
                case "student":
                    
                     $sql ="SELECT * FROM user WHERE user_firstname like '%$q%' or user_lastname like '%$q%' order by user_id";
                        $result= mysqli_query($database,$sql) or die(mysqli_errno());
                        $trws= mysqli_num_rows($result);
        
        
                            if($trws>0){
                                while ($rws=  mysqli_fetch_array($result))
                                {
                                    $user_fname['user_firstname']=$rws['user_firstname'];
                                    $username['user_username']=$rws['user_username'];
                                    $user_institute['user_institute']=$rws['user_institute'];?>
                        <!--Result Body-->
                        <div class="col-md-offset-4 border-bottom">
                            <div>
                                <a href=""><h3><?php echo $user_fname['user_firstname'];?></h3></a>
                            </div>

                            <div>
                                <p>@
                                    <?php echo $username['user_username'];?>
                                </p>
                            </div>

                            <div>
                                <p>
                                    <?php echo $user_institute['user_institute']; ?>
                                </p>
                            </div>
                        </div>
                        <?php }}
                    break;
                    
                case "location":
                    echo "location";
                    break;
                    
                default:
                    //$type="project";
                    $sql = "SELECT  project_student.project_name, project_student.project_des, user.user_username FROM project_relation INNER JOIN user ON user.user_id=project_relation.user_id INNER JOIN project_student ON project_student.project_id=project_relation.project_id WHERE project_name like '%$q_project%' or project_des like '%$q_project%'";   
                    $result= mysqli_query($database,$sql) or die(mysqli_errno());
                    $trws= mysqli_num_rows($result);
                    if($trws>0){
                        while ($rws=  mysqli_fetch_array($result))
                        {
                            $project_name['project_name']=$rws['project_name'];
                            $project_des['project_des']=$rws['project_des'];
                            $project_user['project_user']=$rws['user_username'];
                ?>

                            <!--Result Body-->
                            <div class="col-md-offset-4 border-bottom">
                                <div>
                                    <a href=""><h1><?php echo $project_name['project_name'];?></h1></a>
                                </div>

                                <div>
                                    <p>
                                        <?php echo $project_des['project_des'];?>
                                    </p>
                                </div>

                                <div>
                                    <p><span>@</span>
                                        <?php echo $project_user['project_user'];?>
                                    </p>
                                </div>

                            </div>
                            <?php
                            }
                            }
            }
        }
        else //main else
        {
        ?>
                                <div class="container pull-center">
                                    <div class="jumbotron">
                                        <p>Not found</p>
                                    </div>
                                </div>

                                <?php } ?>




                                    <!--footer section---------------------->

                                    <!-- Bootstrap core JavaScript
    ================================================== -->
                                    <!-- Placed at the end of the document so the pages load faster -->
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                                    <script>
                                        window.jQuery || document.write('<script src="/styles/js/jquery-3.0.0.min.js"><\/script>')
                                    </script>
                                    <script src="/styles/js/bootstrap.min.js"></script>
    </body>

    </html>