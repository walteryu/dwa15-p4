#!/bin/bash
# digital ocean droplet, dwa-lamp-14.04 IP: 107.170.222.81

# ssh root@107.170.222.81
# apt-get update
# sudo apt-get install git

# cd /usr/local/bin
# curl -sS https://getcomposer.org/installer | sudo php
# sudo mv composer.phar composer

# sudo a2enmod rewrite
# sudo service apache2 restart
# composer install --prefer-dist

# set permissions inside from within app folder
# sudo chown -R www-data storage
# sudo chown -R www-data bootstrap/cache
# sudo service apache2 restart

# update .env file and generate application key

# APP_ENV=production
# APP_DEBUG=false
# APP_KEY=longrandomstring

# DB_HOST=localhost
# DB_DATABASE=homestead
# DB_USERNAME=homestead
# DB_PASSWORD=secret

# CACHE_DRIVER=file
# SESSION_DRIVER=file
# QUEUE_DRIVER=sync

# MAIL_DRIVER=smtp
# MAIL_HOST=mailtrap.io
# MAIL_PORT=2525
# MAIL_USERNAME=null
# MAIL_PASSWORD=null
# MAIL_ENCRYPTION=null

# php artisan key:generate

# update apache localhost file
# vi /etc/apache2/sites-enabled/000-default.conf

# debugging do-apache permission settings...
