<?php
session_start();
require_once('../db/run.php');

 $username = $_REQUEST['name'];
 $password = $_REQUEST['password'];
 echo $hiddeninfo = $_REQUEST['hidden']; 

	if($hiddeninfo == 'superadmin'){
	
		$userinfo = mysqli_query($con,"SELECT * FROM super_admin WHERE username='$username' AND password='$password'");

		$num_rows= mysqli_num_rows($userinfo);

			if($num_rows == 1){
				while($user=mysqli_fetch_array($userinfo)){
					$_SESSION["superadmin"]=$user;
				}
			header('location: ../super_admin/createadmin.php');
				
			}else{
				header('location: login.php?type=super_admin');
			}
	}elseif($hiddeninfo == 'librarian'){
		
		$userinfo = mysqli_query($con,"SELECT *  FROM librarian WHERE name='$username' AND password='$password'");

		$num_rows= mysqli_num_rows($userinfo);

			if($num_rows == 1){
				while($user=mysqli_fetch_array($userinfo)){
					$_SESSION["librarian"]=$user;
					
				}
			header('location: ../Librarian/addbook.php');
				
			}else{
				header('location: login.php?type=librarian');
			}
	}elseif($hiddeninfo == 'admin'){
		
		$userinfo = mysqli_query($con,"SELECT *  FROM admin WHERE name='$username' AND password='$password'");

		$num_rows= mysqli_num_rows($userinfo);

			if($num_rows == 1){
				while($user=mysqli_fetch_array($userinfo)){
					$_SESSION["admin"]=$user;
					
				}
			header('location: ../admin/userlist.php');
				
			}else{
				header('location: login.php?type=admin');
			}
	}
	
?>