<?php
session_start();
include_once("../db/run.php");
$getId=$_SESSION["user"]["id"];

$sql="select SUM(amount) as total from fine where user_id=$getId AND status=0;";
$ddd=mysqli_query($con,$sql);
if($ddd==true){
    while($info=mysqli_fetch_array($ddd)){
        $ff=$info['total'];
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" media="screen" href="">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../index.php" class="nav-link">Home</a>
                </li>
                
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!--start-->
                <li class="dropdown user user-menu" style="margin-top: 9px;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img style="margin-top:4px" src="avater/<?=$_SESSION["user"]["ppp"]?>" class="user-image"
                            alt="User Image">
                        <span class="hidden-xs"><?=$_SESSION["user"]["username"]?></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-right" id="drop">
                        <!-- User image -->
                        <li class="user-header" style='margin-bottom: 9px;'>
                            <img src="avater/<?=$_SESSION["user"]["ppp"]?>" class="img-circle" alt="User Image">
                            <p>
                                <span class="hidden-xs">Name: <?=$_SESSION["user"]["username"]?></span>
                                <br>
                                <span class="hidden-xs">Dept: <?=$_SESSION["user"]["department"]?></span>
                               <br>
                                <span>Total fine to pay <?php if(isset($ff)){echo $ff;}else{
                                    echo '0';
                                }?> Taka</span>
                            </p>
                           
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left" style="float:left" id="profile">
                                <a href="Updateprofile.php" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right" style="float:right" id="signout">
                                <a href="../logout.php" class="btn btn-default btn-flat">Sign
                                    out</a>
                            </div>
                        </li>
                    </ul>

                </li>

            </ul>
        </nav>