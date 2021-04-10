<?php
require_once('../db/run.php');



if(isset($_REQUEST['btn_sub'])){

  dataInsert('request',array($_REQUEST['name'],$_REQUEST['authname'],$_REQUEST['category'],$_REQUEST['edition'],$_REQUEST['message'])); 
  header('location: request.php?action=success');
}



?>