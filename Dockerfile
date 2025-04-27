# I’m using the official PHP image because Laravel needs PHP to run
FROM php:8.2-fpm

# I need to install some stuff for Laravel to work, like MySQL extensions
# I found this command online to install dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    # I need this for Laravel to connect to MySQL
    && docker-php-ext-install pdo pdo_mysql zip

# I need Composer to install Laravel’s dependencies
# I saw this in a tutorial to copy Composer from the official Composer image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Setting the working directory to where my app will live
WORKDIR /var/www

# Copy all my project files into the container
COPY . .

# Install the Laravel dependencies using Composer
# I’m not sure if I need --no-dev, but I’ll keep it simple
RUN composer install

# I read that I need to run this to start the Laravel server
# Using php artisan serve because I don’t know how to set up Nginx yet
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

# Expose port 8000 because that’s what php artisan serve uses
EXPOSE 8000