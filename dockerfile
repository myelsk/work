FROM php:7.2-fpm

RUN apt-get update
RUN apt-get install -y libmcrypt-dev mysql-client
RUN docker-php-ext-install pdo_mysql