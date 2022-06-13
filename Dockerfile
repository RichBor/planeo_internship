FROM php:7.4-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli
ADD . /var/www/html
RUN chmod 777 /var/www/html/profileimgs
EXPOSE 80