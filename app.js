var http = require('http');
var path = require('path');
var express = require("express");
var bodyParser = require("body-parser");
var mongoose = require("mongoose");
var app = express();
var port = process.env.PORT || 3000;

app.set('views', path.join(__dirname, 'views'));
app.set("view engine", 'ejs');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ encoded: false}));
app.use(express.static("public"));

mongoose.Promise = global.Promise;
mongoose.connect("mongodb+srv://test:test@cluster0-gahtk.mongodb.net/test?retryWrites=true&w=majority");
let db = mongoose.connection;
db.on('error', console.error.bind(console, "MongoDB connection error:"))

app.get('/', (req, res) => {
res.render("index.ejs", {});
});

app.listen(port, () => {
console.log('Server listening on port ' + port);
});

var nameSchema = new mongoose.Schema({
	firstName: String,
    lastName: String,
    Room: Number
});

var User = mongoose.model("User", nameSchema);

app.post("/addname", (req, res) => {
	var myData = new User(req.body);
	myData.save()
	  .then(item => {
		  res.send("Item saved to database");
	  })
	  .catch(err => {
		  res.status(400).send("Unable to save to database");
	  });
});