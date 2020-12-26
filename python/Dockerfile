# Python
# version 0.0.1
FROM debian:jessie
# install python
RUN buildDeps="autoconf wget gcc tcl-dev tk-dev make ca-certificates \
    && apt-get update && apt-get install -y --no-install-recommends $buildDeps tcl tk \
    && wget -O python.tgz "http://www.python.org/ftp/python/3.8.6/Python-3.8.6.tgz"\
    && mkdir -p /usr/src/python \
    && tar -zxf python.tgz -C /usr/src/python --strip-components=1 \
    && cd /usr/src/python \
    && ./configure --enable-shared \
    && make \
    && make install \
    && cp libpython3.so.1.0 /usr/lib/ \
    && rm -f python.tgz \
    && rm -rf /usr/src/python
    && apt-get remove -y $buildDeps/python

    CMD ["python3","--version"]
