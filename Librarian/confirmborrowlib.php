 <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 include_once("../db/run.php");
 ?>
 
            <?php 
            if(isset($_REQUEST['search_btn'])){
                 $id=$_REQUEST['id'];
                 $sql="select * from user_info where std_id='$id'";
                 $query=mysqli_query($con,$sql);
                 $num_rows=mysqli_num_rows($query);
                
                 if($query==true){
                   
                     if($num_rows<1){ ?>
                        <script>
                        alert('Invalid Student ID');
                        window.location.href="borrowbooklib.php";
                        
                        </script>
                       <?php
                     }else{    
                        while($info=mysqli_fetch_array($query)){
                            $userId =$info['id'];
                            $username =$info['username'];
                            $department =$info['department'];
                            $faculty =$info['faculty'];
                            $std_id =$info['std_id'];
                       }      
                         ?>
                     
                        <div class='content-wrapper'>
                        <section class="content">
       <div class="card card-primary">
              <div class="card-header mb-3">
                <h3 class="card-title ">Borrow book</h3>
              </div>
              <!-- form start -->
              <div>
                       
                <span class='p-4 mt-3' style='font-weight:700;font-size:21px;'> Student_Name: <?= $username?></span>
                <span class='p-4 mt-3' style='font-weight:700;font-size:21px;'> Department: <?= $department?></span>
                <span class='p-4 mt-3' style='font-weight:700;font-size:21px;'> Faculty: <?= $faculty?></span>
                <span class='p-4 mt-3' style='font-weight:700;font-size:21px;'> Student_Id: <?= $std_id?></span>


              
              </div>
              <form role="form" method="POST" action="borrowbooklib_core.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputdetnam">Book Name</label>
                    <input type="hidden" value="<?php echo $userId ?>" name='userID'>
                    <select name="book_title" id="exampleInputdetnam" class="form-control">
                    <?php
                    printOptions('books','id','book_name');
                    ?>
                  </select>
                </div>
                  <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
                  </div>
              </form>
            </div>
    </section>
                        </div>
                     
                     
                     <?php   

                      
                     }
             
                 }
               } 
            ?> 
  <?php
    include_once('layout/footer.php');
 ?>      
  

 