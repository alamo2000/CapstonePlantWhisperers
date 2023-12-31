<?php
// Remember to start the database server (or GCP SQL instance) before trying to connect to it

////////////////////////////////////////////
/** PHP (on Google Standard App Engine) connect to MySQL instance (GCP) **/

$username = 'project';
$password = 'project';     
$host = 'localhost:3306';   
$dbname = 'project';
$dsn = "mysql:host=$host;dbname=$dbname";

////////////////////////////////////////////

/** connect to the database **/
try 
{
   $db = new PDO($dsn, $username, $password);
   
   // dispaly a message to let us know that we are connected to the database 
   echo "You are connected to the database --- $dsn ";
}
catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
{
   // Call a method from any object, use the object's name followed by -> and then method's name
   // All exception objects provide a getMessage() method that returns the error message 
   $error_message = $e->getMessage();        
   echo "<p>An error occurred while connecting to the database: $error_message </p>";
}
catch (Exception $e)       // handle any type of exception
{
   $error_message = $e->getMessage();
   echo "<p>Error message: $error_message </p>";
}

?>