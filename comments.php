<?php
if($user)
$author=$fullname;
if($user_stud)
$author=$fullname.' '.$user_stud;
#COMMMENT BOX
echo'<br><hr><br>
	<div class=detailBox2>
    <div>
    <div class="titleBox">
      <label class="fontpara" id="comm">Comments</label>
    </div>

  <div class="actionBox">
        <ul class="commentList">';

$postid = $row['post_id'];
$strSQLcom = "SELECT * FROM comments WHERE postid = '$postid' ORDER BY id";
$querycom = mysqli_query($con,$strSQLcom); 
$flag = mysqli_num_rows($querycom);
#FETCH ALL COMMENTS FOR PARTICULAR POST
while($comment = mysqli_fetch_array($querycom)) {
		if ($comment['author'] != 'Dean') {
		echo'<li>
                <div class="commenterImage">
                  <img src="./css/images/blank.png" />
                </div>';
		}
		if ($comment['author'] == 'Dean') {
		echo'<li>
                <div class="commenterImage">
                  <img src="uploads/dean.jpg" />
                </div>';
		}
	
		echo '
                <div class="commentText">
		    <h5 class="header">'.$comment['author'];
		 
		echo '</h5>';
			
                   echo ' <p>'.$comment['comments'].'</p> ';


		
	if ($comment['author'] == $fullname.' '.$user_stud || $comment['author'] == $fullname) {
			 echo '<form id="delete" method="POST" action="deletecomment.php">
			<span class="date sub-text">on '.date('d-F-Y',strtotime($comment['date'])).'
						 <input type="hidden" name="id" value="'.$comment['id'].'">
						<input type="hidden" name="sectionid" value="'.$j.'">
		<input type="hidden" name="view" value="'.$view.'">
						  <button type="submit" class="btn btn-default custom delete"><small><center>Delete</center></small></button>  
						 </form>';
		}
		
echo '</span>
                </div>
		
                </li>';	
}
#NO COMMENTS ARE THR FOR THAT POST
if($flag == 0) {
	echo '  <li>
                <div class="commentText">
                    <p class = "fontpara"><em>No comments</em></p>
                </div>
                </li>';
}
echo '</ul><hr>';
#YOU CAN POST COMMENTS ONLY IF LOGGED IN


if(($user || $user_stud) ) {

#COMMENT FORM------------------
echo '
        <form class="form-inline" role="form" action="addcomment.php" method="POST">
            
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Your comments" name="comm" />
            </div>
            
            <div class="form-group">
		<input type="hidden" name="pid" value="'.$row['post_id'].'">
		<input type="hidden" name="author" value="'.$author.'">
		<input type="hidden" name="sectionid" value="'.$j.'">
		<input type="hidden" name="view" value="'.$view.'">
                <button class="btn btn-default" type="submit">Add</button>
            </div>
        </form>';
}
echo '
    </div>
</div></div>';

?>



            
        
