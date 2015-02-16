	<!DOCTYPE html>
<head>
		
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	     
	    <title>Welcome!</title>
	 
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
session_start(); 
	if($_SESSION['user']){
		$user = $_SESSION['user']; 
		$id = $_SESSION['id'];
		$fullname = "Dean";
	}
	else if($_SESSION['user_stud']){
		$user_stud = $_SESSION['user_stud']; 
		$id_stud = $_SESSION['id_stud'];
		$fullname = $_SESSION['fullname'];
	}
	else {
		
	}
?>
<body>
<div class='background'>
<?php include 'header.php'; ?>
	<div class="container" id="profile">
    	<div class="row">
		<br>
		<br>
    	<div class="span3 well check">
        <center>
	<img src="uploads/dean.jpg" name="Dean" width="190" height="190" class="img-circle">
	<?php 
	if($user) {
		echo '<br>' ;
		echo '<form action="uploadprof.php" method="post" enctype="multipart/form-data">
    <span class="fontpara"><small><i>Change Profile Image</i>
    <input type="file" class="fontpara browse" name="fileToUpload" id="fileToUpload">
    <input type="submit" class="btn btn-default custom2 delete" value="Change" style="text-align:center" name="submit"></small></span>
</form>';
	if ($_GET['msg']=='success'){echo '<small>Profile image successfully changed</small>';}
else if ($_GET['msg']=='error') { echo '<small>Image Upload failed : Try scaling down the image size</small>';
}
else if ($_GET['msg']=='error1') { echo '<small>Image Upload failed : File is not an image</small>';
}
else if ($_GET['msg']=='error2') { echo '<small>Image Upload failed : File already exists</small>';
}
else if ($_GET['msg']=='error3') { echo '<small>Image Upload failed : File is too large</small>';
}
else if ($_GET['msg']=='error4') { echo '<small>Image Upload failed : Only .jpg,.png extensions allowed</small>';
}
	}
		
	?>
        <h3>M S Sivakumar</h3>
         
        <p>Dean Students</p>
	</center>
       
    <hr>
    <center>
 
    <small><cite title="Indian Institute of Technology, Madras">Indian Institute of Technology, Madras <i class="glyphicon glyphicon-map-marker">
      </i></cite></small>
       <p>
      <i class="glyphicon glyphicon-envelope"></i>&nbspdost@iitm.ac.in
                           <br />
      <i class="glyphicon glyphicon-home"></i>&nbspDean's Office, Academic Section<br>IIT Madras
                           <br />
       <i class="glyphicon glyphicon-earphone"></i>&nbsp2257 8050</p>
</div></div></div>
</div>
<?php include 'footer.php'; ?>
		
</body>
</html>



