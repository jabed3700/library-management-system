<?php 
session_start();
include_once('../db/run.php');

$renewId=$_GET['renewid'];

$newsql= "UPDATE book_issue SET renew=2,expecting_return=ADDDATE(expecting_return, INTERVAL 5 DAY) WHERE id=$renewId";
$query=mysqli_query($con,$newsql);

header('location: renewbook.php');





?>