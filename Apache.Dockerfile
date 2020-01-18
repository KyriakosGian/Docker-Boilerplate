#Apache server with php
FROM php:7.4-apache

RUN apt-get update 
#RUN apt-get install -y libmcrypt-dev
#RUN docker-php-ext-enable imagick
#RUN docker-php-ext-install mcrypt
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql

# 1. development packages
#RUN apt-get install -y \
#    git \
#    zip \
#    curl \
#    sudo \
#    unzip \
#    libicu-dev \
#    libbz2-dev \
#    libpng-dev \
#    libjpeg-dev \
#    libmcrypt-dev \
#    libreadline-dev \
#    libfreetype6-dev \
#   g++

#RUN docker-php-ext-install \
#    bz2 \
#    intl \
#    iconv \
#    bcmath \
#    #opcache \
#    calendar \
#    mbstring \
#    pdo_mysql \
#    zip