# Using PHP image because Laravel needs PHP
FROM php:8.2-fpm

# Install stuff I need for Laravel, like MySQL and zip
RUN apt-get update && apt-get install -y libpq-dev libzip-dev unzip && docker-php-ext-install pdo pdo_mysql zip

# Install Composer to get Laravel dependencies
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the folder where my app lives
WORKDIR /var/www

# Copy my project files
COPY . .

# Install Laravel dependencies
RUN composer install

# Run the Laravel server on port 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

# Open port 8000 for the Laravel server
EXPOSE 8000