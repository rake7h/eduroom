<?php
//error reporting 
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../../resources/config.php';
$query = $_GET['query'];
$array = array();
$sql = "SELECT college_name FROM colleges WHERE college_name LIKE '%" . $query . "%' LIMIT 10";
    $result = mysqli_query($database,$sql) or die(mysqli_errno());
	
	$json = [];
	while($row =mysqli_fetch_assoc($result))
    {
	     $array[] = $row['college_name'];
	}

	echo json_encode($array);
?>