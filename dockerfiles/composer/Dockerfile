FROM composer:latest

RUN addgroup -g 1000 composer && adduser -G composer -g composer -s /bin/sh -D composer

USER composer 

WORKDIR /var/www/html

ENTRYPOINT [ "composer", "install" ]