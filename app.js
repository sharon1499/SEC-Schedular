var express = require('express');
var app = express();
var port = 3000;

var bodyParser = require("body-parser");
app.use(bodyParser.json());

app.use(bodyParser.urlencoded({ 
  extended: true
}));

const User = require('./models/user.model');
var mongoose = require("mongoose");
mongoose.connect("mongodb+srv://test:test@cluster0-gahtk.mongodb.net/test?retryWrites=true&w=majority");
mongoose.Promise = global.Promise;
let db = mongoose.connection;
db.on('error', console.error.bind(console, "MongoDB connection error:"));

app.get('/', (req, res) => {
res.sendFile(__dirname + '/content/form.html');
});

app.listen(port, () => {
console.log('Server listening on port ' + port);
});


app.post("/addname", (req, res) => {
    console.log(req.body.firstName)	
    console.log(req.body.lastName)
    console.log(req.body.Room)

    let newUser = new User({
        first: req.body.firstName,
        last: req.body.lastName,
        room: req.body.Room,
        done: false
    });

    newUser.save(function(err, user){
        if (err){
            res.json({"Error: ":err})
        }else{
            res.json({"Status: ": "Successful", "ObjectId": user.id})
        }
    })
});