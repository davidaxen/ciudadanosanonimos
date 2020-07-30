<?php  
include('bbdd.php');

if (($ide!=null) or ($validar==0)){;
 include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">CONTROL DE VISITA DE USUARIOS</p>
</div>
<div class="contenido">
<?php 
//if ($datos!='datos'){;
?>
<!--
<table>
<form method="post" action="lusuarios.php">
<input type="hidden" name="datos" value="datos">
<tr><td>Estado de Clientes</td><td><select name="estado">
<option value=0>Baja<option value=1 selected>Alta</select></td></tr>
<tr><td><input class="envio" type="submit" name="enviar" value="Enviar"></td></tr>
-->
<?php 
//}else{;

$sql="SELECT * from usuarios where idempresas='".$ide."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
?>

<?include ('../js/busqueda.php');?>


<table width="800" class="table-bordered table pull-right" id="mytable">
<tr class="enctab"><td>Cod Usuario</td><td>Nombre</td><td>N&ordm; visitas</td><td>Ultima Visita</td><td>Mas info</td></tr>
<?php  for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
?>
<tr class="dattab">
<td><?php $user1=$resultado['user'];?><?php  echo$user1;?></td>

<?php 
$idcliente=$resultado['idcliente'];
$idgestor=$resultado['idgestor'];
$idempleados=$resultado['idempleados'];


if ($idempleados!=0){;
$sql10="SELECT nombre,1apellido,2apellido from empleados where idempresa='".$ide."' and idempleado='".$idempleados."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result");
$row10=mysqli_num_rows($result10);
$resultado10=mysqli_fetch_array($result10);
if($row10==0){;
$nombret="";
}else{;
$nombre=$resultado10['nombre'];
$apellido1=$resultado10['1apellido'];
$apellido2=$resultado10['2apellido'];
$nombret=$nombre.",".$apellido1." ".$apellido2;
};
}else{;
		if ($idcliente!=0){;
		$sql10="SELECT nombre from clientes where idempresas='".$ide."' and idclientes='".$idcliente."'"; 
		$result10=mysqli_query ($conn,$sql10) or die ("Invalid result");
		$row10=mysqli_num_rows($result10);
		$resultado10=mysqli_fetch_array($result10);
		$nombre=$resultado10['nombre'];
		$nombret=$nombre;
		}else{;
				if ($idgestor!=0){;
				$sql10="SELECT nombregestor from gestores where idempresa='".$ide."' and idgestor='".$idgestor."'"; 
				$result10=mysqli_query ($conn,$sql10) or die ("Invalid result");
				$row10=mysqli_num_rows($result10);
				$nombre=$resultado10['nombregestor'];
				$nombret=$nombre;
				}else{
						$sql10="SELECT nombre from usuariost where idempresa='".$ide."' and nif='".$user1."'"; 
						$result10=mysqli_query ($conn,$sql10) or die ("Invalid result");
						$row10=mysqli_num_rows($result10);
						if ($row10==0){;
						$nombret="&nbsp;";
						}else{;
						$row10=mysqli_affected_rows();
						$nombre=$resultado10['nombre'];
						$nombret=$nombre;
						};
					};
			};
		};
?>


<td><?php  echo$nombret;?></td>



<?php 
$sql1="SELECT count(usuario) as num from visitas where usuario='".$user1."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
$resultado1=mysqli_fetch_array($result1);
?>
<td><?php $num=$resultado1['num'];?><?php  echo$num;?></td>
<td>
<?php if ($num!=0){;
$sql1="SELECT dia,hora from visitas where usuario='".$user1."' order by dia desc,hora desc"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
$resultado1=mysqli_fetch_array($result1);
?>
<?php $dia=$resultado1['dia'];?><?php  echo$dia;?>-<?php $hora=$resultado1['hora'];?><?php  echo$hora;?>
<?php }else{;?>
sin visitas
<?php };?>
</td>
<td><a href="lvusuarios.php?usuarios=<?php  echo$user1;?>&nombreu=<?php  echo$nombret;?>"><img src="../img/iconlis.png" alt="mas info" border=0 width=20></a></td>

</tr>
<?php };?>
</table>
</div>
</div>
<?php //};?>

<?php } else {;

include ('../cierre.php');

 };
 ?>
