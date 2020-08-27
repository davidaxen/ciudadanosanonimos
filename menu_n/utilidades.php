<?php
$sql="select * from menuutilidades where user='".$user."' and idempresa='".$ide."'";
$result=$conn->query($sql);
$resultado=$result->fetchAll();
$u1=$resultado[0]['fax'];
$u2=$resultado[0]['etiquetas'];
$u3=$resultado[0]['sobres'];
$u4=$resultado[0]['calendariolaboral'];
$u5=$resultado[0]['publicidad'];
$u6=$resultado[0]['usuarios'];

/*$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menuexistencias");
$u1=mysqli_result($result,0,'fax');
$u2=mysqli_result($result,0,'etiquetas');
$u3=mysqli_result($result,0,'sobres');
$u4=mysqli_result($result,0,'calendariolaboral');
$u5=mysqli_result($result,0,'publicidad');
$u6=mysqli_result($result,0,'usuarios');*/
?>

<!-- UTILIDADES -->
			<li><a href="#">Utilidades</a>
		
				<ul>
<?php if ($u1=='1'){;?><li><a href="/utilidades_n/datosfax.php">Fax</a></li><?php };?>
<?php if ($u2=='1'){;?><li><a href="/utilidades_n/etiquetas.php">Etiquetas</a></li><?php };?>
<?php if ($u3=='1'){;?><li><a href="/utilidades_n/sobres.php">Sobres</a></li><?php };?>
<?php if ($u4=='1'){;?><li><a href="/utilidades_n/calensolar.php">Calendario Laboral</a></li><?php };?>
<?php if ($u5=='1'){;?><li><a href="/utilidades_n/dpublicidad.php">Publicidad</a></li><?php };?>
<?php if ($u6=='1'){;?><li><a href="/utilidades_n/usuarios.php">Usuarios</a></li><?php };?>

				</ul>
			</li>
<!-- FIN UTILIDADES -->