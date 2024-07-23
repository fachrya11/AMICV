# Use the official PHP image from the Docker Hub
FROM php:8.2-apache

# Set the working directory
WORKDIR /var/www/html

# Install any additional PHP extensions if needed
RUN docker-php-ext-install pdo pdo_mysql

# Copy the current directory contents into the container at /var/www/html
COPY cvrpl /var/www/html

# Enable Apache mod_rewrite (if needed for your application)
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
