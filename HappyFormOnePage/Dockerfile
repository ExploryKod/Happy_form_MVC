#!/bin/bash
FROM php:8.1.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite \
    && a2enmod ssl

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html/

ADD /conf/happy-form.conf /etc/apache2/sites-available/
RUN ln -s /etc/apache2/sites-available/happy-form.conf /etc/apache2/sites-enabled/

# Make port 80 available to the world outside this container
EXPOSE 80

# Run apache when the container launches
CMD ["apache2-foreground"]
