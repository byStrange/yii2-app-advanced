FROM yiisoftware/yii2-php:8.3-fpm

WORKDIR /app


RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer;

COPY . /app


RUN composer install --prefer-dist --no-interaction --optimize-autoloader
