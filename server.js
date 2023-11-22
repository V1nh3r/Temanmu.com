const http = require('http');
const fs = require('fs');
const path = require('path');
const { parse } = require('querystring');

const server = http.createServer((req, res) => {
    if (req.method === 'POST') {
        // Handle POST requests for login and registration
        if (req.url === '/register') {
            collectRequestData(req, result => {
                let users = [];
                if (fs.existsSync('users.json')) {
                    users = JSON.parse(fs.readFileSync('users.json', 'utf-8'));
                }
                users.push(result); // Add new user
                fs.writeFileSync('users.json', JSON.stringify(users));
                res.writeHead(302, { Location: '/login.html' }); // Redirect to login page after registration
                res.end();
            });
        } else if (req.url === '/login') {
            collectRequestData(req, result => {
                let users = [];
                if (fs.existsSync('users.json')) {
                    users = JSON.parse(fs.readFileSync('users.json', 'utf-8'));
                }
                const user = users.find(u => u.username === result.username && u.password === result.password);
                if (user) {
                    // Login Success
                    res.writeHead(200, { 'Content-Type': 'text/html' });
                    res.end('Login successful');
                } else {
                    // Login Failed
                    res.writeHead(401, { 'Content-Type': 'text/html' });
                    res.end('Login failed');
                }
            });
        }
    } else {
        // Existing code to serve static files
        let filePath = path.join(__dirname, req.url === '/' ? 'homepage.html' : req.url);

        // Get the file extension
        let extname = String(path.extname(filePath)).toLowerCase();
        let contentType = 'text/html';
        const mimeTypes = {
            // Existing MIME types mapping
            '.html': 'text/html',
            '.js': 'text/javascript',
            '.css': 'text/css',
            '.json': 'application/json',
            '.png': 'image/png',
            '.jpg': 'image/jpg',
            '.gif': 'image/gif',
            '.svg': 'image/svg+xml',
            '.wav': 'audio/wav',
            '.mp4': 'video/mp4',
            '.woff': 'application/font-woff',
            '.ttf': 'application/font-ttf',
            '.eot': 'application/vnd.ms-fontobject',
            '.otf': 'application/font-otf',
            '.wasm': 'application/wasm'
        };

        fs.readFile(filePath, (error, content) => {
            if (error) {
                if (error.code == 'ENOENT') {
                    fs.readFile('./404.html', (error, content) => {
                        res.writeHead(404, { 'Content-Type': 'text/html' });
                        res.end(content, 'utf-8');
                    });
                } else {
                    res.writeHead(500);
                    res.end('Sorry, check with the site admin for error: '+error.code+' ..\n');
                    res.end(); 
                }
            } else {
                // Existing logic to read and serve files
                contentType = mimeTypes[extname] || 'application/octet-stream';
                res.writeHead(200, { 'Content-Type': contentType });
                res.end(content, 'utf-8');
            }
        });
    }
});

server.listen(8080, () => {
    console.log('Server running on localhost:8080');
});

function collectRequestData(request, callback) {
    let body = '';
    request.on('data', chunk => {
        body += chunk.toString();
    });
    request.on('end', () => {
        callback(parse(body));
    });
}
