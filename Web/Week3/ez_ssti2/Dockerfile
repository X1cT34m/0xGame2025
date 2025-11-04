FROM node:16

WORKDIR /App

COPY App/ .

RUN npm install

RUN chown -R node:node /App

ENV FLAG=0xGame{Do_Not_Templ_Ejs_Injection}

EXPOSE 80

CMD ["node", "App.js"]
