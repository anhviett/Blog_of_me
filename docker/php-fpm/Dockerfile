FROM php:7.4-fpm

ARG UID
ARG GID

RUN apt-get update -y
RUN apt-get install -y
RUN apt-get install libzip-dev unzip -y
RUN docker-php-ext-install pdo pdo_mysql zip

# install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/bin/composer

# install nodejs
RUN apt-get install npm -y \
    && npm cache clean -f \
    && npm install -g n \
    && n 12.18.4 \
    && mkdir /.npm \
    && chown $UID:$GID /.npm -R
