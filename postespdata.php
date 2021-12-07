<?php
//values
$server = "localhost";
$username = "root";
$password = "";
$database = "muringato";



$latitude=$longitude=$humidity=$temperature=$pressure=0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$latitude = cleanInput($_POST["latitude"]);
	$longitude = cleanInput($_POST["longitude"]);
	$temperature = cleanInput($_POST["temperature"]);
	$humidity = cleanInput($_POST["humidity"]);
	$pressure = cleanInput($_POST["pressure"]);
	#echo "value of latitude is: " .$latitude;
	$squery = "SELECT * FROM water_quality";
	$sqlquery ="INSERT INTO water_quality (`id`, `latitude`, `longitude`, `ph`, `ec`, `temperature`, `turbidity`, `date& time`) VALUES (NULL,'$latitude','$longitude','$ph','$ec','$temperature','$turbidity',NOW());"
	$sqlquery = "INSERT INTO data (id,latitude,longitude,humidity,pressure,temperature,date_time) VALUES (NULL,'$latitude','$longitude','$humidity','$pressure','$temperature',NOW())";
	//create connection
	$connect = new mysqli($server,$username,$password,$database);
	//send to db
	if ($connect->query($sqlquery) == TRUE){
		echo "new record added successfuly";
	}
	else{
		echo "Error:" . $connect->error;
	}
	$connect->close();

}
else {
	echo "No data inserted to db!!";
}

function cleanInput($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
