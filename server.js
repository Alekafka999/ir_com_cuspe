const http = require("node:http");
const fs = require("node:fs");
const path = require("node:path");

const root = __dirname;
const port = Number(process.env.PORT || process.argv[2] || 3000);

const mimeTypes = {
    ".html": "text/html; charset=utf-8",
    ".css": "text/css; charset=utf-8",
    ".js": "text/javascript; charset=utf-8",
    ".jpg": "image/jpeg",
    ".jpeg": "image/jpeg",
    ".png": "image/png",
    ".svg": "image/svg+xml"
};

function resolveRequestPath(urlPath) {
    const cleanPath = decodeURIComponent(urlPath.split("?")[0]);
    const requested = cleanPath === "/" ? "/index.html" : cleanPath;
    const absolutePath = path.resolve(root, `.${requested}`);

    if (!absolutePath.startsWith(root)) {
        return null;
    }

    return absolutePath;
}

const server = http.createServer((request, response) => {
    const filePath = resolveRequestPath(request.url || "/");

    if (!filePath) {
        response.writeHead(403, { "Content-Type": "text/plain; charset=utf-8" });
        response.end("Forbidden");
        return;
    }

    fs.readFile(filePath, (error, content) => {
        if (error) {
            response.writeHead(404, { "Content-Type": "text/plain; charset=utf-8" });
            response.end("Not found");
            return;
        }

        const extension = path.extname(filePath).toLowerCase();
        response.writeHead(200, { "Content-Type": mimeTypes[extension] || "application/octet-stream" });
        response.end(content);
    });
});

server.listen(port, "127.0.0.1", () => {
    console.log(`Site rodando em http://127.0.0.1:${port}`);
});
