FROM php:8.1-cli

WORKDIR /var/www/html
COPY . .

RUN echo "0xGame{1a903b96-173a-8b3d-8a37-a81934dc4187_xxe114514}" > /flag

EXPOSE 8000
# 启动内置 server
CMD ["php", "-S", "0.0.0.0:8000"]