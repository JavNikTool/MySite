FROM trafex/php-nginx:latest AS php-nginx-pdo
USER root
RUN apk add --no-cache \
  php83-pdo \
  php83-pdo \
  php83-pdo_pgsql
USER nobody