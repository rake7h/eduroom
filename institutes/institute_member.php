<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require $_SERVER['DOCUMENT_ROOT']."/resources/config.php";
$user_id_hod=$_SESSION['user_id']; 

    $college_member_q="SELECT * FROM user INNER JOIN college_guide ON user.user_id=college_guide.user_id_guide where college_guide.college_id_guide='$college_id';";
    $result_college_member_q = mysqli_query($database,$college_member_q) or die(mysqli_errno());
    $trws_college_member_q= mysqli_num_rows($result_college_member_q);
    if($trws_college_member_q>0)
    {
        while ($rws_college_member_q=  mysqli_fetch_array($result_college_member_q))
        { 
                            $user_username_guide['user_username']=$rws_college_member_q['user_username'];
                            $user_fname_guide['user_firstname']=$rws_college_member_q['user_firstname'];
                            $user_lname_guide['user_lastname']=$rws_college_member_q['user_lastname'];
                            $username_guide['user_username']=$rws_college_member_q['user_username'];
                            $user_institute_guide['user_institute']=$rws_college_member_q['user_institute'];
            ?>
    <!--Result Body-->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="well well-sm">
                    <div class="media">
                        <a class="img-responsive pull-left" href="#"> <img class="media-object" src="/styles/images/developer.png" width="50" height="50"> </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $user_fname_guide['user_firstname']," ",$user_lname_guide['user_lastname'];?></h4>
                            <p>Computer Science</p>
                            <p><span class="label label-info">Project guide</span> <span class="label label-warning">150 followers</span></p>
                            <p> <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span> Message</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        }
    }
    else
    {
            ?>
        <h1>NO member found</h1>
        <?php
                            }


$hod_check_q= "SELECT * FROM user INNER JOIN college_hod ON user.user_id=college_hod.college_hod_id WHERE college_hod.college_hod_id='$user_id_hod' AND college_hod.college_hod_college_id='$college_id' AND college_hod.college_hod_dep_id='1'";
$result_hod= mysqli_query($database,$hod_check_q) or die(mysqli_errno());
$trws_hod= mysqli_num_rows($result_hod);
if($trws_hod>0){
    
    ?>
                <script src="../../../onboarding/components/style/jQuery.min.js"></script>
                <script src="../../../onboarding/components/style/bootstrap3_typeahead.js"></script>
            
<div id="feedback">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feedback-modal">Add a guide</button>
</div>
<div id="feedback-modal" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<a class="close" data-dismiss="modal">×</a>
<h3>Add a project guide</h3>
</div>
    
<div class="modal-body">

<form  class="feedback" name="feedback"> 
    begin typing name or email address <br/><br/>
    <input type="text" name="name" class="typeahead">
</form>
<button class="btn btn-success" id="submit">Send</button>
<a href="#" class="btn" data-dismiss="modal">Close</a>
    </div>

</div>
</div>
</div>

<script>
    $(document).ready(function () {
        $("button#submit").click(function () {
            $.ajax({
                type: "POST"
                , url: "addmember_model.php"
                , data: $('form.feedback').serialize()
                , success: function (message) {
                    
                    $("#feedback").html(message)
                    $("#feedback-modal").modal('hide');
                }
                , error: function(xhr, status, error) {
                    alert(error);
                        }
            });
        });
    });
</script>
<?php
}
else{
    
    echo"not an hod";
}
?>
<script>
$('input.typeahead').typeahead({
                                        source: function (query, process) {
                                            return $.get('../../../institutes/user_sugg.php', {
                                                query: query
                                            }, function (data) {
                                                //console.log(data);
                                                data = $.parseJSON(data);
                                                return process(data);
                                            });
                                        }
                                    });
</script>