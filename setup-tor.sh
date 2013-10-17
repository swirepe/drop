#!/usr/bin/env bash

function add_torrc {
    echo "$1" | sudo tee --append /etc/tor/torrc
}

$HIDDEN_SERVICE_DIR=$HOME/drop_hidden_service
mkdir $HIDDEN_SERVICE_DIR
sudo chmod -R a+rw $HIDDEN_SERVICE_DIR

add_torrc "## added on $(date) by drop/setup-tor.sh"
add_torrc "## Adding in a hidden service"
add_torrc "HiddenServiceDir $HIDDEN_SERVICE_DIR"
add_torrc "HiddenServicePort 80 127.0.0.1:8041"
