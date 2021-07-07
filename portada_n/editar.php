<?php   
	include('bbdd.php');
	$telfPrincipal = $_REQUEST['telfPrincipal'];
	$nombrePrincipal = $_REQUEST['nombrePrincipal'];
	$mailPrincipal = $_REQUEST['mailPrincipal'];

	if (isset($_REQUEST['nombre'])) {
		$nombre = $_REQUEST['nombre'];
	}
	if (isset($_REQUEST['email'])){
		$email = $_REQUEST['email'];
	}
	if (isset($_REQUEST['telcontacto'])) {
		$telefono = $_REQUEST['telcontacto'];
	}

	$cambiado = false;

	if ($telfPrincipal != $telefono || $nombrePrincipal != $nombre || $mailPrincipal != $email) {
		$sqlUser = "SELECT * FROM usuarios WHERE user = :mailPrincipal";
		$resultUser = $conn->prepare($sqlUser);
		$resultUser->bindParam(':mailPrincipal', $mailPrincipal);
		$resultUser->execute();
		$resultadoUser = $resultUser->fetch();

		if ($telfPrincipal != $telefono) {
			$sqlUpdateTelefono = "UPDATE usuarios SET telcontacto = :telefono WHERE id = :id";
			$resultUdateTelefono = $conn->prepare($sqlUpdateTelefono);
			$resultUdateTelefono->bindParam(':telefono', $telefono);
			$resultUdateTelefono->bindParam(':id', $resultadoUser['id']);
			$resultUdateTelefono->execute();

			$cambiado = true;

		}

		if ($nombrePrincipal != $nombre) {
			$sqlUpdateNombre = "UPDATE usuarios SET nombreemp = :nombre WHERE id = :id";
			$resultUpdateNombre = $conn->prepare($sqlUpdateNombre);
			$resultUpdateNombre->bindParam(':nombre', $nombre);
			$resultUpdateNombre->bindParam(':id', $resultadoUser['id']);
			$resultUpdateNombre->execute();

			$cambiado = true;

		}

		if ($mailPrincipal != $email) {

			$sqlCheckEmail = "SELECT count(*) as cant FROM usuarios WHERE user = :email";
			$resultCheckEmail = $conn->prepare($sqlCheckEmail);
			$resultCheckEmail->bindParam(':email', $email);
			$resultCheckEmail->execute();
			$resultadoCheckEmail = $resultCheckEmail->fetch();

			if($resultadoCheckEmail['cant'] == 0){
				$sqlInsertValidar2 = "INSERT INTO validar2 (idusuario, oldemail, newemail, validado) VALUES (:iduser, :oldemail, :newemail, 0)";
				$resultInsertValidar2 = $conn->prepare($sqlInsertValidar2);
				$resultInsertValidar2->bindParam(':iduser', $resultadoUser['id']);
				$resultInsertValidar2->bindParam(':oldemail', $mailPrincipal);
				$resultInsertValidar2->bindParam(':newemail', $email);
				$resultInsertValidar2->execute();

				$emailemp=$resultadoUser['user'];
				$nombreemp=$resultadoUser['nombreemp'];
				$nifemp=$resultadoUser['nifemp'];
				$pass=$resultadoUser['password'];
				$telcontacto=$resultadoUser['telcontacto'];
				$pais=$resultadoUser['pais'];
				$ciudad=$resultadoUser['localidad'];

				$nombremp2=strtoupper($nombreemp);
				$asunto="CONFIRMACION CAMBIO DE CORREO ELECTRONICO EN CIUDADANOS ANONIMOS";
			   $mailto=$mailPrincipal;
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
			        <tr><td colspan='3' >Hemos detectado que has cambiado la direccion de correo electronico a:</td></tr>
			        <tr><td colspan='3' >$email</td></tr>
			        <tr><td colspan='3' >Para completar el proceso de cambio de correo electronico debes entrar al enlace de activacion que te hemos enviado al nuevo correo:</td></tr>
			        <tr><td colspan='3' >Para confirmar este cambio <a href='http://control.ciudadanosanonimos.com/administracion_n/confirmarCambio.php?oldMail=$mailPrincipal&newMail=$email'>PINCHE AQUI</a></td></tr>
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
					
			        /*echo "<center><table border=1 cellspacing=5 cellpadding=5><tr><th>MENSAJE ENVIADO SATISFACTORIAMENTE</th></tr></table></center>";
			        echo $mailto."<br>";
			        echo $subject."<br>";
			        echo $message."<br>";
			        echo $headers."<br>";*/
			             
			      } else {
			        echo "<center><table border=1 cellspacing=5 cellpadding=5><tr><th>MENSAJE NO ENVIADO</th></tr></table></center>";
			        echo $mailto."<br>";
			        echo $subject."<br>";
			        echo $message."<br>";
			        echo $headers."<br>";
			      }


				$cambiado = true;
				header('Location: cuenta.php?comp=3');
				die();
			}else{
				header('Location: cuenta.php?comp=2');
				die();
			}

			
		}

		if ($cambiado) {
			header('Location: cuenta.php?comp=1');
		}else{
			header('Location: cuenta.php');
		}

	}else{
		header('Location: cuenta.php');
	}


	
?>