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
                    <h1 class="m-0 text-dark">Confirm book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">book</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student Id</th>
                    <th>Method</th>
                    <th>Phone</th>
                    <th>Amount</th>
                    <th>Txr_id</th>
                    <th>Total_Dua</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                <?php
      include_once('../db/run.php');
      $sql="SELECT * FROM payment where status=0";
      $query=mysqli_query($con,$sql);
   
                if($query== true){
                while($info=mysqli_fetch_array($query)){ 
                    $_SESSION['userID']=$info['user_id'];
                    
                    ?>
               
                <tr>
                    <td><?php echo $info['name']?></td>
                    <td><?php echo $info['std_id']?></td>
                    <td><?php echo $info['method']?></td>
                    <td><?php echo $info['phone']?></td>
                    <td><?php echo $info['amount']?></td>
                    <td><?php echo $info['trx_id']?></td>
                    <td><?php echo $info['total_dua']?></td>
                    <td><a href="clear.php?id=<?php echo $info['id'] ?>" class='btn btn-primary'>Clear</a></td>
                    
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
<script>
let btn = document.getElementById('bor')
btn.addEventListener("click", function() {
    btn.innerHTML = 'Panding'
})
</script>