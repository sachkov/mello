#!/bin/bash
export COMPOSER_MEMORY_LIMIT=-1

php -d memory_limit=-1 /usr/local/bin/composer update
chown -R :www-data /var/www/html
chmod -R 777 /var/www/html/storage
chown -R www-data:www-data vendor
