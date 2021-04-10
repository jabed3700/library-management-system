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
                    <h1 class="m-0 text-dark">Request from Student</h1>
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
                    <th>Book_title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Edition</th>
                    <th>Message</th>

                </tr>
            </thead>
            <tbody>
                <?php
      include_once('../db/run.php');
      $sql="SELECT * from request";
      $query=mysqli_query($con,$sql);
   
                if($query== true){
                while($info=mysqli_fetch_array($query)){ 
                   
                    ?>
               
                <tr>
                    <td><?php echo $info['book_title']?></td>
                    <td><?php echo $info['author']?></td>
                    <td><?php echo $info['category']?></td>
                    <td><?php echo $info['edition']?></td>
                    <td><?php echo $info['message']?></td>
                    
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