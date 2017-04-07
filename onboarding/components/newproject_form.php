<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

<form class="form-signup" name="newproject_form" action="components/addproject_action.php" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="control-group">
                            <label class="control-label" for="name">Project title</label>
                            <p>Enter your project title or name of your project</p>
                                <div class="controls">
                            <input type="text" class="form-control" name="project_title">
                                </div>
                            </div>
                            
                            <div class="control-group">
                            <label class="control-label" for="name">Project description</label>
                            <p>Short description about your project</p>
                            <div class="controls">
                            <textarea class="form-control" rows="3" placeholer="Message"  name="project_des"></textarea>
                            </div>
                            
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="add_bttn">Create</button>
                        </div>
                    </div>
                </div>
            </form>