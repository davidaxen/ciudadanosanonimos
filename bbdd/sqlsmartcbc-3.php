<?php
/*$server = "localhost";
$username="bbddsmartcbc";
$password="Jas170174@#";
$dbname ="bbddciudadanos";*/

$server = "localhost";
$username="root";
$password="";
$dbname ="bbddciudadanos";

try{
$conn = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Conexion realizada";

}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}


/*$conn = new mysqli($server, $username, $password, $dbname);

if ($conn-> connect_error){
    die("Connection failed:  " . $conn->connect_error);
}*/
?>