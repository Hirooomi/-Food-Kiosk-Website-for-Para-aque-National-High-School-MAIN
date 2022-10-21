<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
 	<title>Registration system PHP and MySQL</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
  	<link rel="stylesheet" href="styles/style.css">
  	<link rel="stylesheet" href="styles/login-register-style.css">
    <link rel="stylesheet" href="styles/font-faces.css">
    <link rel="stylesheet" href="styles/animations.css">
    <script src="scripts/script.js"></script>
	<script src="https://kit.fontawesome.com/6b9c8a6e93.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="topBar">
            <p class="heading1" id="topText" onclick="colOrex()">PARAÑAQUE NATIONAL HIGH SCHOOL - MAIN - Home of the Gentle Warriors</p>
        </div>
		<div id="utilityBar">
            <p id="loginText">Login</p>    
        </div>
  <div class="header">
  </div>
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>