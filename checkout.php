<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/checkout.css">
  <link rel="icon" href="img/pnhs.png">
  <link rel="stylesheet" href="styles/override.css">
  <title>Checkout</title>
</head>

<?php
include("php/display.php");
include("php/displayWelcome.php");

if (isset($_GET['transaction'])) {
  //Getting current date and time
  date_default_timezone_set("Asia/Manila");
  $datetime = date("d/m/Y H:i:s");

  // Insert to tbl_status
  $insert = "INSERT INTO tbl_status VALUES ('', '$email', 'Pending', '$datetime')";
  mysqli_query($con, $insert);

  // Getting the trans_no from tbl_status
  $query1 = "SELECT MAX(trans_no) trans_no FROM `tbl_status` where email = '$email';";
  $result1 = mysqli_query($con, $query1);
  $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
  $trans_no = $row1['trans_no'];

  // Getting all rows in tbl_cart
  $query = "SELECT tbl_cart.email, tbl_cart.item_no, tbl_item.item_name, tbl_cart.item_qty, tbl_cart.item_temp, tbl_cart.item_size, tbl_cart.item_subtotal FROM tbl_cart LEFT JOIN tbl_item ON tbl_cart.item_no = tbl_item.item_no WHERE tbl_cart.email = '$email'";
  $result = mysqli_query($con, $query);
  $title_rows = mysqli_num_rows($result);
  if ($title_rows != 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $email= $row['email'];
      $item_no = $row['item_no'];
      $item_name = $row['item_name'];
      $item_qty = $row['item_qty'];
      $item_temp = $row['item_temp'];
      $item_size = $row['item_size'];
      $item_subtotal = $row['item_subtotal'];

      //Inserting all rows in tbl_order
      $insert = "INSERT INTO tbl_order VALUES ('$trans_no', '$email', '$item_no', '$item_name', '$item_qty', '$item_temp', '$item_size', '$item_subtotal')";
      mysqli_query($con, $insert);
    }
  }

  // Deleting all entries from tbl_cart of current user
  $delete = "DELETE FROM `tbl_cart` WHERE email = '$email'";
  mysqli_query($con, $delete);

  header("location:checkout.php");
}
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
      <a href="index.php" class="tab">Home</a>
          <a href="menu.php" class="tab">Menu</a>
          <a href="order.php" class="tab">Cart</a>
          <br>
          <a href="logout.php" class="tab">Logout</a>
    </div>

    <div class="back-home">
      <a href="index.php"><img src="img/left.png" class="back-home-icon"> Home </a>
    </div>

    <div class="cart">
      <h1 class="title">My Orders</h1>

      <?php
      $select = "SELECT trans_no FROM tbl_status WHERE email = '$email' AND trans_status <> 'Completed'";
      $sel_result = mysqli_query($con, $select);
      $sel_rows = mysqli_num_rows($sel_result);
      if ($sel_rows != 0) {
        while ($sel_row = mysqli_fetch_array($sel_result, MYSQLI_ASSOC)) {
          print '<div class="items">
                    <div class="name">';
          $trans_no1 = $sel_row['trans_no'];
          $select1 = "SELECT * FROM tbl_status LEFT JOIN tbl_order ON tbl_status.trans_no = tbl_order.trans_no WHERE tbl_status.email = '$email' AND tbl_status.trans_no=$trans_no1";
          $sel_result1 = mysqli_query($con, $select1);
          $sel_rows1 = mysqli_num_rows($sel_result1);
          if ($sel_rows1 != 0) {
            while ($sel_row1 = mysqli_fetch_array($sel_result1, MYSQLI_ASSOC)) {
              $trans_status = strtoupper($sel_row1['trans_status']);
              $item_name = $sel_row1['item_name'];
              $item_qty = $sel_row1['item_qty'];
              $item_temp = $sel_row1['item_temp'];
              $item_size = $sel_row1['item_size'];
              $item_subtotal = $sel_row1['item_subtotal'];
              $item_prc = $item_subtotal/$item_qty;

              $ttl_query = "SELECT SUM(item_subtotal) AS total FROM tbl_order WHERE email = '$email' AND trans_no=$trans_no1;";
              $ttl_result = mysqli_query($con, $ttl_query);
              $ttl_row = mysqli_fetch_array($ttl_result, MYSQLI_ASSOC);
              $total = $ttl_row['total'];

              print "<h2 class='item-name'>$item_name &emsp; PHP$item_prc</h2>
                     <p>$item_qty x $item_temp $item_size</p>";
            }
          }
          print "</div>

                  <div class='status'>
                    <h1>$trans_status</h1>
                  </div>
                </div>

                <div class='total'>
                  <h2>Total</h2>
                  <h2>PHP $total</h2>
                </div>";
        }
      }
      ?>

      <!-- <div class="items">
        <div class="name">
          <h2 class="item-name">Cappuccino</h2>
          <p>2x Hot</p>
          <p>2x Cold</p>
        </div>

        <div class="status">
          <h1>Preparing</h1>
        </div>
      </div>

      <div class="total">
        <h2>Total</h2>
        <h2>1000 PHP</h2>
      </div> -->
    </div>
  </div>
  <script src="scripts/index.js"></script>
</body>

</html>