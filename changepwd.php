<!DOCTYPE html>
<head>
		
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	     
	    <title>Change Password</title>
	 
	    <!-- Bootstrap -->
	    <!-- Latest compiled and minified CSS -->
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
	}
	else {
		header("location: homeUser.php"); 
	}
	
?>
<body>
	<div class='background'>
	<?php include 'header.php'; ?>
	</div>
  <div class="wrapper">
    <form class="form-changepwd form-signin" action = "updatepwd.php" method = "POST">

<?php if ($_GET['msg']=='success'){echo '**Password Changed Successfully**';}
else if ($_GET['msg']=='error') { echo '**Either old password is wrong or new passwords do not match. Please re-enter**';
}?>
      <h2 class="form-signin-heading">Change Password</h2>
      <input type="password" class="form-control" name="old_password" placeholder="Old Password" required=""/>
      <input type="password" class="form-control" name="new_password1" placeholder="New Password" required=""/>
      <input type="password" class="form-control" name="new_password2" placeholder="New Password again" required=""/>

      <button class="btn btn-lg btn-primary btn-block btn-dark" type="submit">Change</button>
    </form>
  </div>

<?php include 'footer.php'; ?>
		
</body>
</html>



