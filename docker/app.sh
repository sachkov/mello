#!/bin/bash
export HOST_UID=`id -u`

docker exec mello_app bash ./docker/composer_update.sh

if [ -d vendor ]; then
chown -R $HOST_UID:www-data vendor
fi
