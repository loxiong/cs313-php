// ACTIVITY USING BASIC EXPRESS RULES

var express = require("express");

var app = express();

// these are callback functions

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
app.listen(5000, function() {
    console.log("The server is running on port 5000.");
});