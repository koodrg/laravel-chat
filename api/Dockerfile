# Use an official PHP image as the base image
FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

# Copy application files to the container
COPY ./api ./var/www/html

CMD ["php", "artisan", "serve", "--host=0.0.0.0"]