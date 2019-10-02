<?php
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$major = htmlspecialchars($_POST['major']);
$comments = htmlspecialchars($_POST['comments']);
$continent = $_POST['continent'];
function printlist($continent){
$contMap = array('na'=>'North American',
                 'sa'=>'South American', 
                 'eu'=>'Europe', 
                 'as'=>'Asia', 
                 'af'=>'Africa', 
                 'at'=>'Antarctica', 
                 'au'=>'Australia');
    if(empty($continent)) {
        echo("You didn't select any continents.");
    }
    else {
        $N = count($continent);
        echo("You selected $N continents:" . "<br>");
        for($i=0; $i < $N; $i++){
            echo($contMap[$continent[$i]] . '<br>');
        }
    }
}
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
            <h1>Thank you, <?php echo $name; ?> . </h1>
            <p>Below is the information that you provided:</p>
            <p>We will send messages to you at <a href = "mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
            <p>Your major is: <?php echo $major; ?>.</p>
            <p>Your comments have been recorded as: "<?php echo $comments; ?>"</p>
            <p><?php printlist($continent); ?></p>
        </main>
    </body>
    
</html>