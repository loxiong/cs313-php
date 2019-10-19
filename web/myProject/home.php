<?php
    session_start();
    require("redirects.php");
    require("dbconnect.php");
    $user = $_SESSION["user"];
    $name = $_SESSION["name"];
    if (!isset($user)) {
        loginRedirect();
    }
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Database | Home</title>
    </head>
    <body>
        <div class="u-container">

            <div class="u-content u-media-off">
                <div class="u-button-container-auto u-centered">
                    <a href="<?php echo($ROOT); ?>/index.php">
                        <div class="u-button">Home</div>  
                    </a>
                    <a href="<?php echo($ROOT); ?>/assign.php">
                        <div class="u-button">&gt; Assignments</div>  
                    </a>
                    <a href="#">
                        <div class="u-button">&gt; Database (Read-only)</div>
                    </a>
                </div>
            </div>

            <div class="u-content u-media-off">
                <table class="u-fill">
                <tr>
                    <td><span class="u-heading-2">Home</span><td>
                    <td class="u-right-text">
                        <a href="./logout.php"><div class="u-button">Logout</div></a>
                    </td>
                </tr>
                </table>
                <hr />
                Welcome, <?php echo($name); ?>!<br />
                Please select the event to view:<br />
                <table>
                <?php
                    $query = "SELECT * FROM event";
                    foreach ($db->query($query) as $row):
                        $id = $row["event_id"];
                        $name = $row["event_name"];
                        $date = $row["event_date"];
                ?>
                    <tr>
                    <form method="POST">
                        <td style="display: none;">
                            <input type="text" name="assign-id" value="<?php echo($id); ?>" readonly />
                        </td>
                        <td><button type="submit" class="u-button" formaction="eventDetails.php">View</button></td>
                        <td><?php echo($name); ?></td>
                    </form>
                    </tr>
                <?php endforeach; ?>
                </table>
            </div>
        </div>
    </body>
</html>