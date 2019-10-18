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
//Search Function
$search = false;
if(isset($_POST["Search"]))
{
    $book = $_POST["Search"];
    $search = true;
}
if (isset($db) && $search)
{
    $statement = $db->prepare('SELECT * FROM scriptures WHERE book=:book');
    $statement->execute(array(':book' => $book));
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
}
else if (isset($db))
{
    $statement = $db->query('SELECT * FROM scriptures');
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
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
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
               <label for="book">BOOK</label>
               <input type="text" name="book" id="book">
               <label for="chapter">CHAPTER</label>
               <input type="text" name="chapter" id="chapter">
               <label for="verse">VERSE</label>
               <input type="text" name="verse" id="verse">
               <label for="content">CONTENT</label>
               <input type="text" name="content" id="content">
               <input type="submit" value="Submit">
            </form>
        </main>
    </body>
    
</html>
<?php
$db = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=");
$query = "INSERT INTO scriptures VALUES ('$_POST[book]','$_POST[chapter]','$_POST[verse]','$_POST[content]')";
$result = pg_query($query);
?>

