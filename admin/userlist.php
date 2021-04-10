
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
            <h1 class="m-0 text-dark">User List</h1>
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
    <section class="content">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Student_id</th>
            <th>Department</th>
            <th>Faculty</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Approve</th>
            
          </tr>
        </thead>
        <tbody>
        <?php
      include_once('../db/run.php');
      $sql="select * from user_info where approve=0";
      $query=mysqli_query($con,$sql);

      if($query== true){
        while($info=mysqli_fetch_array($query)){ ?>
          <tr>
            <td><?php echo $info['username']?></td>
            <td><?php echo $info['std_id']?></td>
            <td><?php echo $info['department']?></td>
            <td><?php echo $info['faculty']?></td>
            <td><?php echo $info['email']?></td>
            <td><?php echo $info['contact']?></td>
            <td><a href="approveuser.php?id=<?php echo $info['id'] ;?>" class="btn btn-success">Approve</a></td>
          </tr>

       <?php }
      }
      
    
      ?>
        </tbody>
      </table>
    
    </section>

  </div>
 
 <?php
 include_once('layout/footer.php');
 ?>

  