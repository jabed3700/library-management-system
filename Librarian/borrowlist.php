<!-- Navbar -->
<?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 include_once('../db/run.php');

 if(isset($_REQUEST['search_btn'])){
    $name=$_REQUEST['serach']; 
  }

 ?>

<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Borrow List</h1>
                </div><!-- /.col -->
                <div class="col-sm-4 offset-2">
                <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text"  class="form-control" name='serach' placeholder="Enter Student Id">
          <div class="input-group-prepend">
            <button class='btn btn-primary' name='search_btn'>Serach</button>
          </div>
        </div>
      </form>
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
                    <th>Department</th>
                    <th>Book_title</th>
                    <th>Author</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($_REQUEST['serach'])){ ?>

<?php
      
      $sql="SELECT b.book_name,b.writters,bs.id,bs.issue_date,bs.return_date,bs.status,u.username,u.std_id,u.department
      FROM book_issue as bs INNER JOIN books as b on bs.book_id=b.id INNER JOIN user_info as u on bs.user_id=u.id where bs.status=1 and u.std_id LIke'%$name%'";
      $query=mysqli_query($con,$sql);
   
                if($query== true){
                while($info=mysqli_fetch_array($query)){ ?>
                <tr>
                    <td><?php echo $info['username']?></td>
                    <td><?php echo $info['std_id']?></td>
                    <td><?php echo $info['department']?></td>
                    <td><?php echo $info['book_name']?></td>
                    <td><?php echo $info['writters']?></td>
                    <td><?php echo $info['issue_date']?></td>
                    <td><?php
                    if($info['return_date']==null){ ?>
                        <a href="confirmret.php?id=<?php echo $info['id']?>" class='btn btn-primary'>Return</a>
                    <?php }else{
                        echo $info['return_date'];
                    }?> </td>

                </tr>
                <?php }
      }
      
    
      ?>

                <?php
                }else{?>
                                    <?php
      
      $sql="SELECT b.book_name,b.writters,bs.id,bs.issue_date,bs.return_date,bs.status,u.username,u.std_id,u.department
      FROM book_issue as bs INNER JOIN books as b on bs.book_id=b.id INNER JOIN user_info as u on bs.user_id=u.id where bs.status=1";
      $query=mysqli_query($con,$sql);
   
                if($query== true){
                while($info=mysqli_fetch_array($query)){ ?>
                <tr>
                    <td><?php echo $info['username']?></td>
                    <td><?php echo $info['std_id']?></td>
                    <td><?php echo $info['department']?></td>
                    <td><?php echo $info['book_name']?></td>
                    <td><?php echo $info['writters']?></td>
                    <td><?php echo $info['issue_date']?></td>
                    <td><?php
                    if($info['return_date']==null){ ?>
                        <a href="confirmret.php?id=<?php echo $info['id']?>" class='btn btn-primary'>Return</a>
                    <?php }else{
                        echo $info['return_date'];
                    }?> </td>

                </tr>
                <?php }
      }
      
    
      ?>
                <?php }
                
                
                
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