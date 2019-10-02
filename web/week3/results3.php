<?php
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$major = htmlspecialchars($_POST['major']);
$comments = htmlspecialchars($_POST['comments']);
$continent = $_POST['continent'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Week 03 Team Activity - Form Result</title>
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="Form Result">
    </head>
    
    <body>
        <main>
            <h1>Thank you, <?php echo $name; ?>. </h1>
            <h3>This is the information that you provided:</h3>
            <p>We will send messages to you at <a href = "mailto:<?php echo $email; ?>"><?php echo $email; ?></a>.</p>
            <p>Your major is: <?php echo $major; ?>.</p>
            <p>Your comments have been recorded as: "<?php echo $comments; ?> ."</p>
            <p>These are the continents you have visited: <?php echo $continent; ?>.</p><!--unable to display multiple selected checkbox-->
        </main>
    </body>
    
</html>