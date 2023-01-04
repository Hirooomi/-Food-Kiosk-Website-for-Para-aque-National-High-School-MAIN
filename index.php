<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/index.css">
  <link rel="icon" href="img/pnhs.png">
  <link rel="stylesheet" href="styles/override.css">

  <title>Home</title>
</head>

<?php
include("php/display.php");
include("php/displayWelcome.php");
?>

<body>
  <!-- Search abr-->
  <div class="bar-div" id="bar-div">
    <form class="bar" method="post" action="search.php">
      <button type="button" class="back"><img src="img/back.png" class="back-icon" id="back"></button>
      <input type="text" placeholder="Search for Menu" class="searchbar" name="search">
      <button type="submit" name="btn_search" class="back" style="position: absolute; right: 2.5%;"><img src="img/search.png" class="back-icon"></button>
    </form>
  </div>

  <div class="header">
    PARAÑAQUE NATIONAL HIGH SCHOOL - MAIN - Home of the Gentle Warriors
  </div>
  <div class="content">
    <div class="navbar">
      <img src="img/navigation.png" class="nav-icon nav">
      <img src="img/close.png" class="nav-icon close hide">
      <img src="img/pnhs.png" class="nav-pnhs">
      <span id='ct7' class="clock-timer" style="color:white;text-align:center;position:relative;right:-20%;"></span>

      <div class="search">
        <button type="submit" id="search-toggle">
          <img src="img/search.png" alt="search" class="nav-search">
        </button>
      </div>
    </div>
    <div class="showNavbar">
      <div class="tab"></div>
      <?php
        if(isset($_SESSION['email'])){
          ?>
          <a href="menu.php" class="tab">Menu</a>
          <a href="order.php" class="tab">Cart</a>
          <a href="checkout.php" class="tab">Checkout</a>
          <br>
          <a href="logout.php" class="tab">Logout</a>

      <?php
        }else{
          ?>
        <a href="index.php" class="tab">Home</a>
        <a href="signin.php" class="tab">Login</a>
        <a href="signup.php" class="tab">Sign up</a>
        <a href="terms.php" class="tab">Terms and Conditions</a> 
      <?php
        }
      ?>

      <!-- FOR ADMIN START -->
      <!-- <a href="index.php" class="tab">Home</a>
      <a href="pending-orders.php" class="tab">Pending Orders</a>
      <a href="ready-orders.php" class="tab">Ready Orders</a>
      <a href="completed-orders.php" class="tab">Completed Orders</a>
      <a href="add-item.php" class="tab">Add Item</a>
      <a href="terms.php" class="tab">Terms and Conditions</a>-->
      <!-- END -->

    </div>
    <div class="message">How can I help you today?</div>
    <div class="message welcome">Welcome back, <?php echo "$username"; ?>!</div> 
    
    <div class="options">
      <!-- FOR ADMIN START -->
      <a class="option" href="menu.php"><img src="img/menu.png"><span>MENU</span></a>
      <a class="option" href="order.php"><img src="img/cart.png"><span>ORDERS</span></a>
      <!-- END -->

      <!-- <a class="option" href="menu.php"><img src="img/menu.png"><span>EDIT MENU</span></a> -->
      <!-- <a class="option" href="order-status.php"><img src="img/cart.png"><span>ORDERS</span></a> -->
    </div>
  </div>
  
  <script src="scripts/index.js"></script>
</body>

</html>