
<?php

 include_once("../db/run.php");
 $id=$_GET["id"];
 if(isset($_REQUEST['btn_sub'])){

 $name= $_REQUEST['name'];
 $password= $_REQUEST['password'];
 
 $upda = mysqli_query($con,"UPDATE admin SET name='$name',password='$password' WHERE id=$id");

 header('location: adminlist.php');
 
 }
 
?>
  <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 
 $sql="select * from admin where id=".$id;
 $query_run=mysqli_query($con,$sql);
  while($res=mysqli_fetch_array($query_run)){
  $name=$res["name"];
  $password=$res["password"];
  $id=$res["id"];
  
  
}
 ?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Admin Info</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">editadmin</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Admin</h3>
              </div>
              <!-- form start -->
              <form role="form" method="POST" action="">
                <div class="card-body">
                  <div class="form-group">
                  <label for="exampleInputdetname">Title</label>
                    <input type="text" id="exampleInputdetname" name="name" class="form-control" value="<?=$name?>" >
                  </div>
                  <div class="form-group">
                <label for="exampleInputdetnamee">Password</label>
                    <input name="password" id="exampleInputdetnamee" type="text" class="form-control" value="<?=$password?>"  >
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
                </div>
              </form>
            </div>
    </section>
  </div>
 <?php
 include_once('layout/footer.php');
 ?>

  