<!WEEK 05 - SCRIPTURE TABLE PHP QUERIES - TEAM ACTIVITY-->
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
        <title>Scripture Database Form</title>
    </head>
    
    <body>
        <main>
            <h2>Add Scripture</h2>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
               <label for="book">BOOK</label>
                    <input type="text" name="book" id="book" />
               <label for="chapter">CHAPTER</label>
                    <input type="text" name="chapter" id="chapter" />
               <label for="verse">VERSE</label>
                    <input type="text" name="verse" id="verse" />
               <label for="content">CONTENT</label>
                    <input type="text" name="content" id="content" />
               <input type="submit" value="Submit" />
            </form>
            <?php
            //$db = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=myadmin123");
            $statement = $db->prepare("INSERT INTO scriptures (book, chapter, verse, content) 
                VALUES ('$_POST[book]','$_POST[chapter]','$_POST[verse]','$_POST[content]')");
            $statement->execute();
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
        </main>
    </body>
    
</html>
