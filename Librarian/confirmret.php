<?php
include_once('../db/run.php');
$id=$_GET["id"];
$sql="update book_issue set return_date=sysdate(),status=2 where id=".$id;
mysqli_query($con,$sql);

$fines = $con->query("SELECT issue_date,expecting_return,return_date,user_id,datediff(return_date,expecting_return) as day from book_issue where id=". $id);
if($fines==true){
    while($info=mysqli_fetch_array($fines)){
        $day=$info['day'];
        $user_id=$info['user_id'];
        
    }
}
if($day>0){
  
    
    $finess=$day*10;
    $sql44="INSERT INTO fine (user_id,amount) VALUES ($user_id,$finess)";
    $query=mysqli_query($con,$sql44);
}
header("location:borrowlist.php");
?>