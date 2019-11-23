FROM php:7.0.13-fpm
MAINTAINER tpshop

# Install modules

RUN echo "deb [check-valid-until=no] http://cdn-fastly.deb.debian.org/debian jessie main" > /etc/apt/sources.list.d/jessie.list
RUN echo "deb [check-valid-until=no] http://archive.debian.org/debian jessie-backports main" > /etc/apt/sources.list.d/jessie-backports.list
RUN sed -i '/deb http:\/\/deb.debian.org\/debian jessie-updates main/d' /etc/apt/sources.list
RUN sed -i '/deb http:\/\/\(deb\|httpredir\).debian.org\/debian jessie.* main/d' /etc/apt/sources.list


RUN  apt-get -o Acquire::Check-Valid-Until=false update && apt-get install -y \
        libfreetype6-dev \
        librabbitmq-dev \
        libssh-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        libicu-dev \
        libxml2-dev \
        git \
        wget \
        ssh \
        libpcre3-dev \
        --no-install-recommends       
       
RUN docker-php-ext-install mcrypt zip intl mbstring mysqli pdo_mysql exif xmlrpc \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

RUN pecl install xdebug && docker-php-ext-enable xdebug 


EXPOSE 9000
CMD ["php-fpm"]
