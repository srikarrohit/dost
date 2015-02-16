<!DOCTYPE html>
<head>
		
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	     
	    <title>The Dean's Blog | Saved Posts</title>
	 
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
	<div class="container col-md-12 col-xs-12">
  
	<div class="row col-md-12 col-xs-12">
	    <div class="col-md-12 col-xs-12">
	       <h3 class="header">&nbsp&nbsp&nbsp&nbsp&nbspSaved Posts</h3>
	       <div class="tabbable tabs-left">
		<ul class="nav nav-tabs col-md-4 col-xs-4">
		<?php	
			$view = 1;
#			$con = mysqli_connect("localhost", "root","testmysql123","DeanBlog") or die(mysql_error());
			include 'config.php'; 
			$strSQL = "SELECT * FROM blog_posts ORDER BY post_id DESC";
			$query = mysqli_query($con,$strSQL); 
			
			$i = 0; #ACTIVE TABS
			$sec = 0; #TO REFRESH BACK TO THE SAME TAB AS COMMENTS
			while($row = mysqli_fetch_array($query)) {
				
				if($row == NULL)break;
				if($row['publish'] == 'True') continue;
				$sec = mysqli_real_escape_string($con, $_GET['sectionid']);
				if($sec == NULL) $sec = 0;

				if($i == $sec)echo' <li class="active"><a href="#'.$row['post_id'].'" data-toggle="tab">'.$row['post_title'].'</a></li>';
				else echo' <li><a href="#'.$row['post_id'].'" data-toggle="tab">'.$row['post_title'].'</a></li>';


				$i = $i+1;
			}

			echo '</ul>	
			<div class="col-md-7 col-xs-7 tab-content">';
			$query1 = mysqli_query($con,$strSQL); 
			$j = 0;

			while($row = mysqli_fetch_array($query1)) {
				
				if($row == NULL)break;
				if($row['publish'] == 'True') continue;
				if($j == $sec) { #ACTIVE TAB
					     #POST TITLE,DATE
					     echo '<div class="tab-pane active" id="'.$row['post_id'].'"><h1>'.$row['post_title'].'</h1><span id="lightcolor" class="glyphicon glyphicon-time">&nbsp'.date('d-F-Y',strtotime($row['post_date'])).'</span>';
					     #If user is Dean display delete button
						 echo '<br><div class="row"><div class="col-md-1 dashboard-panel-6"><form id="delete" method="POST" action="deletepost.php">
						 <input type="hidden" name="id" value="'.$row['post_id'].'">
						 <button type="submit" class="btn btn-default delete">Delete</button> 
						 </form></div>';
						echo '<div class="col-md-1 "><form id="edit" method="POST" action="newpost.php">
						 <input type="hidden" name="pid" value="'.$row['post_id'].'">
						 <button type="submit" class="btn btn-default delete">Edit</button> 
						 </form></div>';
						echo '<div class="col-md-1 "><form id="publish" method="POST" action="publish.php">
						 <input type="hidden" name="pid" value="'.$row['post_id'].'">
						 <button type="submit" class="btn btn-default delete">Publish</button> 
						 </form></div></div>';
					      
					#POST CONTENT

					echo '<hr><p>'.$row['content'].'</p>';
                                $filenames = unserialize($row['filename']);
                                if (!$filenames){

                                     echo '<hr><p>No attachments</p>';
                                }else{
                                     echo '<hr><p>Attachments:</p>';
                                foreach($filenames as $file){
                                        echo "<a href='uploads/".$file."' target='_blank'>".$file."</a><br>";}
				}

					 #COMMENTS-------------------
#					if($row['comment'] == "disable") {echo '<br><hr><br><p class = "fontpara" align="center"><em>Comments have been disabled for this post</em></p><br><br>';}
#					else {include 'comments.php';}
					echo '</div>';   
				}
				else {#NOT ACTIVE TABS--SAME AS ACTIVE
					     #Header for posts
					     echo '<div class="tab-pane" id="'.$row['post_id'].'"><h1>'.$row['post_title'].'</h1><span id="lightcolor" class="glyphicon glyphicon-time">&nbsp'.date('d-F-Y',strtotime($row['post_date'])).'</span>';
					     #User is Dean
						 echo '<br><div class="row"><div class="col-md-1 dashboard-panel-6"><form id="delete" method="POST" action="deletepost.php">
						 <input type="hidden" name="id" value="'.$row['post_id'].'">
						 <button type="submit" class="btn btn-default delete">Delete</button> 
						 </form></div>';
						echo '<div class="col-md-1 off"><form id="edit" method="POST" action="newpost.php">
						 <input type="hidden" name="pid" value="'.$row['post_id'].'">
						 <button type="submit" class="btn btn-default delete">Edit</button> 
						 </form></div>';
						echo '<div class="col-md-1 "><form id="publish" method="POST" action="publish.php">
						 <input type="hidden" name="pid" value="'.$row['post_id'].'">
						 <button type="submit" class="btn btn-default delete">Publish</button> 
						 </form></div></div>';
					     
					     echo '<hr><p>'.$row['content'].'</p>';
                                $filenames = unserialize($row['filename']);
                                if (!$filenames){

                                     echo '<hr><p>No attachments</p>';
                                }else{
                                     echo '<hr><p>Attachments:</p>';
                                foreach($filenames as $file){
                                        echo "<a href='uploads/".$file."' target='_blank'>".$file."</a><br>";}
}


					      #COMMENTS-------------------
#						 if($row['comment'] == "disable") {echo '<br><hr><br><p class = "fontpara" align="center"><em>Comments have been disabled for this post</em></p><br><br>';}
#					     else {include 'comments.php';}
					     echo '</div><br><br><br>';  
				}

				$j = $j+1;
			}
	      ?>
	      </div>    
	    </div>
	   </div>
	  <hr>
	</div>

<?php include 'footer.php'; ?>
		
</body>
</html>



