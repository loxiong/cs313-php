<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Week 03 Team Activity</title>
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="PHP Form">        
    </head>
    
    <body>
        <main>
            <h1>Test PHP Form</h1>
            <form method="post" action="results3-1.php">
                Name: <input type="text" name="name"><br><br>
                Email: <input type="text" name="email"><br><br>
                Major: <br><br>
                <!--loop over an PHP array to generate radio buttons--> 
                <?php 
                    $majors = array('Computer Science','Web Design and Development','Computer Information Technology','Computer Engineering');
                    foreach ($majors as $major){
                        echo "<input type='radio' name='major' value='$major'>$major<br>";
                    }
                ?>
                <br><br>
                Comments: <br><textarea type="text" name="comments" rows="10" cols="30"></textarea><br>
                <p>Which continent(s) have you visited?</p>
                <input type="checkbox" name="continent[]" value="na">North America<br>
                <input type="checkbox" name="continent[]" value="sa">South America<br>
                <input type="checkbox" name="continent[]" value="eu">Europe<br>
                <input type="checkbox" name="continent[]" value="au">Australia<br>
                <input type="checkbox" name="continent[]" value="af">Africa<br>
                <input type="checkbox" name="continent[]" value="as">Asia<br>
                <input type="checkbox" name="continent[]" value="at">Antarctica<br>
                <p>When finished, click button to submit.</p>
                <input type="submit" value="Submit">
            </form>
        </main>
    </body>
    
</html>