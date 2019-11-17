<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="View Items in Shopping Cart"> 

        <title>View Cart</title>

        <link href="css/styles.css" rel="stylesheet" />
    </head>
    
    <body>
        <h1>Your Shopping Cart</h1>
        <hr>
        
        <div class="shopping-cart">
            <div class="txt-heading">
                <a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');">
                <img src="images/icon-empty.png" /> Empty Cart</a>
            </div>

            <div id="cart-item">
                <?php
                if(isset($_SESSION["cart_item"])){
                    $item_total = 0;
                ?>
                <table class="product-table">
                    <tbody>
                        <tr>
                            <th class="cart-heading">Name</th>
                            <th class="cart-heading">Code</th>
                            <th class="cart-heading">Quantity</th>
                            <th class="cart-heading">Price</th>
				            <th></th>
                        </tr>
                        <?php
                    foreach ($_SESSION["cart_item"] as $item){
                        ?>
                        <tr>
                            <td align="left"><?php echo $item["name"]; ?></td>
                            <td align="left"><?php echo $item["code"]; ?></td>
                            <td align="left"><?php echo $item["quantity"]; ?></td>
                            <td align="left"><?php echo "$".$item["price"]; ?></td>
                            <td align="right"><a onClick="cartAction('remove','<?php echo $item["code"]; ?>')" class="btnRemoveAction cart-action"><img src="images/icon-delete.png" /></a></td>
				        </tr>
                        <?php
                        $item_total += ($item["price"]*$item["quantity"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align=right class="total">Total:</td>
                            <td align=left class="total"><?php echo "$". number_format($item_total,2); ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <?php
                }
                ?>
            </div>
        </div>
        
        <div class="primary-button">
            <button type="button"> <a href="checkout.php">Checkout</a></button>
        </div>
        <br>

        <div class="secondary-button">
            <button type="button"> <a href="index.php">Return to Products</a></button>
        </div>
    </body>
    
<script src="scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="scripts/script.js"></script>
</html>