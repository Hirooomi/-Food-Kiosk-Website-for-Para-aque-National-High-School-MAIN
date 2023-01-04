<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/menu.css">
  <link rel="icon" href="img/pnhs.png">
  <link rel="stylesheet" href="styles/override.css">
  <title>Menu</title>
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

      <!-- FOR STUDENT -->
      <a href="index.php" class="tab <?php echo $stud_visibility;?>">Home</a>
      <a href="order.php" class="tab <?php echo $stud_visibility; ?>">Cart</a>
      <a href="checkout.php" class="tab <?php echo $stud_visibility; ?>">Checkout</a>
      <br>
      <a href="logout.php" class="tab <?php echo $stud_visibility; ?>">Logout</a>
      <!-- END OF STUDENT -->

      <!-- FOR STAFF -->
      <a href="staff-admin.php" class="tab <?php echo $staff_visibility;?>">Home</a>
      <a href="pending-orders.php" class="tab <?php echo $staff_visibility;?>">Pending Orders</a>
      <a href="preparing-orders.php" class="tab <?php echo $staff_visibility;?>">Preparing Orders</a>
      <a href="ready-orders.php" class="tab <?php echo $staff_visibility;?>">Ready Orders</a>
      <a href="completed-orders.php" class="tab <?php echo $staff_visibility;?>">Completed Orders</a>
      <a href="add-item.php" class="tab <?php echo $staff_visibility;?>">Add Item</a>
      <a href="archive.php" class="tab <?php echo $staff_visibility;?>">Archive</a>  
      <br>
      <a href="logout.php" class="tab <?php echo $staff_visibility; ?>">Logout</a>
      <!-- END OF STAFF -->

    </div>
    

    <div class="message">There's something for everyone!</div>

    <div class="options">
      <a class="option" href="options.php?category=coffee"><img src="img/coffee-cup.png"><span>Coffee</span></a>
      <a class="option" href="options.php?category=burger"><img src="img/burger.png"><span>Burger</span></a>
      <a class="option" href="options.php?category=drinks"><img src="img/drinks.png"><span>Drinks</span></a>
      <a class="option" href="options.php?category=rice%20meals"><img src="img/rice.png"><span>Rice Meals</span></a>
      <a class="option" href="options.php?category=snacks"><img src="img/snack.png"><span>Snacks</span></a>
      <a class="option" href="options.php?category=desserts"><img src="img/dessert.png"><span>Desserts</span></a>
    </div>
  </div>
  <script src="scripts/index.js"></script>
</body>

</html>