<?php   
	include('bbdd.php');
	$telfPrincipal = $_REQUEST['telfPrincipal'];
	$nombrePrincipal = $_REQUEST['nombrePrincipal'];
	$mailPrincipal = $_REQUEST['mailPrincipal'];

	if (isset($_REQUEST['idValidar'])) {
		$idValidar = $_REQUEST['idValidar'];
	}
	if (isset($_REQUEST['nombre'])) {
		$nombre = $_REQUEST['nombre'];
	}
	if (isset($_REQUEST['email'])){
		$email = $_REQUEST['email'];
	}
	if (isset($_REQUEST['telcontacto'])) {
		$telefono = $_REQUEST['telcontacto'];
	}

	$sqlCheckEmail = "SELECT count(*) as cant FROM validar WHERE email = :email AND idvalidar != :idvalidar";
	$resultCheckEmail = $conn->prepare($sqlCheckEmail);
	$resultCheckEmail->bindParam(':email', $email);
	$resultCheckEmail->bindParam(':idvalidar', $idValidar);
	$resultCheckEmail->execute();
	$resultadoCheckEmail = $resultCheckEmail->fetch();

	if($resultadoCheckEmail['cant'] == 0){
		/*$sqlSelectCodValidar = "SELECT codvalidar FROM validar WHERE email = :mailPrincipal";
		$resultSelectCodValidar = $conn->prepare($sqlSelectCodValidar);
		$resultSelectCodValidar->bindParam(':mailPrincipal', $mailPrincipal);
		$resultSelectCodValidar->execute();
		$resultadoSelectCodValidar = $resultSelectCodValidar->fetch();

		var_dump($resultadoSelectCodValidar);*/

		$sqlUpdateValidar = "UPDATE validar SET nombreemp = :nombre, email = :email, telcontacto = :telefono, validar = '0' WHERE email = :mailPrincipal";
		$resultUpdateValidar = $conn->prepare($sqlUpdateValidar);
		$resultUpdateValidar->bindParam(':nombre', $nombre);
		$resultUpdateValidar->bindParam(':email', $email);
		$resultUpdateValidar->bindParam(':mailPrincipal', $mailPrincipal);
		$resultUpdateValidar->bindParam(':telefono', $telefono);
		$resultUpdateValidar->execute();

		$sqlUpdateUsuario = "UPDATE usuarios SET user = :email WHERE user = :mailPrincipal";
		$resultUpdateUsuario = $conn->prepare($sqlUpdateUsuario);
		$resultUpdateUsuario->bindParam(':email', $email);
		$resultUpdateUsuario->bindParam(':mailPrincipal', $mailPrincipal);
		$resultUpdateUsuario->execute();

		if ($mailPrincipal != $email) {
			$sqln="SELECT * from validar where email=:email";
			$resultn = $conn->prepare($sqln);
			$resultn->bindParam(':email', $email);
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
			$asunto="CAMBIO DE CORREO ELECTRONICO EN CIUDADANOS ANONIMOS";
			//$href="http://control.ciudadanosanonimos.com/administracion_n/activacion1.php?".$codvalidarinc;
			   //$mailto="sguinaldo@yahoo.com";
			   $mailto=$mailPrincipal;
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
			        <tr><td colspan='3' >Hemos detectado que has cambiado la direccion de correo electronico a:</td></tr>
			        <tr><td colspan='3' >$emailemp</td></tr>
			        <tr><td colspan='3' >Para completar el proceso de cambio de correo electronico debes entrar al enlace de activacion que te hemos enviado al nuevo correo:</td></tr>
			        <tr><td colspan='3' >Si desea revertir este cambio puede <a href='http://control.ciudadanosanonimos.com/administracion_n/cancelarCambio.php?oldMail=$mailPrincipal&newMail=$email'>PINCHAR AQUI</a></td></tr>
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
			   
			    

			    //SEND Mail
			     if (mail($mailto, $subject, $message, $headers)) {
			     	    $nombremp2=strtoupper($nombreemp);
						$asunto="CAMBIO DE CORREO ELECTRONICO EN CIUDADANOS ANONIMOS";
						$href="http://control.ciudadanosanonimos.com/administracion_n/validarCambioCorreo.php?".$codvalidarinc;
						   //$mailto="sguinaldo@yahoo.com";
						   $mailto=$email;
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
						        <tr><td colspan='3' >Hemos detectado que has cambiado la direccion de correo electronico a:</td></tr>
						        <tr><td colspan='3' >$emailemp</td></tr>
						        <tr><td colspan='3' >Para completar el proceso de cambio de correo debes seguir el siguiente enlace:</td></tr>
						        <tr><td colspan='3' ><a href='$href'>Validar el CAMBIO DE CORREO</a></td></tr>
						        <tr><td colspan='3' >Si no te funciona el enlace de 'Validar el CAMBIO DE CORREO' puedes copiar esta direcci&oacute;n en tu navegador para 
						        confirmar de la activaci&oacute;n: $href </td></tr>
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
						if ($emailadmin2!=""){;   
						    $headers .= 'Cc: '.$emailadmin2  . $eol;
						};

						   $headers .= 'Bcc: ciudadanosanonimos@yahoo.com'  . $eol;



						    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
						    $headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
						   
						    

						    //SEND Mail
						     if (mail($mailto, $subject, $message, $headers)) {
						        //echo "mail send ... OK"; // or use booleans here
						     
						        /*
						        echo "<center><table border=1 cellspacing=5 cellpadding=5><tr><th>MENSAJE ENVIADO SATISFACTORIAMENTE</th></tr></table></center>";
						        echo $mailto."<br>";
						        echo $subject."<br>";
						        echo $message."<br>";
						        echo $headers."<br>"; 
						        */      
						        
						      } else {
						        //echo "mail send ... ERROR!";
						        echo "<center><table border=1 cellspacing=5 cellpadding=5><tr><th>MENSAJE NO ENVIADO</th></tr></table></center>";
						        echo $mailto."<br>";
						        echo $subject."<br>";
						        echo $message."<br>";
						        echo $headers."<br>";
						      }


						};  
			        
			      } else {
			        //echo "mail send ... ERROR!";
			        echo "<center><table border=1 cellspacing=5 cellpadding=5><tr><th>MENSAJE NO ENVIADO</th></tr></table></center>";
			        echo $mailto."<br>";
			        echo $subject."<br>";
			        echo $message."<br>";
			        echo $headers."<br>";
			      }


			};  


			header('Location: salir.php');
		}else{
			header('Location: cuenta.php?comp=1');
		}

	}else{
		header('Location: cuenta.php?comp=2');
	}
?>