FROM php:8.2-cli

RUN apt-get update && \
    apt-get install -y libpq-dev libzip-dev unzip libpng-dev && \
    docker-php-ext-install pdo pdo_mysql zip gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

EXPOSE 8000