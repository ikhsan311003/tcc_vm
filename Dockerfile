FROM php:8.1-apache

# Install ekstensi PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

COPY src/ /var/www/html/

EXPOSE 80
