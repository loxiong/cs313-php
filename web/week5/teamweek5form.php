
<?php
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

    <title>Lets go Shopping</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>
<body class="container">
<form action="insert.php" method="post">

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
