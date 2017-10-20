# Bum! It's my blog souce code

As a Skeleton was used this ([Slim 3 Skeleton](https://github.com/slimphp/Slim-Skeleton))

## Install the Application

Run these commands in the directory where you download the code.

1. Start the docker-compose services (PHP, Nginx) in the background (detached):
  ```
$ docker-compose up -d
  ```

2. Run the Composer installer in the PHP container to install the PHP dependencies:
  ```
$ docker-compose exec php composer install
  ```

3. Run the NPM installer
```
$ npm install
```

Maybe this all, but I don't think that you don't use bad words when install this project :)

The application should now be available on [http://localhost:8080](http://localhost:8080).
