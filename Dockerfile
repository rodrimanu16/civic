# Use an official PHP runtime as a parent image with Apache
FROM php:8.0-apache

# Install system dependencies for Composer and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the application's files into the container
COPY . /var/www/html

# Install PHP dependencies
RUN composer install

# Expose port 80 to the outside once the container is running
EXPOSE 80


RUN apt-get update && apt-get install -y curl

# Use the default command for the php:apache image (start Apache)
CMD ["apache2-foreground"]

# Download and install the Tracer
RUN mkdir -p /opt/datadog \
    && mkdir -p /var/log/datadog \
    && curl -LO https://github.com/DataDog/dd-trace-php/releases/latest/download/datadog-setup.php \
    && php ./datadog-setup.php --php-bin=all \


# Use the .NET SDK image to build and publish the a

# Please select the corresponding download for your Linux containers https://github.com/DataDog/dd-trace-dotnet/releases/latest
