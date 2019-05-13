FROM php:7.3-fpm

RUN apt-get update && apt-get install zip unzip git nginx -y
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install bcmath
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer --disable-tls

RUN echo 'error_log = /var/log/php-fpm/php-error.log' >> /usr/local/etc/php-fpm.d/50-errlog.ini    
RUN sed -i '/^listen/c listen = 9000' /usr/local/etc/php-fpm.d/www.conf 
RUN mkdir -p /run/php-fpm/