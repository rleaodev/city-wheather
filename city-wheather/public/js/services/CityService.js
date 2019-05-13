class CityService {
    
    constructor() {
        
        this._http = new HttpService();
    }
    
    getCities() {
               
        return this._http
            .get('/api/cities')
            .then(cities => {
                return cities;
            })
            .catch(err => {
                console.log(err);
                throw new Error('An error occurred when trying to get cities');
            });  
    }

    saveCity(api_id, name) {
        return this._http.post('/api/cities', {
            api_id: api_id,
            name: name
        }).then(success => {
            return 'Sucesso';
        }).catch(err => {
            console.log(err);
            throw new Error('An error occurred while trying to save the city');
        });
    }

    getCityDetail(id) {
        return this._http
            .get('/api/cities/'+id)
            .then(data => {
                return data;
            })
            .catch(err => {
                console.log(err);
                throw new Error('An error occurred when trying to get city id ' + id);
            });  
    }
}