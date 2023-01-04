<?php 
include("connection.php");
session_start();

if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];

	$select = "SELECT username FROM tbl_user where email='$email';";
	$result = mysqli_query($con,$select);
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
		$username = $row['username'];
	}

}

if (isset($_SESSION['user_type'])) {
	if ($_SESSION['user_type'] == "type_staff") {
		$staff_visibility = "visible";
		$stud_visibility = "hidden";
	}else{
		$staff_visibility = "hidden";
		$stud_visibility = "visible";		
	}
}

if (isset($_POST['login_user'])) {
	$email = $_POST['tb_email'];
	$password = $_POST['tb_password'];
	$select = "SELECT * FROM tbl_user where email='$email' and BINARY password LIKE '$password';";
	$result = mysqli_query($con,$select);
	$no_rows = mysqli_num_rows($result);
	if ($no_rows==1){
		$_SESSION['email'] = $_POST['tb_email'];
		while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$_SESSION["user_type"] = $row['user_type'];
			if ($_SESSION['user_type'] == "type_staff") {
				header("location:staff-admin.php");
			}
			elseif ($_SESSION["user_type"] == "type_student") {
				header("location:index.php");
			}
		}
	}
	else{
		echo "
		<div style='justify-content: center; color: #ff4747; width: 70vw; text-wrap: wrap; margin: 10px 15px;'>
			Email and password do not match.
		</div>
		";
	}
}