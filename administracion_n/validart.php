<?php 
include('bbdd.php');



if ($idvalidar!=null){;

$sql10="select * from validar where email='".$email."'";
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 1");
$idpr1=mysqli_result($result10,0,'idpr');
$smsvalidar=mysqli_result($result10,0,'smsvalidar');
$intentos=mysqli_result($result10,0,'intentos');


$sql="SELECT * from proyectos where idproyectos='".$idpr."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$nombre=mysqli_result($result,0,'nombre');
$logo=mysqli_result($result,0,'logo');
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<title>VALIDAR EN <?php  echostrtoupper($nombre);?></title>  

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
if ($intentos>3){;
?>

     <div class="Heading-H2-Black clearfix grpelem" id="u6489-6"><!-- content -->
      <h2>LO SENTIMOS</h2>
     </div>
    </div>
 <div class="Subheading-Black clearfix colelem" id="u6490-4"><!-- content -->
 <p>Por favor, llame al telefono 633 50 60 10 para que le autoricen el acceso. Gracias.</p>   
    </div>
    
    

<?php 
}else{;
?>
<?php 
if ($smsvalidar!=$idvalidar){;
$intentos=$intentos+1;
$sql13 = "UPDATE validar SET intentos = '".$intentos."' WHERE email='".$email."'";
//echo $sql13;
$result13=mysqli_query ($conn,$sql13) or die ("Invalid result iclientes");


?>

     <div class="Heading-H2-Black clearfix grpelem" id="u6489-6"><!-- content -->
      <h2>ERROR EN EL CODIGO DE VALIDACION</h2>
     </div>
    </div>
 <div class="Subheading-Black clearfix colelem" id="u6490-4"><!-- content -->
 <p>El codigo de validacion que ha introducido no es valido, por favor, intentelo de nuevo. Gracias.</p>
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
}else{;

$email=mysqli_result($result10,0,'email');
$password=mysqli_result($result10,0,'password');


$sql13 = "UPDATE validar SET validar = '1', diaentrada = NOW( ) WHERE email ='".$email."'";
//echo $sql13;
$result13=mysqli_query ($conn,$sql13) or die ("Invalid result validar");

$sql12 = "INSERT INTO usuarios(user,password,validar,estado,tusuario,idpr) 
VALUES ('$email','$password','0','2','1','$idpr')";
//echo $sql12;
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result usuarios");


$minnombre=strtolower($nombre);

//echo $hff.'<br/>';


$asunto="Tu cuenta de $nombre ya esta activa";

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
				<tr><td colspan='2'>Bienvenido/a a la prueba de $nombre</td></tr>
				<tr><td colspan='3'>&nbsp;</td></tr>
				<tr><td colspan='3' align='center'>YA ESTA SU CUENTA ACTIVADA</td></tr>
				<tr><td colspan='3'>&nbsp;</td></tr>
				<tr><td colspan='3' align='center'>Su nombre de usuario es: $mailto</td></tr>
				<tr><td colspan='3'>&nbsp;</td></tr>
				<tr><td colspan='3' align='center'>Pinche en el siguiente boton y empieze a disfrutar de nuestro sistema. </td></tr>
				<tr><td colspan='3'>&nbsp;</td></tr>
				<tr><td width='33%'>&nbsp;</td>
				<td align='center' style='background-color:green; text-transform: uppercase; color:white; padding:20px;'>
				<a href='https://control.nativecbc.com' class='greenhilite'>
				ACCEDER</a></td>
				<td width='33%'>&nbsp;</td></tr>
				<tr><td colspan='3'>&nbsp;</td></tr>
				<tr><td colspan='2'>Si tiene algun problema o duda, por favor escriba o llame:</td></tr>
				<tr><td colspan='2'><ul><li> att-cliente@$minnombre.com</li></ul></td></tr> 
				<tr><td colspan='2'><ul><li> 91 281 01 30 - De Lunes a Viernes -</li></ul></td></tr>
				<tr><td colspan='3'>&nbsp;</td></tr>
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
    $headers = 'From: '.$nombre.' - YA PUEDE ACCEDER - <no-reply@'.$nombremin.'.com>' . $eol;
    $headers .= 'Cc: '.$emailadmin2  . $eol;
	 //$headers .= 'Bcc: aprendom@yahoo.com'  . $eol;
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
   
    

    //SEND Mail
     if (mail($mailto, $subject, $message, $headers)) {
        echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>YA ESTA DADO DE ALTA</h2>
      <h3>Su usuario es : $mailto </h3>
      <h4>Si quiere acceder ahora, pincha <a href='https://control.nativecbc.com'>AQUI</a></h4>
      
      </div>";     	
        //echo "<center><table border=1 cellspacing=5 cellpadding=5><tr><th>MENSAJE ENVIADO SATISFACTORIAMENTE</th></tr></table></center>";
        //echo $mailto."<br>";
        //echo $subject."<br>";
        //echo $message."<br>";
        //echo $headers."<br>";       
        
      } else {
      	        echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>MENSAJE NO ENVIADO</h2></div>";
        //echo $mailto."<br>";
        //echo $subject."<br>";
        //echo $message."<br>";
        //echo $headers."<br>";
      }
      

 };
 
  };
  ?>




<?php } else {;

include ('../cierre.php');

 };
 ?>
</body>
</html>