FROM tommyprmbd/php-fpm8.3:latest

RUN apk add postgresql-dev 

RUN docker-php-ext-install pdo_pgsql

RUN chown -R www-data:www-data /apps/api \
    chmod -R 755 /apps/api
