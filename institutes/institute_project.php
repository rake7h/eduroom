<?php
	/*
		Place code to connect to your DB here.
	*/
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	require $_SERVER['DOCUMENT_ROOT']."/resources/config.php";

    $institute_name= $college_name['college_name'];
    $cid=$_SESSION['college_profile_id'];
	// include your code to connect to DB.

	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM project_relation INNER JOIN user ON user.user_id=project_relation.user_id INNER JOIN project_student ON project_student.project_id=project_relation.project_id WHERE user_institute='$institute_name'";
    $q=mysqli_query($database,$query) or die(mysqli_errno());
	$total_pages = mysqli_fetch_array($q);
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "projects.php"; 	//your file name  (the name of this file)
	$limit = 30; 								//how many items to show per page
	@$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT  project_student.project_name, project_student.project_des, user.user_username FROM project_relation INNER JOIN user ON user.user_id=project_relation.user_id INNER JOIN project_student ON project_student.project_id=project_relation.project_id WHERE user_institute='$institute_name' LIMIT $start, $limit";
	$result = mysqli_query($database,$sql) or die(mysqli_errno());
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div><nav aria-label=\"Page navigation\"><ul class=\"pagination pagination-lg\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<li><a href=\"$targetpage?page=$prev&college=$cid\">Previous</a></li>";
		else
			$pagination.= "<li class=\"disabled\"><a>Previous</a></li>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li class=\"active\"><span>$counter</span></li>";
				else
					$pagination.= "<li><a href=\"$targetpage?page=$counter&college=$cid\">$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><span>$counter</span></li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter&college=$cid\">$counter</a></li>";					
				}
				$pagination.= "<li><a>...</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lpm1&college=$cid\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lastpage&college=$cid\">$lastpage</a></li>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href=\"$targetpage?page=1&college=$cid\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=2&college=$cid\">2</a></li>";
				$pagination.= "<li><a>...</a></li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"current\"><span &college=$cid\">$counter</span></li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter&college=$cid\">$counter</a></li>";					
				}
				$pagination.= "<li><a>...</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lpm1&college=$cid\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lastpage&college=$cid\">$lastpage</a></li>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li><a href=\"$targetpage?page=1&college=$cid\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=2&college=$cid\">2</a></li>";
				$pagination.= "<li><a><span class=\"gap\">…</span></a></li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><span>$counter</span></li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter&college=$cid\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a href=\"$targetpage?page=$next&college=$cid\">Next</a></li>";
		else
			$pagination.= "<li class=\"disabled\"><a>Next</a></li>";
		$pagination.= "</div></ul></nav>\n";		
	}
?>
<div>
    
</div>
	<?php
		while($rws = mysqli_fetch_array($result))
		{
            $project_name['project_name']=$rws['project_name'];
            $project_des['project_des']=$rws['project_des'];
            $project_user['project_user']=$rws['user_username'];
            
             ?>
    <!--Result Body-->
<div class="row">
    <div class="col-md-10 container">
            <div class="border-bottom">
                <div><a href=""><h4><?php echo $project_name['project_name'];?></h4></a></div>
                <div class="text-gray" style="width:80%;">
                    <p style="width:80%; padding-right:24px;"><?php echo $project_des['project_des'];?></p>
                </div>
                <div class="text-gray">
                    <p> <span>@</span><?php echo $project_user['project_user'];?></p>
                </div>
<div>
                <hr class="featurette-divider"> </div>
            </div>

        </div>
</div>

    <?php
		}
	?>

<?=$pagination?>
	