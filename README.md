# CapstonePlantWhisperers
Website for users to interface with the hardware needed to take care of the plants

To deploy PHP donwload XAMPP. 

XAMPP is an open source package that is widely used for PHP development. XAMPP contains a graphical interface for SQL (phpMyAdmin), making it easy to maintain data in a relational database.

If you have not installed XAMPP, please refer to XAMPP-setup to install and set up XAMPP.

Assuming that you have already set up XAMPP

Start the PHP environment ("Apache Web Server")
or press Start All
Reminder: be sure to stop the server when you are done. Leaving the servers running consumes energy and may later prevent the servers from starting.

Type localhost into web browser then go to phpMyAdmin then click new make a database called project with the password project

Once created click on SQL tab then copy and paste text below

CREATE TABLE plant (
    plant_type varchar(50),
    plant_name varchar(50),
    plant_light varchar(100),
    min_temp int(11),
    max_temp int(11),
    plant_water varchar(100),
    plant_image varchar(100),
    PRIMARY KEY(id)
);

Deploy a PHP app
The project is in a folder named PlantWebsite,
inside of  XAMPP/htdocs/ directory to access the app
Be sure to start your web server. To access your app, open a web browser and enter a URL 
    http://localhost/PlantWebsite/home.php


