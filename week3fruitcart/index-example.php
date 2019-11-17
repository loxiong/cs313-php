<!--instead of writing out the PHP code here, it is calling the PHP code from an external file-->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Home Page</title>
  <link href="styles/main.css" type="text/css" rel="stylesheet" />
</head>

<body>
  <h1>Shop Here</h1>
  <?php
    require_once "product-gallery-1.php";
  ?>
  <div class="primary-button">
    <button type="button"> <a href="viewcart.php">View Cart</a></button>
  </div>



  <script src="scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="scripts/script.js"></script>
</body>
</html>