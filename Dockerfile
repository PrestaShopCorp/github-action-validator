FROM php:7.3

RUN apt-get update && apt-get install -y \ 
    git \
    zip \
    curl 
    
COPY --from=composer:1.8.6 /usr/bin/composer /usr/bin/composer
RUN composer global require hirak/prestissimo

COPY composer.json /app/composer.json
RUN composer install -d /app
COPY init.php /app/init.php

ENTRYPOINT ["php", "/app/init.php"]