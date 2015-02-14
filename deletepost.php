<?php
	$postid = $_POST['id'];
<<<<<<< HEAD
	$con = mysqli_connect("localhost", "root","yousuckballs","DeanBlog") or die(mysql_error()); //Connect to server
=======
	$con = mysqli_connect("localhost", "root","testmysql123","DeanBlog") or die(mysql_error()); //Connect to server
>>>>>>> 761b2e91156cf399b1b68a4f80a9e2ac4f1a0215
	$strSQL = "DELETE FROM blog_posts WHERE post_id = '$postid'";
	$strSQL1 = "DELETE FROM comments WHERE postid = '$postid'";
	mysqli_query($con,$strSQL);
	mysqli_query($con,$strSQL1);
	header("location: homeUser.php"); 
?>
