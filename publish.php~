<?php
	$postid = $_POST['pid'];
	
	$con = mysqli_connect("localhost", "root","testmysql123","DeanBlog") or die(mysql_error()); //Connect to server
	$strSQL = "UPDATE blog_posts SET publish='True' WHERE post_id='$postid'";
	mysqli_query($con,$strSQL);
	$sql1 = "SELECT * FROM blog_posts ORDER BY post_id DESC LIMIT 0, 1";
		$query = mysqli_query($con,$sql1);
		$row = mysqli_fetch_array($query);
		$id_max = $row['post_id'];
		$id_max = $id_max+1;
		$sqlmax = "UPDATE blog_posts SET post_id = '$id_max' WHERE post_id='$postid'";
		mysqli_query($con,$sqlmax);
	header("location: homeUser.php"); 
?>
