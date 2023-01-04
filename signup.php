<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/signup.css">
  <link rel="icon" href="img/pnhs.png">
  <title>Sign Up</title>
</head>

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
      <a href="index.php" class="tab">Home</a>
      <a href="signin.php" class="tab">Login</a>
      <a href="terms.php" class="tab">Terms and Conditions</a>
    </div>
  </div>

  <div class="content">
    <div class="greetings">
    <h1>Hello!</h1>
      <p>Sign up using your <mark>depedparanaquecity email </mark> to continue, it is also advisable to read the <b><a href="terms.php">Terms and Conditions</a></b> before proceeding.</p>
    </div>

    <form action="" id="form" method="post">
      <input type="text" placeholder="Username" name="tb_username" maxlength="10" required>
      <input type="email" placeholder="Email" name="tb_email" maxlength="128" pattern="^[a-zA-Z0-9._%+-]+@(depedparanaquecity.com)" required>
      <input type="password" placeholder="Password" name="tb_password" maxlength="128" required>
      <input type="password" placeholder="Re-enter Password" name="tb_passwordConfirm" maxlength="128" required>
      <?php 
      include("php/add.php");
      ?>
      <input type="submit" id="submit" value="Confirm" name="add_user">

      
    </form>

    <div class="signin">
      <p>Already a member? <a href="signin.php" id="signin"> Sign in</a></p>
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