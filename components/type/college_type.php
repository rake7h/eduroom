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

    $sql = "SELECT college_name FROM colleges WHERE college_name LIKE '%{$query}%'";
    $result = mysqli_query($database,$sql) or die(mysqli_error()); 
    $rws = mysqli_num_rows($result);
    if($rws>0)
    {
        while($rws = mysqli_fetch_array($result))
        $college['college_name']=$rws['college_name'];
        
    }
echo json_decode($college);

?>