<?php
	  @session_start(); 
	   
	   if($_SESSION['user']){ 
	   }
	   else {
	      header("location: index.php"); 
	   }
	if($_SERVER["REQUEST_METHOD"] == "POST") {	
		$con = mysqli_connect("localhost", "root","testmysql123","DeanBlog") or die(mysql_error());
		//insert posts into database
		if($_POST['id']) $id = mysqli_real_escape_string($con, $_POST['id']);
		$title = mysqli_real_escape_string($con, $_POST['blogtitle']);
		$content = mysqli_real_escape_string($con, $_POST['content']);
		$comment = mysqli_real_escape_string($con, $_POST['comment']);
		$files = serialize($_POST['filename']);
		$pub = mysqli_real_escape_string($con, $_POST['publish']);
		
		if($comment != "disable") $comment = "enable";
		$sql="UPDATE blog_posts SET post_title='$title',content='$content',author_name='$user',post_date=NOW(),comment='$comment',filename='$files',publish='$pub' WHERE post_id='$id'";
		$_SESSION['decision'] = 'yes';
//		include 'newpost.php';
		mysqli_query($con,$sql);
		$sql1 = "SELECT * FROM blog_posts ORDER BY post_id DESC LIMIT 0, 1";
		$query = mysqli_query($con,$sql1);
		$row = mysqli_fetch_array($query);
		$id_max = $row['post_id'];
		$id_max = $id_max+1;
		$sqlmax = "UPDATE blog_posts SET post_id = '$id_max' WHERE post_id='$id'";
		mysqli_query($con,$sqlmax);
	
		header("location:homeUser.php");
	}
	else {
		header("location:homeUser.php");
	}		


?>

