// learnyounode tutorial exercises

// Hello World 

// Write a program that accepts one or more numbers as command-line arguments and prints the sum of those numbers to the console

'use strict'

let result = 0

for (let i = 2; i < process.argv.length; i++) {
  result += Number(process.argv[i])
}

console.log(result)