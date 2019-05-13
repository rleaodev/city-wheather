class CityController
{
    constructor() {
        this.service = new CityService();
        this.view = new CitiesView();
    }

    showCities() {
        let sectionCities = document.querySelector('#cities');
        this.view.setElement(sectionCities);

        this.service.getCities().then(cities => {
            if (!cities.data.length) {
                sectionCities.querySelector('p').style = "";
                return false;
            }
            this.view.list(cities.data || []);
        });
    }

    save() {
        let cityElement = document.querySelector('#cidade');

        let cityApiId = cityElement.value;
        let cityName = cityElement.textContent;

        this.service.saveCity(cityApiId, cityName);
        alert('Sucesso');
        window.location.href = '/';
    }

    details(id) {
        let detailCity = document.querySelector('#detail-city');
        this.view.setElement(detailCity);
        this.service.getCityDetail(id).then(data => {
            this.view.showDetail((data.data || []), (data.cityWheather || []));
        });
    }


}