#!/bin/bash
export HOST_UID=`id -u`
export COMPOSER_MEMORY_LIMIT=-1

php -d memory_limit=-1 /usr/local/bin/composer update
chown -R :www-data /var/www/html
chmod -R 777 /var/www/html/storage
chown -R $HOST_UID:www-data vendor
