FROM php:7.4.29-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli
RUN  chmod 777 /tmp
EXPOSE 80
RUN  chmod 777 /var/www/html/profileimgs