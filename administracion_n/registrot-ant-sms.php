<?php 
include('bbdd.php');

if ($idpr!=null){;

$sql="SELECT * from proyectos where idproyectos='".$idpr."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$nombre=mysqli_result($result,0,'nombre');
$logo=mysqli_result($result,0,'logo');
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<title>REGISTRO EN <?php  echostrtoupper($nombre);?></title>  

  <link rel="shortcut icon" href="images/a-master-favicon.ico"/>
  <title><?php  echo$nombre;?></title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css"/>
  <link rel="stylesheet" type="text/css" href="css/native.css" id="pagesheet"/>
  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/iefonts_native.css?3794966850"/>
  <![endif]-->
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
var __adobewebfontsappname__ = "muse";
</script>
  <!-- JS includes -->
  <script type="text/javascript">
   document.write('\x3Cscript src="' + (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//webfonts.creativecloud.com/dosis:n4:all;open-sans:n3,n7,n4:all;arimo:n7,n4:all;nova-square:n4:all.js" type="text/javascript">\x3C/script>');
</script>
    <!--HTML Widget code-->
  
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('require', 'displayfeatures');
ga('require', 'linkid', 'linkid.js');
ga('create', 'UA-45462730-1', 'auto');
ga('send', 'pageview');
</script>

 </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="browser_width" id="u6417-bw">
     <div class="pinned-colelem" id="u6417"><!-- simple frame --></div>
    </div>
    <a class="nonblock nontext pinned-colelem" id="u6454" href="http://www.<?php  echo$nombre;?>.com">

 
     <div class="clip_frame grpelem" id="u8053"><!-- image -->
      <img class="block" id="u8053_img" src="images/<?php  echo$logo;?>" alt="" width="500" height="132"/>
     </div>
     </a>
     
  
    <div class="clearfix colelem" id="pu8051"><!-- group -->


<?php 
$sql1="select * from usuarios where user='".$email."'";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_affected_rows();

$sql10="select * from validar where email='".$email."'";
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 1");
$row10=mysqli_affected_rows();


$abc=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

for($yj=0;$yj<11;$yj++){;
$f=rand(0, 51);
$datos[$yj]=$abc[$f];
$valor1.=$datos[$yj];
};
//echo $valor1.'<br/>';
//print_r($datos);
//echo '<br/>';

if (($row1==0) and ($row10==0)){;

$sql="select * from validar order by idvalidar desc";
//echo $sql.'<br/>';
$result=mysqli_query ($conn,$sql) or die ("Invalid result 1");
$row=mysqli_affected_rows();

if ($row==0){;
$idvalidar=1;
}else{;
$idvalidar=mysqli_result($result,0,'idvalidar');
$idvalidar=$idvalidar+1;
};

//echo $idvalidar.'<br/>';
$ty=strlen($idvalidar);

for($y=0;$y<6;$y++){;
if ($y<$ty){;
$t=substr($idvalidar,$y,1);
$confirmar.=$datos[$t];
$dat.=$t;
}else{;
$f=rand(0, 9);
$confirmar.=$datos[$f];
$dat.=$f;
};

};
//echo $confirmar.'<br/>';
//echo $dat.'<br/>';

include ('../sms/IXR_Library.php'); //Libreria para el uso de xml-rpc

$url_conexion='https://www.mensajerianegocios.movistar.es/SrvConexion';

$login='1C6B139E-SGUINALDO'; //Nombre de usuario
$password='Jas170174#'; //Contraseña
$miremite='SMARTCBC';

$client = new IXR_Client($url_conexion);

$valorv=$dat;
$texto = 'Su codigo de verificación de '.$miremite.' es '.$valorv;

//Ejecuta el metodo rpc
$client->query ('MensajeriaNegocios.enviarSMS', $login, $password,
array(array($telcontacto,$texto,$miremite)));
$valor=$client->getResponse();


if ($valor[0]!=0){;

switch($valor[0]){;
case "-5" : $datoe='Telefono movil incorrecto';break;
};

      echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>Ha habido el siguiente problema con el telefono dado</h2>
      <h2>".$datoe."</h2>
      <h2><a href='' onclick='history.back()'>Volver para solucionar el error</a></h2></div>"; 


}else{;

$sql13 = "INSERT INTO validar(idvalidar,email,password,validar,codvalidar,datovalidar,nombreemp,nifemp,percontacto,telcontacto,idpr,smsvalidar) 
VALUES ('$idvalidar','$email','$passwordNew1','0','$confirmar','$valor1','$nombreemp','$nifemp','$percontacto','$telcontacto','$idpr','$dat')";
//echo $sql13;
$result13=mysqli_query ($conn,$sql13) or die ("Invalid result iclientes");
?>

     <div class="Heading-H2-Black clearfix grpelem" id="u6489-6"><!-- content -->
      <h2>ULTIMO PASO</h2>
     </div>
    </div>
 <div class="Subheading-Black clearfix colelem" id="u6490-4"><!-- content -->
 <p>Le hemos enviado un codigo de verificacion al telefono movil que nos ha indicado. Por favor, introduzca dicho codigo para validar el acceso.</p>
 <center>
<form name="formulario" method="post" action="validart.php"> 
<input type="hidden" name="idpr" value="<?php  echo$idpr;?>">
<input type="hidden" name="email" value="<?php  echo$email;?>">
<table>
<tr><td>Codigo de Verificacion</td><td>
<input tabindex="1" name="idvalidar" id="idvalidar" type="text"  style="background-color:#93ce1e" maxlength="6"/></td></tr>


<tr><td colspan="2"><input type="submit" name="boton" value="Enviar" style="background-color:#93ce1e"></td></tr>
</table>

 
</form>     
         
   </center>  
     
    </div>

<?php 
};
     
}else{;
        echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>YA ESTAS DADO DE ALTA</h2>
      <h2>".$mailto."</h2></div>";        
};
?>

</div>


<?php } else {;

include ('../cierre.php');

 };
 ?>
</body>
</html>