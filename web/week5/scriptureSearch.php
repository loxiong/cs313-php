<!WEEK 05 - STRETCH CHALLENGE TEAM ACTIVITY-->
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
        color: #CD5C5C;
        font-size: 22px;
      }
    </style>
</head>

<body>
  <h1>Scripture Search</h1>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <select name="scripture-input">
      <option value="John">John</option>
      <option value="Mosiah">Mosiah</option>
      <option value="D&C">Doctrine and Covenants</option>
      <option value="all">See the List</option>
    </select>
    <input type="submit" />
  </form>

  <?php
    if (isset($_POST["scripture-input"]) && $_POST["scripture-input"] != "all") {
      $stmt = $db->prepare('SELECT id, book, chapter, verse, content FROM scriptures WHERE book=:book');
      $stmt->bindValue(':book', $_POST["scripture-input"], PDO::PARAM_STR);
      $stmt->execute();
    }
    else {
      $stmt = $db->query('SELECT id, book, chapter, verse, content FROM scriptures');
    }
    $count = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo '<div class="main-text">';
      echo '<p><a href=" ' . $row['id'] . '">';
      echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
      echo $row['verse'] . '</strong>';
      echo '</a></p>';
      echo '</div>';
    }
?>
</body>
</html>