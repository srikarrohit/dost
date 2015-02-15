<?php
#	$con = mysqli_connect("localhost", "root","testmysql123","DeanBlog") or die(mysql_error());
#	//insert  user
#	$username = 'Dean';
#	$password = 'Dean$7164';
#	
#	$password = password_hash($password,PASSWORD_DEFAULT);
#	mysqli_query($con,"INSERT INTO Users (username, password) VALUES ('$username','$password')");
	include 'config.php'; 
	//insert  user
	$username = 'student2';
	$password = 'student2';
	
	$password = password_hash($password,PASSWORD_DEFAULT);
	mysqli_query($con,"INSERT INTO Students (username, password) VALUES ('$username','$password')");
?>	

