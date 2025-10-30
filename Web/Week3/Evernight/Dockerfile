FROM node:18.6.0-alpine3.16 

USER root

WORKDIR /app

COPY package*.json ./

ENV FLAG=0xGame{Back_to_Earth_in_Evernight}

RUN npm install --omit=dev

COPY . .

RUN touch passwd.txt && chmod 644 passwd.txt

EXPOSE 80

CMD ["node", "app.js"]