<?php
session_start();
require_once('../db/run.php');

 $username = $_REQUEST['name'];
 $password = $_REQUEST['password'];

	
    $userinfo = mysqli_query($con,"SELECT * FROM user_info WHERE username='$username' AND password='$password'");

    $num_rows= mysqli_num_rows($userinfo);

        if($num_rows == 1){
            while($user=mysqli_fetch_array($userinfo)){
                $_SESSION["user"]=$user;
            }
        header('location: ../User/booklist.php');
            
        }else{
            header('location: userlogin.php');
        }

?>