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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scripture</title>
    </head>
<body>
    <H2>Add More To Scripture Resource</H2>
    <form action="teamweek5.php" method="post">
        <p>
            <label for="book">Book:</label>
            <input type="text" name="book" id="book">
        </p>
        <p>
            <label for="chapter">Chapter:</label>
            <input type="text" name="chapter" id="chapter">
        </p>
        <p>
            <label for="verse">Verse:</label>
            <input type="text" name="verse" id="verse">
        </p>
        <p>
            <label for="content">Content:</label>
            <input type="text" name="content" id="content">
        </p>
        <input type="submit" value="Submit">
    </form>
    <br>
    
    <h2>Select From Available Scripture Resource</h2>
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
          echo '<div>';
          echo '<p><a href="./details.php?content=' . $row['scripture_id'] . '">';
          echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
          echo $row['verse'] . '</strong>';
          echo '</a></p>';
          echo '</div>';
        }
    ?>
</body>
</html>
