<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ching Lo's Homepage for CS313</title>
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="homepage">

        <!--link to external CSS Style-->
        <link href="css/styles.css" rel="stylesheet"> 
        <!--link to external JavaScript-->
        <script src="scripts/currentdate.js"></script>
        <script src="scripts/image.js"></script>
        <!--jQuery library-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    
    <body>
        <header><h1>My Introduction to CS313</h1></header>
        
        <main>            
            <div class="container">
                <div class="divs" id="div1"> 
                    <div class="contents">
                        <h2>About Me</h2>
                        <p>My name is C. Lo. I am an online student at BYU-Idaho.</p>
                        <p><b>Why?</b> I am studying website design and development, because I think that the web is central to communications.</p>
                        <p><b>Hobbies:</b> Outside of school, I enjoy biking, running, hiking, going on family "field trips" with my children, traveling, attending concerts and eating.</p>
                        <p><b>Some Favorites:</b> So far, my favorite travel destination is Quebec City (at Christmas), and my favorite ice cream is a Concrete Mixer from Culver's.</p>
                    </div>
                </div>

                <div class="divs" id="div2">
                    <div class="contents">
                        <h2>Just For Fun</h2>
                        <p>I am always captivated by the metamorphosis of butterflies. So beautiful!
                        <div id="butterfly">
                            <img id="chrysalis" src="images/chrysalis.jpg" alt="A monarch butterfly chrysalis"> 
                            <img id="monarch" src="images/monarch.jpg" alt="Monarch butterfly on a flower">
                        </div>
                    </div>
                </div>
                           
                <div class="divs" id="div3">
                    <div class="contents">
                        <!-- <p><a href="assignment.html">Click here to see my assignments or Click the button below</a></p> -->
                        <button id="button" onclick="myButton();"><h3><a href="assignment.html">GO TO ASSIGNMENTS</a></h3></button>
                    </div>
                </div>

                <div class="divs" id="div4">
                    <div class="contents">
                        <h2>About BYU CS313 - Web Engineering II</h2>
                        <p>Web Engineering II is a course that allows students to create more advanced web applications and services. The emphasis of this course will be on server-side technologies and n-tier applications using relational database technology. Different server-side technologies will be used for creating dynamic n-tier web applications. Client side technologies will be enhanced and combined with server-side technologies to create rich; web applications.</p>
                    </div>
                </div>
            </div>
        </main>
        
        <footer class="footer">
                <?php include $_SERVER['DOCUMENT_ROOT'].'/common/footer.php';?>
        </footer>
    </body>
    
<script>
        
    
        $(document).ready(function(){
          $("#button2").click(function(){
            $("#butterfly").fadeToggle(1000);
            });
        });
     
    
</script>
    

</html>