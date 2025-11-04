FROM php:7.4-apache

WORKDIR /var/www/html

USER root

RUN mkdir -p /var/www/html/primary /var/www/html/marstream

RUN chmod -R 777 /var/www/html/primary /var/www/html/marstream

COPY index.html /var/www/html
COPY asdback.php /var/www/html
COPY robots.txt /var/www/html
COPY start.sh /

RUN chmod 744 /start.sh && \
    chmod 755 /var/www/html && \
    echo 0xGame{6dbdb141-9c93-44e8-aa8c-3b6dda89612d} > /flag && \
    chmod 700 /flag && \
    chown root:root /flag

RUN useradd -r -U Pureble

EXPOSE 80

ENTRYPOINT ["/start.sh"]

RUN sed -i "s/export APACHE_RUN_USER=www-data/export APACHE_RUN_USER=Pureble/" /etc/apache2/envvars && \
    sed -i "s/export APACHE_RUN_GROUP=www-data/export APACHE_RUN_GROUP=Pureble/" /etc/apache2/envvars
