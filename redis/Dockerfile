# Redis
# version 0.0.1
FROM debian:jessie
# install redis
RUN  apt-get update \
    && buildDeps='gcc make libc-dev wget' \
    && apt-get install -y --no-install-recommends $buildDeps \
    && cd /tmp \
    && wget -O redis.tgz "http://download.redis.io/releases/redis-3.2.3.tar.gz" \
    && tar zxf redis.tgz \
    && cd redis-3.2.3/ \
    && make \
    && make install \
    && cd / \
    && rm -rf /tmp/redis-3.2.3 \
    && apt-get purge -y --auto-remove $buildDeps
# open port 6379
EXPOSE 6379

CMD ["redis-server"]