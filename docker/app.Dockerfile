FROM php:7.4-fpm

RUN \
    apt-get update && apt-get install -y \
        libpq-dev \
        libmemcached-dev \
        curl \
        wget \
        mc \
        sudo \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        libmcrypt-dev \
        libzip-dev \
        zip \
        tzdata \
        bzip2 \
        libzip-dev \
        libbz2-dev \
        libxml2-dev \
        git \
        supervisor \
        procps \
        imagemagick \
        libmagickwand-dev \
        graphviz \
        --no-install-recommends \
    && apt-get clean \
    && rm -r /var/lib/apt/lists/*
RUN \
    docker-php-ext-configure gd \
        --with-jpeg \
        --with-freetype
RUN \
    docker-php-ext-install \
        pgsql \
        pdo \
        pdo_mysql \
        opcache \
        zip \
        bz2 \
        soap \
        xml \
        zip \
        gd

COPY ./docker/conf/php.app/php.ini /usr/local/etc/php/conf.d/php.ini
COPY ./ /var/www/html

RUN \
    chown -R :www-data /var/www/html \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install \
    && chmod +x /docker/app.sh




