var http = require('http');
var path = require('path');
const express = require("express");
var bodyParser = require("body-parser");
var app = express();
var mongoose = require("mongoose");
var port = 3000;

app.use(bodyParser.json());
app.use(express.static("public"));

app.use(bodyParser.urlencoded({ 
  extended: true
}));

mongoose.Promise = global.Promise;
mongoose.connect("mongodb+srv://test:test@cluster0-gahtk.mongodb.net/test?retryWrites=true&w=majority");

app.get('/', (req, res) => {
res.sendFile(__dirname + '/content/form.html');
});

app.listen(port, () => {
console.log('Server listening on port ' + port);
});

var nameSchema = new mongoose.Schema({
	firstName: String,
	lastName: String
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