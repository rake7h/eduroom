<nav class="navbar navbar-default ">
        <div class="container-fluid">
            
            <!--eduroom logo-->
            
            <div class="navbar-header"> 
                <a class="navbar-brand" href="../index.php"> eduroom</a> 
            </div>
            
            <ul class="nav navbar-nav navbar-left">
                <li><a href="explore.php">Explore</a></li>
                <li><a href="institutes/explore.php">Colleges</a></li>

            </ul>
            <form class="navbar-form pull-left" action="search/search.php" role="search" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search eduRoom" name="q"></div>
            </form>
            
            
            <!--user dropdown menu right end-->
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php
                  
                    echo $_SESSION['loged_user_user_name'];?> 
                    
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="profiles/Student_profile.php">Your Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="explore.php">Explore</a></li>
                        <li><a href="onboarding/new.php">Add Project</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="document/help.php">Help</a></li>

                        <li role="separator" class="divider"></li>
                        <li><a href="settings/student_settings.php">Settings</a></li>
                        <li><a href="logout.php">Log out</a></li>
                    </ul>
                </li>
            </ul>
            
            <ul class="nav navbar-nav pull-right">
                  <li><a href="#"  tabindex="0" data-toggle="popover"  data-popover-content="#a1" data-trigger="focus" data-placement="bottom"><img src="../../styles/icon/menu-grid.png" alt="apps" width="22" hight="22"></a></li>
            </ul>
        </div>
    </nav>
                <!-- Content for Popover #1 -->    

<div id="a1" class="hidden">
   <div class="popover-body">
       <div class="container-fluid" style="max-height:300px; height:200px; width:auto;">
       <div class="row">
           <div class="col-md-2">
               <div style="width:64px; height:64px;" >
               <a href="app/guidecp.php" style="width:44px; height:44px; magin:2px;"><i class="fa fa-blind fa-3x" aria-hidden="true"></i>
                   <p><span style="text-align:center;">Guide Dashboard</span><p>
                   </a>
               </div>
            </div>
           
           
              </div>
           
           
       </div>
    </div>
</div>
