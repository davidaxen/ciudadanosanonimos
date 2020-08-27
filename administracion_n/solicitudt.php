<?php 
include('bbdd.php');

if ($idpr!=null){;

$sql="SELECT * from proyectos where idproyectos='".$idpr."'"; 
$result=$conn->query($sql);
$resultado=$result->fetch();
/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
$nombre=$resultado['nombre'];
$logo=$resultado['logo'];
$dprueba=$resultado['diasprueba'];

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<title>REGISTRO EN <?php  echo strtoupper($nombre);?></title>
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
      <img class="block" id="u8053_img" src="images/<?php  echo$logo;?>" alt="" />
     </div>
 </a>
<!--redes sociales width="500" height="132"-->      

     
   
    <div class="clearfix colelem" id="pu8051"><!-- group -->
    <!-- u8051-->
     <div class="Heading-H2-Black clearfix grpelem" id="u6489-6"><!-- content -->
      <h2>BIENVENIDO A LA ZONA DE PRUEBA</h2>
     </div>
    </div>
 <div class="Subheading-Black clearfix colelem" id="u6490-4"><!-- content -->
 <p>Por favor, rellene el presente formulario y podrá acceder al servicio por <?php  echo $dprueba;?> dias, para asi ver como le puede ayudar esta app.</p>
 <center>
<form name="formulario" method="post" action="registrot.php"> 
<input type="hidden" name="idpr" value="<?php  echo$idpr;?>">
<table>
<tr><td>Nombre de la Empresa</td><td>
<input tabindex="1" name="nombreemp" id="nombreemp" type="text"  style="background-color:#93ce1e"/></td></tr>

<tr><td>NIF de la Empresa</td><td>
<input tabindex="1" name="nifemp" id="nifemp" type="text"  style="background-color:#93ce1e"/></td></tr>

<tr><td>Persona de Contacto</td><td>
<input tabindex="1" name="percontacto" id="percontacto" type="text"  style="background-color:#93ce1e"/></td></tr>

<tr><td>Teléfono Móvil Contacto</td><td>
<input tabindex="1" name="telcontacto" id="telcontacto" type="text" maxlength="9" style="background-color:#93ce1e" 
pattern="^[7|6]\d{8}$" title="Por favor, introduzca numero que comience por 6 o 7"></td></tr>




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

<tr><td colspan="2"><input type="button" name="boton" value="Enviar" onClick="javascript:validaremail(this.form);" style="background-color:#93ce1e"></td></tr>
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
     
     function EsTelefonoMovil(formulario) {
     	 var  tel=document.formulario.telcontacto.value;
     alert (tel); 
     var test = /^[67]\d{8}$/; 
     var telReg = new RegExp(test); 
     return telReg.test(tel);
     
     } 
    </script>



<?php 
} else {;

include ('../cierre.php');

 };
 ?>