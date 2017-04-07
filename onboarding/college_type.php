<?php
$hostname = "localhost:8889";
$user = "root";
$password = "root";
$database = "eduroom_db";
$prefix = "";
$database=mysqli_connect($hostname,$user,$password,$database);

    if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //you need to exit the script, if there is an error
    exit();
}

if (isset($_REQUEST['query'])) {

	$query = $_REQUEST['query'];
	
	$sql = mysql_query ("SELECT college_name FROM colleges WHERE college_name LIKE '%{$query}%'");
	$array = array();
	
	while ($row = mysql_fetch_assoc($sql)) {
		$array[] = $row['college_name'];
	}
	
	echo json_encode ($array); //Return the JSON Array

}

?>
