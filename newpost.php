<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <title>The Dean's Blog | New Post</title>
 
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">
    <script src="ckeditor/ckeditor.js"></script>
    <link href="uploadfile.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="jquery.uploadfile.min.js"></script>
	 <script type="text/javascript" src="js/bootstrap.min.js"></script>
<style>
body {
  background-image:none;
}
</style>

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
	   }
	   else {
	      header("location: index.php"); 
	   }
	   $user = $_SESSION['user']; 
	   $id = $_SESSION['id'];
	   if($_POST['pid']) 
		$id = $_POST['pid'];
	   else $id = NULL;
?>
<body>

	<?php include 'header.php'; ?>
	<?php
		if($id != NULL) {
#			$con = mysqli_connect("localhost", "root","testmysql123","DeanBlog") or die(mysql_error()); //Connect to server
			include 'config.php';
			$strSQL = "SELECT* FROM blog_posts WHERE post_id='$id'";
			$q = mysqli_query($con,$strSQL);
			$row = mysqli_fetch_array($q);
		}
	if($id == NULL){
		 echo '
		<div class="wrapper">
		    <form role="form" class="form-horizontal col-md-10 col-md-offset-1"  action="insertpost.php" method="POST" >';
	}
	else {
			echo '
		<div class="wrapper">
		    <form role="form" class="form-horizontal col-md-10 col-md-offset-1"  action="editpost.php" method="POST" >';
	}
	 
		echo '<div class="form-group">
		    <label for="name" class="col-md-8 header"><h3></h3></label>
		    <div class="col-md-12">
		        <input type="text" class="form-control" id="name" placeholder="Title" name="blogtitle" value="'.$row['post_title'].'"/>
		    </div>
		</div>

		  
		<div class="form-group">
		    <label for="message" class="col-md-3 header"><h3></h3></label>
		    <div class="col-md-12">
			 <textarea class="form-control" id="message" name="content">'.$row['content'].'</textarea>
		    </div>
		</div>
		<div class="col-md-3 well check">
	 		<input type="checkbox" id="dis" name="comment" value="disable"/>&nbsp<span id="disablecomms"><em>Disable comments</em></span>
		</div>'; ?>

<br><br><br><br>
	
	<div id="mfl"><div id="mulitplefileuploader">Browse</div></div>
	<div id="status"></div><br>
	<div id="startUpload" class="ajax-file-upload-black">Start Upload</div>
	<br><br>
	<div class="alert alert-warning" id="alert" role="alert" style="font-size:75%;">Caution:<br>> No two files should have the same name.<br>> File names should also be different from past uploaded files, otherwise old files will get attached.<br>> If a saved post is edited, upload all attachments again.</div>
	
	
	<script>
	$(document).ready(function()
	{
	
	var settings = {
	    url: "upload.php",
	    dragDrop:true,
	    fileName: "myfile",
	    allowedTypes:"jpg,png,gif,doc,pdf,zip",	
	    autoSubmit:false,
	    returnType:"json",
		 onSuccess:function(files,data,xhr)
	    {
		    $("#status").append("<input type='hidden' name='filename[]' value='"+files+"'>");      
	    },
	    showDelete:false,
	    deleteCallback: function(data,pd)
	    {
	    for(var i=0;i<data.length;i++)
	    {
		$.post("delete.php",{op:"delete",name:data[i]},
		function(resp, textStatus, jqXHR)
		{
		    //Show Message  
		    $("#status").append("<div>File Deleted</div>");      
		});
	     }      
	    pd.statusbar.hide(); //You choice to hide/not.

	}
	}
	
	
	var uploadObj = $("#mulitplefileuploader").uploadFile(settings);
	$("#startUpload").click(function()
		{   
		    uploadObj.startUpload();
		});


	});

</script>

		
		<div class="form-group">
		    <div class="col-md-4 col-md-offset-1 text-right"><br>
			<?php if($id!=NULL) echo ' <input type="hidden" name="id" value="'.$row['post_id'].'">'; ?>
		        <button type="submit" class="col-md-12 btn btn-lg btn-primary btn-dark" name="publish" value='False'>Save</button>
		    </div>
		
		    <div class="col-md-4 col-md-offset-2 text-right"><br>
			<?php if($id!=NULL) echo ' <input type="hidden" name="id" value="'.$row['post_id'].'">'; ?>
		        <button type="submit" class="col-md-12 btn btn-lg btn-primary btn-dark" name="publish" value='True'>Post</button>
		    </div>
		</div>
                
		<script type="text/javascript">
			CKEDITOR.replace( 'message' );
		</script>
	    </form>  
	</div>

<?php include 'footer.php'; ?>
	
</body>
</html>


