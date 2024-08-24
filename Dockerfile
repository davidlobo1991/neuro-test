FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql

RUN a2enmod rewrite

COPY ./neuronation-app /var/www/html
WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

EXPOSE 80

USER www-data

CMD ["apache2-foreground"]
