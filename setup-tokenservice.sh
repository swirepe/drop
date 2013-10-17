#!/usr/bin/env bash
sagi golang
# http://raspberrypi.stackexchange.com/questions/4583/can-i-use-my-ubuntu-desktop-to-cross-compile-the-go-language-environment-for-my
GOARM=5 go build tokenservice.go
sudo mkdir -p /usr/share/token
sudo cp words.txt /usr/share/token/words.txt
sudo chmod -R a+rx tokenservice*
sudo cp tokenservice /usr/local/bin/tokenservice
sudo cp tokenservice-service /etc/init.d/tokenservice
sudo /etc/init.d/tokenservice start
