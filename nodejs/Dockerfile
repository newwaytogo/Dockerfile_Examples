# Node.js
# version 0.0.1
FROM debian:jessie
# install nodejs
RUN buildDeps="wget" \
    && apt-get update && apt-get install -y --no-install-recommends $buildDeps \
    && wget -O node.tar.gz "https://nodejs.org/dist/latest-v12.x/node-v12.20.0-linux-x64.tar.gz" \
    && tar -zxf node.tar.gz -C /usr/local --strip-components=1 \
    && rm node.tar.gz \
    && apt-get remove -y $buildDeps

    CMD ["node","-v"]

# docker run --rm -t --name python -v ${PWD}/time.py:/time.py newwaytogo/python python3 /time.py

