var express = require('express'); 
var app = express();

var publicDir = require('path').join(__dirname,'/public');
app.use(express.static(publicDir));

app.get("/",function(req,res)
{
    //res.sendFile(path.join(__dirname, 'index.htm'));
    res.sendFile( __dirname + "/public/templates/" + "index.html" );
});

// app.get('/', function (req, res) {
//     res.send('Hello World')
//   })


app.listen(process.env.PORT || 8000, function(){
  console.log("app is listening at port %d in %s mode", this.address().port, app.settings.env);
});