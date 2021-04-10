<?php
 $piash= $_GET['type'];
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
    <a href="../index2.html"><b>Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="admin_core.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name='name'>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <input type="hidden" name="hidden" value="<?php echo $piash;?>">
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name='password'>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
         
          <div class="col-4">
            <input type="submit" value='Sign In' class="btn btn-primary btn-block btn-flat" name='btn_sub'>
          </div>
          
        </div>
      </form>
      <div class="row mt-2">
        <div class="col-md">
        <?php
      if(isset($_GET['type'])){
        if($_GET['type']=='librarian'){
          echo "<a href='recovery.php?t=librarian'>I forgot my password</a>";
        }elseif($_GET['type']=='admin'){
          echo "<a href='recovery.php?t=admin'>I forgot my password</a>";
        }
      }

     
      ?>
        </div>
        
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
