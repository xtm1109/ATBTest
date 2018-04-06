#!/bin/sh
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update  #To get the latest package lists

sudo apt-get install apache2 #Install Apache
sudo apt-get install mysql-server #Install MySQL
sudo apt install php7.0-mysql php7.0-curl php7.0-json php7.0-cgi php7.0 libapache2-mod-php7.0 #Install PHP 7.0

sudo /etc/init.d/apache2 restart #Restart server
