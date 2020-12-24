# PHP
# version 0.0.1
FROM debian:jessie
# install php
RUN set -xe \
    && buildDeps="autoconf file g++ gcc libc-dev make pkg-config re2c ca-certificates \
        curl libedit2 libsqlite3-0 libxml2 xz-utils libcurl4-openssl-dev libedit-dev \
        libsqlite3-dev libssl-dev libxml2-dev" \
    && apt-get update && apt-get install -y $buildDeps --no-install-recommends \
    && rm -rf /var/lib/apt/lists/* \
    && curl -fSL "https://secure.php.net/get/php-7.0.11.tar.gz/from/this/mirror" -o php.tar.gz \
    && tar zxf php.tar.gz \
    && rm php.tar.gz \
    && cd php-7.0.11/ \
# configure and install
    && ./configure --disable-cgi --enable-ftp --enable-mbstring --enable-mysqlnd --with-curl \
        --with-libedit --with-openssl --with-zlib \
    && make \
    && make install

CMD ["php", "-v"]