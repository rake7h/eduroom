<?php
session_start();

$host = "localhost:/Applications/MAMP/tmp/mysql/mysql.sock";
$db = "user_db";
$user = "root";
$pass = "root";

$project_title = $_POST[protitle_txt];
$project_des = $_POST[prodes_txt];

mysql_connect($host, $user, $pass) or die("Error" . mysql_error());
mysql_select_db($db);


$query= "INSERT INTO project ('project_title', 'project_des') VALUES ($project_title','$project_des')";

$execute= mysql_query($query);
if (!execute)
{
die('cant execute'.mysql_errno() );
}
 echo "executed" . $query;


mysql_close();