<?php
session_start();
$b= $_SESSION['books'];
include_once('../db/run.php');
$gerId=$_GET['id'];
$sql= "UPDATE book_issue SET status=1 where id=$gerId";
$query= mysqli_query($con,$sql);

$sql1= "UPDATE books SET issuable=1 where id=$b";
$query= mysqli_query($con,$sql1);
header('location: confirm.php');

?>