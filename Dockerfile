FROM php:apache

# copied below from: https://www.digitalocean.com/community/tutorials/how-to-containerize-a-laravel-application-for-development-with-docker-compose-on-ubuntu-18-04
# might not need to install composer and could just copy repo files into /var/www

RUN apt-get update \
 && apt-get install -y git curl zip unzip zlib1g-dev libpng-dev libonig-dev libxml2-dev \
 && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
 && a2enmod rewrite \
 && sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
 && mv /var/www/html /var/www/public \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html/

# Retrieve vendor files
RUN composer install

# Set workdir
WORKDIR /var/www/

# Make www-data owner of all files
RUN chown -R www-data:www-data html

# Expose Ports
EXPOSE 80
