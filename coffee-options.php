<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/coffee-options.css">
  <link rel="icon" href="img/pnhs.png">
  <title>Coffee</title>
</head>

<?php
include("php/display.php");
include("php/displayWelcome.php")
?>

<body>
  <!-- Search bar-->
  <div class="bar-div" id="bar-div">
    <form class="bar" method="post" action="search.php">
      <button type="button" class="back"><img src="img/back.png" class="back-icon" id="back"></button>
      <input type="text" placeholder="Search this site" class="searchbar" name="search">
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

      <div class="search">
        <button type="submit" id="search-toggle">
          <img src="img/search.png" alt="search" class="nav-search">
        </button>
      </div>
    </div>

    <div class="showNavbar">
      <div class="tab"></div>

      <!-- FOR STUDENT -->
      <a href="index.php" class="tab <?php echo $stud_visibility; ?>">Home</a>
      <a href="signin.php" class="tab <?php echo $stud_visibility; ?>">Login</a>
      <a href="signup.php" class="tab <?php echo $stud_visibility; ?>">Sign up</a>
      <a href="terms.php" class="tab <?php echo $stud_visibility; ?>">Terms and Conditions</a>
      <!-- END OF STUDENT -->

      <!-- FOR STAFF -->
      <a href="staff-admin.php" class="tab <?php echo $staff_visibility; ?>">Home</a>
      <a href="pending-orders.php" class="tab <?php echo $staff_visibility; ?>">Pending Orders</a>
      <a href="ready-orders.php" class="tab <?php echo $staff_visibility; ?>">Ready Orders</a>
      <a href="completed-orders.php" class="tab <?php echo $staff_visibility; ?>">Completed Orders</a>
      <a href="add-item.php" class="tab <?php echo $staff_visibility; ?>">Add Item</a>
      <a href="terms.php" class="tab <?php echo $staff_visibility; ?>">Terms and Conditions</a>
      <!-- END OF STAFF -->

    </div>

    <div class="back-menu">
      <a href="menu.php"><img src="img/left.png" class="back-menu-icon"> Back to menu </a>

      <!-- FOR STUDENT -->
      <a href="order.php" class="<?php echo $stud_visibility; ?>"> View Cart <img src="img/cart.png" class="back-menu-icon cart"></a>

      <!-- FOR STAFF -->
      <a href="archive.php" class="<?php echo $staff_visibility; ?>"> Archive <img src="img/archive.png" class="back-menu-icon arch"></a>
    </div>

    <div class="cart">
      <h1 class="title <?php echo $staff_visibility; ?>">Press EDIT then SELECT.</h1>
      <h1 class="title <?php echo $stud_visibility; ?>">Say "YES" to your craving and tap to order now!</h1>
    </div>

    <div class="options">
      <?php
      $query = "SELECT * FROM tbl_item WHERE item_cat = 'Coffee';";
      $result = mysqli_query($con, $query);
      $title_rows = mysqli_num_rows($result);
      if ($title_rows != 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $item_no = $row['item_no'];
          $item_name = $row['item_name'];
          $item_prc = $row['item_prc'];
          $item_img = $row['item_img'];
          print "<a class='option' href='detail.php?item_no=$item_no'><img src='uploads/$item_img'><span>$item_name</span><span>$item_prc</span></a>";
        }
      }
      ?>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="scripts/index.js"></script>
  <script src="scripts/order.js"></script>
</body>

</html>