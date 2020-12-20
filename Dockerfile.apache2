# Apache Server
# version 0.0.1

# build server image based on ubuntu 18.04
FROM ubuntu:18.04
# update ubuntu and install Apache server
RUN apt-get update && apt-get install -y apache2 && apt-get clean
# enable HTTPS support
RUN /usr/sbin/a2ensite default-ssl
RUN /usr/sbin/a2enmod ssl
# open port 80 and 443
EXPOSE 80
EXPOSE 443

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
