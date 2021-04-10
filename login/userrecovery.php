<?php

session_start();
include('../db/run.php');
$smsid = rand(1000,9999);
$_SESSION['smsid']=$smsid;
$_SESSION['table']=$_GET['t'];
$table=$_GET['t'];

// DB credentials.

if(isset($_POST['update']))
  {
$number=$_POST['number'];
$_SESSION['num']=$_POST['number'];
  $sql ="SELECT * FROM $table WHERE contact='$number'";
  $query=mysqli_query($con,$sql);
$countRows=mysqli_num_rows($query);
if($countRows== 0){
echo "<script>alert('Invalid Number')</script>";
}elseif($countRows== 1){
  while($info=mysqli_fetch_array($query)){
    $sms=  "Dear ".$info['name']." your recovery code is ".$_SESSION['smsid'];
    $phone = $info['contact'];
    try{
      $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
      $paramArray = array(
      'userName' => "01917403325",
      'userPassword' => "01917605546",
      'mobileNumber' => $phone,
      'smsText' =>  $sms,
      'type' => "TEXT",
      'maskName' => '',
      'campaignName' => '',
      );
      $value = $soapClient->__call("OneToOne", array($paramArray));
      echo $value->OneToOneResult;
      header('location: userrecoverypass.php');
     } catch (Exception $e) {
      echo $e->getMessage();
     }
  }

}
} ?>




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
            <a href="../index2.html"><b>Password Recovery</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Recovery</p>

                <form name="chngpwd" method="post" onSubmit="return valid();">
                    <div class="form-group">
                        <input type="text" name="number" class="form-control" placeholder="Enter Contact Number*"
                            required="">
                    </div>
                    <div class="form-group">
                        <input type="submit" style="background: #ccc;color: black;" value="Submit"
                            name="update" class="btn btn-block">
                    </div>
                </form>
                <!-- /.social-auth-links -->

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