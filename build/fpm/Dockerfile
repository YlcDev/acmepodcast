FROM php:7.1.12-fpm

MAINTAINER Ross Boswell

RUN docker-php-ext-install pdo_mysql
RUN pecl install xdebug-2.5.0 \
    && docker-php-ext-enable xdebug  
