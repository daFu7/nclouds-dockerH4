FROM nginx:1.21.6
WORKDIR /app
RUN apt-get update && apt-get upgrade -y
#RUN apt install php -y
#RUN php -v
RUN apt install -y php7.4-mysql
RUN apt install php-fpm -y
COPY ./mySite/index.php /usr/share/nginx/html
EXPOSE 80
