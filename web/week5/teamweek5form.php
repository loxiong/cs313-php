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
$db = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=");
$query = "INSERT INTO book VALUES ('$_POST[book]','$_POST[chapter]',
'$_POST[verse]','$_POST[content]')";
$result = pg_query($query); 
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
<form action="teamweek5.php" method="post">

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
</body>
</html>
