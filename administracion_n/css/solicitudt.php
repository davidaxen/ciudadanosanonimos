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
<title>REGISTRO EN <?php  echo strtoupper($nombre);?></title>
<!--
  <script type="text/javascript">
   if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["jquery-1.8.3.min.js", "museutils.js", "jquery.watch.js", "jquery.musepolyfill.bgsize.js", "webpro.js", "musewpslideshow.js", "jquery.museoverlay.js", "touchswipe.js", "musewpdisclosure.js", "native.css"], "outOfDate":[]};
</script>
-->  
  <link rel="shortcut icon" href="images/a-master-favicon.ico"/>
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
    <a class="nonblock nontext pinned-colelem" id="u6454" href="index.html">

<!-- pu8148 --> 

     <div class="clip_frame grpelem" id="u8053"><!-- image -->
      <img class="block" id="u8053_img" src="images/<?php  echo $logo;?>" alt="" />
     </div>
 </a>
<!--redes sociales width="500" height="132"-->      

     
   
    <div class="clearfix colelem" id="pu8051"><!-- group -->
    <!-- u8051-->
     <div class="Heading-H2-Black clearfix grpelem" id="u6489-6"><!-- content -->
      <h2>REGISTRESE</h2>
     </div>
    </div>
 <div class="Subheading-Black clearfix colelem" id="u6490-4"><!-- content -->
 <p>Por favor, rellene el presente formulario y podrá acceder al servicio por 30 dias, para asi ver como le puede ayudar esta app.</p>
 <center>
<form name="formulario" method="post" action="registrot.php"> 
<input type="hidden" name="idpr" value="<?php  echo $idpr;?>">
<table>
<tr><td>E-mail</td><td>
<input tabindex="1" name="email" id="email" type="text"  style="background-color:#93ce1e"/></td></tr>
<tr><td colspan="2">(Un e-mail válido por favor)</td></tr>

<tr><td>Contraseña
</td><td><input tabindex="2" name="passwordNew1" id="passwordNew1" type="password" style="background-color:#93ce1e"/></td></tr>
<tr><td colspan="2">(Mínimo 6 caracteres y un máximo de 8, letras y números)</td></tr>

<tr><td>Repetir Contraseña
</td><td><input tabindex="3" name="passwordNew2" id="passwordNew2" type="password"  style="background-color:#93ce1e"/>
</td></tr>
<tr><td colspan="2">(Debe ser igual a la anterior)</td></tr>

<tr><td colspan="2"><input type="button" name="boton" value="Enviar" onClick="javascrpit:validaremail(this.form);" style="background-color:#93ce1e"></td></tr>
</table>

 
</form>     
     </center>
    </div>
   




    <script language="javascript"> 
    function validaremail(formulario) { 
    
    valueForm=document.formulario.email.value;
    var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    
    if(valueForm.search(patron)==0){
    	var valormail=1;
    //alert (valormail);
    } else { 
    alert ("La \"Direccion de Email\" no es correcta"); 
    document.formulario.email.focus() ;
    } 
    
    
   pasNew1=document.formulario.passwordNew1;
//alert (pasNew1);
	pasNew2=document.formulario.passwordNew2;
//alert (pasNew2);
    //Patron para los numeros
	var patron1=new RegExp("[0-9]+");
	//Patron para las letras
	var patron2=new RegExp("[a-zA-Z]+");
	
	if(pasNew1.value==pasNew2.value && pasNew1.value.length>=6 && pasNew1.value.length<=8  && pasNew1.value.search(patron1)>=0 && pasNew1.value.search(patron2)>=0){
    	var valorpass=1;
    	//alert (valorpass);
	}else{
				if(pasNew1.value.length<6 || pasNew1.value.length>8){
				alert("La longitud mínima tiene que ser de 6 caracteres y máxima de 8");
				}else{
				 		if(pasNew1.value!=pasNew2.value){
							alert("La copia de la contraseña no coincide");
							}else{
							if(pasNew1.value.search(patron1)<0 || pasNew1.value.search(patron2)<0){
							alert("La contraseña tiene que tener numeros y letras");
							}
							}
				}	
	
	
	}
	
    if(valormail==1 && valorpass==1){
    document.formulario.submit(); 
    }
     }
    </script>


<?php } else {;

include ('../../cierre.php');

};?>        



</body>
</html>
