// learnyounode tutorial exercises (ANSWER)

// directory reading code from the Filtered-ls.js file


var fs = require('fs')
var path = require('path')
module.exports = function (dir, filterStr, callback) {

  fs.readdir(dir, function (err, list) {
    if (err)
      return callback(err)

    list = list.filter(function (file) {
      return path.extname(file) === '.' + filterStr
    })

    callback(null, list)
  })
}
 


