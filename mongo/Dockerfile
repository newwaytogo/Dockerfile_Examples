# MongoDB
# VERSION 0.0.1
# build image based on ubuntu 16.04
FROM ubuntu:16.04
# Import the public key and install mongodb 3.2
RUN apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv D68FA50FEA312927 \
    && echo "deb http://repo.mongodb.org/apt/ubuntu xenial/mongodb-org/3.2 multiverse" > /etc/apt/sources.list.d/mongodb-org-3.2.list \
    && apt-get update \
    && apt-get install -y mongodb-org
# mount volume
VOLUME /data/db
# expose default port
EXPOSE 27017 28017
# start mongodb
CMD ["mongod", "--httpinterface"]