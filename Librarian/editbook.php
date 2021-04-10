
<?php

 include_once("../db/run.php");
 $id=$_GET["id"];
 if(isset($_REQUEST['btn_sub'])){

 $name= $_REQUEST['name'];
 $auth= $_REQUEST['authname'];
 $category= $_REQUEST['category'];
 $edition= $_REQUEST['edition'];
 $shelf= $_REQUEST['shelf'];
 $quantity= $_REQUEST['quantity'];
 $page=$_REQUEST['page'];
 $upda = mysqli_query($con,"UPDATE books SET book_name='$name',writters='$auth',book_type='$category',edition='$edition',shelf='$shelf',pages='$page',quantity='$quantity' WHERE id=$id");

 header('location: booklist.php');
 
 }
 
?>
  <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 
 $sql="select * from books where id=".$id;
 $query_run=mysqli_query($con,$sql);
  while($res=mysqli_fetch_array($query_run)){
  $name=$res["book_name"];
  $authname=$res["writters"];
  $id=$res["id"];
  $category=$res["book_type"];
  $edition=$res["edition"];
  $shelf=$res["shelf"];
  $quantity=$res["quantity"];
  $pages=$res["pages"];
  
}
 ?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Book Info</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">editbook</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit book </h3>
              </div>
              <!-- form start -->
              <form role="form" method="POST" action="">
                <div class="card-body">
                  <div class="form-group">
                  <label for="exampleInputdetname">Book Title</label>
                    <input type="text" id="exampleInputdetname" name="name" class="form-control" value="<?=$name?>" placeholder="Enter Book Title ">
                  </div>
                  <div class="form-group">
                <label for="exampleInputdetnamee">Author Name</label>
                    <input name="authname" id="exampleInputdetnamee" type="text" class="form-control" value="<?=$authname?>"  placeholder="Enter Author Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputdetnam">Category Name</label>
                    <select name="category" id="exampleInputdetnam" class="form-control">
                    <?php
                    printOptionsUpdate('category','id','category_name',$category);
                    ?>
                  </select>
                </div>
                <div class="form-group">
                <label for="exampleInputdetna">Edition</label>
                    <input name="edition" id="exampleInputdetna" type="text" class="form-control" value="<?=$edition?>"  placeholder="Edition">
                </div>
                
                <div class="form-group">
                <label for="exampleInputdetn">Shelf</label>
                    <input name="shelf" id="exampleInputdetn" type="text" class="form-control" value="<?=$shelf?>" placeholder="Shelf">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputdet">Quantity</label>
                      <input name="quantity" id="exampleInputdet" type="text" class="form-control" value="<?=$quantity?>" placeholder="Quantity">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputde">Page</label>
                      <input name="page" id="exampleInputde" type="text" class="form-control" value="<?=$pages?>" placeholder="Page">
                  </div>
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
                </div>
              </form>
            </div>
    </section>
  </div>
 <?php
 include_once('layout/footer.php');
 ?>

  