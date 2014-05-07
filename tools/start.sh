


# Install Wordpress
cd /usr/share/nginx/
wget http://wordpress.org/wordpress-${WP_VERSION}.tar.gz 
 cd /usr/share/nginx/ && tar xvf wordpress-${WP_VERSION}.tar.gz && rm wordpress-${WP_VERSION}.tar.gz
 cp -a /usr/share/nginx/wordpress/. /usr/share/nginx/www
# rm -rf /usr/share/nginx/www/*
# cp -rf /usr/share/nginx/wordpress/* /usr/share/nginx/www/*
 chown -R www-data:www-data /usr/share/nginx/www



 echo "starting MySQL server..."
/usr/bin/mysqld_safe &
 sleep 30
 

  chown www-data:www-data /usr/share/nginx/www/wp-config.php

echo "setting root password"
  mysqladmin -u root password password
 echo "create database"  
  mysql -uroot -ppassword -e "CREATE DATABASE wordpress; GRANT ALL PRIVILEGES ON wordpress.* TO 'wordpress'@'localhost' ; FLUSH PRIVILEGES;"
  killall mysqld


# start all the services
/usr/local/bin/supervisord  &
#sudo service supervisor start

rm wordpress/ -rf

echo -n "Enter a number between 1 and 3 inclusive > "
