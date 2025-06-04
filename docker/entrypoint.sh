#!/bin/bash
set -e

echo "🚀 Starting Laravel application setup..."
sleep 2

if [ ! -d "vendor" ]; then
    echo "📦 Installing composer dependencies..."
    composer install --no-dev --optimize-autoloader
else
    echo "✅ Composer dependencies already installed"
fi

if [ ! -f ".env" ]; then
    echo "🔧 Setting up environment file..."
    cp .env.example .env
else
    echo "✅ Environment file already exists"
fi

if ! grep -q "APP_KEY=base64:" .env; then
    echo "🔑 Generating application key..."
    php artisan key:generate --no-interaction
else
    echo "✅ Application key already set"
fi

echo "🗄️ Setting up database..."
mkdir -p /var/www/database
if [ ! -f "/var/www/database/database.sqlite" ]; then
    touch /var/www/database/database.sqlite
    echo "✅ Database file created"
else
    echo "✅ Database file already exists"
fi

echo "🔄 Running database migrations..."
php artisan migrate --force --no-interaction

echo "🔗 Creating storage link..."
php artisan storage:link --force || true

echo "🎨 Building frontend assets..."
if [ ! -d "node_modules" ]; then
    echo "📦 Installing npm dependencies..."
    npm install --silent
fi

# Always clean and rebuild assets for production
echo "🧹 Cleaning previous builds..."
rm -rf public/build 2>/dev/null || true

echo "🔨 Building production assets..."
NODE_ENV=production npm run build

# Verify build was successful
if [ ! -d "public/build" ]; then
    echo "❌ Build failed - no public/build directory created"
    exit 1
fi

echo "✅ Frontend assets built successfully"

echo "⚡ Optimizing application..."
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "🔒 Setting file permissions..."
chown -R www:www /var/www/storage /var/www/bootstrap/cache 2>/dev/null || echo "⚠️ Permission changes skipped (volume mounted)"
chmod -R 775 /var/www/storage /var/www/bootstrap/cache 2>/dev/null || echo "⚠️ Permission changes skipped (volume mounted)"

echo "✅ Laravel application setup complete!"
echo "🏃 Starting PHP-FPM..."
exec php-fpm