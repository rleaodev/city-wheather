let mongoose = require('mongoose');

module.exports = mongoose.model('City', {
    name : String,
    country: String,
    id : Number,
    coord: [{
        lon: Number,
        lat: Number
    }]

});