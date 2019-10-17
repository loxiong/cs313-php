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
    //Insert new records
                $sql = "INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)";
                $stmt = $pdo->prepare($sql);

                // Bind parameters to statement
                $stmt->bindParam(':book', $_REQUEST['book'], PDO::PARAM_STR);
                $stmt->bindParam(':chapter', $_REQUEST['chapter'], PDO::PARAM_INT);
                $stmt->bindParam(':verse', $_REQUEST['verse'], PDO::PARAM_INT);
                $stmt->bindParam(':content', $_REQUEST['content'], PDO::PARAM_STR);

                // Execute the prepared statement
                $stmt->execute();
                echo "Records inserted successfully.";
                
                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    // The variable "row" now holds the complete record for that
                    // row, and we can access the different values based on their
                    // name
                    $book = $row['book'];
                    $chapter = $row['chapter'];
                    $verse = $row['verse'];
                    $content = $row['content'];
                    echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
                }
    ?>
</body>
</html>
