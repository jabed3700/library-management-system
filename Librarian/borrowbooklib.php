 <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 include_once("../db/run.php");
 ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark text-center display-2 pt-3" style='font-size:65px'>Student ID</h1>
          </div>
          
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
            <!-- form start -->
            <form action="confirmborrowlib.php" method="POST" class="sidebar-form mt-3 col-4 offset-4">
        <div class="input-group">
          <input required type="text"  class="form-control" name='id' placeholder="Enter Student Id">
          <div class="input-group-prepend">
            <button class='btn btn-primary' name='search_btn'>Serach</button>
          </div>
        </div>
      </form>
    </section>
  </div>
 <?php
 include_once('layout/footer.php');
 ?>

 