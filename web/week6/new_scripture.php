<!--how to add a new scripture and
-- must select a topic from the TOPIC TABLE
-- the form must POST
-->
<?
require('dbConnect.php'); //import the function
$db = get_db(); //calls the function
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>CS 313 Week 06 Team</title>
        <meta name="description" content="Week 06 Team Activity">
    </head>
    <body>
   
        <main>
        <h1>Enter New Scripture </h1>
        
            <form id="mainForm" action="insert_scripture.php" method="POST">
                <label for="book">Book</label>
                <input type="text" id="book" name="book">
                <br /><br />
            
                <label for="chapter">Chapter</label>
                <input type="text" id="chapter" name="chapter">
                <br /><br />

	            <label for="verse">Verse</label>
                <input type="text" id="verse" name="verse">
	            <br /><br />

	            <label for="content">Content:</label><br />
	            <textarea id="content" name="content" rows="10" cols="100"></textarea>
	            <br /><br />

                <label><h2>Topics:</h2></label><br />

                <?php
                // need to generate check boxes for topics
                // based on what is in the database
                try
                {
                    // Do not use "SELECT *" here. Only bring back the fields that you need.
                    // Prepare the statement
                    $stmt = $db->prepare('SELECT id, name FROM topic');
                    $stmt->execute();
                    // Go through each result
                    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $id = $rows['id'];
                        $name = $rows['name'];
                        // make the value of the checkbox to be the id of the label
                        echo "<input type='checkbox' name='checkbox[]' id='checkbox$id' value='$id'>";
                        // Instructor's Notes:
                        // Also, so they can click on the label, and have it select the checkbox,
                        // we need to use a label tag, and have it point to the id of the input element.
                        // The trick here is that we need a unique id for each one. In this case,
                        // we use "checkbox" followed by the id, so that it becomes something like
                        // "checkbox1" and "checkbox2", etc.
                        echo "<label for='checkbox$id'>$name</label><br />";
                        // put a newline out there just to make our "view source" experience better
                        echo "\n";
                    }
                }
                catch (PDOException $ex)
                {
                    // Please be aware that you don't want to output the Exception message in
                    // a production environment
                    echo "Error connecting to DB. Details: $ex";
                    die();
                }
                ?>
                    <br />
                    <input type="submit" value="Ready To Add Scripture" />
            </form>
        </main>

    </body>
</html>