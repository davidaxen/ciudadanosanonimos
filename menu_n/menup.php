<?php
/*include('bbdd.php');*/

$sql1="select * from usuarios where user='".$user."' and password='".$pass."'"; 
//echo $sql1;
$result1=mysqli_query ($conn,$conn,$sql1) or die ("Invalid result empresas 1");
$madmi=mysqli_result($result1,0,'administracion');
$mfact=mysqli_result($result1,0,'facturacion');
$memple=mysqli_result($result1,0,'empleados');
$mconta=mysqli_result($result1,0,'contabilidad');
$mutil=mysqli_result($result1,0,'utilidades');
$mexist=mysqli_result($result1,0,'existencias');
$mperso=mysqli_result($result1,0,'personalizado');
$cli=mysqli_result($result1,0,'cliente');
$ges=mysqli_result($result1,0,'gestor');
?>
   <ul id="nav">
 <!-- ADMINISTRACION --><?php if ($madmi=="1"){?><?php  include('administracion.php');?><?php };?><!-- FIN ADMINISTRACION -->  
<!-- FACTURACION --><?php if ($mfact=="1"){?><?php  include('facturacion.php');?><?php };?><!-- FIN FACTURACION -->
<!-- EMPLEADOS --><?php if ($memple=="1"){?><?php  include('empleados.php');?><?php };?><!-- FIN SERVICIOS -->	
<!-- CONTABILIDAD --><?php if ($mconta=="1"){?><?php  include('contabilidad.php');?><?php };?><!-- FIN DOCUMENTACION -->	
<!-- EXISTENCIAS --><?php if ($mexist=="1"){?><?php  include('existencias.php');?><?php };?><!-- FIN HERRAMIENTAS -->
<!-- HERRAMIENTAS --><?php if ($mutil=="1"){?><?php  include('utilidades.php');?><?php };?><!-- FIN HERRAMIENTAS -->
<!-- PERSONALIZADOS --><?php if ($mperso=="1"){?><?php  include('personalizados.php');?><?php };?><!-- FIN PERSONALIZADOS -->
<!-- MI CUENTA --><?php if ($info=="1"){?><?php  include('micuenta.php');?><?php };?><!-- FIN MI CUENTA -->
<!-- AYUDA --><?php if ($info=="1"){?><?php  include('ayuda.php');?><?php };?><!-- FIN AYUDA -->
<!-- TRABAJADORES --><?php if ($trab=="1"){?><?php  include('trabajador.php');?><?php };?><!-- FIN TRABAJADORES -->
<!-- CLIENTES --><?php if ($cli=="1"){?><?php  include('clientes.php');?><?php };?><!-- FIN CLIENTES -->	
<!-- GESTORES --><?php if ($ges=="1"){?><?php  include('gestores.php');?><?php };?><!-- FIN GESTORES -->	
</ul>
