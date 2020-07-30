<?php if ($datoimp!='no'){;?>
<html>
<head>
<title>ENVIO DE CORREOS</title>

<body>
<table>
<tr><td rowspan="2"><img src="../img/<?php  echo $img;?>" height=80></td><td class="enc">ENVIO DE CORREOS DE CUADRANTES</td></tr>

</table>
<p>
<!--<a href="pdffactura<?php  echo $apen;?>.php?nfactura=<?php  echo $nfactura;?>&den=I">Imprimir</a><br>
<a href="altasfacturas<?php  echo $apen;?>.php">Introducir más facturas</a> -->
<br>
<?php };?>
<?php
include('/home/pisciso/php/Mail.php');
include('/home/pisciso/php/Mail/mime.php');
include('../bbdd/sqlfacturacion.php');


/*
$sql="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$nombre=mysqli_result($result,0,'nombre');
$idgestor=mysqli_result($result,0,'idgestor');

$sql1="SELECT * from gestores where idempresa='".$ide."' and idgestor='".$idgestor."'";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
$email1=mysqli_result($result1,0,'email');
$nombregestor=mysqli_result($result1,0,'nombregestor');
$percontacto=mysqli_result($result1,0,'percontacto');
$destinatario = $email1;
*/
$destinatario=$emailemp;

$text = 'Envio de Cuadrante del empleado '.$datoemp.' del mes de '.$monthStr1;



$file = $nomfich;
$html="<html><head><title>$text</title> </head><body> <table border=0><tr><td>Estimado Empleado $datoemp:<br>";
If ($totales=='1'){
$html.="Les adjunto el cuadrantes correspondiente al mes de $monthStr1<br>";
}else{;
$html.="Les adjunto el cuadrantes correspondiente al mes de $monthStr1<br>";
};
$html.="</td></tr></table>";


//$html=$html."<br><table width='600'><tr><td>Si quiere obtener un presupuesto para su comunidad, <a href=$idocumento>pinche aqui</a><p></td></tr><tr><td>Si no desea recibir más e-mails sobre nuestros productos,  <a href=$baja>pinche aqui</a><p></td></tr><tr><td>Este correo y sus archivos asociados son privados y confidenciales y va dirigido exclusivamente a su destinatario. Si recibe este correo sin ser el destinatario del mismo, le rogamos proceda a su eliminación y lo ponga en conocimiento del emisor. La difusión por cualquier medio del contenido de este correo podría ser sancionada conforme lo previsto a las leyes españolas. No se autoriza la utilización con fines comerciales o para su incorporación a ficheros automatizados de las direcciones del emisor o del destinatario. </td></tr></table></body> </html> "; 

$crlf = "\n";
$hdrs = array(
              'From'    => $nemp.' <'.$emailadmin.'>',
              'Subject' => $text
              );

$mime = new Mail_mime($crlf);

$mime->setTXTBody($text);
$mime->setHTMLBody($html);
$mime->addAttachment($file, 'application/pdf');

//do not ever try to call these lines in reverse order
$body = $mime->get();
$hdrs = $mime->headers($hdrs);

$mail =& Mail::factory('mail');
if($mail->send($destinatario, $hdrs, $body)){;
if ($datoimp!='no'){;
echo 'Correo enviado a :'.$destinatario.'<p>';
};
$dia=date("Y-m-d",time());
$hora=date("H:i",time());

$sql10 = "INSERT INTO fichero (idempresa,nomfichero,mes,año,carpeta,idclientes,idgestor) VALUES ('$ide','$nomfich1','$mesfactura','$anofactura','$path','$idclientes','$idgestor')";
//echo $sql1;
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result icarnet");
}else{;
echo('Correo no enviado, error');
};
//};

?>
