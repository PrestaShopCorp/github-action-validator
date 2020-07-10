FROM php:7.3

RUN apt-get update && apt-get install -y \ 
    git \
    zip \
    curl \
    libzip-dev
RUN docker-php-ext-configure zip --with-libzip
RUN docker-php-ext-install zip

COPY --from=composer:1.8.6 /usr/bin/composer /usr/bin/composer
RUN composer global require hirak/prestissimo && composer global require guzzlehttp/guzzle

COPY entrypoint.sh /entrypoint.sh

# Code file to execute when the docker container starts up (`entrypoint.sh`)
ENTRYPOINT ["/entrypoint.sh"]