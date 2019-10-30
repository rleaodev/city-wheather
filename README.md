# City Wheather App

## Requirements
- Docker and docker-compose installed

## How to run this project

1. Go to the root folder, example: ```cd ~/code/city-wheather```
2. Execute the command docker-compose up -d and wait for the download/configuration
3. Put your Api key in `ROOT_FOLDER/city-wheather/.env` file on ``WHEATHER_API_KEY`` key
4. Go to your browser and type: [http://localhost:8000](http://localhost:8000)
## Tests

- The main app (city-wheather folder) have some tests, if you want to run the these tests you have to execute on your machine: ```docker exec -it web /var/www/html/vendor/bin/phpunit /var/www/html/tests```

## Design

- We have six technologies around this project
    1. PHP with FPM
    2. Nginx
    3. Node
    4. Mongodb
    5. Redis
    6. Mysql

### PHP with FPM
    - Used to build de main api and the frontend
    - Faster to render web pages

### Nginx
    - Webserver with a reverse proxy for the PHP FPM and the Node api

### Node and Mongodb
    - Here we have a issue that PHP does not act well - PARSE FILE. And we have a not so large, but big json file with the available cities that PHP could not handle very well (only if we increase the memory_limit, but this is not a good way pass thru this).
    - Mongodb works very well with large documents and node works very well with Node
    - We built an api only with to READ and filter data from mongodb. The main application consumes these api

### Redis
    - To keep the response from the openwheather api in cache and make our application faster.

### Mysql
    - To save the cities that user want keep on a list. 
    - Mysql and PHP works very well. That's why a choose to save this list on mysql.

### Comments
    - I used javascript and bootstrap 4 to show the response from the api for the client

