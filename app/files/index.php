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
    <link rel="stylesheet" href="/styles/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link href="../style/css/jquery.filer.css" type="text/css" rel="stylesheet" />
    <link href="../style/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="/styles/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/styles/css/normalize.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="/styles/js/bootstrap.min.js"></script>
    <link href="../style/css/files.css" rel="stylesheet">
    <link href="../style/css/linetab.css" rel="stylesheet">
    <link href="/styles/font/css/font-awesome.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> </head>

<body>
    <!--section navigation-->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!--eduroom logo-->
            <div class="navbar-header"> <a class="navbar-brand" href="../../index.php"> eduroom</a> </div>
            <form class="navbar-form navbar-left" role="search" action="search/search.php" role="search" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search eduRoom" name="q"> </div>
            </form>
            <!--user dropdown menu right end-->
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php
                    $loged_user = $_SESSION['user_username'];
                    $loged_user_id= $_SESSION['user_id'];       
                    //$_SESSION['project_name']= $_REQUEST['project_name'];
                    //$_SESSION[project_id]= $_REQUEST['project_id'];
                    $project_id=$_SESSION['project_id'];
                    
                     echo $loged_user ?> <span class="caret"></span></a>
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
                            <a href="#"><? echo $loged_user ?></a>
                        </li>
                        <li class="active">
                            <?php echo $_SESSION['project_name']; ?>
                        </li>
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
                                <li><a href="../project_dashboard.php">
							Activity feed </a></li>
                                <li><a href="" >
							Discussion</a></li>
                                <li><a href="" >
							Tasks </a></li>
                                <li class="active"> <a href="" >
							Files </a></li >
                                <li> <a href="" >
							Calendar </a> </li>
                                <li> <a href="../settings/">
							Settings </a> </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_default_1"> </div>
                            </div>
                        </div>
            
            <div class="container-fluid ">
            <div class="row" style="margin-top:2%">
                <div class="col-md-12">
                <div class="pull-left"><h4>Project files</h4></div>
                <div class="pull-right"><a  id="upbb" data-toggle="tooltip" data-placement="left" title="Upload file"><i class="fa fa-cloud-upload fa-2x" aria-hidden="true"></i></a>
                </div>
                </div>
                </div>
            </div>
            
            <div class="container-fluid" id="upload-row" style="display:none;">
            <div class="row" style="margin-top:2%;">
            <div class="col-md-12">
            <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="files[]" id="filer_input" multiple="multiple">
            <input type="submit" class="btn btn-success" value="Save">
            </form>
            </div>
                </div>
                    </div>
            
            

        <!--File body-->
            
        <div class="container-fluid">
        <div class="row">
             <div class="col-md-12">
            
            <?php
            require('../../resources/config.php');
            $file_q="SELECT file_id,file_name,file_size,file_type,file_url,file_date,file_file_id,file_id,file_project_id,file_user_id, user_firstname,user_lastname FROM files NATURAL JOIN file_relation INNER JOIN user ON file_relation.file_user_id=user.user_id WHERE file_relation.file_project_id='$project_id' AND file_relation.file_file_id=files.file_id order by file_id DESC";
            $result= mysqli_query($database,$file_q) or dia(mysqli_error($database));
            $wrs=mysqli_num_rows($result);
                if($wrs>0){
                    ?>
                 <div class="container-fluid" style="margin-top:2%;">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name</strong></p>
                    </div>
                    <div class="col-md-2">
                        <p><strong>Size</strong></p>
                    </div>
                    <div class="col-md-2">
                        <p><strong>Date</strong></p>
                    </div>
                    <div class="col-md-2">
                        <p><strong>Uploaded by</strong></p>
                    </div>
                    </div>
                     
                 </div>
                 <div style="height:500px;overflow-y:scroll">
                     <?php
                   while($rows=mysqli_fetch_array($result)){
                      $file_name['file_name']=$rows['file_name'];
                      $file_size['file_size']=$rows['file_size'];
                      $file_date['file_date']=$rows['file_date'];
                      $uploader_fname['user_firstname']=$rows['user_firstname'];
                    $uploader_lname['user_lastname']=$rows['user_lastname'];

                      $file_type['file_type']=$rows['file_type'];
                ?>
         
           <div class="container-fluid">
               <div  class="filerow">
               <div><hr class="featurette-divider"></div>
                <div class="row">
                    <div class="col-md-6 wordb">
                        <a href="view.php?doc=<?php echo $file_name['file_name']; ?>"><p><?php echo $file_name['file_name']; ?></p></a>
                    </div>
                    <div class="col-md-2 wordb">
                        <p><?php echo $file_size['file_size']; ?> KB</p>
                    </div>
                    <div class="col-md-2 wordb">
                        <p><?php echo $file_date['file_date']; ?></p>
                    </div>
                    <div class="col-md-2 wordb">
                        <p><?php echo $uploader_fname['user_firstname']." ".$uploader_lname['user_lastname']; ?></p>
                    </div>
                    </div>
                    </div>
                     </div>
            
                 <?php
                       
                   }
                }
                     else{
                         ?>
                         <div class="container-fluid">
                        <div>
                        <div><hr class="featurette-divider"></div>
                            No files yet
                            
                        </div>
                     </div>
                     <?php
                         
                     }
            
            ?>
                 
                
            </div>  
            </div>
            </div>
        
        </div>
                </div>
                </div>
        
        <!--footer section---------------------->
        <div>
            <hr class="featurette-divider">
            <?php
        echo $project_id; 
        echo $loged_user_id;    
            ?>
        </div>
        <footer>
            <p style="text-align: center;">2017 eduRoom &copy;</p>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="/styles/js/jquery-3.0.0.min.js"><\/script>')
        </script>
        <script src="/styles/js/bootstrap.min.js"></script>
<link href="../style/css/files.css" rel="stylesheet">

   <script>
    $("#upbb").click(function() {
    $("#upload-row").toggle();
    });
    </script>
       
        <script>
             $(document).ready(function(){
        $('#filer_input').filer({
		showThumbs: true,
		addMore: true,
		allowDuplicates: false
	});

});
            $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
            </script>
<script src="../style/js/jquery.filer.min.js"></script>
        
    </body>

    </html>

                 
                 
        
                 