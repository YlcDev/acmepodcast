FROM php:7.1.12-fpm

MAINTAINER Ross Boswell

COPY . /var/www/html

RUN apt-get update
RUN apt-get install -y git zip unzip
RUN docker-php-ext-install pdo_mysql
RUN pecl install xdebug-2.5.0 \
    && docker-php-ext-enable xdebug  

WORKDIR /var/www/html

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN composer install -vvv