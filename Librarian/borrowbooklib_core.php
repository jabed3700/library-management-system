<?php 
 include_once("../db/run.php");

 if(isset($_REQUEST['btn_sub'])){
     $bookId=$_REQUEST['book_title'];
   
    $userId=$_REQUEST['userID'];

    $sql= "INSERT INTO book_issue (user_id,book_id,expecting_return,status,pending) VALUES ('$userId','$bookId',ADDDATE(sysdate(), INTERVAL 10 DAY),1,1)";
$query=mysqli_query($con,$sql);


?>
<script>
alert('Borrow Successful!');
window.location.href="borrowbooklib.php";
</script>
<?php
}



?>