FROM php:7.3

RUN apt-get update && apt-get install -y \ 
    git \
    zip \
    curl 


COPY --from=composer:1.8.6 /usr/bin/composer /usr/bin/composer
COPY composer.json /usr/bin/composer.json

RUN composer install -d /usr/bin

COPY script.php /usr/bin/script.php

# Code file to execute when the docker container starts up (`entrypoint.sh`)
ENTRYPOINT ["php", "/usr/bin/script.php"]