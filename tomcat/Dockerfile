# Tomcat Server
# version 0.0.1

# build server image based on debian buster
FROM debian:buster
# update and install Tomcat server 9 (stable version)
RUN apt-get update && apt-get install --no-install-recommends --no-install-suggests -y default-jdk tomcat9

# open port 8080
EXPOSE 8080

CMD ["/usr/share/tomcat9/bin/catalina.sh", "run"]
