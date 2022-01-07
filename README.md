#Diga API

##Requirements
- Docker
- Docker Compose

##How to run at first time
1. Copy the file .env.exampe to .env
2. Run the command `docker-compose up`
3. When the command ends run the command `docker-compose exec laravel composer install` 
4. Next run the following command `docker-compose exec laravel php artisan key:generate`
5. Now run the migrate command `docker-compose exec laravel php artisan migrate --seed`
6. Now run the passport command to generate the client keys `docker-compose exec laravel php artisan passport:install`
7. Copy the Password Client id and secret, this will needed to call login endpoint

##Postman Collection
The postman collection and environment to use the api is available on file `postman_collection.json` and `postman_environment.json` at the root of project.

##Common problemns
1. If you're using Linux, maybe you'll need to change the permission of storage folder running the following command`chmod -R 777 storage`