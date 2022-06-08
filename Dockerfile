
FROM node:16

WORKDIR /usr/src/app

ENV NODE_ENV=development
ENV PORT=3000

RUN npm install -g npm@latest

EXPOSE 3000

CMD [ "sh", "-c", "npm install --quiet && npm run start:dev" ]
