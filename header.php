<?php
#Header for index
if(!$user && !$user_stud){
	echo '
	<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">        
	    <div class="container">
		<div class="navbar-header">
		    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
		    <a href="index.php" class="navbar-brand">The Dean\'s Blog<span class="glyphicon glyphicon-pencil pencil"></span></a>
		</div>
		<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

		    
		<ul class="nav navbar-nav navbar-right">
		        <li><a href="login.php">Sign In</a></li>
			<li><a href="profile.php">Dean\'s profile</a></li>			
		</ul>   
		
		</nav> 
	    </div>
	</header>';
}
#header for Dean
else if($user) {
	echo '
	<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">        
	    <div class="container">
		<div class="navbar-header">
		    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
		    <a href="homeUser.php" class="navbar-brand">The Dean\'s Blog<span class="glyphicon glyphicon-pencil pencil"></span></a>
		</div>
		<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
		    
		    <ul class="nav navbar-nav">
		        
			<li><a href="newpost.php">New Post</a></li>
			<li><a href="saved.php">Saved Posts</a></li>
		    </ul>
		
		   <div class="nav navbar-nav navbar-right">
<div class="dropdown top">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
    <span class="gentext2">Dean, Students</span>
  </button>
  <ul class="dropdown-menu">
   <li><a href="changepwd.php" class="">Change Password</a></li>
   <li><a href="logout.php" class="">Sign Out</a></li>
  </ul>
  
</div>
    
		
</div>	
<ul class="nav navbar-nav navbar-right">
	<li><a href="profile.php"><small>Dean\'s profile&nbsp&nbsp</small></a></li>			
  </ul>	
		</nav>
	    </div>
	</header>';
}
#Header for any other student
else {
	echo '
	<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">        
	    <div class="container">
		<div class="navbar-header">
		    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
		    <a href="homeUser.php" class="navbar-brand">The Dean\'s Blog<span class="glyphicon glyphicon-pencil pencil"></span></a>
		</div>
		<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
		    
		    <ul class="nav navbar-nav">
		        <li ><a href="homeUser.php">Home</a></li>
		        
			
		    </ul>
			   <div class="nav navbar-nav navbar-right">
<div class="dropdown top">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
    <span class="gentext2">'.$fullname.'</span>
  </button>
  <ul class="dropdown-menu ">
   
	                <li><a href="logout.php" class="text-centerdrop">Sign Out</a></li>
  </ul>
</div>
</div>	
		    
		    </ul>
<ul class="nav navbar-nav navbar-right">
	<li><a href="profile.php"><small>Dean\'s profile&nbsp&nbsp</small></a></li>			
  </ul>
		</nav>
	    </div>
	</header>';
}
# 
##SEARCH BOX--TO IMPLEMENT	
#<form class="navbar-form navbar-right" role="search">
#              <div class="form-group">
#                <input type="text" class="form-control" placeholder="Search">
#              </div>
#              <button type="submit" class="btn btn-default">Submit</button>
#            </form>
?>
