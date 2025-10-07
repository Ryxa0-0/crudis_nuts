# Use official PHP 8.1 + Apache image
FROM php:8.1-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install required system packages
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Install PHP extensions for MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copy project files to container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Install dependencies (ignore composer.json missing)
RUN if [ -f composer.json ]; then composer install || true; fi

# Fix permissions for writable folder (CodeIgniter 3/4)
RUN mkdir -p /var/www/html/writable/sessions && chmod -R 777 /var/www/html/writable

# Apache listens on port 8080 in Render by default
EXPOSE 8080

# Tell Apache to use port 8080 (Render default)
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Start Apache
CMD ["apache2-foreground"]