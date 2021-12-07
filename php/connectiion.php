<?php

$server = "localhost";
$username = "root";
$password = "12345678";
$database = "denno";

/*Create database connection with correct username and password*/
$connect = new mysqli($server,$username,$password,$database);

/* Check the connection is created properly*/
if(!$connect){
	die("Could not connect to database!!:" .mysql_error());
}
?>