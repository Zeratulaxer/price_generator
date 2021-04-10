FROM php:7.2-fpm

#Install xdebug
RUN pecl install xdebug-2.6.1 && docker-php-ext-enable xdebug

COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /price_gen

CMD ["php-fpm"]
