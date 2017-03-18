# RB_DNS_SERVICE
This is a easy to use http based redirect script, to forward your browser to a specific ip.
The stored ip is changable via a http request to change the destination.
The advantage of this project requires only a mysql database and a webserver with php, so you dont need a domain with subdomains, a dns server. 
So its a simple alternative to a real dyndns service.

# SERVER SETUP

## BASIC SETUP
* install a mysql server [`apt-get install mysql-server mysql-client`] 
* install a webserver like Apache [`apt-get install apache2`]
* install php (>= 5)[`apt-get install php5 libapache2-mod-php5`]
* restart the webserver [`/etc/init.d/apache2 restart`]
* goto `cd /var/www/html` and clone this repo `git clone https://github.com/RBEGamer/RB_DNS_SERVICE.git`

## SETUP THE MYSQL DATABASE
To setup the database you need to create some tables.
I have added a sql dump for easy install!
Please run in a mysql promt the `/src/rb_dns_server/sql_dump/`

## SETUP THE DATABASE CONFIGURATION
To setup your database login information, please open the `<clone_dir>/src/rb_dns_server/db_conf.php` and set the username and the password.

## READY
So, your RB_DNS_SERVER is ready to use, all needed configurations are done.
Now you can run the client on you iot devices to register a device.


# IMAGES
## WEB INTERFACE V0.2
![Gopher image](/documentation/images/webui_v2.png)


# TODO

## SERVER TODO
* add nickname support
* add bind9 zone file generator from sql
* add register vars

## CLIENT TODO
* add go client
* add arduino esp client
* add cpp client class
* add swift client class
