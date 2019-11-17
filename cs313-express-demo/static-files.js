// ACTIVITY HOW TO REQUEST STATIC FILES FROM THE FILESYSTEM
// for example stylesheets or plain html files that do not require any dynamic server logic

// create a directory of files by creating a folder named public to place all the files
// then you only need to call the public folder once

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
    console.log("Received a request for home page");
    handleRequest(req, res);
});

function handleRequest(req, res){
    console.log("Hello");
    
    res.write("This is the home page.");
    res.end();
}

// this sets up a web server to listen on my web server on port 5000 
// can change this server to something else later, like heroku server
app.listen(4000, function() {
    console.log("The server is running on port 4000.");
});

// to test in the browser, type:
// http://localhost:4000/new.html
// notice -> don't need to include the "public" folder in the url