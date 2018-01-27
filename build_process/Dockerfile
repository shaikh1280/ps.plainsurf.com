FROM ubuntu:latest
LABEL description="Plainsurf"
RUN apt-get update
RUN apt-get install openssh-server -y
RUN apt-get install apache2 -y
RUN useradd -m dev 
EXPOSE 80/tcp
