# Memcached
# version 0.0.1
FROM debian:jessie
# add account
RUN groupadd -r memcached && useradd -r -g memcached memcached
# install memcached
RUN  apt-get update \
    && buildDeps='gcc make perl libc6-dev libevent-dev wget' \
    && apt-get install -y --no-install-recommends $buildDeps \
    && cd /tmp \
    && wget -O memcached.tar.gz "http://www.memcached.org/files/memcached-1.4.31.tar.gz" \
    && tar -xvf memcached.tar.gz \
    && cd memcached-1.4.31/ \
    && ./configure \
    && make \
    && make install \
    && cd / \
    && rm -rf /tmp/memcached-1.4.31 \
    && apt-get purge -y --auto-remove $buildDeps
# run memcached with new ly built account
USER memcached
# open port 11211
EXPOSE 11211

CMD ["memcached"]
