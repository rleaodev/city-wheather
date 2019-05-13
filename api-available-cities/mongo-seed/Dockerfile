FROM mongo

COPY data/cities.json /cities.json

CMD mongoimport --host mongodb --db citiesDB --collection cities --type json --file /cities.json --jsonArray
