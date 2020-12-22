# MongoDB
# VERSION 0.0.1
# build image based on ubuntu 18.04
FROM ubuntu:18.04
# update and install required tools
RUN apt-get update && apt-get install gnupg wget curl -y
# Import the public key used by the package management system
RUN wget -qO - https://www.mongodb.org/static/pgp/server-4.4.asc | apt-key add -
# Create a list file for MongoDB 
RUN echo "deb [ arch=amd64,arm64 ] https://repo.mongodb.org/apt/ubuntu bionic/mongodb-org/4.4 multiverse" | tee /etc/apt/sources.list.d/mongodb-org-4.4.list
# To prevent unintended upgrades, you can pin the package at the currently installed version
RUN echo "mongodb-org-server hold" | dpkg --set-selections \
    && echo "mongodb-org-shell hold" | dpkg --set-selections \
    && echo "mongodb-org-mongos hold" | dpkg --set-selections \
    && echo "mongodb-org-tools hold" | dpkg --set-selections
# Install the MongoDB packages
RUN apt-get update && apt-get install -y mongodb-org=4.4.2 mongodb-org-server=4.4.2 mongodb-org-shell=4.4.2 mongodb-org-mongos=4.4.2 mongodb-org-tools=4.4.2
# mount volume
VOLUME /data/db
# expose default port
EXPOSE 27017 28017
# start mongodb
CMD ["mongod", "--httpinterface"]