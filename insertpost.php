<?php
	  @session_start(); 

	   if($_SESSION['user']){ 
	   }
	   else {
	      header("location: index.php"); 
	   }
	if($_SERVER["REQUEST_METHOD"] == "POST") {	
		$con = mysqli_connect("localhost", "root","yousuckballs","DeanBlog") or die(mysql_error());
		//insert posts into database

		$title = mysqli_real_escape_string($con, $_POST['blogtitle']);
		$content = mysqli_real_escape_string($con, $_POST['content']);
		$comment = mysqli_real_escape_string($con, $_POST['comment']);
		$files = serialize($_POST['filename']);
		$pub = mysqli_real_escape_string($con, $_POST['publish']);
		
		if($comment != "disable") $comment = "enable";
		$sql="INSERT INTO blog_posts(post_title,content,author_name,post_date,comment,filename,publish) VALUES('$title','$content','$user',NOW(),'$comment', '$files', '$pub')";
		$_SESSION['decision'] = 'yes';
//		include 'newpost.php';
		mysqli_query($con,$sql);
		header("location:homeUser.php");
	}
	else {
		header("location:homeUser.php");
	}		


?>

