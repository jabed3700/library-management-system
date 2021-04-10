<?php
require_once('../db/run.php');


if(isset($_REQUEST['btn_sub'])){

  dataInsert('admin',array($_REQUEST['name'],$_REQUEST['password'],$_REQUEST['contact'])); 
  header('location: createadmin.php?action=success');
}



?>