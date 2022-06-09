FROM php:7.4.29-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli
CMD ["chmod", "777", "/tmp"]
CMD ["chmod", "777", "/var/www/html/profileimgs"]
EXPOSE 80