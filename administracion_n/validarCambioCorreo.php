<?php
	include('bbdd.php');
	include ('../yo.php');

	$url=$_SERVER['REQUEST_URI'];
	$parte=explode('?',$url);

	$output=FALSE;
	$key=hash('sha256', SECRET_KEY);
	$iv=substr(hash('sha256', SECRET_IV), 0, 16);
	$output=openssl_decrypt(base64_decode($parte[1]), METHOD, $key, 0, $iv);
	$parte2des=$output;

	$parte2=explode('#;&',$parte2des);

	$sql="SELECT * from validar where codvalidar=:parte";
	$result=$conn->prepare($sql);
	$result->bindParam(':parte', $parte[1]);
	$result->execute();
	$resultado=$result->fetch();

	$emailbbdd=$resultado['email'];
	$passbbdd=$resultado['password'];
	$validar=$resultado['validar'];
	$idpr=$resultado['idpr'];

	$output=FALSE;
	$key=hash('sha256', SECRET_KEY);
	$iv=substr(hash('sha256', SECRET_IV), 0, 16);
	$output=openssl_decrypt(base64_decode($passbbdd), METHOD, $key, 0, $iv);
	$passbbdd=$output;

	if ($idpr!=null){;

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<title>VALIDACION DE ALTA EN CIUDADANOS ANONIMOS</title>  
<link rel="stylesheet" href="solicitud.css">
</head>

<body class='html' style='background-image:url(../img/iconos/portada_ca.jpg);
  background-repeat: no-repeat;
  background-size: cover;'>
<div class='cuadro'>
<div class='hijo' style='background-color:#f5f5f5'>


  <div class='imgcontainer'>
    <img src='../img/logo-ciud-anonimos.png' width='250px'>
    <h3 style="text-align: center;color:#000">VALIDACION DE ALTA EN CIUDADANOS ANONIMOS</h3>
  </div>
    <h4 style="text-align: center;color:#000">

   <?php 	

	if ($validar!=0){
		echo 'Hemos detectado que ya se ha producido el proceso de alta<br/>';
		echo 'Para acceder pinche  <a href="http://control.ciudadanosanonimos.com?idpr='.$idpr.'" target="_blank">Aqu&iacute; </a><br/>';
	}else{
	    if (($emailbbdd==$parte2[0]) and ($passbbdd==$parte2[1])){
	    	
			$idvalidar=$resultado['idvalidar'];

			$sql="UPDATE validar SET validar='1' where idvalidar=:idvalidar"; 
			$result=$conn->prepare($sql);
			$result->bindParam(':idvalidar', $idvalidar);
			$result->execute();

			$sqlus="UPDATE usuarios SET validar='1' WHERE user = :emailbbdd";
			$resultus=$conn->prepare($sqlus);
			$resultus->bindParam(':emailbbdd', $emailbbdd);
			$resultus->execute();

			echo '<br/>La validaci&oacute;n esta tramitada ya puede acceder pinche <a href="http://control.ciudadanosanonimos.com?idpr='.$idpr.'" target="_blank">Aqu&iacute;</a><br/>';
		}else{

			echo 'Hemos detectado un problema con la validaci&oacute;n vuelva a probar el enlace y si envie un correo a info@ciudadanosanonimos.com<br/>';

		}
	}

?>

</h4>


</div>
</div>
<p style="padding:150px;">
 
</p>

<div class='cuadro' style='background-color:#c5c5c5;height:220px;color:#fff;'>
<div class='hijo2'>


  <div class='imgcontainer'>
<img src='../img/logo-ciud-anonimos.png' width='250px'>
      <br/>CIUDADANOS ANONIMOS EN ACCION
  </div>

  <div class='container' style='column-count:2;background-color:transparent;'>
<br/>
<br/>
<br/>

<br/>
<br/>
<br/>        
  </div>


</div>
</div>

<?php 
} else {;

include ('../cierre.php');

 };
 ?>