# Базовый образ с PHP CLI
FROM php:8.2-cli

# Установка необходимых пакетов и зависимостей для Debian-based системы
RUN set -ex; \
    apt-get update && \
    apt-get install -y git unzip libzip-dev libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql zip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Настройка рабочей директории
WORKDIR /app

# Копирование исходного кода проекта в контейнер
COPY . .

# Установка зависимостей Laravel через Composer
RUN composer install --no-dev --optimize-autoloader

# Настройка переменных окружения для Laravel
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV DB_CONNECTION=pgsql
ENV DB_HOST=db
ENV DB_PORT=5432
ENV DB_DATABASE=notes_db
ENV DB_USERNAME=notes_user
ENV DB_PASSWORD=notes_password

# Открытие порта для Laravel
EXPOSE 8000

# Запуск встроенного сервера Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
