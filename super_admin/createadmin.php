 <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 include_once("../db/run.php");
 ?>
<?php
if(isset($_REQUEST['action'])){
  if($_REQUEST['action']=='success'){ ?>
  <script>
    alert("Data Inserted Sucessfully")
  </script>
  <?php }
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">admin</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
       <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">admin</h3>
              </div>
              <!-- form start -->
              <form role="form" method="POST" action="createadmin_core.php">
                <div class="card-body">
                  <div class="form-group">
                  <label for="exampleInputdetname">Title</label>
                    <input required type="text" id="exampleInputdetname" name="name" class="form-control" placeholder="Enter Title ">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputdetnamee">Password</label>
                    <input required name="password" id="exampleInputdetnamee" type="password" class="form-control"  placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputdetnamee1">Contact</label>
                    <input required name="contact" id="exampleInputdetnamee1" type="text" class="form-control"  placeholder="Enter Contact Number">
                  </div>
                  <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
                  </div>
              </form>
            </div>
    </section>
  </div>
 <?php
 include_once('layout/footer.php');
 ?>

 