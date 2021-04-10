<?php
require_once('../db/run.php');



if(isset($_REQUEST['btn_sub'])){
	$profile = $_FILES['ppp']['name'];
	$tmp_name = $_FILES['ppp']['tmp_name'];
	$picid = uniqid();
	move_uploaded_file($tmp_name, "avater/$picid.jpg");

  dataInsert('books',array($_REQUEST['name'],$_REQUEST['authname'],$_REQUEST['category'],$_REQUEST['edition'],$_REQUEST['shelf'],$_REQUEST['quantity'],$_REQUEST['page'],$picid.".jpg",0)); 
  header('location: addbook.php?action=success');
}



?>