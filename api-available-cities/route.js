var City = require('./models/cities');

module.exports = (app) => {
    app.get('/cities', (req, res) => {
        let filter = req.query.q || false;

        if (!filter) {
            res.json([]);
            return false;
        }

        City.find({name: {$regex: '.*' + filter  + '.*', $options: 'i'}}, (err, cities) => {

            if (err)
                res.send(err);

            res.json(cities);
        }).limit(30);
    });
};