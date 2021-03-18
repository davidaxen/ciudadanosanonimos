<?php 
	include('../bbdd.php');
	$sqltusuario = "SELECT * FROM usuarios";
	$resultusuario=$conn->prepare($sqltusuario);
	$resultusuario->execute();
	$resultadousuario = $resultusuario->fetchAll();

	foreach ($resultadousuario as $rowmos){

		$email=$rowmos['user'];
		$nombreemp=$rowmos['nombreemp'];
		$nombremp2=strtoupper($nombreemp);

		$asunto="ENVIO DE CORREO SEMANAL";
		$subject = $asunto;

		$mailto = $email;
			    
		$message = "
			<html>
			<head>
			<title>$asunto</title>
			</head>
			<body><center>
			<table>
			<tr><td colspan='3' align='center'><img src='http://control.ciudadanosanonimos.com/img/logo-ciud-anonimos.png' width='250px'></td></tr>
			<tr><td colspan='3' >Bienvenidos al Portal de CIUDADANOS ANONIMOS</td></tr>
			<tr><td colspan='3' >Hola $nombremp2 :</td></tr>
			<tr><td colspan='3' >HAY PREGUNTAS NUEVAS</td></tr>
			<tr><td colspan='3' style='font-size:8px' ><p>&nbsp;</p>
			Para m&aacute;s informaci&oacute;n puedes contactar con el Servicio de Atenci&oacute;n Directa.
			Aviso: Este correo ha sido generado de forma autom&aacute;tica. Por favor, no responda a este mensaje. 
			Para comunicar cualquier tipo de sugerencia, duda o comentario, utilice el apartado 'Contacta con nosotros' 
			en http://www.ciudadanosanonimos.com. Este documento est&aacute; dirigido exclusivamente al destinatario especificado. 
			La informaci&oacute;n contenida es confidencial y está legalmente protegida. Si usted recibe este mensaje por error, 
			por favor comun&iacute;quelo inmediatamente al remitente y elim&iacute;nelo ya que usted no está autorizado al uso, revelaci&oacute;n, 
			distribuci&oacute;n, impresi&oacute;n o copia de toda o alguna parte de la informaci&oacute;n contenida.
			</td></tr>
			</table>
			</center>
			</body>
			</html>";     

		// carriage return type (we use a PHP end of line constant)
		$eol = PHP_EOL;
		// main header (multipart mandatory)
		$headers = 'From: CIUDADANOS ANONIMOS EN ACCION - <info@ciudadanosanonimos.com>' . $eol;
		$headers .= 'Bcc: ciudadanosanonimos@yahoo.com'  . $eol;
		$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
		$headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;


		//COMENTAR O DESCOMENTAR LA SIGUIENTE LINEA PARA QUE SE ENVIE LOS CORREOS
		//mail($mailto, $subject, $message, $headers);;

		 

	}

 ?>