#!/bin/bash
set -e

echo "🚀 Starting Laravel application setup..."

# Wait for any file system to be ready
sleep 2

# Install composer dependencies if vendor doesn't exist
if [ ! -d "vendor" ]; then
    echo "📦 Installing composer dependencies..."
    composer install --no-dev --optimize-autoloader
else
    echo "✅ Composer dependencies already installed"
fi

# Copy environment file if it doesn't exist
if [ ! -f ".env" ]; then
    echo "🔧 Setting up environment file..."
    cp .env.example .env
else
    echo "✅ Environment file already exists"
fi

# Generate app key if not set
if ! grep -q "APP_KEY=base64:" .env; then
    echo "🔑 Generating application key..."
    php artisan key:generate --no-interaction
else
    echo "✅ Application key already set"
fi

# Create database directory and file
echo "🗄️ Setting up database..."
mkdir -p database
if [ ! -f "database/database.sqlite" ]; then
    touch database/database.sqlite
    echo "✅ Database file created"
else
    echo "✅ Database file already exists"
fi

# Run migrations
echo "🔄 Running database migrations..."
php artisan migrate --force --no-interaction

# Create storage link
echo "🔗 Creating storage link..."
php artisan storage:link --force || true

# Clear and cache config for production
echo "⚡ Optimizing application..."
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set proper permissions
echo "🔒 Setting file permissions..."
chown -R www:www /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

echo "✅ Laravel application setup complete!"

# Start PHP-FPM
echo "🏃 Starting PHP-FPM..."
exec php-fpm