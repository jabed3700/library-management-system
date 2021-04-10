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
            <h1 class="m-0 text-dark">Create a Librarian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Librarian</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
       <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Librarian</h3>
              </div>
              <!-- form start -->
              <form role="form" method="POST" action="addlib_core.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                  <label for="exampleInputdetname">User Name</label>
                    <input required type="text" id="exampleInputdetname" name="name" class="form-control" placeholder="Enter User Name">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputdetnamee">Email</label>
                    <input required name="email" id="exampleInputdetnamee" type="email" class="form-control"  placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputdetna">Password</label>
                    <input required name="password" id="exampleInputdetna" type="password" class="form-control"  placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputdetnal">Contact</label>
                    <input required name="contact" id="exampleInputdetnal" type="text" class="form-control"  placeholder="Enter Contact Number">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputFile">Profile Photo</label>
                    <input required type="file" name="ppp" class="form-control-file" id="exampleInputFile">
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

 