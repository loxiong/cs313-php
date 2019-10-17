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
    <meta name="description" content="PHP Queries">
    <meta name="author" content="Ching Lo">

    <title>Scripture</title>
    </head>
<body>
    <?php
    //Insert new records
                $stmt = $db->prepare('INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)';

                // Bind parameters to statement
                $stmt->bindValue(':book', $_REQUEST['book'], PDO::PARAM_STR);
                $stmt->bindValue(':chapter', $_REQUEST['chapter'], PDO::PARAM_INT);
                $stmt->bindValue(':verse', $_REQUEST['verse'], PDO::PARAM_INT);
                $stmt->bindValue(':content', $_REQUEST['content'], PDO::PARAM_STR);

                // Execute the prepared statement
                $stmt->execute();
                echo "Records inserted successfully.";
    ?>
</body>
</html>
