<?php 

include_once('db/run.php');

if(isset($_REQUEST['btn_sub'])){
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $subject=$_REQUEST['subject'];
    $message=$_REQUEST['message'];
    $sql="INSERT INTO user_message (name,email,subject,message) VALUES ('$name','$email','$subject','$message')";
    $query=mysqli_query($con,$sql);
  ?>

    <script>
alert('Your message successfully inserted!')
window.location.href="index.php";
</script>

<?php } 






?>