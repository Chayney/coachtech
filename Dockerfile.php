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
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# 作業ディレクトリの設定
WORKDIR /var/www/html/project

# ソースコードのコピー
COPY src /var/www/html/project

# 必要なディレクトリを作成して適切な権限を設定
USER root
RUN mkdir -p /usr/src/php
USER www-data

# 依存関係のインストール
RUN composer install --no-dev --optimize-autoloader --no-interaction

CMD ["php-fpm"]