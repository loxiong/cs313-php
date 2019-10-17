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
    <form action="teamweek5result.php" method="post">
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
</body>
</html>
