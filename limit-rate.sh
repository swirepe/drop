#!/usr/bin/env bash
# http://www.cyberciti.biz/tips/lighttpd-set-throughput-connections-per-ip.html
IPT=/sbin/iptables
# Max connection in seconds
SECONDS=100
# Max connections per IP
BLOCKCOUNT=10
# Lighttpd for this project uses port 8041
PORT=8041
# default action can be DROP or REJECT 
DACTION="DROP"
$IPT -I INPUT -p tcp --dport ${PORT} -i eth0 -m state --state NEW -m recent --set
$IPT -I INPUT -p tcp --dport ${PORT} -i eth0 -m state --state NEW -m recent --update --seconds ${SECONDS} --hitcount ${BLOCKCOUNT} -j ${DACTION}


