# CapstonePlantWhisperers
Website for users to interface with the hardware needed to take care of the plants

To deploy PHP donwload XAMPP. 

XAMPP is an open source package that is widely used for PHP development. XAMPP contains MariaDB, PHP, and Perl; it provides a graphical interface for SQL (phpMyAdmin), making it easy to maintain data in a relational database.

If you have not installed XAMPP, please refer to XAMPP-setup to install and set up XAMPP.

Assuming that you have already set up XAMPP

Start the PHP environment ("Apache Web Server")
Reminder: be sure to stop the server when you are done. Leaving the servers running consumes energy and may later prevent the servers from starting.

Deploy a PHP app
Assume your project is named  cs4640,  create a folder called  cs4640.  In the  cs4640  folder, create a blank file named  helloworld.php. Paste the following contents in the file
<?php echo "Hello World @^_^@" ?>
Create a directory for your project in  XAMPP/htdocs/. Put  helloworld.php  file under  XAMPP/htdocs/cs4640/
Access an app
Be sure to start your web server. To access your app, open a web browser and enter a URL 
    http://localhost/cs4640/helloworld.php 
