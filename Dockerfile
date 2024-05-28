FROM php:8.1-fpm-alpine
WORKDIR /var/www/html

RUN docker-php-ext-install mysqli pdo pdo_mysql

ADD . /var/www

RUN chown -R www-data:www-data /var/www/html

RUN chmod -R 777 /var/www/storage/*
