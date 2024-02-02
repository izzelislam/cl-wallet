FROM php:8.2-fpm-alpine

WORKDIR /var/www

# COPY . .

# RUN chmod 777 -R ./storage ./bootstrap/cache ./public

RUN docker-php-ext-install pdo pdo_mysql