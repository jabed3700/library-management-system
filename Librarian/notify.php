<?php

session_start();
include_once('../db/run.php');
// $getId=$_GET['id'];

// $sql2="UPDATE book_issue SET notify=1 WHERE id=$getId";
// mysqli_query($con,$sql2);



$sql ="SELECT count(b.id) as total,GROUP_CONCAT(b.book_name) as books,GROUP_CONCAT(b.writters)as authors,bs.id,bs.issue_date,u.username,u.email,u.std_id,u.contact,DATE(ADDDATE(expecting_return, INTERVAL 1 DAY))as exp_date FROM book_issue as bs INNER JOIN books as b on bs.book_id=b.id INNER JOIN user_info as u on bs.user_id=u.id WHERE datediff(expecting_return,sysdate())=1 AND return_date IS NULL group by contact";
$query=mysqli_query($con,$sql);

$rows=mysqli_num_rows($query);

if($rows >0){
  if($query==true){

    while($info=mysqli_fetch_array($query)){
       
      $sms=  "Dear ".$info['username'].", The following book will be due soon for your student Id ".$info['std_id'].". ( ".$info['books']."),Due date: ".$info['exp_date'].". Please return or renew them  before due date. Library and Informaiton Centre,hlm";

$phone = $info['contact'];
try{
  $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
  $paramArray = array(
  'userName' => "01917403325",
  'userPassword' => "01917605546",
  'mobileNumber' => $phone,
  'smsText' =>  $sms,
  'type' => "TEXT",
  'maskName' => '',
  'campaignName' => '',
  );
  $value = $soapClient->__call("OneToOne", array($paramArray));
   $value->OneToOneResult;
  echo "<script>alert('Messages sent')</script>";
  echo "<script type='text/javascript'> window.history.back(); </script>";
 } catch (Exception $e) {
  echo $e->getMessage();
 }
      }
    

}
}else{
  echo "<script>alert('No Results Available.')</script>";
  echo "<script type='text/javascript'> window.history.back(); </script>";
}
