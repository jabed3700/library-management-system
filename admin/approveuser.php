<?php
include_once('../db/run.php');
$id=$_GET["id"];
$sql="update user_info set approve=1 where id=".$id;
mysqli_query($con,$sql);
header("location: userlist.php");
?>