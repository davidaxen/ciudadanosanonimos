<!-- PERSONALIZADOS -->


<?php

$sql="SELECT * from menupersonalizados where user='".$user."' and idempresa='".$ide."'";
$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result");
$p1=mysqli_result($result,0,'documentos');
$p2=mysqli_result($result,0,'piscinas');
$p3=mysqli_result($result,0,'pcontrol');
$p4=mysqli_result($result,0,'carnet');
$p5=mysqli_result($result,0,'contratos');
$p6=mysqli_result($result,0,'asignacion');
$p7=mysqli_result($result,0,'candidatos');
$p8=mysqli_result($result,0,'precios');
$p9=mysqli_result($result,0,'presupuesto');
$p10=mysqli_result($result,0,'datos');

$p11=mysqli_result($result,0,'notas');
$p12=mysqli_result($result,0,'smartcbc');

$sql="SELECT * from personalizados where idempresas='".$ide."'";
$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result");
$row=mysqli_affected_rows();
?>

			<li><a href="#">Personalizados</a>
		
				<ul>
<?php if ($p1=='1'){;?><li><a href="/carteles_n/ddocumentos.php">Documentos</a></li><?php };?>
<?php if ($p2=='1'){;?><li><a href="/servicios_n/piscinas/dpiscinas.php">Datos de Piscinas</a></li><?php };?>
<?php if ($p3=='3'){;?><li><a href="/servicios_n/pcontrol/dpuntcont.php">Puntos de Control</a></li><?php };?>
<?php if ($p4=='1'){;?><li><a href="/servicios_n/carnet/carnetpis.php">Carnet</a></li><?php };?>
<?php if ($p5=='1'){;?><li><a href="/servicios_n/contrato/dcontratos.php">Contratos</a></li><?php };?>
<?php if ($p6=='1'){;?><li><a href="/servicios_n/varios/dasignacion.php">Asignacion de Trabajadores</a></li><?php };?>
<?php if ($p7=='1'){;?>
		<li><a href="/servicios_n/candidatos/lcandidatos.php">Candidatos</a></li>
		<li><a href="/servicios_n/candidatos/lpresupuestos.php">Clientes Via Web</a></li>
<?php };?>
<?php if ($p8=='1'){;?><li><a href="/servicios_n/precios/dprecios.php">Precios</a></li><?php };?>		        
<?php if ($p9=='1'){;?><li><a href="/servicios_n/presupuestos/dpresupuestos.php">Presupuestos</a></li><?php };?>	
<?php if ($p10=='1'){;?><li><a href="/utilidades_n/publid.php">Datos</a></li><?php };?>
<?php if ($p11=='1'){;?><li><a href="/utilidades_n/notastotales.php">Notas</a></li><?php };?>
<?php if ($p12=='1'){;?><li><a href="/servicios_n/presupuestos/dsmartcbc.php">Documentos Smartcbc</a></li><?php };?>


				</ul>
			</li>
<!-- FIN PERSONALIZADOS -->