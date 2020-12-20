# Nginx Server
# version 0.0.1

# build server image based on debian:buster
FROM debian:buster
# update debian and install Nginx server
RUN apt-get update && apt-get install --no-install-recommends --no-install-suggests -y ca-certificates nginx

# open port 80 and 443
EXPOSE 80 443

CMD ["nginx", "-g", "daemon off;"]
