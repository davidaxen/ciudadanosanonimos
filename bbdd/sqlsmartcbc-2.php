<?php

/*$server = "localhost";
$username="smartcbc";
$password="Jas170174@#";
$dbname ="bbddsmartcbc";*/

$server = "localhost";
$username="root";
$password="";
$dbname ="bbddciudadanos";

try{

	$conn = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
	echo "Error al conectar a la BBDD: " . $e->getMessage();
}


/*$conn = new mysqli($server, $username, $password, $dbname);

if ($conn-> connect_error){
    die("Connection failed:  " . $conn->connect_error);
}*/
$sql="select * from usuarios";
$temp=$conn->query($sql);
$temp2=$conn->query($sql);
$result=$temp->fetchAll();
$rows=count($result);
//$result=mysqli_query ($sql) or die ("Invalid result idempresas");


//$sql = "SELECT * FROM usuarios";
//$result = $conn->query($sql);

if($rows > 0) {
    while($row = $temp2->fetch()) {
        echo $row["user"] . $row["pass"] . "<br>";
    }
}else {
    echo "More posts coming soon!";
}

$conn=null;
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