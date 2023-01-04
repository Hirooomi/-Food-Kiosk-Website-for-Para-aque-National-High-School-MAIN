<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/archive.css">
  <link rel="icon" href="img/pnhs.png">
  <link rel="stylesheet" href="styles/override.css">
  <title>Archive</title>
</head>

<?php
include("php/display.php");
include("php/displayWelcome.php");

if (isset($_POST['btn_archive'])) {
  $item_no = $_POST['item_no'];
  $query = "SELECT * FROM tbl_item WHERE item_no = '$item_no';";
  $result = mysqli_query($con, $query);
  $title_rows = mysqli_num_rows($result);
  if ($title_rows != 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $item_no = $row['item_no'];
      $item_name = $row['item_name'];
      $item_prc = $row['item_prc'];
      $item_img = $row['item_img'];
      $item_cat = $row['item_cat'];
    }
  }
  //Removing from tbl_item
  $delete = "DELETE FROM tbl_item WHERE item_no = '$item_no';";
  $result = mysqli_query($con, $delete);

  //Adding to tbl_archive
  $insert = "INSERT INTO tbl_archive value ('$item_no', '$item_name', '$item_prc', '$item_img', '$item_cat')";
  mysqli_query($con, $insert);
}

if (isset($_POST['item'])) {
  $item_no = $_POST['item'];
  $query = "SELECT * FROM tbl_archive WHERE item_no = '$item_no';";
  $result = mysqli_query($con, $query);
  $title_rows = mysqli_num_rows($result);
  if ($title_rows != 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $item_no = $row['item_no'];
      $item_name = $row['item_name'];
      $item_prc = $row['item_prc'];
      $item_img = $row['item_img'];
      $item_cat = $row['item_cat'];
    }
  }
  //Removing from tbl_archive
  $delete = "DELETE FROM tbl_archive WHERE item_no = '$item_no';";
  $result = mysqli_query($con, $delete);

  //Adding to tbl_item
  $insert = "INSERT INTO tbl_item value ('$item_no', '$item_name', '$item_prc', '$item_img', '$item_cat')";
  mysqli_query($con, $insert);
}
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
      <a href="completed-orders.php" class="tab">Completed Orders</a>
      <a href="add-item.php" class="tab">Add Item</a>
      <br>
      <a href="logout.php" class="tab">Logout</a>

    </div>

    <div class="content-archive">
      <div class="back-menu">
        <a href="detail.php"><img src="img/left.png" class="back-menu-icon">Back to menu </a>
       <p>Archive <img src="img/archive.png" class="back-menu-icon cart"></p>
        <a href="detail.php"><img src="img/left.png" class="back-menu-icon invisible"></a>
      </div>

      <div class="message">
        <h1>
          Press Restore and Select to bring back to Menu.
        </h1>
      </div>

      <form action="archive.php" method="post" class="item">
        <div class="form">
          <?php
          $query = "SELECT * FROM tbl_archive;";
          $result = mysqli_query($con, $query);
          $title_rows = mysqli_num_rows($result);
          if ($title_rows != 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $item_no = $row['item_no'];
              $item_name = $row['item_name'];
              $item_prc = $row['item_prc'];
              $item_img = $row['item_img'];

              print "
                <div class='option'>
                  <input type='radio' name='item' id='$item_no' value='$item_no'>
                  <label for='$item_no'>
                    <img src='uploads/$item_img' class='coffee-img'>
                    <h1>$item_name</h1>
                    <h1>Php $item_prc.00</h1>
                  </label>
                </div>
              ";
            }
          }
          ?>
        </div>

        <div class="btn">
          <button type="submit" class="restore" name="btn_restore">RESTORE</button>
        </div>
      </form>

    </div>

  </div>
  </div>
  <script src="scripts/index.js"></script>
</body>

</html>