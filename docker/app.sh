#!/bin/bash

docker exec mello_app bash ./docker/composer_update.sh

if ! [ -f vendor ]; then
chown -R $HOST_UID:www-data vendor
fi
