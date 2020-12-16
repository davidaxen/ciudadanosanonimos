<?php 
include('bbdd.php');
include ('../yo.php');
if (isset($_REQUEST['idpr'])) {
  $idpr = $_REQUEST['idpr'];
}
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

<body class='html' style='background-image:url(../img/iconos/portada_ca.jpg);
  background-repeat: no-repeat;
  background-size: cover;'>
<div class='cuadro'>
<div class='hijo' style='background-color:#f5f5f5'>


  <div class='imgcontainer'>
    <img src='../img/logo-ciud-anonimos.png' width='250px'>
    <h3 style="text-align: center;color:#000">SOLICITUD DE ALTA EN CIUDADANOS ANONIMOS</h3>
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
$codvalidarinc=$emailemp.'#;&'.$psw;
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
			


$sql1 = "INSERT INTO validar (email,nombreemp,nifemp,codvalidar,password,telcontacto,idpr,pais,localidad) 
VALUES ('$emailemp','$nombreemp','$nifemp','$codvalidarinc','$pass','$telcontacto','$idpr','$pais','$ciudad')";
//echo $sql1;
$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result iproveedores");

?>


<?php
$nombremp2=strtoupper($nombreemp);
$asunto="ALTA DE SERVICIO EN CIUDADANOS ANONIMOS";
$href="http://control.ciudadanosanonimos.com/administracion_n/activacion1.php?".$codvalidarinc;
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
				<tr><td colspan='3' align='center'><img src='http://control.ciudadanosanonimos.com/img/logo-ciud-anonimos.png' width='250px'></td></tr>
				<tr><td colspan='3' >Bienvenidos al Portal de CIUDADANOS ANONIMOS</td></tr>
				<tr><td colspan='3' >Hola $nombremp2 :</td></tr>
				<tr><td colspan='3' >Bienvenidos al Portal de CIUDADANOS ANONIMOS, a continuaci&oacute;n le indicamos los datos de acceso</td></tr>
				<tr><td colspan='3' >Datos de Acceso:</td></tr>
				<tr><td colspan='3' >Usuario: $emailemp</td></tr>
				<tr><td colspan='3' >Para completar el proceso de alta debes seguir el siguiente enlace:</td></tr>
				<tr><td colspan='3' ><a href='$href'>Validar el ALTA</a></td></tr>
				<tr><td colspan='3' >Si no te funciona el enlace de 'Validar el ALTA' puedes copiar esta direcci&oacute;n en tu navegador para 
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
      
?>








<?php 
} else {;

include ('../cierre.php');

 };
 ?>
