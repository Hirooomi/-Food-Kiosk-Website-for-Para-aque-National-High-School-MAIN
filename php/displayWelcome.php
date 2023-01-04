<?php 
include("connection.php");

if (!isset($_SESSION['email'])) {
	header("Location:welcome.php");
}

?>
