



<div class="col-md-2">
                    <div class="sidebar content-box" style="display: block;">
                        <ul class="nav">
                            <!-- Main menu -->
                            <li class="current"><a href="#"><i class="glyphicon glyphicon-home"></i> Options</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-calendar"></i> Members</a></li>
                        </ul>
                    </div>
                </div>
<div class="col-md-8">
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