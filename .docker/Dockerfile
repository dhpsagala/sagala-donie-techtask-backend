FROM php:7.4-fpm-alpine

COPY .docker/nginx.conf /etc/nginx/nginx.conf

WORKDIR /var/www
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer
COPY . .
RUN composer install --no-scripts --no-interaction