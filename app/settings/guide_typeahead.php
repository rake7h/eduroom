<?php
//error reporting 
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../../resources/config.php';
$query = $_GET['query'];
$array = array();
$sql="SELECT user_email FROM user INNER JOIN college_guide ON user.user_id=college_guide.user_id_guide AND college_guide.college_id_guide='222' WHERE user_email LIKE '%" . $query . "%' LIMIT 5 ";
//$sql = "SELECT * FROM colleges LIMIT 10"; 
    $result = mysqli_query($database,$sql) or die(mysqli_errno());
	
	$json = [];
	while($row =mysqli_fetch_assoc($result))
    {
	     $array[] = $row['user_email'];
        //$array[] = $row['user_username'];
        //$array[] = $row['user_name'].' ' . $row['user_lastname'];

	}

	echo json_encode($array);
?>