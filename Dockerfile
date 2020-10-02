FROM php:7.4-fpm

COPY . /application
WORKDIR /application