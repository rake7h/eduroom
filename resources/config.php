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