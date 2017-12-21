FROM ubuntu:16.04
MAINTAINER Ross Boswell

RUN apt-get update \
    && apt-get install -y nginx \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && echo "daemon off;" >> /etc/nginx/nginx.conf

ADD build/nginx/config /etc/nginx/sites-available/default
EXPOSE 80
CMD ["nginx"]
