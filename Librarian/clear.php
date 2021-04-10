<?php 
session_start();
include_once("../db/run.php");

$userID= $_SESSION['userID'];
$sql="UPDATE fine SET status=1 WHERE user_id=$userID";
mysqli_query($con,$sql);

 $id=$_GET['id'];
$sql1="UPDATE payment SET status=1 where id=$id";
mysqli_query($con,$sql1);
header('location: payment.php');


?>