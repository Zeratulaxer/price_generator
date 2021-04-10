FROM nginx:1.17.6-alpine

RUN rm /etc/nginx/conf.d/default.conf

COPY nginx.conf /etc/nginx/nginx.conf
COPY public/index.php /price_gen/public/index.php

CMD ["nginx", "-g", "daemon off;"]
