<!-- Navbar -->
<?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 $getId=$_SESSION["user"]["id"];
 ?>

<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">My borrow</h1>
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
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                  
                    <th>Renew Book</th>
                    <th>Return Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
      include_once('../db/run.php');
      $sql="SELECT bs.id,b.book_name,bs.expecting_return,bs.issue_date,bs.renew,bs.return_date,bs.status,datediff(sysdate(),issue_date)+1 as day
      FROM book_issue as bs INNER JOIN books as b
      on bs.book_id=b.id where bs.user_id=$getId;
      ";
      $query=mysqli_query($con,$sql);
   
                if($query== true){
                while($info=mysqli_fetch_array($query)){ ?>
                <tr>
                    <td><?php echo $info['book_name']?></td>
                    <td><?php echo $info['issue_date']?></td>
                    <td><?php echo $info['expecting_return']?></td>
                    <td><?php
                    if($info['status']==0){
                        echo 'pending';
                    }elseif($info['status']==1 ||$info['status']==2 ){
                        echo 'successful';
                    }?></td>
                    <?php 
                    
                        if(($info['status']==1)){ ?>
                            
                    <td><?php
                    if($info['renew']==0){ ?>
                        <a href="renew.php?renewid=<?php echo $info['id']?>" class='btn btn-primary'>Renew</a>
                    <?php }elseif($info['renew']==1){
                        echo 'pending';
                    }elseif($info['renew']==2){
                        echo 'successful';
                    }?></td>
                       <?php }else{ ?>
                           <td></td>
                          
                     <?php  }
                    
                    ?>
                    <td><?php
                    if($info['return_date']==null){
                        echo 'Not return';
                    }else{
                        echo 'Return';
                    }?> </td>
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