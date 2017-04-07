<?php 
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);
$project_name=$_SESSION['project_name']
?>
    <html>

    <head>
        
        <title>EduRoom | Student Projects</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/styles/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link href="../style/css/jquery.filer.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="/styles/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/styles/css/normalize.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="/styles/js/bootstrap.min.js"></script>
        <link href="../style/css/linetab.css" rel="stylesheet">

        <link href="/styles/font/css/font-awesome.min.css" rel="stylesheet"> 
        <!-- Google Fonts -->
	   <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

        </head>

    <body>
        <!--section navigation-->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!--eduroom logo-->
                <div class="navbar-header"> 
                    <a class="navbar-brand" href="../../index.php"> eduroom</a> </div>
                <form class="navbar-form navbar-left" role="search" action="search/search.php" role="search" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search eduRoom" name="q"> 
                    </div>
                </form>
    
                <!--user dropdown menu right end-->
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['user_username'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="profiles/Student_profile.php">Your Profile</a></li>
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
        
        <!--section page header-->
        <div class="container-fluid" style="margin:0 8% 0 8%;">
        <div class="row">
            <div class="col-md-12">
            <div>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">
                            <? echo $_SESSION['user_username'] ?>
                        </a>
                    </li>
                    <li class="active"><?php echo $_SESSION['project_name']; ?></li>
                </ol>
            </div>
            </div>
            </div>
            
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
            <div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li>
							<a href="../project_dashboard.php">
							Activity feed </a>
						</li>
						<li>
							<a href="">
							Discussion</a>
						</li>
						<li>
							<a href="">
							Tasks </a>
						</li>
                        <li>
							<a href="../files/">
							Files </a>
						</li>
                        <li>
							<a href="">
							Calendar </a>
						</li>
                        <li class="active">
							<a href="" >
							Settings </a>
						</li>
					</ul>
                    <div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
						

            </div>
            </div>
            </div>
            
        <!--Side bar menu-->
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar content-box" style="display: block;">
                        <ul class="nav">
                            <!-- Main menu -->
                            <li class="current"><a href="index.php">Options</a></li>
                            <li><a href="team.php">Team</a></li>
                            <li><a href="stats.html">Collaboration</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Settings</h3> </div>
                        <div class="panel-body"> 
                        <form action="/rename" method="post">
                            
                            <label for="renmproject">Project name</label>
                            <input type="text" name="renmproject" class="form-control" value="<?php echo $project_name; ?>">
                            <button type="submit" class="btn btn-default">Rename</button>
                            </form>
                        
                        
                        </div>
                    </div>
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">Project</h3> </div>
                        <div class="panel-body">
                            <div>
                                <form method="post" action="delete.php">
                                    <button type="submit" class="btn btn-danger pull-right" role="button" name="delete_project"> Delete</button>
                                    <h4>Delete this project</h4>
                                    <p>Once you delete a project, there is no going back. Please be certain.</p>
                                </form>
                            </div>
                            <div>
                                <hr class="divider">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
                </div>
                </div>
                </div>
            </div>
        </div>
        
        <!--footer section---------------------->
            <div><hr class="featurette-divider"> </div>
            <footer>
                <p style="text-align: center;">2017 eduRoom &copy;</p>
            </footer>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script>
                window.jQuery || document.write('<script src="/styles/js/jquery-3.0.0.min.js"><\/script>')
            </script>
            <script src="/styles/js/bootstrap.min.js"></script>
    </body>
        </html>