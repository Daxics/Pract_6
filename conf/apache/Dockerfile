FROM composer:latest AS composer
FROM php:8.0-apache
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN docker-php-ext-install mysqli && \
    a2enmod authn_dbd && \
    a2enmod rewrite && \
    pecl install -o -f redis && \
    rm -rf /tmp/pear && \
    docker-php-ext-enable redis && \
    apt-get update && \
    apt-get install -y apache2-utils && \
    apt-get install -y libaprutil1-dbd-mysql && \
    apt-get install -y git && \
    apt-get install -y libpng-dev && \
    apt-get install -y zip unzip && \
    docker-php-ext-install gd

WORKDIR /etc/apache2
COPY composer.json .
RUN composer update && composer install
RUN service apache2 restart