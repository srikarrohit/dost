<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <title>The Dean's Blog</title>
 
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
   
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     
</head>
<?php
	#AUTHENTICATE
	session_start(); 
	if($_SESSION['user']){
		$user = $_SESSION['user']; 
		$id = $_SESSION['id'];
		$fullname = "Dean";
		header("location: homeUser.php");
	}
	else if($_SESSION['user_stud']){
		$user_stud = $_SESSION['user_stud']; 
		$id_stud = $_SESSION['id_stud'];
		$fullname = $_SESSION['fullname'];
		header("location: homeUser.php");
	}
	else {
		
	}
	
?>
<body>
	<div class='background'>
	<?php include 'header.php'; ?>
 <div class="wrapper">
    <form class="form-signin" action = "checklogin.php" method = "POST">      
 
      <h2 class="form-signin-heading">Sign In</h2>
      <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      
      <button class="btn btn-lg btn-primary btn-block btn-dark" type="submit">Login</button>   
    </form>
  </div>


<?php include 'footer.php'; ?>
</body>
</html>
