<?php 
session_start(); 

$loged_user = $_SESSION['user_username'];
$project_id=  $_SESSION['project_id'];
$project_name=  $_SESSION['project_name'];
?>
    <html>

    <head>
        <title>EduRoom | Student Projects</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../../styles/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="../../styles/css/bootstrap-theme.min.css">
        
        <!-- Latest compiled and minified JavaScript -->
    <script src="../../styles/js/bootstrap.min.js"></script>
    <link href="../../styles/css/main.css" rel="stylesheet"> 
            <link href="../style/css/linetab.css" rel="stylesheet">

         
    
	<script src="../../onboarding/components/style/bootstrap3_typeahead.js"></script>
    <script src="../../onboarding/components/style/jQuery.min.js"></script>

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
                <!--setting body-->
                <!--project members-->
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Project members</h3> </div>
                        <div class="panel-body">
                             <div id="member">
                                <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#member-modal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add a Member</button>
                                </div>
                            
                            <?php
                            error_reporting(E_ALL);
                            ini_set("display_errors", 1);
                            require '../../resources/config.php';
                            
        $query ="SELECT * FROM project_relation INNER JOIN invited_member on invited_member.invited_project_id=project_relation.project_id WHERE project_relation.project_id=$project_id";
        $result=mysqli_query($database,$query) or die(mysqli_error($database));
        $trws=mysqli_num_rows($result);
         if($trws>0){
             while($rws=mysqli_fetch_array($result)){
                $ur_user_email['invited_member_email']=$rws['invited_member_email'];
            
      
      ?>
                                <div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="well well-sm">
                                                    <div class="media">
                                                        <a class="img-responsive pull-left" href="#"> <img class="media-object" src="/styles/images/Male-Student.jpg" width="40" height="45"> </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><?php echo $ur_user_email['invited_member_email'] ?></h4>
                                                            <p><span class="label label-info">Front-end developer</span> <span class="label label-warning">150 followers</span></p>
                                                            <p> <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span> Message</a> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
             }
         }
             
        ?>
                        </div>
                        </div>
                    
        <!--Guide list panel-->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div>
                                <div id="feedback">
                                    <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#feedback-modal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add a guide</button>
                                </div>
                                <p>Project guide</p>
                                <div> </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php
                           
        $query_b="SELECT * FROM user INNER JOIN guide_relation ON user.user_id=guide_relation.user_id WHERE project_id='$project_id'";
        $result_b=mysqli_query($database,$query_b) or die(mysqli_error($database));
        $trws_b=mysqli_num_rows($result_b);
         if($trws_b>0){
             while($rws_b=mysqli_fetch_array($result_b)){
            $guide_uname['user_username']=$rws_b['user_username'];
            $guide_avatar['user_avatar']=$rws_b['user_avatar'];

            $guide_fname['user_firstname']=$rws_b['user_firstname'];
            $guide_lname['user_lasttname']=$rws_b['user_lastname'];

            
      
      ?>
                                <div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="well well-sm">
                                                    <div class="media">
                                                        <a class="img-responsive pull-left" href=""> <img class="media-object" src="../../styles/images/<?php echo $guide_avatar['user_avatar']; ?>" width="40" height="45"> </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><?php echo $guide_fname['user_firstname'], " ", $guide_lname['user_lasttname']; ?></h4>
                                                            <p><span class="">@<?php echo  $guide_uname['user_username']; ?></span></p>
                                                            <p><span class="label label-info">Project Guide</span> <span class="label label-warning">150 followers</span></p>
                                                            <p> <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span> Message</a> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
             }
         }
             
        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="member-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> <a class="close" data-dismiss="modal">×</a>
                <h3>Add a project member</h3> </div>
            <div class="modal-body text-center">
                <form class="feedback" name="member"> begin typing name or email address of your project team member
                    <br/>
                    <br/>
                    <div class="text-center">
                        <lable>Email</lable>
                    <input type="email" name="email" id="email" class="from-control" required>
                        <lable>Name</lable>
                    <input type="email" name="name2" id="name2" class="from-control" required>
                                           
                    </div>
                    <input type="hidden" name="p" value="<?php echo $project_id; ?>"> 
                    </form>
                <button class="btn btn-success" name="invite" id="invite">Invite</button> 
        </div>
    </div>
</div>
        </div>
    <div id="feedback-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> <a class="close" data-dismiss="modal">×</a>
                <h3>Add your project guide</h3> </div>
            <div class="modal-body text-center">
                <form class="feedback" name="feedback"> begin typing name or email address of your guide
                    <br/>
                    <br/>
                    <div class="text-center">
                    <input type="text" name="name" class="typeahead from-control">
                    </div>
                    <input type="hidden" name="p" value="<?php echo $project_id; ?>"> 
                </form>
                <button class="btn btn-success" id="submit">Add</button> 
        </div>
    </div>
</div>
        </div>
        
        <script>
		$('input.typeahead').typeahead({
			source:  function (query, process) {
				return $.get('guide_typeahead.php', { query: query }, function (data) {
		        	//console.log(data);
					data = $.parseJSON(data);
					return process(data);
				});
			}
		});
	</script>
<script>
    $(document).ready(function () {
        $("button#submit").click(function () {
            $.ajax({
                type: "POST"
                , url: "add_guide.php"
                , data: $('form.feedback').serialize()
                , success: function (message) {
                    $("#feedback").html(message)
                    $("#feedback-modal").modal('hide');
                }
                , error: function (xhr, status, error) {
                    alert(error);
                }
            });
        });
    });
    
    $(document).ready(function () {
        $("button#invite").click(function () {
            $.ajax({
                type: "POST"
                , url: "invite_member.php"
                , data: $('form.feedback').serialize()
                , success: function (message) {
                    $("#member").html(message)
                    $("#member-modal").modal('hide');
                }
                , error: function (xhr, status, error) {
                    alert(error);
                }
            });
        });
    });
    
</script>
        
           <!--footer section---------------------->
<div>
    <hr class="featurette-divider"> </div>
<footer>
    <p style="text-align: center;">2017 eduRoom &copy;</p>
</footer>
<!--script-->  
 
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="/js/jquery-3.0.0.min.js"><\/script>')
        </script>
    <link href="../../styles/font/css/font-awesome.min.css" rel="stylesheet">
     <script src="../../styles/js/bootstrap.min.js"></script>

        <?php
            //    echo $project_id; ?>
    
</body>

    </html>