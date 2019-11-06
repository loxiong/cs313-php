// learnyounode tutorial exercises

//  MY FIRST ASYNC I/O

// Write a program that uses a single asynchronous filesystem operation to read a file and print the number of newlines it contains to the console (stdout), similar to running cat file | wc -l.

// HINT:  Instead of fs.readFileSync() you will want to use fs.readFile()
// Remember that idiomatic Node.js callbacks normally have the signature:
// function callback (err, data) { /* ... */ }

const fs = require('fs')
const file = process.argv[2]

fs.readFile(file, function (err, contents) {
  if (err) {
    return console.log(err)
  }
  // fs.readFile(file, 'utf8', callback) can also be used
  const lines = contents.toString().split('\n').length - 1
  console.log(lines)
})
