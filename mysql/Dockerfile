# MySQL
# version 0.0.1

# build image based on ubuntu 18.04
FROM ubuntu:18.04
# add account
RUN groupadd -r mysql && useradd -r -g mysql mysql
# apt update and install wget
RUN apt-get update && apt-get install -y apt-utils wget
# add the MySQL APT repository for 
RUN wget https://dev.mysql.com/get/mysql-apt-config_0.8.16-1_all.deb
# Verifying the MD5 checksum
RUN echo 'f6a7c41f04cc4fea7ade285092eea77a mysql-apt-config_0.8.16-1_all.deb' > file && md5sum -c file \
    && apt-get update && apt-get install -y --no-install-recommends perl pwgen
# set the debconf variables and then install MySQL noninteractively
RUN debconf-set-selections <<< "mysql-community-server mysql-community-server/root-pass password mypassword" \
    && debconf-set-selections <<< "mysql-community-server mysql-community-server/re-root-pass password mypassword" \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y mysql-server \
    && mkdir -p /var/lib/mysql /var/run/mysqld \
    && chown -R mysql:mysql /var/lib/mysql /var/run/mysqld \
    && chmod 777 /var/run/mysqld
# mount MySQL path with volume
VOLUME /var/lib/mysql
# open port 3306
EXPOSE 3306

CMD ["mysqld", "--user", "mysql"]
