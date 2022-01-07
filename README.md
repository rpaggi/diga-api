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

##Postman Collection
The postman collection to use the api is available on file `postman_collection.json` at the root of project.