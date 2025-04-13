FROM nginx:1.27.4

RUN apt update && apt install -y certbot python3-certbot-nginx

COPY nginx.conf /etc/nginx/nginx.conf
COPY ./www /var/www/html/www
COPY ./blog /var/www/html/blog

EXPOSE 80 443
