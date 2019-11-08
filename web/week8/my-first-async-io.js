// learnyounode tutorial exercises (ANSWER)

//  MY FIRST ASYNC I/O

var fs = require('fs')
var file = process.argv[2]

fs.readFile(file, function (err, contents) {
  const lines = contents.toString().split('\n').length - 1
  console.log(lines)
})



