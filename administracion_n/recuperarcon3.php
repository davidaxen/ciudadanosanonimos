<?php 
$sdato=$_SERVER['HTTP_USER_AGENT'];
$dominio=$_SERVER['SERVER_NAME'];

include('bbdd.php');


$sql="select * from portada where dominio='".$dominio."'";
//echo $sql;
$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$resultadorow=$result->fetchAll();
$row=count($resultadorow);

/*$result=mysqli_query ($conn,$sql) or die ("Este dominio no tiene acceso al sistema, por favor hable con el departamento Tecnico");
$row=mysqli_affected_rows();*/

if ($row==0){
?>
Este dominio no tiene acceso al sistema, por favor hable con el departamento de sistemas.
<?php 	
	}else{;
$logo=$resultadorow[0]['logo'];
$imgder=$resultadorow[0]['imgderecha'];
$imgizq=$resultadorow[0]['imgizquierda'];
$fondo=$resultadorow[0]['fondo'];
$icono=$resultadorow[0]['icono'];


?>
<HTML>
<HEAD>
<TITLE>PROGRAMA DE GESTION DE PERSONAL Y TRABAJO</TITLE>


<link rel="stylesheet" href="../estilo/estilonuevo.css">
<script>document.write("<link rel='shortcut icon' href='" + imgico + "'>")</script>
<meta name="author" content="aequipamientos" >
<meta name="KeyWords" content="Control de rondas, gestion de personal, Administracion de Fincas, Piscinas, Limpieza, Formación, Conserjeria, Retirada de Cubos, Outsourcing, Creación de Páginas WEB, Desarrollo de Proyectos, Analisis de Empresas, Mediador de Seguros de Credito">
<meta name="Description" content="PROGRAMA DE GESTION DE PERSONAL Y TRABAJO">



</HEAD>



<?php 	
if ($fondo==null){;
echo ("<body { bgcolor='white' text='black' link='White'>");
}else{
echo("<body background='../img/".$fondo."' text='black' link='White'>");
	}
?>	



<div id="zoom" style="position: absolute; top: 300; left: 100; width: 742; height: 19"></div>

<div id="container" style="position: relative;width: 800px;padding: 0px 0px 0 0;margin: auto;text-align: left">
<?php if ($imgder!=''){;?><img src="../img/<?php  echo$imgder;?>" style="position:absolute;top:0;left:0;index-z:12"><?php };?>
<?php if ($imgizq!=''){;?><img src="../img/<?php  echo$imgizq;?>" style="position:absolute;top:0;right:0;index-z:13"><?php };?>
<center>
<img src="../img/<?php  echo$logo;?>">
</center>
<p> </p>
<p> </p>

<?php 
if ($tipo==1){;

$sql="select * from empleados where nif='".$dni."' and idempresa='".$ide."'";
//echo $sql;
$result=$conn->query($sql);
$resultado=$result->fetchAll();

//$result=mysqli_query ($conn,$sql) or die ("Este dominio no tiene acceso al sistema, por favor hable con el departamento Tecnico");
$emailtra=$resultado[0]['email1'];


if ($emailtra!=$email){;
?>
El correo electronico que nos ha remitido no corresponde al que tenemos en la base de datos.<br/>
Por favor, pongase en contacto con su empresa para obtener el usuario y la clave
<?php 
}else{;
$idempleado=$resultado[0]['idempleado'];
$userempl=$ide.$idempleado;

$nombre="NATIVECBC";
$asunto="Tu usuario de acceso";

	 //$mailto="sguinaldo@yahoo.com";
	 $mailto=$email;
    //$message=$obs;
    $subject = $asunto;
    
		$message = "
				<html>
				<head>
				<title>$asunto</title>
				<style>
				a.greenhilite:link { color: white; }
				a.greenhilite:visited { color: white; }
				a.greenhilite:hover { color: white; }
				</style>
				</head>
				<body><center>
				<table>
				<tr><td colspan='3'><img src='https://control.nativecbc.com/administracion_n/images/$logo'></td></tr>
				<tr><td colspan='3' align='center'>TU USUARIO DE ACCESO</td></tr>
				<tr><td colspan='3' align='center'>Es $userempl</td></tr>
				<tr><td colspan='3' align='center'>Haz click en el siguiente boton y modifica la contraseña de acceso. </td></tr>
				<tr><td width='33%'>&nbsp;</td>
				<td align='center' style='background-color:green; text-transform: uppercase; color:white; padding:20px;'>
				<a href='https://control.nativecbc.com/administracion_n/reseteocontra.php?userempl=$userempl' class='greenhilite'>
				ACCEDER</a></td>
				<td width='33%'>&nbsp;</td></tr>

				
				<tr><td align='center'>$nombre</td><td align='center'>Condiciones del servicio</td><td align='center'>Politica</td></tr>
				</table>
				</center>
				</body>
				</html>";     
    
    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (we use a php  end of line constant)
    $eol = php _EOL;

    // main header (multipart mandatory)
$nombremin=strtolower($nombre);
    $headers = 'From: '.$nombre.' - TU USUARIO DE ACCESO - <no-reply@'.$nombremin.'.com>' . $eol;
    $headers .= 'Cc: '.$emailadmin2  . $eol;
	 //$headers .= 'Bcc: aprendom@yahoo.com'  . $eol;
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
   
    

    //SEND Mail
     if (mail($mailto, $subject, $message, $headers)) {
        echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>Le hemos enviado un correo electronico</h2>
      <h2>Con el usuario y el enlace para cambiar la contraseña</h2>
		<h2>Gracias</h2>      
      </div>";     	
    
        
      } else {
      	        echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>Ha habido un problema en el envio del correo electronico</h2>
      <h2>Pongase en contacto con su empresa</h2>
      </div>";
      }
      
?>	



<?php 
};
};
?>




<?php 
if ($tipo==2){;

$sql="select * from gestores where telefono1='".$telef."' and idempresa='".$ide."'";
//echo $sql;
$result=$conn->query($sql);
$emailtra=$result->fetchAll();

//$result=mysqli_query ($conn,$sql) or die ("Este dominio no tiene acceso al sistema, por favor hable con el departamento Tecnico");
$emailtra=$emailtra[0]['email'];


if ($emailtra!=$email){;
?>
El correo electronico que nos ha remitido no corresponde al que tenemos en la base de datos.<br/>
Por favor, pongase en contacto con su empresa para obtener el usuario y la clave
<?php 
}else{;
$userges=$emailtra[0]['user'];

$nombre="NATIVECBC";
$asunto="Tu usuario de acceso";

	 //$mailto="sguinaldo@yahoo.com";
	 $mailto=$email;
    //$message=$obs;
    $subject = $asunto;
    
		$message = "
				<html>
				<head>
				<title>$asunto</title>
				<style>
				a.greenhilite:link { color: white; }
				a.greenhilite:visited { color: white; }
				a.greenhilite:hover { color: white; }
				</style>
				</head>
				<body><center>
				<table>
				<tr><td colspan='3'><img src='https://control.nativecbc.com/administracion_n/images/$logo'></td></tr>
				<tr><td colspan='3' align='center'>TU USUARIO DE ACCESO</td></tr>
				<tr><td colspan='3' align='center'>Es $userges</td></tr>
				<tr><td colspan='3' align='center'>Haz click en el siguiente boton y modifica la contraseña de acceso. </td></tr>
				<tr><td width='33%'>&nbsp;</td>
				<td align='center' style='background-color:green; text-transform: uppercase; color:white; padding:20px;'>
				<a href='https://control.nativecbc.com/administracion_n/reseteocontra.php?userges=$userges' class='greenhilite'>
				ACCEDER</a></td>
				<td width='33%'>&nbsp;</td></tr>

				
				<tr><td align='center'>$nombre</td><td align='center'>Condiciones del servicio</td><td align='center'>Politica</td></tr>
				</table>
				</center>
				</body>
				</html>";     
    
    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (we use a php  end of line constant)
    $eol = php _EOL;

    // main header (multipart mandatory)
$nombremin=strtolower($nombre);
    $headers = 'From: '.$nombre.' - TU USUARIO DE ACCESO - <no-reply@'.$nombremin.'.com>' . $eol;
    $headers .= 'Cc: '.$emailadmin2  . $eol;
	 //$headers .= 'Bcc: aprendom@yahoo.com'  . $eol;
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
   
    

    //SEND Mail
     if (mail($mailto, $subject, $message, $headers)) {
        echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>Le hemos enviado un correo electronico</h2>
      <h2>Con el usuario y el enlace para cambiar la contraseña</h2>
		<h2>Gracias</h2>      
      </div>";     	
    
        
      } else {
      	        echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>Ha habido un problema en el envio del correo electronico</h2>
      <h2>Pongase en contacto con su empresa</h2>
      </div>";
      }
      
?>	



<?php 
};
};
?>































</div>
</BODY>
</HTML>

<?php 
};
?>