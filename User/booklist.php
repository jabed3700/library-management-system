<!-- Navbar -->
<?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 include_once('../db/run.php');
 $getId=$_SESSION['user']['id'];


 if(isset($_REQUEST['submit_btn'])){
   $getCat=$_GET['category'];
  
}
if(isset($_REQUEST['search_btn'])){
  $name=$_REQUEST['serach'];
}

$sql2="SELECT * FROM book_issue WHERE user_id=$getId and return_date is null";
$query2=mysqli_query($con,$sql2);
$numBook=mysqli_num_rows($query2);

 
 ?>

<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h1 class="m-0 text-dark">BookList</h1>
                </div><!-- /.col -->
                <div class="col-sm-4 offset-5">
          <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text"  class="form-control" name='serach' placeholder="Enter Book Title">
          <div class="input-group-prepend">
            <button class='btn btn-primary' name='search_btn'>Serach</button>
          </div>
        </div>
      </form>
          </div> 
            </div>
            <div class="row mb-2">
          <div class="col-sm-3">
          <form action="#" method="GET" class="sidebar-form">
          <label for="">Filtering By Category</label>
         <div class="input-group">
         <select name="category" id="exampleInputdetnam" class="form-control mr-2">
                    <?php
                    printOptions('category','id','category_name');
                    ?>
                  </select>
                  <button class='btn btn-primary' name='submit_btn'>Submit</button>
         </div>
                  
      </form>
          </div>
          </div>
        </div>
    </div>
    <section class="content">
       <?php
        if($numBook<2){
          echo "<h3 class='bg-info p-2'>You can borrow ".(2-$numBook)." book </h3>" ;
        }elseif($numBook>=2){ ?>
          <h3 class='bg-danger text-light p-2'>You can not borrow any book unless return borrowed book</h3>
          <?php
        }
      
      ?>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Book_title</th>
                    <th style='width:75px'>Cover_photo</th>
                    <th>Authors</th>
                    <th>Category</th>
                    <th>Edition</th>
                    <th>Shelf</th>
                    <th>Quantity</th>
                    <th>Page</th>
                    <th>Status</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
               <?php 
                if(isset($_REQUEST['category'])){ ?>
                  <?php
      
                  $sql="select b.id,book_name,writters,edition,shelf,quantity,pages,issuable,cover_photo,category_name,if(b.id in(SELECT book_id from book_issue WHERE STATUS=0 and user_id=$getId),1,0)as pending from books b,category c where b.id not in(select book_id from book_issue bi where user_id=$getId and STATUS=1) and b.book_type=c.id AND book_type=$getCat";
                  $query=mysqli_query($con,$sql);
            
                  if($query== true){
                    while($info=mysqli_fetch_array($query)){ 
                        $bname=$info['book_name'];
                        ?>
                    
                            <tr>
                                <td><?php echo $info['book_name']?></td>
                                <td><img style='width:150px;height:100px'
                                        src="../Librarian/avater/<?php echo $info['cover_photo']?>" alt="">
                                </td>
                                <td><?php echo $info['writters']?></td>
                                <td><?php echo $info['category_name']?></td>
                                <td><?php echo $info['edition']?></td>
                                <td><?php echo $info['shelf']?></td>
                                <td><?php echo $info['quantity']?></td>
                                <td><?php echo $info['pages']?></td>
                                <td>
                                 <?php 
                                  if($numBook>=2){ ?>
                                      <span class='btn btn-danger disabled'>Unable</span>
                                      <?php
                                  }else{ ?>
                                     <?php
                                  if($info['pending']==1){
                                      echo 'Pending';
                                  }elseif($info['pending']==0){ ?>
                                      <a class='btn btn-info' href="borrow.php?bookid=<?php echo $info['id']?>"><span>Borrow
                                      </span></a>
                                  <?php }?> 

                                  <?php }
                                 
                                 
                                 ?>
                                
                                </td>
                                <td><a href="#loginModal<?php echo $info['id']?>" data-toggle="modal" class='btn btn-primary'>Feedback</a>
                            
                            <!--Modal start-->
            <div class="modal" id="loginModal<?php echo $info['id']?>">
                  <div class="modal-dialog modal-sm-4">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Feedback</h5>
                        <button class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <form method='POST' action='feedback.php'>
                          <div class="form-group">
                            <label for="userename">Book_title</label>
                            <input class="form-control" type="text" name='name' value='<?php echo $info['book_name']?>' readonly>
                            <input class="form-control" type="hidden" name='hidden' value='<?php echo $info['id']?>' readonly>
                          </div>
                          <div class="form-group">
                            <label for="password">Author</label>
                            <input class="form-control" type="text" name='author' value='<?php echo $info['writters']?> ' readonly>
                          </div>
                          <div class="form-group">
                                  <label for="exampleInputdetfeed">Feedback</label>
                                  <textarea required id='exampleInputdetfeed' class="form-control" name="message" id="" cols="30" rows="6">Write something...</textarea>
                           </div>
                           <div class="modal-footer">
                        
                      <button type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
                      </div>
                        </form>
                      </div>
                      
                    </div>
                  </div>
                </div>
            <!--Modal end-->
                            </td>
                                
                            </tr>
                            </tr>
                            
            
                            <?php }
                  }
                  
                
                  ?> <?php

                }else if(isset($_REQUEST['serach'])){ ?>

                  <?php
      
                  $sql="select b.id,book_name,writters,edition,shelf,quantity,pages,issuable,cover_photo,category_name,if(b.id in(SELECT book_id from book_issue WHERE STATUS=0 and user_id=$getId),1,0)as pending from books b,category c where b.id not in(select book_id from book_issue bi where user_id=$getId and STATUS=1) and b.book_type=c.id AND book_name LIke'%$name%'";
                  $query=mysqli_query($con,$sql);
            
                  if($query== true){
                    while($info=mysqli_fetch_array($query)){ 
                        $bname=$info['book_name'];
                        ?>
                    
                            <tr>
                                <td><?php echo $info['book_name']?></td>
                                <td><img style='width:150px;height:100px'
                                        src="../Librarian/avater/<?php echo $info['cover_photo']?>" alt="">
                                </td>
                                <td><?php echo $info['writters']?></td>
                                <td><?php echo $info['category_name']?></td>
                                <td><?php echo $info['edition']?></td>
                                <td><?php echo $info['shelf']?></td>
                                <td><?php echo $info['quantity']?></td>
                                <td><?php echo $info['pages']?></td>
                                <td>
                                 <?php 
                                  if($numBook>=2){ ?>
                                      <span class='btn btn-danger disabled'>Unable</span>
                                      <?php
                                  }else{ ?>
                                     <?php
                                  if($info['pending']==1){
                                      echo 'Pending';
                                  }elseif($info['pending']==0){ ?>
                                      <a class='btn btn-info' href="borrow.php?bookid=<?php echo $info['id']?>"><span>Borrow
                                      </span></a>
                                  <?php }?> 

                                  <?php }
                                 
                                 
                                 ?>
                                
                                </td>
                                <td><a href="#loginModal<?php echo $info['id']?>" data-toggle="modal" class='btn btn-primary'>Feedback</a>
                            
                            <!--Modal start-->
            <div class="modal" id="loginModal<?php echo $info['id']?>">
                  <div class="modal-dialog modal-sm-4">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Feedback</h5>
                        <button class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <form method='POST' action='feedback.php'>
                          <div class="form-group">
                            <label for="userename">Book_title</label>
                            <input class="form-control" type="text" name='name' value='<?php echo $info['book_name']?>' readonly>
                            <input class="form-control" type="hidden" name='hidden' value='<?php echo $info['id']?>' readonly>
                          </div>
                          <div class="form-group">
                            <label for="password">Author</label>
                            <input class="form-control" type="text" name='author' value='<?php echo $info['writters']?> ' readonly>
                          </div>
                          <div class="form-group">
                                  <label for="exampleInputdetfeed">Feedback</label>
                                  <textarea required id='exampleInputdetfeed' class="form-control" name="message" id="" cols="30" rows="6">Write something...</textarea>
                           </div>
                           <div class="modal-footer">
                        
                      <button type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
                      </div>
                        </form>
                      </div>
                      
                    </div>
                  </div>
                </div>
            <!--Modal end-->
                            </td>
                                
                            </tr>
                            </tr>
                            
            
                            <?php }
                  }
                  
                
                  ?>

             <?php   } else{ ?>
                  <?php
      
                  $sql="select b.id,book_name,writters,edition,shelf,quantity,pages,issuable,cover_photo,category_name,if(b.id in(SELECT book_id from book_issue WHERE STATUS=0 and user_id=$getId),1,0)as pending from books b,category c where b.id not in(select book_id from book_issue bi where user_id=$getId and STATUS=1) and b.book_type=c.id";
                  $query=mysqli_query($con,$sql);
            
                  if($query== true){
                    while($info=mysqli_fetch_array($query)){ 
                        $bname=$info['book_name'];
                        ?>
                    
                            <tr>
                                <td><?php echo $info['book_name']?></td>
                                <td><img style='width:150px;height:100px'
                                        src="../Librarian/avater/<?php echo $info['cover_photo']?>" alt="">
                                </td>
                                <td><?php echo $info['writters']?></td>
                                <td><?php echo $info['category_name']?></td>
                                <td><?php echo $info['edition']?></td>
                                <td><?php echo $info['shelf']?></td>
                                <td><?php echo $info['quantity']?></td>
                                <td><?php echo $info['pages']?></td>
                                <td>
                                 <?php 
                                  if($numBook>=2){ ?>
                                      <span class='btn btn-danger disabled'>Unable</span>
                                      <?php
                                  }else{ ?>
                                     <?php
                                  if($info['pending']==1){
                                      echo 'Pending';
                                  }elseif($info['pending']==0){ ?>
                                      <a class='btn btn-info' href="borrow.php?bookid=<?php echo $info['id']?>"><span>Borrow
                                      </span></a>
                                  <?php }?> 

                                  <?php }
                                 
                                 
                                 ?>
                                
                                </td>
                                <td><a href="#loginModal<?php echo $info['id']?>" data-toggle="modal" class='btn btn-primary'>Feedback</a>
                            
                            <!--Modal start-->
            <div class="modal" id="loginModal<?php echo $info['id']?>">
                  <div class="modal-dialog modal-sm-4">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Feedback</h5>
                        <button class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <form method='POST' action='feedback.php'>
                          <div class="form-group">
                            <label for="userename">Book_title</label>
                            <input class="form-control" type="text" name='name' value='<?php echo $info['book_name']?>' readonly>
                            <input class="form-control" type="hidden" name='hidden' value='<?php echo $info['id']?>' readonly>
                          </div>
                          <div class="form-group">
                            <label for="password">Author</label>
                            <input class="form-control" type="text" name='author' value='<?php echo $info['writters']?> ' readonly>
                          </div>
                          <div class="form-group">
                                  <label for="exampleInputdetfeed">Feedback</label>
                                  <textarea id='exampleInputdetfeed' class="form-control" name="message" id="" cols="30" rows="6" required>Write something...</textarea>
                           </div>
                           <div class="modal-footer">
                        
                      <button type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
                      </div>
                        </form>
                      </div>
                      
                    </div>
                  </div>
                </div>
            <!--Modal end-->
                            </td>
                                
                            </tr>
                            </tr>
                            
            
                            <?php }
                  }
                  
                
                  ?>
             <?php   }
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