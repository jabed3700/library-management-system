
 <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");

 if(isset($_REQUEST['submit_btn'])){
   $getCat=$_GET['category'];
   
 }
 if(isset($_REQUEST['search_btn'])){
  $name=$_REQUEST['serach'];
  echo $name;
  
}

 ?>

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
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
      </div>
    </div>
    <section class="content">
    <?php
      include_once('../db/run.php');
      


    if(isset($_REQUEST['category'])){
      printTableBySql('SELECT b.id,b.book_name,b.writters,b.book_type,b.edition,b.shelf,b.quantity,b.pages,c.category_name
      FROM books as b INNER JOIN category as c 
      on b.book_type=c.id where book_type='.$getCat,["Book_title","Authors","Category","Edition","Shelf","Quantity","Page"],["book_name","writters","category_name","edition","shelf","quantity","pages"],"editbook.php","books","booklist.php");
    } else if(isset($_REQUEST['serach'])){
      printTableBySql("SELECT b.id,b.book_name,b.writters,b.book_type,b.edition,b.shelf,b.quantity,b.pages,c.category_name FROM books as b INNER JOIN category as c on b.book_type=c.id where b.book_name LIke'%$name%'",["Book_title","Authors","Category","Edition","Shelf","Quantity","Page"],["book_name","writters","category_name","edition","shelf","quantity","pages"],"editbook.php","books","booklist.php");
    }else{
      printTableBySql('SELECT b.id,b.book_name,b.writters,b.book_type,b.edition,b.shelf,b.quantity,b.pages,c.category_name
      FROM books as b INNER JOIN category as c 
      on b.book_type=c.id',["Book_title","Authors","Category","Edition","Shelf","Quantity","Page"],["book_name","writters","category_name","edition","shelf","quantity","pages"],"editbook.php","books","booklist.php");
    }
      ?>
    </section>

  </div>
 
 <?php
 include_once('layout/footer.php');
 ?>

  