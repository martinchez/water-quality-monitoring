<?php
include "connection.php";
//sql statement to select
$sql ="SELECT id, longitude, latitude, humidity ,pressure, temperature FROM data" ;
$result = $conn->query($sql);

if ($result->num_rows >0) {
    # we output that data here
    while ($row = $result->fetch_assoc()) {
        echo "id: " .$row["id"]. "- Longitude: " .$row["longitude"]. "- latitude: " .$row["latitude"]. "- humidity: " .$row["humidity"]. "- pressure: " .$row["pressure"]. "- temperature: " .$row["temperature"]."<br>";
    }
}else {
    echo "no results";
}
$conn->close();
?>