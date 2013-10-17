#!/usr/bin/env bash

sagi -y lighttpd memcache php5-xcache php5-memcache php5-cgi php5-common php5-gd php5-cli

sudo cp lighttpd.conf /etc/lighttpd/lighttpd.conf

sudo lighty-enable-mod fastcgi
sudo lighty-enable-mod fastcgi-php
sudo service lighttpd force-reload

chmod +x setup-tokenservice.sh
./setup-tokenservice.sh
