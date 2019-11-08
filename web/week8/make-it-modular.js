// learnyounode tutorial exercises (ANSWER)

// Make It Modular

const fs = require('fs')
const mymodule = require('./mymodule.js')


//var filterFn = require('./solution_filter.js')
const dir = process.argv[2]
const filterStr = process.argv[3]

mymodule(dir, filterStr, function (err, list) {
  if (err)
    return console.error('There was an error:', err)

  list.forEach(function (file) {
    console.log(file)
  })
})