#!/bin/bash
apt-get update
sudo service apache2 restart
composer install --prefer-dist
