FROM php:8.2-apache

# Install required packages for PostgreSQL support
RUN apt-get update && apt-get install -y libpq-dev pkg-config

# Enable PDO and PostgreSQL extensions
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Copy project files into container
COPY . /var/www/html/

# Expose port 80 for Render
EXPOSE 80
