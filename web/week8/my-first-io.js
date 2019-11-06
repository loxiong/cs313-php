// learnyounode tutorial exercises

// My First I/O

// Write a program that uses a single synchronous filesystem operation to read a file and print the number of newlines (\n) it contains to the console (stdout), similar to running cat file | wc -l.

// HINT:  If you're looking for an easy way to count the number of newlines in a string, recall that a JavaScript String can be .split() into an array of substrings and that '\n' can be used as a delimiter.

const fs = require('fs')

const contents = fs.readFileSync(process.argv[2])
const lines = contents.toString().split('\n').length - 1
console.log(lines)

// another solution:

// const fs = require('fs');
// var file = fs.readFileSync(process.argv[2]);
// var str = file.toString();
// console.log(str.split(/\r\n|\r|\n/).length-1);

const fs = require('fs');

file = fs.readFileSync(process.argv[2]);

var str = file.toString();

console.log(str.split(/\r\n|\r|\n/).length-1);

