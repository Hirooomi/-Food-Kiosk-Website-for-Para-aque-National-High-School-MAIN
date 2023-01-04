<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/detail.css">
  <link rel="icon" href="img/pnhs.png">
  <link rel="stylesheet" href="styles/override.css">

  <title>
    <?php
    include("php/display.php");
    include("php/displayWelcome.php");

    if (isset($_GET['item_no'])) {
      $item_no = $_GET['item_no'];
      $query = "SELECT * FROM tbl_item WHERE item_no = '$item_no';";
      $result = mysqli_query($con, $query);
      $title_rows = mysqli_num_rows($result);
      if ($title_rows != 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $title = $row['item_cat'];
          print ucwords($title);
        }
      }  
    }else{
      header("location:menu.php");
    }
    ?>
  </title>
</head>

<?php
if (isset($_GET['item_no'])) {
  $item_no = $_GET['item_no'];
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

      if ($item_cat === "Coffee" or $item_cat === "Drinks") {
        $disabled = "";
      }else{
        $disabled = "disabled";
      }
    }
  }
} else {
  header("location:menu.php");
}

/*if (isset($_POST['add_itemorder'])) {
  $email = $_SESSION['email'];
  $item_no = $_POST['item_no'];
  $item_qty =  $_POST['qty'];
  if (isset($_POST['temp']) or isset($_POST['size'])) {
    $item_temp = $_POST['temp'];
    $item_size = $_POST['size'];
  }else{
    $item_temp = "";
    $item_size = "";    
  }
}*/
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

      <!-- FOR STUDENT -->
      <a href="index.php" class="tab <?php echo $stud_visibility;?>">Home</a>
      <a href="menu.php" class="tab <?php echo $stud_visibility;?>">Menu</a>
      <a href="order.php" class="tab <?php echo $stud_visibility; ?>">Cart</a>
      <a href="checkout.php" class="tab <?php echo $stud_visibility; ?>">Checkout</a>
      <br>
      <a href="logout.php" class="tab <?php echo $stud_visibility; ?>">Logout</a>
      <!-- END OF STUDENT -->

      <!-- FOR STAFF -->
      <a href="staff-admin.php" class="tab <?php echo $staff_visibility; ?>">Home</a>
      <a href="pending-orders.php" class="tab <?php echo $staff_visibility; ?>">Pending Orders</a>
      <a href="preparing-orders.php" class="tab <?php echo $staff_visibility;?>">Preparing Orders</a>
      <a href="ready-orders.php" class="tab <?php echo $staff_visibility; ?>">Ready Orders</a>
      <a href="completed-orders.php" class="tab <?php echo $staff_visibility; ?>">Completed Orders</a>
      <a href="add-item.php" class="tab <?php echo $staff_visibility; ?>">Add Item</a>
      <a href="archive.php" class="tab <?php echo $staff_visibility;?>">Archive</a>  
      <br>
      <a href="logout.php" class="tab <?php echo $staff_visibility; ?>">Logout</a>
      <!-- END OF STAFF -->

    </div>

    <div class="back-menu">
      <a href="menu.php"><img src="img/left.png" class="back-menu-icon"> Back to menu </a>

      <!-- FOR STUDENT -->
      
      <a href="order.php" class="<?php echo $stud_visibility; ?>">
      View Cart
        <div class="notify-badge">
          <?php
            $sql = "SELECT * FROM tbl_cart WHERE email='$email'";

            $result = mysqli_query($con, $sql);
            $row = mysqli_num_rows($result);
            echo $row;
          ?>
        </div>
      <img src="img/cart.png" class="back-menu-icon cart"></a>

      <!-- FOR STAFF -->
      <a href="archive.php" class="<?php echo $staff_visibility; ?>"> Archive <img src="img/archive.png" class="back-menu-icon arch"></a>
    </div>

    <div class="item-cont">
      <form class="archive" action="archive.php" method="post">
        <input type="hidden" name="item_no" value="<?php echo $item_no; ?>">
        <button type="submit" name="btn_archive" class="archive-btn <?php echo $staff_visibility; ?>"><img src="img/minus.png" class="archive-icon"></button>
      </form>

      <div class="item">
        <?php
        print "
              <img src='uploads/$item_img'>
              <span>$item_name</span>
              <span>PHP $item_prc.00</span>
              <input type='hidden' id='prc' value='$item_prc'>
              ";
        ?>
      </div>
    </div>


    <div class="form">
      <div class="caption">Customize your order</div>

      <form class="variation-quantity" action="order.php" method="post">
        <div class="variation">
          <div class="hot-cold">
            <div class="temp">
              <div class="name">
                <label for="hot">Hot</label>
              </div>
              <img src="img/sb.png" class="cup">
              <input type="radio" name="temp" value="Hot" id="hot" <?php echo $disabled; ?>>
            </div>

            <div class="temp">
              <div class="name">
                <label for="cold">Cold</label>
              </div>
              <img src="img/sb.png" class="cup">
              <input type="radio" name="temp" value="Cold" id="cold" <?php echo $disabled; ?>>
            </div>
          </div>

          <div class="size">
            <div class="temp">
              <div class="name">
                <label for="medium">Medium</label>
              </div>
              <img src="img/sb.png" class="cup">
              <input type="radio" name="size" value="Medium" id="medium" <?php echo $disabled; ?>>
            </div>

            <div class="temp">
              <div class="name">
                <label for="large">Large</label>
              </div>
              <img src="img/sb.png" class="cup">
              <input type="radio" name="size" value="Large" id="large" <?php echo $disabled; ?>>
            </div>
          </div>
        </div>

        <div class="quantity">
          <div class="qty">
            Add to my cart <BR>
            <div class="quantity-div">
              <button class="minus-btn" onclick="minus()" type="button"><img src="img/minus.png" class="minus-icon"></button>
              <input type="number" id="quantity" name="item_qty" value="1" step="1" min="1">
              <input type="hidden" name="item_no" value="<?php echo $item_no; ?>">
              <input type="hidden" name="item_prc" value="<?php echo $item_prc; ?>">
              <button class="plus-btn" onclick="plus()" type="button"><img src="img/plus.png" class="plus-icon"></button>
            </div>
            <?php
            print "
                  <span id='total'>PHP $item_prc</span>
                  ";
            ?>
          </div>
          <button type="submit" id="submit" name="add_itemorder" class="<?php echo $stud_visibility; ?>">CONFIRM</button>
        </div>
      </form>
    </div>



  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="scripts/index.js"></script>
  <script src="scripts/order.js"></script>
</body>

</html>