<?php 
session_start(); 
$name = htmlspecialchars($_POST['name']);
$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$zipcode= htmlspecialchars($_POST['zipcode']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="Confirm Purchase"> 

        <title>Confirmation Page</title>

        <link href="css/styles.css" rel="stylesheet" />
    </head>

    <body>
        <div class="confirmation">
            <h1>Thank you, <?php echo $name; ?>. </h1>
            <div id="shipping-address">
                <p>You're beautiful fresh fruit basket will be sent to: </p>
                <p><?php echo $address; ?>, <?php echo $city; ?>, <?php echo $state; ?>, <?php echo $zipcode; ?>. </p>
            </div>
        </div>
    </body>
    
<script src="scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="scripts/script.js"></script>
</html>