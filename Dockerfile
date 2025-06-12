# Dockerfile
FROM php:8.3-fpm-alpine

# System and PHP dependencies
RUN apk update && apk upgrade && apk add --no-cache \
    icu-dev \
    zip \
    libzip-dev \
    postgresql-client \
    git \
    curl \
    oniguruma-dev \
    libxml2-dev \
    libpq \
    && docker-php-ext-install intl zip pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Allow Git to trust this directory
RUN git config --global --add safe.directory /var/www/html

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port and start PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
