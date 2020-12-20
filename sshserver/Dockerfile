# SSH Server
# version 0.0.1

# build server image based on ubuntu 18.04
FROM ubuntu:18.04
# update ubuntu and install OpenSSH server
RUN apt-get update && apt-get install -y openssh-server
# make a directory for OpenSSH server 
RUN mkdir /var/run/sshd
# set up root account password
RUN echo 'root:loginssh' | chpasswd
# Permit root login
RUN sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config
# open port 22
EXPOSE 22

CMD ["/usr/sbin/sshd", "-D"]