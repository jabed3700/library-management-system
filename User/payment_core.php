<?php 
session_start();
include_once("../db/run.php");
 $userId=$_SESSION["user"]["id"];

$sql="select SUM(amount) as total from fine where user_id=$userId AND status=0;";
$ddd=mysqli_query($con,$sql);
if($ddd==true){
    while($info=mysqli_fetch_array($ddd)){
        $ff=$info['total'];
    }
}

if(isset($_REQUEST['btn_sub'])){

    $getId=$_SESSION["user"]["std_id"];
    $name=$_SESSION["user"]["username"];
    $method=$_POST['method'];
    $phone=$_POST['phone'];
    $amount=$_POST['amount'];
    $trx_id=$_POST['trx_id'];

    $sql="INSERT INTO payment (name,std_id,method,phone,amount,trx_id,total_dua,user_id) VALUES('$name','$getId','$method','$phone','$amount','$trx_id',$ff,$userId)";
    mysqli_query($con,$sql);
    header('location: payment.php');
}



?>