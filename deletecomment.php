<?php
	
	$id = $_POST['id'];
	$sectionid = $_POST['sectionid'];
		$view = $_POST['view'];
#	$con = mysqli_connect("localhost", "root","testmysql123","DeanBlog") or die(mysql_error()); //Connect to server
	include 'config.php'; 
	$strSQL = "DELETE FROM comments WHERE id = '$id'";
#	$strSQL1 = "DELETE FROM comments WHERE postid = '$postid'";
	mysqli_query($con,$strSQL);
#	mysqli_query($con,$strSQL1);
	if($view != NULL){header("location:view.php?sectionid=$sectionid");}
		else header("location:homeUser.php?sectionid=$sectionid");	
?>
