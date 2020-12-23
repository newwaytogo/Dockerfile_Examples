# OpenJDK JRE
# version 0.0.1
FROM debian:buster
# install java jdk
RUN  apt-get update \
    && echo 'deb http://httpredir.debian.org/debian buster-backports main' > /etc/apt/sources.list.d/buster-backports.list \
    && apt-get update \
    && apt-get install -y openjdk-11-jre \
    && rm -rf /var/lib/apt/lists/* \

CMD ["java", "-version"]
