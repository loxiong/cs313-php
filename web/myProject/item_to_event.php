<!--how to add items to an event
-- must select an event from the EVENT TABLE
-- must select the items from ITEM TABLE
-- the form must POST
-->
<?
session_start();
require("redirects.php");
$user = $_SESSION["user"];
$name = $_SESSION["first_name"];
if (!isset($user)) {
    loginRedirect();
}
require("dbconnect.php");
//$db = get_db();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Create Concession Menu for Event</title>
        <meta name="description" content="Week 06 Project Continue - add item to event">
    </head>
    
    <body>
        <span>Create Menu</span>
                <a href="./home.php"><div>Back</div></a>
                <a href="./logout.php"><div>Logout</div></a>
        <hr />
        
        <main>
            <div>
            <h1>Create a Concession Menu  </h1>
                <p>
                    1) Select an event from the toggle menu
                    2) Choose (by checking the box) to add items to the event
                    3) Click on the button when you are done
                </p>
            </div>
            
            <div>
            <label><h2>Events:</h2></label><br />
                <?php
                // need to generate check boxes for topics
                // based on what is in the database
                try
                {
                    // Do not use "SELECT *" here. Only bring back the fields that you need.
                    // Prepare the statement
                    $stmt = $db->prepare('SELECT event_id, event_name FROM event');
                    $stmt->execute();
                    // Go through each result
                    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $idEvent = $rows['event_id'];
                        $nameEvent = $rows['event_name'];
                        // make the value of the checkbox to be the id of the label
                        echo "<input type='checkbox' name='checkboxCat[]' id='checkboxCat$idEvent' value='$idEvent'>";
                        // Create unique id by using "checkbox" followed by the id, so that it becomes something like
                        // "checkbox1" and "checkbox2", etc.
                        echo "<label for='checkboxCat$idEvent'>$nameEvent</label><br />";
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
            </div>
            
            <div>
            <label><h2>Choose Items:</h2></label><br />
                <?php
                // need to generate check boxes for topics
                // based on what is in the database
                try
                {
                    // Do not use "SELECT *" here. Only bring back the fields that you need.
                    // Prepare the statement
                    $stmt = $db->prepare('SELECT item_id, item_name FROM item');
                    $stmt->execute();
                    // Go through each result
                    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $idItem = $rows['item_id'];
                        $nameItem = $rows['item_name'];
                        // make the value of the checkbox to be the id of the label
                        echo "<input type='checkbox' name='checkboxSt[]' id='checkboxSt$idItem' value='$idItem'>";
                        // Create unique id by using "checkbox" followed by the id, so that it becomes something like
                        // "checkbox1" and "checkbox2", etc.
                        echo "<label for='checkboxSt$idItem'>$nameItem</label><br />";
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
            </div>
            
            <button type="submit" formaction="item_processing.php">Create Menu</button>

        </main>

    </body>
</html>