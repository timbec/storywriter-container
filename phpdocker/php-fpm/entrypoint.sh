#!/bin/sh

# Run migrations
php artisan migrate --force

# Create storage symlink
php artisan storage:link || true

# Start PHP-FPM
exec php-fpm


