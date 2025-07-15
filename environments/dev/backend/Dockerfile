FROM yiisoftware/yii2-php:8.3-apache

WORKDIR /app


RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer;

COPY . /app

# Change document root for Apache
RUN sed -i -e 's|/app/web|/app/backend/web|g' /etc/apache2/sites-available/000-default.conf;

RUN composer install --prefer-dist --no-interaction --optimize-autoloader
