class CitiesView extends View
{
    list(data) {
        this.render(`
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Api Id</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
            <tbody>
                ${data.map(city => `
                    <tr>
                        <th scope="col">${city.id}</th>
                        <th scope="col">${city.api_id}</th>
                        <th scope="col">${city.name}</th>
                        <th scope="col"><a href="/detail/${city.id}">Detalhes</a></th>
                    </tr>
                `).join('')}
            </tbody>
        </table>
        `);
    }

    showDetail(city, wheather) {
        console.log(wheather);
        this.render(`
            <h3 class="mb-3">${city.name}</h3>
            <div class="card-group">
            ${(wheather.list || []).map(wheather => `
                <div class="card">
                  <div class="card-header">${DateHelper.DateFromUTCToBR(wheather.dt * 1000)} - ${(wheather.temp.day).toFixed(2)} º C</div>
                  <div class="card-body">
                    <div class="row">                    
                        <div class="col-md-12"><h5>${wheather.weather[0].description}</h5><br /></div>
                        <div class="col-md-12"><i class="fas fa-temperature-low" title="Mínima"></i> ${(wheather.temp.min).toFixed(2)} ºC</div>
                        <div class="col-md-12"><i class="fas fa-temperature-high" title="Mínima"></i> ${(wheather.temp.max).toFixed(2)} ºC</div>
                        <div class="col-md-12">
                            <p class="card-text">
                                <small class="text-muted">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-cloud" title="Nuvens"></i> ${wheather.clouds}%</li>
                                        <li><i class="fas fa-tint" title="Qtde de chuva"></i> ${wheather.rain || 0}mm</li>
                                    </ul>
                                </small>
                            </p>
                        </div>
                    </div>
                  </div>
                </div>
            `).join('')}
        </div>`);
    }
}