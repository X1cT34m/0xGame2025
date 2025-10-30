FROM node:18.6.0-alpine3.16 

ENV FLAG=0xGame{CSS_Can_Also_Inject}

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.tuna.tsinghua.edu.cn/' /etc/apk/repositories && \
    apk update && \
    apk add --no-cache libexif zlib-dev udev nss ca-certificates chromium && \
    adduser -h /home/bot -D -u 1001 bot

COPY --chown=bot:bot ./src /app
USER bot
WORKDIR /app

RUN yarn install

EXPOSE 3000

CMD node app.js
