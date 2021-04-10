<?php
include('../db/run.php');
if(isset($_REQUEST['btn_sub'])){
$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$contact=$_REQUEST['contact'];
$gender=$_REQUEST['gender'];
$faculty=$_REQUEST['faculty'];
$department=$_REQUEST['department'];
$ppp_temp=$_FILES['ppp']['tmp_name'];
$uniqid=uniqid();
move_uploaded_file($ppp_temp,'../User/avater/'.$uniqid.'.jpg');

$sql="insert into user_info (username,std_id,email,password,contact,gender,department,faculty,ppp)values('$name','$id','$email','$password','$contact','$gender','$department','$faculty','$uniqid.jpg')";
$query=mysqli_query($con,$sql);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HUB | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../index2.html"><b>Sign Up</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <form action="" method="post" enctype='multipart/form-data'>
                <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Id" name='id'>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Name" name='name'>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name='email'>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name='password'>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Contact" name='contact'>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-address-book"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select name="gender" class='form-control'>
                        <option value=''>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Department" name='department'>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Faculty" name='faculty'>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                    <label for="">Profile Photo</label>
                        <input type="file" class="form-control-file" placeholder="Profile Phote" name='ppp'>
                    </div>
                    <div class="row">
                        <div class="col-4 offset-8">
                        
                            <input type="submit" value='Sign Up' class="btn btn-primary btn-block btn-flat"
                                name='btn_sub'>
                        </div>

                    </div>
                </form>
                <div class="mt-3">
                    <p>Already got an account?<a href="userlogin.php"> Login Here</a></p>
                </div>
                <div class="mt-3">
        <p>Go back to  <a href="../index.php">home </a> page.</p>
      </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

</body>

</html>