<?php
$server_name = "localhost"; 
$userame = "root"; 
$password = ""; 
$database_name = "php_database"; 

try{
$con = new PDO("mysql:host=$server_name;dbname=php_database",$userame,$password);
// set the PDO error mode to exception
$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $error_message){
echo 'Error Conection:'.$error_message->getMessage();
}
