var express = require("express");

var app = express();

app.use(express.static("public"));

// tell the server that you using a view engine and get those in the views directory
app.set("views", "views");
// tells the server that your view engine is ejs
app.set("view engine", "ejs");

app.get("/", function(req, res) {
	console.log("Received a request for /");

	res.write("This is the root.");
	res.end();
});

app.get("/home", function(req, res) {
	// CONTROLLER
	console.log("Received a request for the home page");
	var name = getCurrentLoggedInUserAccount();
	var emailAddress = "john@email.com";

	var params = {name: name, email: emailAddress};

    // this is going to go look in the views directory and look for home
	res.render("home", params);
});

app.listen(5000, function() {
	console.log("The server is up and listening on port 5000");
});


// MODEL
function getCurrentLoggedInUserAccount() {
	// access the database
	// make sure they have permission to be on the site

	return "John";
}


// VIEW
// move to the home.ejs
// can delete it here now
/* 
function renderHomePage(name) {
    res.write("<html><head><title>HOME</title></head>");
    res.write("<body>");
    res.write("<h1>Looking at home page.</h1>");
    res.write("<h2>Welcome " + name + "</h2>");
    res.write("</body>");
    res.write("</html>");
    res.end();    
}
*/