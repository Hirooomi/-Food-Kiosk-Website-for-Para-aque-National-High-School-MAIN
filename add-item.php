<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/add-item.css">
  <link rel="icon" href="img/pnhs.png">
  <link rel="stylesheet" href="styles/override.css">
  <title>Add item</title>
</head>

<?php
include("php/display.php");
include("php/displayWelcome.php");

if (isset($_POST['add-item']) && isset($_FILES['item_img'])) {
  $item_name = $_POST['item_name'];
  $item_prc = $_POST['item_prc'];
  $item_cat = $_POST['item_cat'];

  $name = $_FILES['item_img']['name'];
  $tmp_name = $_FILES['item_img']['tmp_name']; //path

  $img_ex = pathinfo($name, PATHINFO_EXTENSION);
  $img_ex_lc = strtolower($img_ex);

  $allowed_exs = array("jpg", "jpeg", "png");

  if (in_array($img_ex_lc, $allowed_exs)) {
    $new_name = "img-" . $name;
    $img_upload_path = 'uploads/' . $new_name;
    move_uploaded_file($tmp_name, $img_upload_path);

    // insert into database
    $insert = "INSERT INTO tbl_item value ('', '$item_name', '$item_prc', '$new_name', '$item_cat')";
    mysqli_query($con, $insert);
  }
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
      <a href="staff-admin.php" class="tab">Home</a>
      <a href="pending-orders.php" class="tab">Pending Orders</a>
      <a href="preparing-orders.php" class="tab">Preparing Orders</a>
      <a href="ready-orders.php" class="tab">Ready Orders</a>
      <a href="completed-orders.php" class="tab">Completed Orders</a>
      <a href="add-item.php" class="tab">Add Item</a>
      <a href="archive.php" class="tab">Archive</a>      
      <br>
      <a href="logout.php" class="tab">Logout</a>
    </div>

    <div class="back-home">
      <a href="staff-admin.php"><img src="img/left.png" class="back-home-icon"> Home </a>
    </div>

    <div class="cart">
      <h1 class="title">Add Item</h1>

      <div class="upload">
        <form class="form" method="post" action="add-item.php" enctype="multipart/form-data">
          <div class="name">
            <label for="item_name" class="label-name">Name</label>
            <input type="text" name="item_name" id="name" required>
          </div>

          <div class="price">
            <label for="item_prc" class="label-price">Price</label>
            <input type="number" name="item_prc" id="price" required>
          </div>

          <div class="file">
            <label for="item_img">Add Image</label>
            <input type="file" id="img" name="item_img" accept="image/*" required>
          </div>

          <div class="category">
            <h2>Item Type</h2>
            <div class="custom-select">
              <select name="item_cat" id="category" class="js-example-basic-single" offset={500} data-dropup-auto="true">
                <option value="Drinks">Drinks</option>
                <option value="Coffee">Coffee</option>
                <option value="Rice Meals">Rice Meals</option>
                <option value="Snacks">Snacks</option>
                <option value="Burger">Burger</option>
                <option value="Desserts">Desserts</option>
              </select>
            </div>
          </div>

          <div class="btns">
            <button type="button" class="cancel" onclick="window.location = 'staff-admin.php';">Cancel</button>
            <button type="submit" name="add-item" class="save">Save</button>
          </div>
        </form>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/index.js"></script>
    <!-- <script type="text/javascript" src="scripts/order.js"></script> -->
    <!-- <script type="text/javascript" src="scripts/selected.js"></script> -->
</body>

</html>