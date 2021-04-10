<?php 
session_start();
include_once('../db/run.php');

$renewId=$_GET['renewid'];

$newsql= "UPDATE book_issue SET renew=1 WHERE id=$renewId";
$query=mysqli_query($con,$newsql);

header('location: myborrow.php');





?>