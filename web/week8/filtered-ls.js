// learnyounode tutorial exercises (ANSWER)

// Filtered ls


// create the modules as variables
var fs = require('fs')
var path = require('path')

// use the asynchronous process fs.readdir:
// readdir(): reads the contents of a directory (the file names)
fs.readdir(process.argv[2], function(err, list) {
    // read each file name for it's extension
    list.forEach(function (file) {
        // check for the file extension that we specify in the command line
        // extname: returns the part of a string that comes after the final period (fullstop), including the period itself
         if (path.extname(file) === '.' + process.argv[3])
            console.log(file)
  })
})