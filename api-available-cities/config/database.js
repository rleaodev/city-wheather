var mongourl = process.env.MONGO_URI ? process.env.MONGO_URI : 'mongodb://localhost:27017/citiesDB';
console.log("mongo_url:" + mongourl);
module.exports = {
    url : mongourl,
    useNewUrlParser: true
};