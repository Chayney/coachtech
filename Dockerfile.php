FROM php:7.4.9-fpm

# 必要なPHP拡張機能をインストール
RUN apt-get update && apt-get install -y \
    git \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    libzip-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install gd zip pdo pdo_mysql bcmath

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ソースコードのコピー
WORKDIR /var/www/html/project
COPY src /var/www/html/project

# 依存関係のインストール
RUN composer install --no-dev --optimize-autoloader --no-interaction

CMD ["php-fpm"]