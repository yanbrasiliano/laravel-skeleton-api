FROM php:8.3-fpm

WORKDIR /var/www/html

ARG uid=1000
ARG user=www-data

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libsqlite3-dev \
    libpq-dev \
    pkg-config \
    supervisor \
    nginx

RUN docker-php-ext-install pdo pdo_sqlite pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY --chown=${user}:${user} . /var/www/html

RUN usermod -u ${uid} ${user} \
    && mkdir -p /home/${user}/.composer \
    && chown -R ${user}:${user} /var/www/html \
    && chown -R ${user}:${user} /home/${user}


COPY ./docker/supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY ./docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf

RUN composer install --prefer-dist --no-scripts --no-dev --optimize-autoloader

# Start Supervisor
CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
