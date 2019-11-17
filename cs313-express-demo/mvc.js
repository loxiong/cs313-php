// Model - View - Controller
// Example of how the code is broken down 

var express = require("express");

var app = express();

// these are callback functions

// use express to get the files from the public directory
// remember - static files are files that do not need to be changed dynamically
app.use(express.static("public"));

// this is an example of using an anonymous function
app.get("/", function(req, res){
    console.log("Received a request for /");
    
    res.write("This is the root.");
    res.end();
});

//this is an example of using a named function
app.get("/home", function(req, res) {
    // CONTROLLER code example
    console.log("Received a request for home page");
    handleRequest(req, res);
});

function handleRequest(req, res){
    // replace with function
    // var name = "John";
    var name = getUser();
    
    console.log("This is the home page.");
    
    //can move this code into the function renderHomgPage
        res.write("<html><head><title>HOME</title></head>");
        res.write("<body>");
        res.write("<h1>Looking at home page.</h1>");
        res.write("<h2>Welcome " + name + "</h2>");
        res.write("</body>");
        res.write("</html>");
        res.end();
    // abd then going to return the function and pass it the name
    // renderHomePage(name);
}

// this sets up a web server to listen on my web server on port 4000 
app.listen(4000, function() {
    console.log("The server is running on port 4000.");
});


// example of creating many functions
function getUser() {
    // MODEL code example
    // access the database
    // make sure they have permission to be on the site
    
    return "John";
}

// example of using the code above to create the VIEW
function renderHomePage(name) {
    // VIEW
    res.write("<html><head><title>HOME</title></head>");
    res.write("<body>");
    res.write("<h1>Looking at home page.</h1>");
    res.write("<h2>Welcome " + name + "</h2>");
    res.write("</body>");
    res.write("</html>");
    res.end();    
}

// this has been an example of how the model-view-controller design looks like
// MODEL -> encompass any data and the rules around doing it
    // like in the function getUser()
    // MODEL job is to handle the business action that needs to occur, or to interact with the database or anything of that nature
// CONTROLLER -> handle the request from the user to get things from the request object (like a form), so need to get up those query parameters, and then need to do some sort of manipulation on those to send te=hem off to the model
    // CONTROLLER job is to get the information, send it off to the model, and then later, pass it along to the VIEW to be rendered
// purpose is to make cohesive, grouping codes
// more complicated code will be separated into their own files and not all be in one file