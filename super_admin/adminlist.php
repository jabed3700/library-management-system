
 <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 ?>

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">AdminList</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">admin</li>
            </ol>
          </div> 
        </div>
      </div>
    </div>
    <section class="content">
    <?php
      include_once('../db/run.php');
      printTableBySql('SELECT * from admin',["Title","Password"],["name","password"],"editadmin.php","admin","adminlist.php");
      ?>
    </section>

  </div>
 
 <?php
 include_once('layout/footer.php');
 ?>

  