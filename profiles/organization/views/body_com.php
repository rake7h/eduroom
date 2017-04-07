        <!--section navigation-->
<nav class="navbar navbar-default ">
            <div class="container-fluid">
                <!--eduroom logo-->
                <div class="navbar-header"> <a class="navbar-brand" href="../index.php"> eduRoom</a> </div>
                <form class="navbar-form navbar-left" role="search" action="../search/search.php" role="search" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search eduRoom" name="q"> </div>
                </form>
                <!--user dropdown menu right end-->
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown  ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php
                        $loged_user = $_SESSION['user_username'];
                        echo $loged_user ?>

                                <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="Student_profile.php">Your Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Activities</a></li>
                            <li><a href="#">Teams Members</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="../logout.php">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

<!--section page header-->
            
        <!--institute header_wall-->
        <div class="container-fluid">
            <div class="row">
                    <?php
                    include ('../resources/config.php');
                    $college_id =$_REQUEST['college'];
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
                <div class="col-md-2">
                    <div class=".container" style="height:140px; width:140px;">
                        <img src="<?php echo $colleg_logo['college_logo'];?>"  height="140px" width="140px">
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-10">
                        <div class=".container" style="height:180px; width:870px;">
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
            </div>
        </div>