Instruction for Installation:

For setup in linux:

Write following commands in terminal, to install apache2, php5 and mysql.

>> sudo apt-get install apache2
>> sudo apt-get install php5
>> sudo apt-get install mysql


Type following command in terminal to open mysql to create database:

>> mysql -u root -p
** enter password **

>> mysql> create database sampark

(In below command provide sampark.sql with full path)
>> mysqldump -u root -p sampark < sampark.sql


Before opening site make following changes in connect.php

$server = 'localhost';
$user = 'MYSQL_USERNAME';  //usually root
$pass = 'YOUR_MYSQL_PASSSWORD'; // usually root

change the following variables as follows

$_SESSION['LINK_INDEX'] = "http://localhost/SITE_FOLDER/index.php";
$_SESSION['LINK_DONORHOME'] = "http://localhost/SITE_FOLDER/donorhome.php";
$_SESSION['LINK_NGOHOME'] = "http://localhost/SITE_FOLDER/ngohome.php";

Place your site folder under following path:

/var/www/

Change the permission of /var/www//SITE_FOLDER/img folder to writable 

Open following link into your browser: http://localhost/SITE_FOLDER


----------------------------------------------------------------------------------------------

For setup in windows:

Install xampp
(Download from https://www.apachefriends.org/download.html)

Open following link in browser : http://localhost/phpmyadmin/
create database: sampark
import database: sampark.sql

put website folder in htdocs folder of xampp installation directory.

Before opening site make following changes in connect.php

$server = 'localhost';
$user = 'MYSQL_USERNAME';  //usually root
$pass = 'YOUR_MYSQL_PASSSWORD'; // usually root

change the following variables as follows

$_SESSION['LINK_INDEX'] = "http://localhost/SITE_FOLDER/index.php";
$_SESSION['LINK_DONORHOME'] = "http://localhost/SITE_FOLDER/donorhome.php";
$_SESSION['LINK_NGOHOME'] = "http://localhost/SITE_FOLDER/ngohome.php";
/var/www/SITE_FOLDER

Open following link into your browser: http://localhost/SITE_FOLDER


