<!--LEARNING PHP QUERIES
--SENDS SEARCH HERE TO RESULT.PHP
--THIS PAGE DOESN'T WORK-->
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
<html lang="en-US">
    <head>
        <title>Week 05 Team Activity</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        
        <h1>Scripture Search</h1>
        <ul>
        <?php foreach ($db->query("SELECT * FROM public.scriptures") as $row): ?>
            <li>
                <strong>
                    <?php echo($row["book"]); ?>
                    <?php echo($row["chapter"]); ?>:<?php echo($row["verse"]); ?>
                </strong>
                &ndash;
                &ldquo;<?php echo($row["content"]); ?>&rdquo;
            </li>
        <?php endforeach; ?>
        </ul>
        <hr />
        <!--
            ################################################################################################################
            # LOOK AT THIS
            ################################################################################################################
        --> 
        <form method="POST">
            Book name: <input type="text" name="book" />
            <br />
            <input type="submit" value="Query" formaction="search2.php" />
        </form>
        
    </body>
</html>