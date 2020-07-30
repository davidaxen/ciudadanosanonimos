<?php 
include ('../sms/IXR_Library.php'); //Libreria para el uso de xml-rpc

$url_conexion='https://www.mensajerianegocios.movistar.es/SrvConexion';

$login='1C6B139E-SGUINALDO'; //Nombre de usuario
$password='Jas170174#'; //Contraseña
$miremite='SMARTCBC';

$client = new IXR_Client($url_conexion);

$valorv='2536525';
$texto = 'Su codigo de verificación de '.$miremite.' es '.$valorv;

//Ejecuta el metodo rpc
$client->query ('MensajeriaNegocios.enviarSMS', $login, $password,
array(array('695175000',$texto,$miremite)));


echo '<pre>';
print_r($client->getResponse());
echo '</pre>';
?>