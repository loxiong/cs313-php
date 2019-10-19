<!--WEEK 05 - INDIVIDUAL ASSIGNMENT
----PHP DATA ACCESS--------------->
<?php
//PDO CONNECTION
try
{
  $dbUrl = getenv('DATABASE_URL');
  $dbOpts = parse_url($dbUrl);
  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');
  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Scriptures DB</title>

    <style>
      body {
        display: flex;
        flex-direction: column;
        margin: 40px;
      }
      form {
        display: flex;
        flex-direction: column;
      }
      form select {
        font-size: 18px;
        width: 300px;
        margin-bottom: 20px;
      }
      form input {
        width: 300px;
        margin-bottom: 20px;
        font-size: 20px;
        color: #C71585;
      }
      .main-text p a {
        text-decoration: none;
        color: #00FFFF;
        font-size: 22px;
      }
    </style>
</head>

<body>
  <h1>Item Search</h1>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <select name="input">
        <option value="1">Beverage</option>
        <option value="2">Snack</option>
        <option value="3">Breakfast</option>
        <option value="4">Lunch</option>
    </select>
    <input type="submit" />
  </form>

  <?php
    if (isset($_POST["input"]) && $_POST["input"] != "all") {
      $stmt = $db->prepare('SELECT * FROM category AS c JOIN item AS i ON c.category_id = i.category_id WHERE c.category_id = :c.category_id;');
      $stmt->bindValue(':c.category_id', $_POST["input"], PDO::PARAM_STR);
      $stmt->execute();
    }
        
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo '<div class="main-text">';
      echo '<p><a href="./teamweek5.php?content='. $row['item_id'] . '">';
      echo '<strong>' . $row['item_name'] . '</strong>';
      echo '</a></p>';
      echo '</div>';
    }
?>
</body>
</html>