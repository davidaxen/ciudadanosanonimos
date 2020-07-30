<?php
/*include('bbdd.php');*/

$sql1="select * from usuarios where user='".$user."' and password='".$pass."'"; 
//echo $sql1;
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result empresas 1");
$resultado1=mysqli_fetch_array($result1);
$madmi=$resultado1['administracion'];
$mfact=$resultado1['facturacion'];
$memple=$resultado1['empleados'];
$mconta=$resultado1['contabilidad'];
$mutil=$resultado1['utilidades'];
$mexist=$resultado1['existencias'];
$mperso=$resultado1['personalizado'];
$cli=$resultado1['cliente'];
$ges=$resultado1['gestor'];
?>
<center>
<a href="../inicio_n.php"><img src="../../img/inicio.png" width="48px"><br/>Inicio</a><br/>
 <!-- ADMINISTRACION --><?php if ($madmi=="1"){?><a href="../menu_n/menu_administracion.php"><img src="../../img/administracion.png" width="48px"><br/>Administracion</a><br/><?php };?><!-- FIN ADMINISTRACION -->  
<!-- FACTURACION --><?php if ($mfact=="1"){?>
<a href="../menu_n/menu_gestiones.php"><img src="../../img/gestiones.png" width="48px"><br/>Gestiones</a><br/>
<a href="../menu_n/menu_facturacion.php"><img src="../../img/facturacion.png" width="48px"><br/>Facturacion</a><br/>
<?php };?><!-- FIN FACTURACION -->
<!-- EMPLEADOS --><?php if ($memple=="1"){?><a href="../menu_n/menu_empleados.php"><img src="../../img/empleados.png" width="48px"><br/>Empleados</a><br/><?php };?><!-- FIN SERVICIOS -->	
<!-- CONTABILIDAD --><?php if ($mconta=="1"){?>
<a href="../menu_n/menu_contabilidad.php"><img src="../../img/contabilidad.png" width="48px"><br/>Empleados</a><br/>
<?php };?><!-- FIN DOCUMENTACION -->	
<!-- EXISTENCIAS --><?php if ($mexist=="1"){?>
<a href="../menu_n/menu_existencias.php"><img src="../../img/existencias.png" width="48px"><br/>Existencias</a><br/>
<?php };?><!-- FIN HERRAMIENTAS -->
<!-- HERRAMIENTAS --><?php if ($mutil=="1"){?>
<a href="../menu_n/menu_utilidades.php"><img src="../../img/utilidades.png" width="48px"><br/>Utilidades</a><br/>
<?php };?><!-- FIN HERRAMIENTAS -->
<!-- PERSONALIZADOS --><?php if ($mperso=="1"){?>
<a href="../menu_n/menu_personalizados.php"><img src="../../img/personalizados.png" width="48px"><br/>Personalizados</a><br/>
<?php };?><!-- FIN PERSONALIZADOS -->
<!-- MI CUENTA --><?php if ($info=="1"){?>
<a href="../menu_n/menu_micuenta.php"><img src="../../img/micuenta.png" width="48px"><br/>Mi cuenta</a><br/>
<?php };?><!-- FIN MI CUENTA -->
<!-- AYUDA --><?php if ($info=="1"){?>
<a href="../menu_n/menu_ayuda.php"><img src="../../img/ayuda.png" width="48px"><br/>Ayuda</a><br/>
<?php };?><!-- FIN AYUDA -->
<!-- TRABAJADORES --><?php if ($trab=="1"){?>
<!--<a href="../menu_n/menu_trabajador.php">--><img src="../../img/empleados.png"><!--</a>-->
<?php };?><!-- FIN TRABAJADORES -->
<!-- CLIENTES --><?php if ($cli=="1"){?>
<a href="../menu_n/menu_clientes.php"><img src="../../img/clientes.png"></a>
<?php };?><!-- FIN CLIENTES -->	
<!-- GESTORES --><?php if ($ges=="1"){?>
<a href="../menu_n/menu_gestores.php"><img src="../../img/gestores.png"></a>
<?php };?><!-- FIN GESTORES -->	
</center>
