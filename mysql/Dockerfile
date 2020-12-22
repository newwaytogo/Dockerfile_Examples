# MySQL
# version 0.0.1
FROM debian:jessie
# add account
RUN groupadd -r mysql && useradd -r -g mysql mysql
# add the MySQL APT repository for 
RUN  echo "deb http://repo.mysql.com/apt/debian jessie mysql-5.7" > /etc/apt/sources.list.d/mysql.list \
    && apt-key adv --keyserver ha.pool.sks-keyservers.net --recv-keys A4A9406876FCBD3C456770C88C718D3B5072E1F5 \
    && apt-get update \
    && apt-get install -y --no-install-recommends perl pwgen
# set the debconf variables and then install MySQL noninteractively
RUN { \
    echo mysql-community-server mysql-community-server/root-pass password ''; \
    echo mysql-community-server mysql-community-server/re-root-pass password ''; \
    } | debconf-set-selections \
    && apt-get install -y mysql-server="5.7.30-1debian8" \
    && mkdir -p /var/lib/mysql /var/run/mysqld \
    && chown -R mysql:mysql /var/lib/mysql /var/run/mysqld \
    && chmod 777 /var/run/mysqld
# mount MySQL path with volume
VOLUME /var/lib/mysql
# open port 3306
EXPOSE 3306

CMD ["mysqld", "--user", "mysql"]
