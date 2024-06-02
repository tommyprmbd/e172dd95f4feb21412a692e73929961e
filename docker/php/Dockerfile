FROM tommyprmbd/php-fpm8.3:latest

RUN apk add postgresql-dev 

RUN docker-php-ext-install pdo_pgsql

# add cron config
RUN echo "*       *       *       *       *       curl http://192.168.90.4/api/scheduler/send-email >> /var/log/scheduler.log 2>&1" >> /etc/crontabs/root

# Copy the start.sh script to /usr/local/bin and ensure it's executable
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Set the entrypoint to start the script
ENTRYPOINT ["/usr/local/bin/start.sh"]
# RUN chown -R www-data:www-data /apps/api \
#     chmod -R 755 /apps/api
