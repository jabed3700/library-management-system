<?php
include_once("../db/run.php");
dataDelete($_GET["t"],$_GET["id"]);
header("location:".$_GET["r"]);
?>