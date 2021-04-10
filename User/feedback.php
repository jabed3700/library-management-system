<?php 
session_start();
include_once("../db/run.php");
$getUserId=$_SESSION['user']['id'];

if(isset($_POST['btn_sub']))
{
 $name=$_POST['name'];
 $author=$_POST['author'];
 $message=$_POST['message']; 
 $hidden=$_POST['hidden'];
	

$sql="INSERT INTO  feedback (user_id,book_id,book_title,author,feedback) VALUES('$getUserId','$hidden','$name','$author','$message')";
mysqli_query($con, $sql);

?>
<script>
alert('Your Feedback successfully submitted!')
window.location.href="booklist.php";
</script>

<?php
}

?>