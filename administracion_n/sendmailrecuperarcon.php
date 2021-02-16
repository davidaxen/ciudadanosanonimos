<?php 
	include('bbdd.php');
	include ('../yo.php');

	if (isset($_REQUEST['mail'])) {
		$sql="SELECT * from usuarios where user=:mail"; 
		$result=$conn->prepare($sql);
		$result->bindParam(':mail', $_REQUEST['mail']);
		$result->execute();
		$resultado=$result->fetch();


		$pass=$resultado['password'];
		$output=FALSE;
		$key=hash('sha256', SECRET_KEY);
		$iv=substr(hash('sha256', SECRET_IV), 0, 16);
		$output=openssl_decrypt(base64_decode($pass), METHOD, $key, 0, $iv);
		$passdecrypted=$output;

		$emailemp=$resultado['email'];
		$nombreemp=$resultado['nombreemp'];
		$nifemp=$resultado['nifemp'];
		$codvalidarinc=$resultado['codvalidar'];
		$telcontacto=$resultado['telcontacto'];
		$idpr=$resultado['idpr'];
		$pais=$resultado['pais'];
		$ciudad=$resultado['localidad'];

		$nombremp2=strtoupper($nombreemp);
		$asunto="RECUPERAR CONTRASEÑA EN CIUDADANOS ANONIMOS";
		   $mailto=$emailemp;
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
		        <tr><td colspan='3' >A continuaci&oacute;n le indicamos sus datos</td></tr>
		        <tr><td colspan='3' >Datos de Acceso:</td></tr>
		        <tr><td colspan='3' >Usuario: $emailemp</td></tr>
		        <tr><td colspan='3' >Contraseña: $passdecrypted</td></tr>
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
		    

		    $separator = md5(time());
		    $eol = PHP_EOL;


		    $headers = 'From: CIUDADANOS ANONIMOS EN ACCION - <info@ciudadanosanonimos.com>' . $eol;
			if ($emailadmin2!=""){;   
			    $headers .= 'Cc: '.$emailadmin2  . $eol;
			};

		   $headers .= 'Bcc: ciudadanosanonimos@yahoo.com'  . $eol;



		    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
		    $headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
		   
		    

		     if (mail($mailto, $subject, $message, $headers)) {
		        header("/index.php?msg=Te hemos enviado un correo con la contraseña");
		        die();
		        
		      } else {
		        header("location:javascript://history.go(-1)");
		      }

		      header("/index.php?msg=Te hemos enviado un correo con la contraseña");
		      die();

				
			}else{
				header("location:javascript://history.go(-1)");
			}

	

 ?>