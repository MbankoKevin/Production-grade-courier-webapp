# Step 1: Use the official PHP image with Apache
FROM php:8.3-apache

# Step 2: Install system dependencies and required PHP extensions
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip \
    && apt-get clean && rm -rf /var/lib/lists/*

# Step 3: Enable Apache mod_rewrite (crucial for MVC frameworks like Laravel/Symfony)
RUN a2enmod rewrite


# Step 5: Set the working directory inside the container
WORKDIR /var/www/html

# Step 6: Copy application code into the container
COPY . /var/www/html


# Step 8: Set correct permissions for Apache
RUN chown -R www-data:www-data /var/www/html

# Step 9: Expose port 80
EXPOSE 80