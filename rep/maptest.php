<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "denno";

// open the database
try {
    $db = new PDO("mysql:host=$server;dbname=$database", $username, $password);
} catch(PDOException $e) {
    // send the PDOException message
    $ajxres=array();
    $ajxres['resp']=40;
    $ajxres['dberror']=$e->getCode();
    $ajxres['msg']=$e->getMessage();
    sendajax($ajxres);
}

try {
    $sql="SELECT longitude, latitude, humidity, pressure, temperature FROM data";
    $stmt = $db->prepare($sql);
    $stmt->execute();
} catch(PDOException $e) {
    print "db error ".$e->getCode()." ".$e->getMessage();
}

$ajxres=array(); // place to store the geojson result
$features=array(); // array to build up the feature collection
$ajxres['type']='FeatureCollection';

// go through the list adding each one to the array to be returned   
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $prop=array();
    $lat['latitude']=$row['latitude'];
    $lng['longitude']=$row['longitude'];
    $hum['humidity']=$row['humidity'];
    $pres['pressure']=$row['pressure'];
    $temp['temperature']=$row['temperature'];
    $f=array();
    $geom=array();
    $coords=array();

    $geom['type']='Point';
    $coords[0]=floatval($lng);
    $coords[1]=floatval($lat);

    $geom['coordinates']=$coords;
    $f['type']='Feature';
    $f['geometry']=$geom;
    $f['properties']=$prop;

    $features[]=$f;

}

// add the features array to the end of the ajxres array
$ajxres['features']=$features;
// tidy up the DB
$db = null;
sendajax($ajxres); // no return from there

function sendajax($ajx) {
    // encode the ajx array as json and return it.
    $encoded = json_encode($ajx);
    exit($encoded);
}
 
?>