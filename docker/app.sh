#!/bin/bash
export HOST_UID=`id -u`

docker exec mello_app bash ./docker/composer_update.sh $HOST_UID
