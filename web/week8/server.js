//https://blog.bitsrc.io/a-beginners-guide-to-server-side-web-development-with-node-js-17385da09f93

const http = require('http') // To use the HTTP interfaces in Node.js
const fs = require('fs') // For interacting with the file system
const path = require('path') // For working with file and directory paths
const url = require('url') // For URL resolution and parsing

// To look up MIME types
const mimeTypes = {
  '.html': 'text/html',
  '.js': 'text/javascript',
  '.css': 'text/css',
  '.ico': 'image/x-icon',
  '.png': 'image/png',
  '.jpg': 'image/jpeg',
  '.gif': 'image/gif',
  '.svg': 'image/svg+xml',
  '.json': 'application/json',
  '.woff': 'font/woff',
  '.woff2': 'font/woff2'
}

// Create the HTTP server with http.createServer([options][, requestListener])
const server = http.createServer()

// Write the request handler function that is called every time a HTTP request is made against the server
server.on('request', (req, res) => {
  // Create a new URL object with URL constructor
  // Documentation: https://nodejs.org/docs/latest-v10.x/api/url.html#url_constructor_new_url_input_base
  const parsedUrl = new URL(req.url, 'https://node-http.glitch.me/')
  
  // Get path portion of the URL
  // Documentation: https://nodejs.org/docs/latest-v10.x/api/url.html#url_url_pathname
  let pathName = parsedUrl.pathname
  
  // Returns the extension of the path
  // Documentation: https://nodejs.org/api/path.html
  let ext = path.extname(pathName)
  
  // To handle URLs with trailing '/' by removing aforementioned '/'
  // then redirecting the user to that URL using the 'Location' header
  if (pathName !== '/' && pathName[pathName.length - 1] === '/') {
    res.writeHead(302, {'Location': pathName.slice(0, -1)})
    res.end()
    return
  }
  
})

server.listen(8888)

console.log('Server listening on 8888');