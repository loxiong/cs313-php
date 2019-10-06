<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="Check Out Shopping Cart"> 
        
        <title>Check Out</title>
        
        <link href="css/styles.css" rel="stylesheet">
    </head>
    
    <body>
        <main>
            <h1>Ready To Check Out</h1>
            <form method="post" action="confirmation.php">
                <div class="checkout">
                    <label>Name: <input type="text" name="name"></label>
                    <label>Street Address: <input type="text" name="address"></label>
                    <label>City: <input type="text" name="city"></label>
                    <label>State: <input type="text" name="state"></label>
                    <label>Zipcode: <input type="text" name="zipcode"></label>
                    <label>Phone Number: <input type="text" name="phonenumber"></label>
                    <label>Email: <input type="text" name="email"></label>
                </div>
                <div class="checkout-buttons">
                    <div class="primary-button">
                        <a href="confirmation.php"><input class="primary-button" type="submit" value="Complete Purchase"></a>
                    </div>
                    <div class="secondary-button">
                        <button type="button"> <a href="viewcart.php">Return to Cart</a></button>
                    </div>
                </div>
            </form>
        </main>
    </body>


<script src="scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
 
</html>



