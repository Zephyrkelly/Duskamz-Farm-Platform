# Use official PHP image
FROM php:8.2-apache

# Install PostgreSQL client libraries
RUN apt-get update && apt-get install -y libpq-dev

# Enable PostgreSQL extension
RUN docker-php-ext-install pdo pdo_pgsql

# Copy project files into container
COPY . /var/www/html/

# Expose port 80
EXPOSE 80
