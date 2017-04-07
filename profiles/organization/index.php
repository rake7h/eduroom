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
        <link rel="stylesheet" href="../../styles/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="../../styles/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../styles/css/normalize.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="../../styles/js/bootstrap.min.js"></script>
        <link href="../style.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">

        
        
    </head>

    <body>
        
        <!--section navigation-->
        <nav class="navbar navbar-default ">
            <div class="container-fluid">
                <!--eduroom logo-->
                <div class="navbar-header"> <a class="navbar-brand" href="../../../index.php"> eduroom</a> </div>
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
                    include ('../../resources/config.php');
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
                <div class="col-md-2 col-md-offset-1" style=" margin:1%;">
                    <div  style="height:140px; width:140px;">
                        <img src="../<?php echo $colleg_logo['college_logo'];?>"  height="140px" width="140px">
                    </div>
                </div>
                    <div class="col-md-6" style="margin:1%;">
                            <div>
                                <h3><?php echo $college_name['college_name'];?></h3>

                            </div>
                            <div>
                                <h4><?php echo $college_district['college=_district'],", ",$college_state['college_state'];?></h4>
                            </div>
                            <div>

                                <ul class="ui_institute">
                                    <li><span style="font-size:12px">@bitdurg</span></li>
                                    <li><a href="http://bitdurg.ac.in" class="text-gray">http://bitdurg.ac.in</a></li>
                                    <li><a href="bit@bitdurg.ac.in" class="text-gray">bit@bitdurg.ac.in</a></li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        <div class="container" style=" margin-top:1%;">
            <div class="row">
            <div class="col-md-8" style="">
                
	<div class="row form-group">
        <div class="col-xs-12 col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i>Mashable</i> - <span>#Social-Media</span><span>#Web</span>
                </div>
                <div class="panel-image">
                    <img src="http://666a658c624a3c03a6b2-25cda059d975d2f318c03e90bcf17c40.r92.cf1.rackcdn.com/unsplash_52d09387ae003_1.JPG" class="panel-image-preview" />
                    <!--<label for="toggle-1"></label>-->
                    <h4>Summary</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper et.</p>
                </div>
                <!--<input type="checkbox" id="toggle-1" class="panel-image-toggle">-->
                <div class="panel-body hide" style="padding: 0;">
                    <p>this is another paragraph, this is another paragraph, this is another paragraph, this is another paragraph, this is another paragraph, this is another paragraph,</p>
                    <p>this is another paragraph, this is another paragraph, this is another paragraph, this is another paragraph, this is another paragraph, this is another paragraph,</p>
                    <p>this is another paragraph, this is another paragraph, this is another paragraph, this is another paragraph, this is another paragraph, this is another paragraph,</p>
                </div>
                <div class="panel-footer clearfix">
                    <a href="#download" class="btn btn-primary btn-sm btn-hover pull-left">Save <span class="fa fa-bookmark"></span></a>
                    <a href="#facebook" class="btn btn-success btn-sm btn-hover pull-left" style="margin-left: 5px;">Shr <span class="glyphicon glyphicon-send"></span></a>
                    <a class="btn comsys btn-danger btn-sm btn-hover pull-left" style="margin-left: 5px;">Cmt <span class="fa fa-comment"></span></a>
                    <a href="#share" class="btn btn-warning btn-sm btn-hover pull-left" style="margin-left: 5px;">Like <span class="fa fa-thumbs-up"></span></a>
                    <span class="toggler fa fa-chevron-down pull-right"></span>
                </div>
            </div>
            <div class="panel cmts panel-primary" style="display: none;">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Comments
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-refresh">
                            </span>Refresh</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-ok-sign">
                            </span>Available</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-remove">
                            </span>Busy</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-time"></span>
                                Away</a></li>
                            <li class="divider"></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-off"></span>
                                Sign Out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body body-panel">
                    <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer clearfix">
                    <textarea class="form-control" rows="3"></textarea>
                    <span class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-xs-12" style="margin-top: 10px">
                        <button class="btn btn-warning btn-lg btn-block" id="btn-chat">Send</button>
                    </span>
                </div>
            </div>
                
                </div>
                </div>
        </div>
                
            
        <div class="col-md-3">
         <ul class="list-group">
             <li class="list-group-item"><a href="student/student.php?college=<?php echo $_SESSION['college_profile_id'];?>">Students</a></li>
             <li class="list-group-item"><a href="projects/projects.php?college=<?php echo $_SESSION['college_profile_id'];?>">Projects</a></li>
        </ul>
        </div>
                <div class="col-md-3">
                <div class="panel panel-default">
  <div class="panel-body">
      <h5>Top Projects</h5>
                    
                    
                    
                    
</div>
</div>
                </div>
                
                
                
                
                
        </div>
            </div>
        <!--Page footer section-->
            <footer>
                        <div><hr class="featurette-divider"> </div>

                <p style="text-align: center;">2017 eduroom &copy;</p>
            </footer>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            
            <script src="../../styles/js/bootstrap.min.js"></script>
                <script>
                    $('.toggler').click(function() {
    var tog = $(this);
    var secondDiv = tog.parent().prev();
    var firstDiv = secondDiv.prev();
    firstDiv.children('p').toggleClass('hide');
    secondDiv.toggleClass('hide');
    //tog.parent().find('.first > p').toggleClass('hide');
    //tog.parent().find('.second').toggleClass('hide');
    //$('.first > .main').toggleClass('hide');
    tog.toggleClass('fa fa-chevron-up fa fa-chevron-down');
    return false;
});

$('.comsys').click(function() {
    var togCmt = $(this);
    togCmt.toggleClass('active');
    var panelFooterDiv = togCmt.parent();
    var panelDefaultDiv = panelFooterDiv.parent();
    var panelCmtsDiv = panelDefaultDiv.next();
    panelCmtsDiv.slideToggle('hide');
    return false;
});
                    </script>
    </body>

    </html>