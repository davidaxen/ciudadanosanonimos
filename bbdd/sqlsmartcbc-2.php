<?php

/*$server = "localhost";
$username="smartcbc";
$password="Jas170174@#";
$dbname ="bbddsmartcbc";*/

$server = "localhost";
$username="root";
$password="";
$dbname ="bbddciudadanos";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn-> connect_error){
    die("Connection failed:  " . $conn->connect_error);
}
$sql="select * from usuarios";
$result=mysqli_query ($sql) or die ("Invalid result idempresas");


//$sql = "SELECT * FROM usuarios";
//$result = $conn->query($sql);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["user"] . $row["pass"] . "<br>";
    }
}else {
    echo "More posts coming soon!";
}

$conn->close();
?>
<?
/*
date_default_timezone_set('Europe/Madrid');
$dbh=mysqli_connect ("185.50.44.146", "bbddsmartcbc", "Jas170174#") or die ('I cannot connect to the database because: ' . mysqli_connect_error());
mysql_select_db ("bbddsmartcbc");
mysql_query("SET CHARACTER SET latin1");
mysql_query("SET NAMES latin1");
extract($_COOKIE);
extract($_POST);
extract($_GET);
*/
//localhost:3306
?>