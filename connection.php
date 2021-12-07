<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "muringato";


/*Create database connection with correct username and password*/
$conn = new mysqli($server,$username,$password,$database);

/* Check the connection is created properly*/
if(!$conn){
	die("Could not connect to database!!:" .mysql_error());
}
?>
