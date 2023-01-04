<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/welcome.css">
  <link rel="icon" href="img/pnhs.png">
  <title>Sign In</title>
</head>

<?php
session_start();
if (isset($_SESSION['user_type'])) {
  if ($_SESSION['user_type'] == "type_staff") {
    header("location:staff-admin.php");
  }else{
    header("location:index.php");
  }
}
?>

<body>
  <div class="header">
    PARAÑAQUE NATIONAL HIGH SCHOOL - MAIN - Home of the Gentle Warriors
  </div>
  <div class="navbar">
    <img src="img/navigation.png" class="nav-icon nav">
    <img src="img/close.png" class="nav-icon close hide">
    <img src="img/pnhs.png" class="nav-pnhs">

    <div class="showNavbar">
      <div class="tab"></div>
      <a href="signin.php" class="tab">Login</a>
      <a href="signup.php" class="tab">Sign up</a>
      <a href="terms.php" class="tab">Terms and Conditions</a>
    </div>
  </div>

  <div class="content">
    <div class="greetings">
      <h1>Welcome!</h1>
      <p>Please <a href="signin.php">Login</a> or <a href="signup.php">Signup</a> to continue.</p>
    </div>
  </div>

  <footer>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 400" class="wave-3">
      <path fill="#0B8043" fill-opacity="1" d="M0,64L48,96C96,128,192,192,288,218.7C384,245,480,235,576,224C672,213,768,203,864,170.7C960,139,1056,85,1152,58.7C1248,32,1344,32,1392,32L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 350" class="wave-2">
      <path fill="#accbb2" fill-opacity="1" d="M0,64L48,96C96,128,192,192,288,218.7C384,245,480,235,576,224C672,213,768,203,864,170.7C960,139,1056,85,1152,58.7C1248,32,1344,32,1392,32L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wave-1">
      <path fill="#ddeddf" fill-opacity="1" d="M0,64L48,96C96,128,192,192,288,218.7C384,245,480,235,576,224C672,213,768,203,864,170.7C960,139,1056,85,1152,58.7C1248,32,1344,32,1392,32L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
  </footer>
</body>



<script type="text/javascript">
  let nav = document.querySelector('.nav');
  let close = document.querySelector('.close')
  let navbar = document.querySelector('.showNavbar')

  nav.onclick = function() {
    nav.classList.add('hide')
    navbar.classList.add('show')
    close.classList.remove('hide')
  }

  close.onclick = function() {
    close.classList.add('hide')
    navbar.classList.remove('show')
    nav.classList.remove('hide')
  }
</script>

</html>