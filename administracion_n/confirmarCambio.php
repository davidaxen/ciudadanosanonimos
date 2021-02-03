<?php 
	include('bbdd.php');
	
	if (isset($_REQUEST['oldMail']) && isset($_REQUEST['newMail'])) {
		$oldMail = $_REQUEST['oldMail'];
		$newMail = $_REQUEST['newMail'];

		$sqlchecker="SELECT * FROM validar2 WHERE oldemail=:oldemail AND newemail = :newemail";
		$resultchecker = $conn->prepare($sqlchecker);
		$resultchecker->bindParam(':oldemail', $oldMail);
		$resultchecker->bindParam(':newemail', $newMail);
		$resultchecker->execute();

		if ($resultchecker['mailsended'] == 0) {
			$sqln="SELECT * from validar where email=:email";
			$resultn = $conn->prepare($sqln);
			$resultn->bindParam(':email', $oldMail);
			$resultn->execute();
			$resultadon=$resultn->fetch();

			$emailemp=$resultadon['email'];
			$nombreemp=$resultadon['nombreemp'];
			$nifemp=$resultadon['nifemp'];
			$codvalidarinc=$resultadon['codvalidar'];
			$pass=$resultadon['password'];
			$telcontacto=$resultadon['telcontacto'];
			$idpr=$resultadon['idpr'];
			$pais=$resultadon['pais'];
			$ciudad=$resultadon['localidad'];

			$nombremp2=strtoupper($nombreemp);
			$asunto="CONFIRMACION CAMBIO DE CORREO ELECTRONICO EN CIUDADANOS ANONIMOS";
			//$href="http://control.ciudadanosanonimos.com/administracion_n/activacion1.php?".$codvalidarinc;
		   //$mailto="sguinaldo@yahoo.com";
		   $mailto=$newMail;
		    //$message=$obs;
		    $subject = $asunto;
		    
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
		        <tr><td colspan='3' >Realizaste la confirmacion de cambio de correo electronico en CIUDADANOS ANONIMOS, estas a punto de acabar, solo queda que valides este nuevo correo</td></tr>
		        <tr><td colspan='3' >Para validar este cambio <a href='http://control.ciudadanosanonimos.com/administracion_n/validarCambio.php?oldMail=$oldMail&newMail=$newMail'>PINCHE AQUI</a></td></tr>
		        <tr><td colspan='3' >Se te enviara un mensaje al nuevo correo para validarlo</td></tr>
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
		    

		    // a random hash will be necessary to send mixed content
		    $separator = md5(time());

		    // carriage return type (we use a PHP end of line constant)
		    $eol = PHP_EOL;

		    // main header (multipart mandatory)

		    $headers = 'From: CIUDADANOS ANONIMOS EN ACCION - <info@ciudadanosanonimos.com>' . $eol;

		   $headers .= 'Bcc: ciudadanosanonimos@yahoo.com'  . $eol;

		    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
		    $headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;

	    if (mail($mailto, $subject, $message, $headers)) {
				            
	        $sqln2="UPDATE validar2 SET mailsended = 1 WHERE oldemail=:oldemail AND newemail = :newemail";
			$resultn2 = $conn->prepare($sqln2);
			$resultn2->bindParam(':oldemail', $oldMail);
			$resultn2->bindParam(':newemail', $newMail);
			$resultn2->execute();


			header('Location: https://control.ciudadanosanonimos.com/index.php?idpr=1&msg=Hemos enviado un mensaje a tu nuevo correo para que lo confirmes');
	             
	      } else {
	        echo "<center><table border=1 cellspacing=5 cellpadding=5><tr><th>MENSAJE NO ENVIADO</th></tr></table></center>";
	        echo $mailto."<br>";
	        echo $subject."<br>";
	        echo $message."<br>";
	        echo $headers."<br>";
	      }

		}else{
			header('Location: https://control.ciudadanosanonimos.com/index.php?idpr=1&msg=Ya te hemos enviado un mensaje al nuevo correo');
		}
		
	}

?>