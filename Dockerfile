FROM php:7.3

RUN apt-get update && apt-get install -y \ 
    git \
    zip \
    curl 
    
COPY --from=composer:1.8.6 /usr/bin/composer /usr/bin/composer

COPY composer.json /app/composer.json
RUN composer install -d /app
COPY script.php /app/script.php

ENTRYPOINT ["php", "/app/script.php"]