FROM php:7.4-apache

WORKDIR /var/www/html

COPY index.php index.php
COPY use_case.php use_case.php
COPY src/ src
COPY tests/ tests

EXPOSE 80