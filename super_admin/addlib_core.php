<?php
require_once('../db/run.php');



if(isset($_REQUEST['btn_sub'])){
	$profile = $_FILES['ppp']['name'];
	$tmp_name = $_FILES['ppp']['tmp_name'];
	$picid = uniqid();
	move_uploaded_file($tmp_name, "avater/$picid.jpg");

  dataInsert('librarian',array($_REQUEST['name'],$_REQUEST['email'],$_REQUEST['password'],$picid.".jpg",$_REQUEST['contact'])); 
  header('location: addlib.php?action=success');
}



?>