// Require the "http" package, and use the createServer method of your http server object to handle requests. Set it to listen on a port such as 8888.

// Create a named callback function (e.g., onRequest) and pass that to your createServer method to handle the requests.

// In your onRequest method, look for the requested path, and handle it according to the following:

// If the requested path is "/home" have the response write an html page with an h1 tag that renders, "Welcome to the Home Page".

// If the requested path is "/getData" have the response write a JSON document that returns your name and class, (e.g., {"name":"Br. Burton","class":"cs313"}

// If the requested path is anything else, have the response render an html page with a status code of 404, and on the page, render, "Page Not Found".

// Test your server by visiting it in a browser at: http://localhost:8888/home , etc.

/////////////////////////////////////////////////////////////////////////////////////

// 1) create our http module as variable
const http = require('http')  // To use the HTTP interfaces in Node.js

// 2) create other required modules 
const fs = require('fs')      // For interacting with the file system
const path = require('path')  // For working with file and directory paths
const url = require('url')    // For URL resolution and parsing

// 2) create the HTTP server with http.createServer() function, which will return a new instance of http.Server
const server = http.createServer()

// 3) pass a request handler function into createServer() with the request and response objects
server.on('request', (req, res) => {
    // more stuff needs to be done here

    // The request object is an instance of IncomingMessage, 
    // and allows us to access all sorts of information about the request, like response status, headers and data.
    // Response object is an instance of ServerResponse, 
    // which is a writable stream, and provides numerous methods for sending data back to the client

    if (req.url == '/') { //check the URL of the current request
        
        // set response header
        res.writeHead(200, { 'Content-Type': 'text/html' }); 
        // set response content    
        res.write('<html><body><p>Hello World.</p></body></html>');
        res.end();
    
    }
    else if (req.url == "/home") {
        
        res.writeHead(200, { 'Content-Type': 'text/html' });
        res.write('<html><body><h1>Welcome to the Home Page.</h1></body></html>');
        res.end();
    
    }
    else if (req.url == "/getData") {
        
        res.writeHead(200, { 'Content-Type': 'text/html' });
        res.write(JSON.stringify({"name" : "Br Burton", "class" : "CS 313"}));
        res.end();
    
    }
    else {
        res.writeHead(404, {'Content-type' : 'text/html'});
        //res.write('Page Not Found');
        res.end('Page Not Found');
    }  

});

// 4) server is started by calling the listen method on the server object
     // set the port number you want the server to list on
     // for example, 8080
server.listen(8080);

console.log('Server listening 8080');


// to test in the browser, enter the following URLs:
// http://localhost:8080         -------> should return "Welcome to the Home Page."
// http://localhost:8888/getData -------> should return "Br Burton CS 313."
// http://localhost:8888/hello   -------> should return "Page Not Found"






    



