FROM php:7.4-apache

RUN apt update \
    && apt install -y \
        git \
        libzip-dev \
        zip \
        mariadb-client \
    && a2enmod rewrite \
    && docker-php-ext-install mysqli pdo pdo_mysql zip \
    && docker-php-ext-enable mysqli pdo pdo_mysql zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./ /var/www/html/
COPY ./docker/api/docker-php-entrypoint /usr/local/bin/docker-php-entrypoint

WORKDIR /var/www/html