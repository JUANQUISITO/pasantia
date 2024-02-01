FROM php:8.1-apache
RUN a2enmod proxy_http

LABEL maintainer="Development <yhgrissel@gmail.com>"
LABEL maintainer="Development <evlas.shin@gmail.com>"


RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install nano

RUN apt-get install --fix-missing -y libpq-dev
RUN apt-get install --no-install-recommends -y libpq-dev
RUN apt-get install -y libxml2-dev libbz2-dev zlib1g-dev
RUN apt-get -y install libsqlite3-dev libsqlite3-0 mariadb-client curl exif ftp
RUN docker-php-ext-install intl
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-enable pdo
RUN docker-php-ext-enable pdo_mysql
RUN apt-get -y install --fix-missing zip unzip
RUN apt-get -y install --fix-missing git
RUN echo "date.timezone = America/La_Paz" > /usr/local/etc/php/conf.d/timezone.ini

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer self-update --2

#Config Apache
ADD sites-available/siwebpi.conf /etc/apache2/sites-available/000-default.conf

#config PHP.ini
COPY uploads.ini /usr/local/etc/php/conf.d/


# LDAP INSTALLATION
RUN set -x \
    && apt-get update \
    && apt-get install -y libldap2-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-install ldap \
    && apt-get purge -y --auto-remove libldap2-dev

RUN a2enmod rewrite

RUN cd /var/www/html
RUN mkdir siwebpi
RUN chmod -R 0777 /var/www/html/siwebpi

RUN ln -sf /dev/stdout /var/log/apache2/access.log \
    && ln -sf /dev/stderr /var/log/apache2/error.log


#EXPOSE 80
