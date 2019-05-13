var express  = require('express');
var app      = express();                               // create our app w/ express
var port     = process.env.PORT || 5000; 
var mongoose = require('mongoose');                     // mongoose for mongodb             // set the port
var database = require('./config/database');            // load the database config
var bodyParser = require('body-parser');    // pull information from HTML POST (express4)
try {
    mongoose.connect(database.url, {useNewUrlParser: database.useNewUrlParser});
} catch (err) {
    console.log(err);
}

app.use(bodyParser.urlencoded({'extended':'true'}));            // parse application/x-www-form-urlencoded
app.use(bodyParser.json());                                     // parse application/json
app.use(bodyParser.json({ type: 'application/vnd.api+json' })); // parse application/vnd.api+json as json
require('./route')(app);
app.listen(port);
console.log("App listening on port " + port);