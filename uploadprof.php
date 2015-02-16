<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
#        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
#        echo "File is not an image.";
	 header("location:profile.php?msg=error1");
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
#    echo "Sorry, file already exists.";
     header("location:profile.php?msg=error2");
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
#    echo "Sorry, your file is too large.";
    header("location:profile.php?msg=error3");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
#    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     header("location:profile.php?msg=error4");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    header("location:profile.php?msg=error");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/dean.jpg")) {
#        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
#	$target_file = "uploads/dean.jpg";
#	$_FILES["fileToUpload"]["tmp_name"] = "uploads/dean.jpg";
	header("location:profile.php?msg=success");
    } else {
        header("location:profile.php?msg=error");
    }
}
?>