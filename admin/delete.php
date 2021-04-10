<?php 
include_once('../db/run.php');

$getId = $_REQUEST['id'];
$sql= "Delete from user_info where id=$getId";
$query = mysqli_query($con,$sql);
header('location: manageuser.php');


?>