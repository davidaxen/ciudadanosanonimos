<?php

include('../../bbdd/sqlsmartcbc-3.php');
extract($_COOKIE);
extract($_POST);
extract($_GET);

$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";

$result31=$conn->query($sql31);
$resultado31=$result31->fetch();

/*$result31=mysqli_query($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);*/
$nc=$resultado31['mensaje'];

$sql32="select * from menuserviciosimg where idempresa='".$ide."'";
$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

/*$result32=mysqli_query($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);*/

$ic=$resultado32['mensaje'];
?>
