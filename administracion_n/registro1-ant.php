<?php 
include('bbdd.php');
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
  <title>native</title>
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
      <img class="block" id="u8053_img" src="images/appmifincalog.jpg" alt="" width="500" height="132"/>
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

for($y=0;$y<11;$y++){;
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


$sql13 = "INSERT INTO validar(idvalidar,email,password,validar,codvalidar,datovalidar) 
VALUES ('$idvalidar','$email','$passwordNew1','0','$confirmar','$valor1')";
//echo $sql13;
$result13=mysqli_query ($conn,$sql13) or die ("Invalid result iclientes");




//echo $hff.'<br/>';


$asunto="Confirma tu cuenta de APPMIFINCA";

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
				<tr><td colspan='3'><img src='https://control.nativecbc.com/administracion_n/images/appmifincalog.jpg'></td></tr>
				<tr><td colspan='3' align='center'>INSTRUCCIONES PARA CONFIRMAR TU CUENTA</td></tr>
				<tr><td colspan='3' align='center'>Para empezar a usar APPMIFINCA debes confirmar primero tu cuenta.</td></tr>
				<tr><td colspan='3' align='center'>Haz click en el siguiente boton y empieza a disfrutar de nuestro sistema. </td></tr>
				<tr><td width='33%'>&nbsp;</td>
				<td align='center' style='background-color:green; text-transform: uppercase; color:white; padding:20px;'>
				<a href='https://control.nativecbc.com/administracion_n/confirmar1.php?confirmar=$confirmar&email=$email' class='greenhilite'>
				Confirmar</a></td>
				<td width='33%'>&nbsp;</td></tr>
				<tr><td colspan='3' align='center'>$email</td></tr>
				<tr><td colspan='3' align='center'>&nbsp;</td></tr>
				<tr><td colspan='3' align='center'>En caso de tener problemas con el link de confirmacion puedes usar esta URL directamente en la barra de tu navegador</td></tr>
				<tr><td colspan='3' align='center'><a href='https://control.nativecbc.com/administracion_n/confirmar1.php?confirmar=$confirmar&email=$email'>http://control.smartcbc.com/administracion_n/confirmar.php?confirmar=$confirmar</a></td></tr>
				
				<tr><td align='center'>Smartcbc</td><td align='center'>Condiciones del servicio</td><td align='center'>Politica</td></tr>
				</table>
				</center>
				</body>
				</html>";     
    
    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (we use a php  end of line constant)
    $eol = php _EOL;

    // main header (multipart mandatory)

    $headers = 'From: APPMIFINCA - CONFIRMACION DE ALTA - <no-reply@appmifinca.com>' . $eol;
    $headers .= 'Cc: '.$emailadmin2  . $eol;
	 //$headers .= 'Bcc: aprendom@yahoo.com'  . $eol;
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
   
    

    //SEND Mail
     if (mail($mailto, $subject, $message, $headers)) {
        echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>MENSAJE ENVIADO SATISFACTORIAMENTE</h2>
      <h2>".$mailto."</h2></div>";        
         //echo $subject."<br>";
        //echo $message."<br>";
        //echo $headers."<br>";       
        
      } else {
      	echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>MENSAJE NO ENVIADO</h2>
      <h2>".$mailto."</h2></div>";
        //echo $subject."<br>";
        //echo $message."<br>";
        //echo $headers."<br>";
      }
      
}else{;
        echo "<div class='Heading-H2-Black clearfix grpelem' id='u6489-6'>
      <h2>YA ESTAS DADO DE ALTA</h2>
      <h2>".$mailto."</h2></div>";        
};
?>