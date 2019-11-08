// learnyounode tutorial exercises (ANSWER)

// HTTP CLIENT


// create our http module as variable
var http = require('http')

// use a new method get() which takes 2 arguments, our url and a callback. 
http.get(process.argv[2], function (response) {
    // assign our event handlers to the response argument
    // .on() method in this case takes 2 arguments, the data/error and the function to perform
    response.on('data', console.log)
    response.on('error', console.error)
    // to make this a complete http get request we can add the correct encoding
    response.setEncoding('utf8')
})
