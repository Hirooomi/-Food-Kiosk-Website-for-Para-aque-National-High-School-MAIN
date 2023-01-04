<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/terms.css">
  <link rel="icon" href="img/pnhs.png">
  <title>Sign Up</title>
</head>

<?php
include("php/display.php");
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

      <a href="index.php" class="tab ">Home</a>
      <a href="signin.php" class="tab ">Login</a>
      <a href="signup.php" class="tab ">Sign up</a>

    </div>
  </div>

  <div class="content">
    <div class="content">
      <div class="title">
        <h1>Terms and Conditions</h1>
        <p>Published by: Hiromi Yamada (Web Developer) on December 20, 2022</p>
      </div>

      <div class="tnc">
        <p>By accessing and using this website, you agree that you have read, understood, and accepted the terms, including any additional terms and conditions and any policies referenced herein that are available on the platforms. If you do not agree with or fall within the terms, please do not access or use this website or the services.</p>

        <p>This website may be used by (i) grade 11 and 12 students of Paranaque National High School – Main (PNHS-Main) and (ii) senior high school teachers and (iii) school canteen staffs.
        </p>

        <p>It is also a must for users to utilize their depedpar email in creating an account. Users accepting these terms  agree to take responsibility for their actions and any charges associated with their use of the website and/or purchase of goods.
        </p>

        <p>If you are part of the junior high school community, you must stop using or accessing the website immediately.</p>

        <p>
        Our research group reserves the right to change or modify these terms (including our policies, which are incorporated into these terms) at any time.
        </p>

        <p>
        You are strongly recommended to read these terms regularly. By continuing to use the website after the amended Terms are posted, you will be deemed to have agreed to the amended Terms. 
        </p>

      </div>
      <div class="button">
      <button onClick="window.location = '/signup.php'">I Agree</button>
      </div>
    </div>

  </div>
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