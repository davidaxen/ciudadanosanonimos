<?php

$sql52="select * from menusmartcbc where user='".$user."' and idempresa='".$ide."'";
$result52=$conn->query($sql52);
$resultado52=$result52->fetchAll();
$e1=$resultado52[0]['clientes'];
$e2=$resultado52[0]['empleados'];
$e3=$resultado52[0]['asignaciones'];
$e4=$resultado52[0]['categorias'];
$e5=$resultado52[0]['subcategorias'];
$e6=$resultado52[0]['mensajes'];
$e7=$resultado52[0]['trabajos'];
$e8=$resultado52[0]['pcontrol'];
$e9=$resultado52[0]['informe'];
$e10=$resultado52[0]['otros'];

/*$result52=mysqli_query ($conn,$conn,$sql52) or die ("Invalid result menuempleados");
$e1=mysqli_result($result52,0,'clientes');
$e2=mysqli_result($result52,0,'empleados');
$e3=mysqli_result($result52,0,'asignaciones');
$e4=mysqli_result($result52,0,'categorias');
$e5=mysqli_result($result52,0,'subcategorias');
$e6=mysqli_result($result52,0,'mensajes');
$e7=mysqli_result($result52,0,'trabajos');
$e8=mysqli_result($result52,0,'pcontrol');
$e9=mysqli_result($result52,0,'informe');
$e10=mysqli_result($result52,0,'otros');*/


/*
$e11=mysqli_result($result,0,'cuadrantes');
$e12=mysqli_result($result,0,'ropa');
$e13=mysqli_result($result,0,'cotizacion');
*/
?>

<li><a href="http://control.<?php  echo $web;?>" target="_blank">SMARTCBC</a>
<!--
		<ul>
							<li><a>EMPRESAS >></a>
									<ul>
									<li><a href="http://control.<?php  echo $web;?>/administracion/iempresa.php" target="principal">ALTA</a></li>
									<li><a href="http://control.<?php  echo $web;?>/administracion/mempresa.php" target="principal">MODIFICACION</a></li>
									<li><a href="http://control.<?php  echo $web;?>/administracion/lempresa.php" target="principal">LISTADO</a></li>
									</ul>
							</li>
							<li><a>PUESTOS DE TRABAJO >></a>
									<ul>
									<li><a href="http://control.<?php  echo $web;?>/facturacion/iclientes.php" target="principal">ALTA</a></li>
									<li><a href="http://control.<?php  echo $web;?>/facturacion/mclientes.php" target="principal">MODIFICACION</a></li>
									<li><a href="http://control.<?php  echo $web;?>/facturacion/lclientes.php" target="principal">LISTADO</a></li>
									</ul>
							</li>
							<li><a>EMPLEADOS >></a>
									<ul>
									<li><a href="http://control.<?php  echo $web;?>/empleados/iempleados.php" target="principal">ALTA</a></li>
									<li><a href="http://control.<?php  echo $web;?>/empleados/mempleados.php" target="principal">MODIFICACION</a></li>
									<li><a href="http://control.<?php  echo $web;?>/empleados/lempleados.php" target="principal">LISTADO</a></li>
									</ul>
							</li>
							<li><a>GESTORES >></a>
									<ul>
									<li><a href="http://control.<?php  echo $web;?>/facturacion/igestores.php" target="principal">ALTA</a></li>
									<li><a href="http://control.<?php  echo $web;?>/facturacion/mgestores.php" target="principal">MODIFICACION</a></li>
									<li><a href="http://control.<?php  echo $web;?>/facturacion/lgestores.php" target="principal">LISTADO</a></li>
									</ul>
							</li>

		
<li><a>SERVICIOS >></a>
						<ul>
									<li><a href="http://control.<?php  echo $web;?>/servicios/mensaje/dpuntcont.php" target="principal">MENSAJE</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/alarma/dpuntcont.php" target="principal">ALARMA</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/accdiarias/dpuntcont.php" target="principal">ACCIONES DIARIAS</a></li>
						         <li><a href="http://control.<?php  echo $web;?>/servicios/accmantenimiento/dpuntcont.php" target="principal">ACCIONES MANTENIMIENTO</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/niveles/dpuntcont.php" target="principal">NIVELES</a></li>									
									<li><a href="http://control.<?php  echo $web;?>/servicios/productos/dpuntcont.php" target="principal">PRODUCTOS</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/pcontrol/dpuntcont.php" target="principal">PUNTOS DE CONTROL</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/trabajo/dpuntcont.php" target="principal">TRABAJO</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/siniestros/dpuntcont.php" target="principal">SINIESTROS</a></li>
						</ul>
</li>

		
<li><a>DOCUMENTACION >></a>
						<ul>
									<li><a href="http://control.<?php  echo $web;?>/facturacion/contpisc.php" target="principal">CLIENTES</a></li>
									<li><a href="http://control.<?php  echo $web;?>/empleados/lempleados.php?tipo=alta&estado=1&ano=todos&smart=si" target="principal">EMPLEADOS</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/pcontrol/lpuntcont.php" target="principal">PUNTOS DE CONTROL</a></li>
						</ul>
</li>

		
<li><a>INFORMES >></a>
						<ul>
									<li><a href="http://control.<?php  echo $web;?>/servicios/entrada/infpuntcont.php" target="principal">MENSAJE</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/incidencia/infpuntcont.php" target="principal">ALARMA</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/mensaje/infpuntcont.php" target="principal">MENSAJE</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/alarma/infpuntcont.php" target="principal">ALARMA</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/accdiarias/infpuntcont.php" target="principal">ACCIONES DIARIAS</a></li>
						         <li><a href="http://control.<?php  echo $web;?>/servicios/accmantenimiento/infpuntcont.php" target="principal">ACCIONES MANTENIMIENTO</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/niveles/infpuntcont.php" target="principal">NIVELES</a></li>									
									<li><a href="http://control.<?php  echo $web;?>/servicios/productos/infpuntcont.php" target="principal">PRODUCTOS</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/pcontrol/infpuntcont.php" target="principal">PUNTOS DE CONTROL</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/trabajo/infpuntcont.php" target="principal">TRABAJO</a></li>
									<li><a href="http://control.<?php  echo $web;?>/servicios/siniestros/infpuntcont.php" target="principal">SINIESTROS</a></li>
						

						</ul>
</li>
</ul>
-->
</li>