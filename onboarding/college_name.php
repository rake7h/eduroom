<?php
$host = "localhost";
$uname = "root";
$pass = "root";
$database = "eduroom_db";

$connection=mysql_connect($host,$uname,$pass) or die("connection in not ready <br>");
$result=mysql_select_db($database) or die("database cannot be selected <br>");

if (isset($_REQUEST['query'])) {

	$query = $_REQUEST['query'];
	
	$sql = mysql_query ("SELECT * FROM colleges WHERE college LIKE '%{$query}%'");
	$array = array();
	
	while ($row = mysql_fetch_assoc($sql)) {
		$array[] = $row['college'];
	}
	
	echo json_encode ($array); //Return the JSON Array

}

?>
