<?php 
include('bbdd.php');
include ('../yo.php');
if ($idpr!=null){;

$sql="SELECT * from proyectos where idproyectos='".$idpr."'"; 
$result=$conn->query($sql);
$resultado=$result->fetch();
/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
$nombre=$resultado['nombre'];
$logo=$resultado['logo'];
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<title>REGISTRO EN <?php  echo strtoupper($nombre);?></title>  
<link rel="stylesheet" href="solicitud.css">
</head>

<body class='html' style='background-image:url(../img/iconos/cafcontrol-fondo2.jpg);
  background-repeat: no-repeat;
  background-size: cover;'>
<div class='cuadro'>
<div class='hijo' style='background-color:#f5f5f5'>


  <div class='imgcontainer'>
    <img src='../img/checklimp_logo.png'>
    <h3 style="text-align: center;color:#000">SOLICITUD DE ALTA EN SERVICIO</h3>
  </div>
    <h4 style="text-align: center;color:#000">En breve recibir&aacute; un correo electr&oacute;nico el cual tendr&aacute; que pinchar sobre el enlace
    para Validar el ALTA</h4>

</div>
</div>
<p style="padding:150px;">
 
</p>

<div class='cuadro' style='background-color:#c5c5c5;height:220px;color:#fff;'>
<div class='hijo2'>


  <div class='imgcontainer'>
<img src='../img/checklimp_logo.png' width='250px'>
      <br/>Una aplicaci&oacute;n simplifica una tarea
  </div>

  <div class='container' style='column-count:2;background-color:transparent;'>
Tel.: 912 810 133<br/>
Movil.: 695 175 000<br/>
Email: info@checklimp.com<br/>

Cadalso de los Vidrios 14 - local 12 - 28035 Madrid<br/>
Horario Ma&ntilde;anas: De 9:30 a 14:00<br/>
Horario Tarde: De 17:30 a 19:00<br/>        
  </div>


</div>
</div>

<?php
$codvalidarinc=$nifemp.'#;&'.$psw;
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($codvalidarinc, METHOD, $key, 0, $iv);
			$codvalidarinc=base64_encode($output);


			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($psw, METHOD, $key, 0, $iv);
			$pass=base64_encode($output);
			


$sql1 = "INSERT INTO validar (email,nombreemp,nifemp,codvalidar,password,telcontacto,idpr) 
VALUES ('$emailemp','$nombremp','$nifemp','$codvalidarinc','$pass','$telcontacto','$idpr')";
//echo $sql1;
$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result iproveedores");



?>


<?php
$nombremp2=strtoupper($nombremp);
$asunto="ALTA DE SERVICIO EN CHECKLIMP";
$href="https://control.nativecbc.com/administracion_n/activacion4.php?".$codvalidarinc;
	 //$mailto="sguinaldo@yahoo.com";
	 $mailto=$emailemp;
    //$message=$obs;
    $subject = $asunto;
    
		$message = "
				<html>
				<head>
				<title>$asunto</title>
				</head>
				<body><center>
				<table>
				<tr><td colspan='3' align='center'><img src='https://control.nativecbc.com/img/checklimp_logo.png'></td></tr>
				<tr><td colspan='3' >Bienvenidos al Portal de Checklimp</td></tr>
				<tr><td colspan='3' >Hola $nombremp2 :</td></tr>
				<tr><td colspan='3' >Bienvenidos al Portal de Checklimp, a continuaci&oacute;n le indicamos los datos de acceso</td></tr>
				<tr><td colspan='3' >Datos de Acceso:</td></tr>
				<tr><td colspan='3' >Usuario: $nifemp</td></tr>
				<tr><td colspan='3' >Para completar el proceso de alta debes seguir el siguiente enlace:</td></tr>
				<tr><td colspan='3' ><a href='$href'>Validar el ALTA</a></td></tr>
				<tr><td colspan='3' >Si no te funciona el enlace de 'Validar el ALTA' puedes copiar esta direcci&oacute;n en tu navegador para 
				confirmar de la activaci&oacute;n: $href </td></tr>
				<tr><td colspan='3' style='font-size:8px' ><p>&nbsp;</p>
Para m&aacute;s informaci&oacute;n puedes contactar con el Servicio de Atenci&oacute;n Directa 24h +34 91 281 01 33.
Aviso: Este correo ha sido generado de forma autom&aacute;tica. Por favor, no responda a este mensaje. 
Para comunicar cualquier tipo de sugerencia, duda o comentario, utilice el apartado 'Contacta con nosotros' 
en http://www.checklimp.com. Este documento est&aacute; dirigido exclusivamente al destinatario especificado. 
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

    $headers = 'From: CHECKLIMP - CONTROL INTELIGENTE DE SU PERSONAL - <info@checklimp.com>' . $eol;
if ($emailadmin2!=""){;   
    $headers .= 'Cc: '.$emailadmin2  . $eol;
};

	 $headers .= 'Bcc: checklimp@yahoo.com'  . $eol;



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
      
?>








<?php 
} else {;

include ('../cierre.php');

 };
 ?>
