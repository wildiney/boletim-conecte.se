FROM node:10
WORKDIR /app

COPY ./AppConectese/package*.json .
EXPOSE 4200
RUN npm install && npm install -g @angular/cli@1.7.3
COPY . .


CMD ["ng","serve","--host", "0.0.0.0", "--disable-host-check"]
