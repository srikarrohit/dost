<?php
	echo '<br><br><div id="commentsidebar">
	
    <div class="titleBox">
      <label class="fontpara">Recent Comments</label>
    </div>
<div class="actionBox">
	 <ul class="commentList">';
	$sql1 = "SELECT * FROM comments ORDER BY id DESC";
	$query_comment = mysqli_query($con,$sql1);
	
	$index = 0;
	while ($index < 10) {
		$row = mysqli_fetch_array($query_comment);
		if($row == NULL) break;
		$id_comm = $row['postid'];
		$sql2 = "SELECT * FROM blog_posts where post_id = '$id_comm'";
		$query_blog = mysqli_query($con,$sql2);
		$post_corr = mysqli_fetch_array($query_blog);
		echo'<li>
                <div class="commenterImage">
                  <img src="./css/images/blank.png" />
                </div>
                <div class="commentText">';
		$sectionid = $i;
		echo '<span class="gentext"><b>'.$row['author'].'</b><em> commented on </em><span id="comsidetitle"><a href="#'.$row['postid'].'" data-toggle="tab">'.$post_corr['post_title'].'</a></span><br><br>'.$row['comments'].'</span><br><span class="date sub-text">on '.$row['date'].'</span><br><hr>';
		$index = $index+1;
		echo '</div>
                </li>';	
	}
	echo '</div></div>';
?>
