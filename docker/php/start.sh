#!/bin/sh

# Start cron in the background
crond -f &

# Start PHP-FPM
docker-php-entrypoint php-fpm