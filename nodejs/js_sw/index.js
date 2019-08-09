var http = require('http');
var fs = require('fs');
http.createServer(function (req, res) {
	console.log(__dirname);
	console.log(req);
	console.log(res);
	if(req.url == '/sw.js'){

	  fs.readFile(__dirname+'/sw.js', function(err, data) {
	    res.writeHead(200, {'Content-Type': 'text/javascript'});
	    res.write(data);
	    res.end();
	  });
	}else{
		
	  fs.readFile(__dirname+'/index.html', function(err, data) {
	    res.writeHead(200, {'Content-Type': 'text/html'});
	    res.write(data);
	    res.end();
	  });
	}
}).listen(8080);