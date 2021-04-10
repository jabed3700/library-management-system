
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
          <div class="col-sm-8">
            <h1 class="m-0 text-dark">BookList</h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
          <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
        </div>
      </form>
          </div> 
        </div>
      </div>
    </div>
    <section class="content">
    <?php
      include_once('../db/run.php');
      printTableBySql('SELECT b.id,b.book_name,b.writters,b.book_type,b.edition,b.shelf,b.quantity,b.pages,c.category_name
      FROM books as b INNER JOIN category as c 
      on b.book_type=c.id',["Book_title","Authors","Category","Edition","Shelf","Quantity","Page"],["book_name","writters","category_name","edition","shelf","quantity","pages"],"editbook.php","books","booklist.php");
    
      ?>
    </section>

  </div>
 
 <?php
 include_once('layout/footer.php');
 ?>

  