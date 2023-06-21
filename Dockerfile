FROM dptsi/laravel-web-dev:8.0

RUN apk update && apk add --no-cache apk-tools
RUN apk add --no-cache postgresql-dev && \
    docker-php-ext-install pdo_pgsql pgsql