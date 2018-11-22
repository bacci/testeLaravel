FROM php:7.1-fpm

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev

RUN docker-php-ext-install pdo_mysql zip
#  bcmath mbstring tokenizer xml ctype json

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

COPY conf/php.ini /etc/php/7.1/fpm/conf.d/40-custom.ini