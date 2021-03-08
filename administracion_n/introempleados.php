<?php 
include('bbdd.php');

$sql2="select id from usuarios where user='".$email2."'"; 
//echo $sql2;
$result2=$conn->query($sql2);
$row2=count($result2->fetchAll());

/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result clientes");
$row2=mysqli_num_rows($result2);*/

if ($row2==0){;




$useremp=$email2;
$passnif=$clave2;

/*
include ('../yo.php');

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($passnif, METHOD, $key, 0, $iv);
			$passnif=base64_encode($output);
*/

$sql2 = "INSERT INTO usuarios (user,password,tusuario,modulo) VALUES ('$useremp','$passnif','3','41')";
//echo $sql2;
$result2=$conn->exec($sql2);

$sql3 = "UPDATE usuarios JOIN validar ON usuarios.user=validar.email SET usuarios.diaentrada=validar.diaentrada, usuarios.nombreemp=validar.nombreemp, usuarios.nifemp=validar.nifemp, usuarios.percontacto=validar.percontacto, usuarios.telcontacto=validar.telcontacto, usuarios.pais=validar.pais, usuarios.localidad=validar.localidad, usuarios.provincia=validar.provincia, usuarios.cp=validar.cp WHERE validar.email = ".$useremp;
$conn->exec($sql3);
//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result usuarios");

echo 'LOS DATOS HAN SIDO INTRODUCCIDOS';
}else{;

echo "Ya esta dado de alta el Ciudadano Anonimos, con ese correo<br><a href='http://control.ciudadanosanonimos.com'>Acceso al sistema</a>";
}; 


?>
