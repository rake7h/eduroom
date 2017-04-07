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
            <form class="navbar-form navbar-left" action="search/search.php" role="search" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search eduRoom" name="q"></div>
            </form>
            
            
            <!--user dropdown menu right end-->
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown  "> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php
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
            
        </div>
    </nav>