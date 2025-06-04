FROM php:8.3-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    unzip \
    git \
    curl \
    libicu-dev \
    libzip-dev \
    libonig-dev \
    libsqlite3-dev \
    sqlite3 \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions with explicit SQLite support
RUN docker-php-ext-install pdo pdo_sqlite mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Verify SQLite extension is loaded
RUN php -m | grep -i sqlite

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY --chown=www:www . /var/www

# Copy and set up entrypoint script
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Create necessary directories with proper permissions
RUN mkdir -p /var/www/storage/app/public \
    /var/www/storage/framework/cache \
    /var/www/storage/framework/sessions \
    /var/www/storage/framework/views \
    /var/www/storage/logs \
    /var/www/bootstrap/cache \
    /var/www/database

# Set permissions
RUN chown -R www:www /var/www
RUN chmod -R 755 /var/www/storage /var/www/bootstrap/cache /var/www/database

# Switch to non-root user
USER www

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Use entrypoint script
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]