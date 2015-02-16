<?php
@session_start();
if($_SESSION['user']){
$oldpw = $_POST['old_password'];
$newpw1 = $_POST['new_password1'];
$newpw2 = $_POST['new_password2'];

if($newpw1==$newpw2){
$con = mysqli_connect("localhost", "root","testmysql123","DeanBlog") or die(mysql_error()); //Connect to server

        $strSQL = "SELECT * FROM Users WHERE username = 'Dean'";
        $query = mysqli_query($con,$strSQL);
        $exists = mysqli_num_rows($query);
#       $strSQL_stud = "SELECT * FROM Students WHERE username = '$username'";
#       $query_stud = mysqli_query($con,$strSQL_stud); 
#       $exists_stud = mysqli_num_rows($query_stud); 
        $password = $oldpw;
        $table_users = "";
        $table_password = "";

        if($exists > 0) {
                $row = mysqli_fetch_array($query);
                $table_pwd = $row['password'];
                $table_users = $row['username'];
                $id = $row['id'];
                if (crypt($password, $table_pwd)==$table_pwd) {
			$sql = "UPDATE Users SET password='".crypt($newpw1)."'WHERE username = 'Dean'";
		        $query = mysqli_query($con,$sql);
                        header("location:changepwd.php?msg=success");
                }
                else {
                        header("location: changepwd.php?msg=error");
                }
        }
        else {
                header("location: changepwd.php?msg=error");
        }
}
else {
header("location: changepwd.php?msg=error");
}
}
else {
header("location: homeUser.php");
}

?>

