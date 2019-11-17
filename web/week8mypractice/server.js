// A basic HTTP server

var http = require("http");

http.createServer(function(request, response) {
  response.writeHead(200, {"Content-Type": "text/plain"});
  response.write("Hello World");
  response.end();
}).listen(8888);



// 1) run and test it by executing your script with Node.js:

    // node server.js

// 2) open your browser and point it at http://localhost:8888/
// This should display a web page that says "Hello World".