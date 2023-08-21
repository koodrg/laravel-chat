FROM composer:2.2 AS build

WORKDIR ./src
COPY ./composer.json ./composer.lock ./
RUN composer install

RUN echo "composer install success"

FROM php:8.1-fpm

COPY . /var/www/html

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

CMD ["php", "artisan", "serve"]

EXPOSE 8080