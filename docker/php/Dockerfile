FROM php:7.4-cli

# Install packages needed to run the app.
RUN apt-get update && apt-get install -y git zip

# Install & configure the needed PHP extensions.
RUN docker-php-ext-install opcache \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "\nxdebug.remote_enable=1\nxdebug.remote_host=host.docker.internal\nxdebug.remote_port=9000" \
        >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install Composer.
COPY scripts/install_composer.sh /tmp/install_composer.sh

RUN sh /tmp/install_composer.sh && rm /tmp/install_composer.sh

WORKDIR /var/www/chocolate
