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
<title>Ejemplo de funcion para validar dirección de email en javascript</title>
  <script type="text/javascript">
   if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["jquery-1.8.3.min.js", "museutils.js", "jquery.watch.js", "jquery.musepolyfill.bgsize.js", "webpro.js", "musewpslideshow.js", "jquery.museoverlay.js", "touchswipe.js", "musewpdisclosure.js", "native.css"], "outOfDate":[]};
</script>
  
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="Bluefish 2.2.6" />
  <link rel="shortcut icon" href="images/a-master-favicon.ico?412748449"/>
  <title><?php  echo$nombre;?></title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?4087040403"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?322692604"/>
  <link rel="stylesheet" type="text/css" href="css/native.css?3994830838" id="pagesheet"/>
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
    <a class="nonblock nontext pinned-colelem" id="u6454" href="index.html">

  
    <div class="clearfix colelem" id="pu8148"><!-- group -->
     <div class="grpelem" id="u8148"><!-- custom html -->
      <!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=10668933; 
var sc_invisible=1; 
var sc_security="3740819e"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="shopify
analytics ecommerce tracking"
href="http://statcounter.com/shopify/" target="_blank"><img
class="statcounter"
src="http://c.statcounter.com/10668933/0/3740819e/1/"
alt="shopify analytics ecommerce
tracking"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->

</div>
 
<!--redes sociales --> 
 
     <div class="clip_frame grpelem" id="u8053"><!-- image -->
      <img class="block" id="u8053_img" src="images/<?php  echo$logo;?>" alt="" width="500" height="132"/>
     </div>
     <a class="nonblock nontext clip_frame clearfix grpelem" id="u8084" href="https://www.linkedin.com/company/smartcbc?trk=top_nav_home" target="_blank"><!-- image --><div id="u8084_clip"><img class="position_content" id="u8084_img" src="images/linkedin.png" alt="" width="38" height="38"/></div></a>
     <div class="clearfix grpelem" id="pu8105-4"><!-- column -->
      <div class="Subheading-Black clearfix colelem" id="u8105-4"><!-- content -->
       <p>Únete</p>
      </div>
      <div class="clearfix colelem" id="pu8086"><!-- group -->
       <a class="nonblock nontext clip_frame grpelem" id="u8086" href="https://twitter.com/Smartcbc" target="_blank"><!-- image --><img class="block" id="u8086_img" src="images/twitter.png" alt="" width="32" height="32"/></a>
       <a class="nonblock nontext clip_frame grpelem" id="u8088" href="http://google.com/+Smartcbcgestiondepersonal" target="_blank"><!-- image --><img class="block" id="u8088_img" src="images/google-plus-icons-crop-u8088.png" alt="" width="32" height="32"/></a>
      </div>
     </div>
     <a class="nonblock nontext clip_frame grpelem" id="u8090" href="https://www.youtube.com/channel/UCLufXiGuE9DxnNTDYZtcy6A" target="_blank"><!-- image --><img class="block" id="u8090_img" src="images/youtube.png" alt="" width="32" height="32"/></a>
</div>    
    <div class="clearfix colelem" id="pu8051"><!-- group -->
 <div class="grpelem" id="u8051"><!-- custom html -->
      

</div>  







<?php 
$sql10="select * from validar where email='".$email."'";
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$row10=mysqli_affected_rows();

if ($row10!=0){;
$validar=mysqli_result($result10,0,'validar');
$password=mysqli_result($result10,0,'password');
$codvalidar=mysqli_result($result10,0,'codvalidar');
$datovalidar=mysqli_result($result10,0,'datovalidar');
$idvalidar=mysqli_result($result10,0,'idvalidar');
$datos=str_split($datovalidar);

//$abc=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

if ($validar=='0'){;

//echo $idvalidar.'<br/>';
$ty=strlen($idvalidar);

for($y=0;$y<$ty;$y++){;
$t=substr($idvalidar,$y,1);
$confirmar1.=$datos[$t];
$tu=substr($confirmar,$y,1);
$dat.=$tu;
};

//echo $confirmar1.'<br/>';
//echo $dat.'<br/>';

if ($confirmar1==$dat){;



$sql13 = "UPDATE validar SET validar = '1', diaentrada = NOW( ) WHERE idvalidar ='".$idvalidar."'";
//echo $sql13;
$result13=mysqli_query ($conn,$sql13) or die ("Invalid result validar");

$sql12 = "INSERT INTO usuarios(user,password,validar) 
VALUES ('$email','$password','0')";
//echo $sql12;
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result usuarios");




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
				<tr><td colspan='3' align='center'>TU CUENTA YA ESTA CONFIRMADA</td></tr>
				<tr><td colspan='3' align='center'>Ya puedes usar $nombre.</td></tr>
				<tr><td colspan='3' align='center'>Haz click en el siguiente boton y empieza a disfrutar de nuestro sistema. </td></tr>
				<tr><td width='33%'>&nbsp;</td>
				<td align='center' style='background-color:green; text-transform: uppercase; color:white; padding:20px;'>
				<a href='https://control.nativecbc.com' class='greenhilite'>
				ACCEDER</a></td>
				<td width='33%'>&nbsp;</td></tr>
				<tr><td colspan='3' align='center'>En caso de tener problemas con el link de acceso puedes usar esta URL directamente en la barra de tu navegador</td></tr>
				<tr><td colspan='3' align='center'><a href='https://control.nativecbc.com'>https://control.nativecbc.com</a></td></tr>
				
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
    $headers = 'From: $nombre - YA PUEDE ACCEDER - <no-reply@$nombremin.com>' . $eol;
    $headers .= 'Cc: '.$emailadmin2  . $eol;
	 //$headers .= 'Bcc: aprendom@yahoo.com'  . $eol;
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
   
    

    //SEND Mail
     if (mail($mailto, $subject, $message, $headers)) {
        echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>YA ESTAS DADO DE ALTA</h2>
      <h2><a href='https://control.nativecbc.com'>ACCEDER</a></h2> 
      <h3>Tu usuario es $mailto</h3>
      <h3>Tu contraseña es la que has puesto anteriormente</h3>
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
      
      
		}else{;
		      	        echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>HA HABIDO UN PROBLEMA CON EL ALTA</h2></div>";
		};
	}else{
        echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>YA ESTAS DADO DE ALTA</h2>
      <h2><a href='https://control.nativecbc.com'>ACCEDER</a></h2></div>";  		
}
}else{
echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>HA HABIDO UN PROBLEMA CON EL ALTA</h2>
        <h2><a href='solicitud.php'>VUELVE A REGISTRARTE</a></h2>";		
	};
?>


<?php } else {;

include ('../cierre.php');

 };
 ?>