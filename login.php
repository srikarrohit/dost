<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <title>Sign In</title>
 
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	 <link href="css/stylesheet.css" rel="stylesheet">
 
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<?php
#	ini_set('display_errors','on');
#	error_reporting(E_ALL);
#if(isset($_POST['username'])) {
#	
#	session_start(); 
#	$username = $_POST['username'];
#	$password = $_POST['password'];
##	$error = "no";
#	include 'ldaplogin.php';
#	$con = mysqli_connect("localhost", "root","testmysql123","DeanBlog") or die(mysql_error()); //Connect to server
#	
#	$strSQL = "SELECT * FROM Users WHERE username = '$username'";
#	$query = mysqli_query($con,$strSQL); 
#	$exists = mysqli_num_rows($query); 
##	$strSQL_stud = "SELECT * FROM Students WHERE username = '$username'";
##	$query_stud = mysqli_query($con,$strSQL_stud); 
##	$exists_stud = mysqli_num_rows($query_stud); 
#	
#	$table_users = "";
#	$table_password = "";

#	if($exists > 0) {
#		$row = mysqli_fetch_array($query);
#		$table_pwd = $row['password'];
#		$table_users = $row['username'];
#		$id = $row['id'];
#		if (password_verify($password, $table_pwd)) {
#			$_SESSION['user'] = $username;
#			$_SESSION['id'] = $id;
#			
#			header("location:homeUser.php");
#			$error ="";
#		}
#		else {
#			$error = "Wrong Password homie!";
#			#header("location: login.php"); 
#		}
#	}
#	
##	else if($exists_stud > 0) {
##		$row = mysqli_fetch_array($query_stud);
##		$table_pwd = $row['password'];
##		$table_users = $row['username'];
##		$id = $row['id'];
##		if (password_verify($password, $table_pwd)) {
##			$_SESSION['user_stud'] = $username;
##			$_SESSION['id_stud'] = $id;
##			
##			header("location:homeUser.php");
##		}
##		else {
##			$error = "pwd";
##			header("location: login.php"); 
##		}
##	}
#	else if(ldap_login($username, $password)) {
#		$username = strtoupper($username);
#		$sql = "SELECT * FROM students WHERE username = '$username'";
#		$query_s = mysqli_query($con,$sql);
#		$student = mysqli_fetch_array($query_s);
#		$_SESSION['fullname'] = $student['fullname'];
#		$_SESSION['user_stud'] = $username;
#		header("location:homeUser.php");
#		$error = "";
#	}
#	else {
#		$error= "Wrong username biatch!";
#		#header("location: login.php"); 
#		
#	}
#}
?>

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
	
<!--RANDOM BOOTSTRAP STUFF-->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="https://code.jquery.com/jquery.js"></script>
      <!-- Include all compiled plugins (below), or include individual files 
            as needed -->
   <script src="js/bootstrap.min.js"></script>
</body>

</html>
