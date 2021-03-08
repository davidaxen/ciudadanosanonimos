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
//echo $sql;
$result=$conn->prepare($sql);
$result->bindParam(':parte', $parte[1]);
$result->execute();
$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
$emailbbdd=$resultado['email'];
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
<title>VALIDACION DE ALTA EN CIUDADANOS ANONIMOS</title>  
<link rel="stylesheet" href="solicitud.css">
<link rel="stylesheet" type="text/css" href="../portada_n/ultimasincidencias_t.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body class='html' style='background-image:url(../img/iconos/portada_ca.jpg);
  background-repeat: no-repeat;
  background-size: cover;'>

 <div style="max-width: 650px; margin-left: 28%; border-radius: 25px;" class='fadeInDown'>
   <div class='formContent' style='background-color:#f5f5f5; border-radius: 9px;'>
      <img src='../img/logo-ciud-anonimos.png' width='250px'>
      <h3 style="text-align: center;color:#000">VALIDACION DE ALTA EN CIUDADANOS ANONIMOS</h3>
   
    <h4 style="text-align: center;color:#000">
<?php    

if ($validar!=0){;

echo 'Hemos detectado que ya se ha producido el proceso de alta<br/>';
echo 'Para acceder pinche  <a href="http://control.ciudadanosanonimos.com?idpr='.$idpr.'" target="_blank">Aqu&iacute; </a><br/>';
}else{;
    if (($emailbbdd==$parte2[0]) and ($passbbdd==$parte2[1])){;


$clave2=$resultado['password'];
$email2=$resultado['email'];
$ideemp2='21';
$tfijo2=$resultado['telcontacto'];
$idvalidar=$resultado['idvalidar'];
$pais=$resultado['pais'];
$localidad=strtoupper($resultado['localidad']);
$nombreemp=strtoupper($resultado['nombreemp']);

include('introempleados.php');

$sql="UPDATE validar SET validar='1' where idvalidar=:idvalidar"; 
$result=$conn->prepare($sql);
$result->bindParam(':idvalidar', $idvalidar);
$result->execute();
//$result=mysqli_query ($conn,$sql) or die ("Invalid result");


echo '<br/>La validaci&oacute;n esta tramitada ya puede acceder pinche <a href="http://control.ciudadanosanonimos.com?idpr='.$idpr.'" target="_blank">Aqu&iacute;</a><br/>';

}else{;

echo 'Hemos detectado un problema con la validaci&oacute;n vuelva a probar el enlace y si envie un correo a info@ciudadanosanonimos.com<br/>';

};
};
?>
    </h4>


 </div>
 </div>


<?php 
} else {;

include ('../cierre.php');

 };
 ?>
