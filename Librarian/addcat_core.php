<?php
require_once('../db/run.php');

if(isset($_REQUEST['btn_sub'])){
    dataInsert('category',array($_REQUEST['name'])); 
    header('location: addcat.php');
  }


?>