# Hotel Booking Task 

> It's a Laravel Application

## Features

- Laravel 10.10
- Docker
- Docker-compose 3.7
- LiveWire 3.7
- Sanctum 3.3
- Spatie-permission 6.7
- Laravel-debugbar 3.1
- Breeze 1.29
- PhpUnit 10.1


## Installation
- install `docker` in your local machine
- install `docker-compose`
- `composer install`
- copy `.env.example` file to `.env` file
- run `docker-compose up -d`
- [When installed via git clone or download, run] `docker exec php-hotel-booking php artisan key:generate`
- `docker exec php-hotel-booking php artisan migrate`
- [To execute unit test run ] `docker exec php-hotel-booking php artisan test`
- [Run db seeder ] `docker exec php-hotel-booking php artisan db:seed`
- you can open phpmyadmin at this `http://localhost:30004/`
- the project link in this `http://localhost:8050/`
- for apis the PostMan collection shared link in this `https://cloudy-sunset-451442.postman.co/workspace/Team-Workspace~c7ffeddf-c496-4a6a-8177-bc8d2f6dca43/collection/2563349-5cc95a90-c79f-4a05-aa94-a9b835aa3bb2?action=share&creator=2563349&active-environment=2563349-93d677e8-509e-4958-9e55-e635e37f4357`
- you can find it also in json format in this file `[hotel-booking-task.postman_collection.json](hotel-booking-task.postman_collection.json)` 
- after [Run seeders] you can access users 
  - Admin credentials:
    * email: admin@admin.com
    * password: password
  - employee credentials :
     * email: employee@admin.com
     * password: password
  - client credentials or you can register new one from api or web app
     * email:client@client.com
     * password: password

  
