FROM php:8.1-fpm

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libzip-dev \
    libz-dev \
    libzip-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libssl-dev \
    libxml2-dev \
    libreadline-dev \
    unzip \
    supervisor

#####################################
# PHP Extensions
#####################################
# Install the PHP shared memory driver
RUN pecl install APCu && \
    docker-php-ext-enable apcu

# Install the PHP bcmath extension
RUN docker-php-ext-install bcmath

# Install for image manipulation
RUN docker-php-ext-install exif

# Install the PHP graphics library
RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg
RUN docker-php-ext-install gd

# Install the PHP intl extention
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# Install the PHP mysqli extention
RUN docker-php-ext-install mysqli && \
    docker-php-ext-enable mysqli

# Install the PHP opcache extention
RUN docker-php-ext-install opcache

# Install the PHP pcntl extention
RUN docker-php-ext-install pcntl

# Install the PHP pdo_mysql extention
RUN docker-php-ext-install pdo_mysql

# Install the PHP redis driver
RUN pecl install redis && \
    docker-php-ext-enable redis

# install XDebug but without enabling
RUN pecl install xdebug

# Install the PHP zip extention
RUN docker-php-ext-install zip

#####################################
# Composer
#####################################
# RUN curl -s http://getcomposer.org/installer | php && \
#     mv composer.phar /usr/local/bin/composer

# #####################################
# # Entrypoint
# #####################################
# COPY ./docker/php-fpm/docker-entrypoint.sh /usr/local/bin/
# RUN chmod +x /usr/local/bin/docker-entrypoint.sh
# RUN ln -s /usr/local/bin/docker-entrypoint.sh /

# WORKDIR /var/www/html
# COPY . /var/www/html/

# RUN composer install

#####################################
# Cleanup
#####################################
RUN apt-get autoremove --purge -y \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# ENTRYPOINT ["docker-entrypoint.sh"]
# CMD ["docker-entrypoint.sh"]