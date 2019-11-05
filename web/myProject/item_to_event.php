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
   
        <main>
        <h1>Instructions:  </h1>
            <p>
                1) Select an event from the toggle menu
                2) Choose (by checking the box) to add items to the event
                3) Click on the button when you are done
            </p>

                <label><h2>Events:</h2></label><br />

                <?php
                // need to generate a toggle menu to list the events
                // based on what is in the database
                try
                {
                    // Do not use "SELECT *" here. Only bring back the fields that you need.
                    // Prepare the statement
                    $stmt = $db->prepare('SELECT event_id, event_date, event_name FROM event');
                    $stmt->execute(array(":event_id" => $event));
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if (count($rows) === 0):
                    <?php
                $stmt = $db->prepare("SELECT * FROM event WHERE event_id=:event_id");
                $stmt->execute(array(":event_id" => $event));
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) === 0):
            
                foreach ($rows as $row):
                    $name = $row["event_name"]; 
                    $date = $row["event_date"];
                    $eventdur = $row["event_duration"];
                    $people = $row["event_participants"];
                    
                    echo "hello ($name)";
                ?>
                <h1><?php echo ($name); ?></h1>
                <h2><?php echo ($date); ?></h2>
                <p>Event Duration: <?php echo ($eventdur); ?> days</p>
                <p>Estimated Number of Participants: <?php echo ($people); ?> swimmers</p>
                <h2>Concession Menu</h2>
                <p>TO DO: Concession Menu will populate here with the option to add/delete items.</p>
                <p><a href="itemList.php">See All Concesssion Items</a></p>
            
                    // Go through each result
                    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $idEvent = $rows['event_id'];
                        $dateEvent = $rows['event_date'];
                        $nameEvent = $rows['event_name'];
                        // make the value of the checkbox to be the id of the label
                        echo " 
                        <div>
                            <nav class="navigation">
                            <label for="toggle">Show Menu</label>
                            <input id="toggle" type="checkbox">
                            <ul id="menu">
                                <li><a href="index.html">Home</a></li> <!--correct-->
                                <li><a href="talks.html">Talks</a></li> <!--correct-->
                                <li><a href="contact.html">Contact</a></li> <!--correct-->
                            </ul>
                            </nav>
                            <input type='checkbox' name='checkboxCat[]' id='checkboxCat$idCat' value='$idCat'>";
                        // Instructor's Notes:
                        // Also, so they can click on the label, and have it select the checkbox,
                        // we need to use a label tag, and have it point to the id of the input element.
                        // The trick here is that we need a unique id for each one. In this case,
                        // we use "checkbox" followed by the id, so that it becomes something like
                        // "checkbox1" and "checkbox2", etc.
                        echo "<label for='checkboxCat$idCat'>$nameCat</label><br />";
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
                
                <label><h2>Store:</h2></label><br />

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
                        $idSt = $rows['store_id'];
                        $nameSt = $rows['store_name'];
                        // make the value of the checkbox to be the id of the label
                        echo "<input type='checkbox' name='checkboxSt[]' id='checkboxSt$idSt' value='$idSt'>";
                        // Instructor's Notes:
                        // Also, so they can click on the label, and have it select the checkbox,
                        // we need to use a label tag, and have it point to the id of the input element.
                        // The trick here is that we need a unique id for each one. In this case,
                        // we use "checkbox" followed by the id, so that it becomes something like
                        // "checkbox1" and "checkbox2", etc.
                        echo "<label for='checkboxSt$idSt'>$nameSt</label><br />";
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
                    <input type="submit" value="Add New Item" />
            </form>
        </main>

    </body>
</html>