<?php 
  session_start(); 
?>
<html>
    <head>
        <title>Research</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/font-faces.css">
        <link rel="stylesheet" href="styles/animations.css">

        <script src="https://kit.fontawesome.com/6b9c8a6e93.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="dimPane" onclick="closeDim()"></div>
        <div id="topBar">
            <p class="heading1" id="topText" onclick="colOrex()">PARAÑAQUE NATIONAL HIGH SCHOOL - MAIN - Home of the Gentle Warriors</p>
        </div>
        <div id="utilityBar">
            <i class="fas fa-bars" aria-hidden="true" id="menuBar" onclick="openSideBar()"></i>
            <img src="img/pnhs_logo_255px.jpg" id="pnhslogo40px">
            <input type="text" id="searchBarInput">
            <a href="" id="searchBarButton"><i class="fa fa-search" aria-hidden="true" ></i></a>
        </div>
        <div id="sideBar">
        <a id="closeSideBarButton" onclick="closeSideBar()">&times;</a>
            <?php
                if (isset($_SESSION["success"])) {
            ?>
                <p id="usernameText"><?php echo $_SESSION["username"]?></p>
                <a href="logout.php">Logout</a>
            <?php
                }else{
            ?>
                <a href="login.php">Login</a>
                <br>
                <a href="register.php">Create Account</a>
            <?php
                }
            ?>
            
            <br>
            <a href="#tac" onclick="">Terms and Conditions</a>
        </div>
        <div id="tac">
            <h1>
            Terms and Conditions
            </h1>
        </div>
        <script src="scripts/script.js"></script>
    </body>
</html>