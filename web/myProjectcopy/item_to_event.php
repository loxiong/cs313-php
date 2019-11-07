<?
/* FILE: how to add items to an event
-- must select an event from the EVENT TABLE
-- must select the items from ITEM TABLE
-- the form must POST
*/
session_start();
if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
else
{
	header("Location: signin.php");
	die(); // we always include a die after redirects.
}
require("dbconnect.php");  
$event = htmlspecialchars(trim($_POST["event_id"]));
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Create Concession Menu for Event</title>
        <meta name="description" content="Week 06 Project Continue - add item to event">
        <!--reset.css will remove all the browser's default styles-->
        <link href="css/reset.css" rel="stylesheet" type="text/css"> 
        <link href="css/styles.css" rel="stylesheet">  
    </head>
    
    <body>
        
        <table>
            <tr>
                <span>Plan a Menu</span>
                <a href="./home.php"><div>Back</div></a>
                <a href="./signout.php"><div>Logout</div></a>
            </tr>
        </table>
        <hr />
        
        <main>
            <form id="mainForm" action="item_menu_insert.php" method="POST">
            <div>
            <h1>Create a Concession Menu  </h1>
                <p>
                    1) Select an event from the toggle menu
                    2) Choose (by checking the box) to add items to the event
                    3) Click on the button when you are done
                </p>
            </div>
            
            <div>
                <?php
                $stmt = $db->prepare("SELECT * FROM event WHERE event_id=:event_id");
                $stmt->execute(array(":event_id" => $event));
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) === 0):
                ?>
            
                <?php else: ?>
                <?php
                    foreach ($rows as $row):
                        $id = $row["event_id"];
                        $name = $row["event_name"]; 
                        $date = $row["event_date"];
                        $eventdur = $row["event_duration"];
                        $people = $row["event_participants"];
                ?>
                <h1>Event Name: <?php echo ($name); ?></h1>
                <h2>Event Date: <?php echo ($date); ?></h2>
            
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
                        echo "<input type='checkbox' name='checkboxI[]' id='checkboxI$idItem' value='$idItem'>";
                        // Create unique id by using "checkbox" followed by the id, so that it becomes something like
                        // "checkbox1" and "checkbox2", etc.
                        echo "<label for='checkboxI$idItem'>$nameItem</label><br />";
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
           
            <input type="submit" class="button" value="Create Menu" />
            </form>

        </main>

    </body>
</html>