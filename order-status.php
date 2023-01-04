<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/order-status.css">
  <link rel="icon" href="img/pnhs.png">
  <link rel="stylesheet" href="styles/override.css">
  <title>Home</title>
</head>

<?php
include("php/display.php");
?>

<body>
  <!-- Search bar-->
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

      <a href="staff-admin.php" class="tab">Home</a>
      <a href="add-item.php" class="tab">Add Item</a>
      <a href="archive.php" class="tab">Archive</a> 
      <br>
      <a href="logout.php" class="tab">Logout</a>

    </div>

    <div class="back-home">
      <a href="staff-admin.php"><img src="img/left.png" class="back-home-icon"> Home </a>
    </div>

    <div class="buttons">
      <button onclick="window.location.href='pending-orders.php'">Pending Orders</button>
      <button onclick="window.location.href='preparing-orders.php'">Preparing Orders</button>
      <button onclick="window.location.href='ready-orders.php'">Ready Orders</button>
      <button onclick="window.location.href='completed-orders.php'">Completed Orders</button>
    </div>

  </div>
  <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="scripts/index.js"></script>
  <script src="scripts/order.js"></script>
</body>

</html>