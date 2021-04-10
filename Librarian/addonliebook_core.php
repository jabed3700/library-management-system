<?php
require_once('../db/run.php');



if(isset($_REQUEST['btn_sub'])){
	$bookname= $_FILES['bpp']['name'];
	$book_tmp= $_FILES['bpp']['tmp_name'];

	$profile = $_FILES['ppp']['name'];
	$tmp_name = $_FILES['ppp']['tmp_name'];
	$picid = uniqid();
	move_uploaded_file($book_tmp,"avater/book/$bookname");
	move_uploaded_file($tmp_name, "avater/book/$picid.jpg");

  dataInsert('online_book',array($_REQUEST['name'],$_REQUEST['authname'],$bookname,$picid.".jpg")); 
  header('location: addonlinebook.php?action=success');
}



?>