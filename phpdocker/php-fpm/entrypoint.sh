#!/bin/sh

# Run migrations
php artisan migrate --force

# Create storage symlink
php artisan storage:link

# Start PHP-FPM
exec php-fpm
