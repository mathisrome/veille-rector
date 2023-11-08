FROM php:8.2-fpm-bullseye AS build

# replace shell with bash so we can source files
RUN rm /bin/sh && ln -s /bin/bash /bin/sh

## Installation des utilitaires
RUN apt update && \
    apt install -y curl vim nano git zip npm && \
    curl https://raw.githubusercontent.com/nvm-sh/nvm/master/install.sh | bash && \
    source ~/.profile && \
    nvm install v20.7.0 && \
    nvm use v20.7.0

RUN npm install -g yarn


## Config Timezone
RUN rm /etc/localtime && ln -s /usr/share/zoneinfo/Europe/Paris /etc/localtime


## PHP Extensions & Composer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions gd exif pdo_mysql intl zip bcmath && install-php-extensions @composer

## WHTMLTOPDF
#RUN curl -LO https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox_0.12.6-1.buster_amd64.deb && \
#    apt update && apt install -y --no-install-recommends ./wkhtmltox_0.12.6-1.buster_amd64.deb && \
#   rm wkhtmltox_0.12.6-1.buster_amd64.deb


WORKDIR /var/www/app