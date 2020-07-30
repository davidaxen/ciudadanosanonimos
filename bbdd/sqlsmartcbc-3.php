<?php
$server = "localhost";
$username="bbddsmartcbc";
$password="Jas170174@#";
$dbname ="bbddciudadanos";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn-> connect_error){
    die("Connection failed:  " . $conn->connect_error);
}
?>