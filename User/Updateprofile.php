<!-- Navbar -->
<?php

include_once('../db/run.php');
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 ?>
<?php
 $getId=$_SESSION["user"]["id"];
if(isset($_REQUEST['btn_sub'])){
    $usrname = $_REQUEST['name'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$contact = $_REQUEST['contact'];
$a = "UPDATE user_info SET username='$usrname',email='$email',password='$password',contact='$contact' where id=$getId";
$b = mysqli_query($con,$a);


}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile Update</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">user</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
   
    $sql="select * from user_info where id=$getId";
    $query=mysqli_query($con,$sql);
    if($query==true){
        while($info=mysqli_fetch_array($query)){
            $name =  $info['username'];
            $email=  $info['email'];
            $password =  $info['password'];
            $contact =  $info['contact'];
        }
    }

    ?>
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">User profile Update</h3>
            </div>
            <!-- form start -->
            <form role="form" method="POST" action="">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputdetname">Username</label>
                        <input type="text" id="exampleInputdetname" name="name" class="form-control" value="<?=$name?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputdetname1">Email</label>
                        <input type="email" id="exampleInputdetname1" name="email" class="form-control"
                            value="<?=$email?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputdetnamee">Password</label>
                        <input name="password" id="exampleInputdetnamee" type="text" class="form-control"
                            value="<?=$password?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputdetconact">Contact</label>
                        <input name="contact" id="exampleInputdetconact" type="text" class="form-control"
                            value="<?=$contact?>">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
                    </div>
            </form>
        </div>
</div>

</section>

</div>

<?php
 include_once('layout/footer.php');
 ?>