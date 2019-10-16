<!WEEK 05 - SCRIPTURE DETAILS FROM FORM SUBMISSION - TEAM ACTIVITY-->
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="Week 5 Team Activity">        
        <title>Scripture Database Practice with PHP Queries</title>
    </head>
    
    <body>
        <main>
            <h1>Scripture Detail</h1>
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
                  echo '<p><a href="./teamweek5.php?content=' . $row['scripture_id'] . '">';
                  echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
                  echo $row['verse'] . '</strong>';
                  echo '</a></p>';
                  echo '</div>';
                }
            ?>
        </main>
    </body>
    
</html>