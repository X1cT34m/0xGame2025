FROM php:7.4-apache

RUN apt-get update && \
    apt-get install -y libxml2-dev && \
    rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install soap

RUN echo "extension=soap.so" > /usr/local/etc/php/conf.d/docker-php-ext-soap.ini

COPY --from=redis:3.2.1 /usr/local/bin/redis-server /usr/local/bin/redis-server

RUN mkdir -p /etc/redis && \
    echo "daemonize no" >> /etc/redis/redis.conf && \
    echo "port 6379" >> /etc/redis/redis.conf && \
    echo "bind 127.0.0.1" >> /etc/redis/redis.conf && \
    echo "requirepass 20251206" >> /etc/redis/redis.conf && \
    echo "protected-mode no" >> /etc/redis/redis.conf && \
    echo "dir /tmp" >> /etc/redis/redis.conf

COPY index.php /var/www/html/

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 777 /var/www/html

ENV Flag=0xGame{SoapClient_SSRF_Attack_Redis} 

COPY start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 80 6379

CMD ["/start.sh"]