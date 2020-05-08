var express = require('express');
var app = express();
var path = require('path');
var port = process.env.PORT || 3000;
var bodyParser = require("body-parser");
const User = require('./models/user.model');
var mongoose = require("mongoose");

app.use(express.static(__dirname + '/public'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ 
  extended: true
}));
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');
mongoose.connect("mongodb+srv://test:test@cluster0-gahtk.mongodb.net/test?retryWrites=true&w=majority");
mongoose.Promise = global.Promise;
let db = mongoose.connection;
db.on('error', console.error.bind(console, "MongoDB connection error:"));

app.get('/', (req, res) => {
    res.render('home');
});
app.get('/contact',(req,res) => {
    res.render('contact');
})
app.get('/information',(req,res) => {
    res.render('information');
})

app.get('/faq',(req,res) => {
    res.render('faq');
})

app.get('/datepicker',(req,res) => {
    res.render('datepicker');
})
app.post("/addname", (req, res) => {
    var newUser = new User({
        first: req.body.firstName,
        last: req.body.lastName,
        room: req.body.Room,
        date: req.body.datepicker
    });
    User.findOne({ 
    'room': req.body.Room,
    'date': req.body.datepicker}, function(err, user) {
      if (user) {
        res.json({"Room already taken" : err})
      } else {
        newUser.save(function(err, user){
        if (err){
            res.json({"Error: ":err})
        }else{
            res.json({"Status: ": "Successful", "ObjectId": user.id})
        }
    })
      }
   })
});

app.listen(port, () => {
    console.log('Server listening on port ' + port);
});