# Slim Framework 4 Skeleton Application - Spotify Integration

Rest API, using the Slim Framework 4 Skeleton Application.
Also, I use Docker to setup and serve the enviroment.
Last, I use Guzzle to connect with Spotify API.

## Install the Application

For serve the application, you neet to run:

-   docker-compose up -d
-   docker run --rm -v "$(pwd):/app" composer composer install


After that, open `http://localhost:80` in your browser.
For test the api, you can use the follow endpoint:

- http://localhost/api/v1/albums?q=<band-name>

For example http://localhost/api/v1/albums?q=Queen
