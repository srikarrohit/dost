<?php
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
#		$con = mysqli_connect("localhost", "root","testmysql123","DeanBlog") or die(mysql_error());
		include 'config.php'; 
		//inserts comments into db
		$pid = mysqli_real_escape_string($con, $_POST['pid']);
		$commentauthor = mysqli_real_escape_string($con, $_POST['author']);
		$comment = mysqli_real_escape_string($con, $_POST['comm']);
		$sectionid = mysqli_real_escape_string($con, $_POST['sectionid']);
		$view = mysqli_real_escape_string($con, $_POST['view']);
		
		$sql="INSERT INTO comments(comments,postid,author,date) VALUES('$comment','$pid','$commentauthor',NOW())";
		mysqli_query($con,$sql);
		if($view != NULL){header("location:view.php?sectionid=$sectionid");}
		else header("location:homeUser.php?sectionid=$sectionid");	
	}
	else {
		header("location:homeUser.php");
	}

?>
