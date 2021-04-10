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
                    <h1 class="m-0 text-dark">Online BookList</h1>
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
                    <th>Authors</th>
                    <th style='width:75px'>Cover_photo</th>
                </tr>
            </thead>
            <tbody>
                <?php
      include_once('../db/run.php');
      $sql="SELECT * FROM online_book;";
      $query=mysqli_query($con,$sql);

      if($query== true){
        while($info=mysqli_fetch_array($query)){ ?>
                <tr>
                    <td><?php echo $info['book_title']?></td>
                    <td><?php echo $info['author']?></td>
                    <td><a href="../Librarian/avater/book/<?php echo $info['file']?>"><img style='width:150px;height:100px'
                            src="../Librarian/avater/book/<?php echo $info['ppp']?>" alt=""></a>
                    </td>
                    
                </tr>
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