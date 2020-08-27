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

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
$nifbbdd=$resultado['nifemp'];
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
<title>VALIDACION DE ALTA EN APPMIFINCA</title>  
<link rel="stylesheet" href="solicitud.css">
</head>

<body class='html' style='background-image:url(../img/iconos/checkporter-fondo.jpg);
  background-repeat: no-repeat;
  background-size: cover;'>
<div class='cuadro'>
<div class='hijo' style='background-color:#f5f5f5'>


  <div class='imgcontainer'>
    <img src='../img/iconos/p-8-log.png' width="250px">
    <h3 style="text-align: center;color:#000">VALIDACION DE ALTA EN CHECKMANT</h3>
  </div>
    <h4 style="text-align: center;color:#000">
<?php    

if ($validar!=0){;

echo 'Hemos detectado que ya se ha producido el proceso de alta<br/>';
echo 'Para acceder pinche  <a href="https://control.nativecbc.com?idpr='.$idpr.'" target="_blank">Aqu&iacute; </a><br/>';
}else{;
    if (($nifbbdd==$parte2[0]) and ($passbbdd==$parte2[1])){;

$nif2=$resultado['nifemp'];
$clave2=$resultado['password'];
$nombre2=$resultado['nombreemp'];
$email2=$resultado['email'];
$web2="http://www.appmifinca.com";
$estadot="2";
$licadm="1";
$liccli="100";
$lictra="100";
$iddistribuidor='107';
$tfijo2=$resultado['telcontacto'];
$idvalidar=$resultado['idvalidar'];
$datose=array(0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$datosh=array(0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$datosp=array(0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$datos=array(0,1,1,1,1,1,1,0,0,1,0,0,0,0,1,0,0,0,0);
$datoadm=array(1,0,1,0,0,0,1,0,0,0);
$colorarriba='4c4c4c';
$colorlateral='003b29';
$colorcentral='ffffff';
$dat2=array('107-log.png','blanco-peq.png','107-fir.png','107-a4.jpg','107-hoja1.jpg','107-hoja2.jpg',null,null,'107-mov.png',null);

include('introempresa.php');

$sql="UPDATE validar SET validar='1' where idvalidar=:idvalidar";
$result=$conn->prepare($sql);
$result->bindParam(':idvalidar', $idvalidar);
$result->execute();

//$result=mysqli_query ($conn,$sql) or die ("Invalid result");


echo 'La validaci&oacute;n esta tramitada ya puede acceder pinche <a href="https://control.nativecbc.com?idpr='.$idpr.'" target="_blank">Aqu&iacute;</a><br/>';

}else{;

echo 'Hemos detectado un problema con la validaci&oacute;n vuelva a probar el enlace y si persiste llame al 91 281 01 33<br/>';

};
};
?>
    </h4>


</div>
</div>
<p style="padding:150px;">
 
</p>

<div class='cuadro' style='background-color:#c5c5c5;height:220px;color:#fff;'>
<div class='hijo2'>


  <div class='imgcontainer'>
<img src='../img/iconos/p-8-log.png' width='250px'>
      <br/>Una aplicaci&oacute;n simplifica una tarea
  </div>

  <div class='container' style='column-count:2;background-color:transparent;'>
Tel.: 912 810 133<br/>
Movil.: 695 175 000<br/>
Email: info@checkporter.com<br/>

Cadalso de los Vidrios 14 - local 12 - 28035 Madrid<br/>
Horario Ma&ntilde;anas: De 9:30 a 14:00<br/>
Horario Tarde: De 17:30 a 19:00<br/>        
  </div>


</div>
</div>

<?php 
} else {;

include ('../cierre.php');

 };
 ?>
