<?php 
include("connection.php");
session_start();

if (isset($_POST['add_user'])) {
	$username = $_POST['tb_username'];
	$email = $_POST['tb_email'];
	$password = $_POST['tb_password'];
	$passwordConfirm = $_POST['tb_passwordConfirm'];

	if ($password == $passwordConfirm) {
		$select = "SELECT * FROM tbl_user where email='$email';";
		$result = mysqli_query($con,$select);
		$no_rows = mysqli_num_rows($result);
		if ($no_rows!=0){
			echo "
			<div style='justify-content: center; color: #ff4747; width: 70vw; text-wrap: wrap; margin: 10px 15px;'>
				This email address has already been taken.
			</div>";
		}else{
			$insert="INSERT INTO tbl_user VALUES ('$username', '$email', '$password', 'type_student')";
			mysqli_query($con,$insert);
			$_SESSION['email'] = $_POST['tb_email'];
			header("location:index.php");
		}
	}
	else{
			echo "
			<div style='justify-content: center; color: #ff4747; width: 70vw; text-wrap: wrap; margin: 10px 15px;'>
				This email address has already been taken.
			</div>
			";
	}
}
?>