<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/pending-orders.css">
  <link rel="icon" href="img/pnhs.png">
  <link rel="stylesheet" href="styles/override.css">
  <title>Ready</title>
</head>

<?php
include("php/display.php");
include("php/displayWelcome.php");
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
    <p>
      PARAÑAQUE NATIONAL HIGH SCHOOL - MAIN - Home of the Gentle Warriors
    </p>
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
      <a href="pending-orders.php" class="tab">Pending Orders</a>
      <a href="preparing-orders.php" class="tab">Preparing Orders</a>
      <a href="ready-orders.php" class="tab">Ready Orders</a>
      <a href="add-item.php" class="tab">Add Item</a>
      <a href="archive.php" class="tab">Archive</a>
      <br>
      <a href="logout.php" class="tab">Logout</a>

    </div>

    <div class="back-home">
      <a href="order-status.php"><img src="img/left.png" class="back-home-icon"> Order Status </a>
    </div>

    <div class="cart">
      <h1 class="title">Completed Orders</h1>

      <?php
      $select = "SELECT * FROM tbl_status LEFT JOIN tbl_user ON tbl_status.email = tbl_user.email WHERE trans_status = 'Completed'";
      $sel_result = mysqli_query($con, $select);
      $sel_rows = mysqli_num_rows($sel_result);
      if ($sel_rows != 0) {
        while ($sel_row = mysqli_fetch_array($sel_result, MYSQLI_ASSOC)) {
          print "
            <div class='items'>
              <div class='name'>
          ";
          $trans_no1 = $sel_row['trans_no'];
          $select1 = "SELECT * FROM tbl_status LEFT JOIN tbl_order ON tbl_status.trans_no = tbl_order.trans_no WHERE tbl_status.trans_no=$trans_no1";
          $sel_result1 = mysqli_query($con, $select1);
          $sel_rows1 = mysqli_num_rows($sel_result1);
          if ($sel_rows1 != 0) {
            while ($sel_row1 = mysqli_fetch_array($sel_result1, MYSQLI_ASSOC)) {
              $trans_status = $sel_row1['trans_status'];
              $item_name = $sel_row1['item_name'];
              $item_qty = $sel_row1['item_qty'];
              $item_temp = $sel_row1['item_temp'];
              $item_size = $sel_row1['item_size'];

              $ttl_query = "SELECT SUM(item_subtotal) AS total FROM tbl_order WHERE trans_no=$trans_no1;";
              $ttl_result = mysqli_query($con, $ttl_query);
              $ttl_row = mysqli_fetch_array($ttl_result, MYSQLI_ASSOC);
              $total = $ttl_row['total'];
              print "
                <h2 class='item-name'>$item_name</h2>
                <p>$item_qty x $item_temp $item_size</p>
              ";
            }
          }
          $username1 = $sel_row['username'];
          $email1 = $sel_row['email'];
          $date1 = $sel_row['trans_datetime'];
          print "
            </div>

            <div class='status'>
              <div class='custom-select'>
                <select name='status' id='status' onchange='getComboReady(this, $trans_no1)'>
                  <option value='Completed'>COMPLETE</option>
                </select>
              </div>
            </div>
          </div>

          <div class='details'>
            <h4>Username: $username1</h4>
            <h4>Email: $email1</h4>
            <h4>D and T : $date1</h4>
          </div>

          <div class='total'>
            <h2>Total</h2>
            <h2>PHP $total</h2>
          </div>
          ";
        }
      }
      ?>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/index.js"></script>
  <script type="text/javascript" src="scripts/order.js"></script>
  <script type="text/javascript" src="scripts/selected.js"></script>
</body>

</html>