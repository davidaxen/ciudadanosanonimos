<?php 
include('bbdd.php');
?>


<html>
<?php if ($com=="comprobacion"){;?>
<head>
<title>Alta de Cuadrante</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>

<body>
<table>
<tr><td><img src="../img/<?php  echo $img;?>" width="300" height="81"></td>
<td><font face="Tahoma" size="5">Alta de Cuadrante</font></td></tr>
</table>
<?php 
if ($enviar==null){;
?>
<form action="acuadrante.php" method="post">
<?php 
if ($ide=='10'){;
$a�o=date("Y",time());
$sql10="SELECT * from almcontratos where idempresa='".$ide."' and fecha between '".$a�o."-01-01' and '".$a�o."-12-31'";
}else{;
$sql10="select idcliente from datos_vigilancia where idempresa='".$ide."'";
};

$result=$conn->query($sql10);
$resultmos=$conn->query($sql10);
$num_rows=$result->fetchAll();
$row10=count($num_rows);

//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result10");
//$row10=mysqli_num_rows($result10);

$sql0="select idclientes,nombre from clientes where idempresas='".$ide."' and estado='1'";
if ($row10!=0){;
$sql0.=" and idclientes in (";

foreach ($resultmos as $row10) {


//for ($t=0;$t<$row10;$t++){;
//mysqli_data_seek($result10,$t);
//$resultado10=mysqli_fetch_array($result10);
$idcli=$row10['idcliente'];
$sql0.="'".$idcli."'";
if($t!=($row10-1)){;
$sql0.=",";
};
};
$sql0.=")";
};

$result0=$conn->query($sql0);
$result0mos=$conn->query($sql0);
$num_rows=$result->fetchAll();
$row0=count($num_rows);

//$result0=mysqli_query ($conn,$sql0) or die ("Invalid result0");
//$row0=mysqli_num_rows($result0);


?>
<table>
<tr><td>Nombre de Clientes</td></tr>
<tr><td>
<select name="clientes">
<option value=" "> 
<option value="0">Sin determinar
<?php  

foreach ($result0mos as $row0) {
	

//for ($j=0; $j<$row0; $j++){;
//mysqli_data_seek($result0,$j);
//$resultado0=mysqli_fetch_array($result0);
$idp=$row0['idclientes'];
$nombrep=$row0['nombre'];
?>
<option value="<?php  echo $idp?>"><?php  echo $nombrep?>
<?php };?>
</select></td>
</tr>
<tr><td>Turno</td></tr>
<tr>
<td><select name="turno"><option value="1">Ma�ana<option value="2">Tarde<option value="3">Noche</select></td>
</tr>
<tr><td>Horas</td></tr>
<tr><td><input type="text" name="horas"></td></tr>
<tr><td>Mes</td></tr>
<td>
<select size="1" name="mes" size="23">
<option value=" "> </option>
<option value="1">Enero</option>
<option value="2">Febrero</option>
<option value="3">Marzo</option>
<option value="4">Abril</option>
<option value="5">Mayo</option>
<option value="6">Junio</option>
<option value="7">Julio</option>
<option value="8">Agosto</option>
<option value="9">Septiembre</option>
<option value="10">Octubre</option>
<option value="11">Noviembre</option>
<option value="12">Diciembre</option>
</select></td>
</tr>

<tr><td>A�o</td></tr>
<tr>
<td>
<select name="a�o">
<option value=" "> 
<?php $today=getdate();
$a=$today['year'];
$b=$a+2;
for ($j=2004;$j<$b;$j++){;?>
<option value="<?php  echo $j?>"><?php  echo $j?>
<?php };?>
</select>
</td></tr>
</table>
<input class="envio" type="submit" name="enviar" value="enviar">
</form>
<?php 

}else{;
$t10=mktime(0,0,0,$mes,1,$a�o);
$t11=mktime(0,0,0,$mes+1,1,$a�o);
$t101=date("Y-n-j",mktime(0,0,0,$mes,1,$a�o));
$t102=date("Y-n-j",mktime(0,0,0,$mes+1,1,$a�o));
$t=round(($t11-$t10)/86400,0);

$sql10="select idempleado from datos_personal where idempresa='".$ide."' and idcliente='".$clientes."'";

$result10=$conn->query($sql10);
$result0mos=$conn->query($sql10);
$num_rows=$result->fetchAll();
$row10=count($num_rows);
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result10");
//$row10=mysqli_num_rows($result10);



$sql0="select idempleado, nombre, 1apellido as pa, 2apellido as sa from empleados where idempresa='".$ide."'";
if (($user!='piscisol') and($user!='mario')) {;
$sql0.=" and estado='1'";
};
if ($row10!=0){;
$sql0.=" and idempleado in (";

foreach ($result0mos as $row10) {
	

//for ($�=0;$�<$row10;$�++){;
//mysqli_data_seek($result10,$�);
//$resultado10=mysqli_fetch_array($result10);
$idempl=$row10['idempleado'];
$sql0.="'".$idempl."'";
if($�!=($row10-1)){;
$sql0.=",";
};
};
$sql0.=")";
};

$result0=$conn->query($sql0);
$num_rows=$result->fetchAll();
$row0=count($num_rows);

//$result0=mysqli_query ($conn,$sql0) or die ("Invalid result0");
//$row0=mysqli_num_rows($result0);

$sql10="select idclientes,nombre from clientes where idempresas='".$ide."' and idclientes='".$clientes."'";

$result10=$conn->query($sql10);
$resultado10=$result10->fetch();
$num_rows=$result10->fetchAll();
$row0=count($num_rows);
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result0");
//$resultado10=mysqli_fetch_array($result10);
$nombrep=$resultado10['nombre'];
?>
<p>
<form action="intro2.php" method="get" name="form2">
<input type="hidden" name="tabla" value="cuadrante"> 
<table border=0>
<input type="hidden" name="idcomunidad" value="<?php  echo $clientes;?>">
<input type="hidden" name="turno" value="<?php  echo $turno;?>">
<input type="hidden" name="horas" value="<?php  echo $horas;?>">
<input type="hidden" name="dias" value="<?php  echo $t;?>">
<input type="hidden" name="mes" value="<?php  echo $mes;?>">
<input type="hidden" name="a�o" value="<?php  echo $a�o;?>">

<?php if ($ide=='10'){;
$a�o=date("Y",time());
$sql10="SELECT * from almcontratos where idempresa='".$ide."' and idcliente='".$clientes."' and fecha between '".$a�o."-01-01' and '".$a�o."-12-31'";

$result10=$conn->query($sql10);
$resultado10=$result10->fetch();
//$num_rows=$result10->fetchAll();
//$row0=count($num_rows);

//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result");
//$resultado10=mysqli_fetch_array($result10);
$idcontrato=$resultado10['id'];
$tcontrato=$resultado10['tcontrato'];

switch ($mes){;
case 6: $dmes='numero de horas durante junio';$texto='numero de horas contratadas - junio :';break;
case 7: $dmes='numero de horas durante julio';$texto='numero de horas contratadas - julio :';break;
case 8: $dmes='numero de horas durante agosto';$texto='numero de horas contratadas - agosto :';break;
case 9: $dmes='numero de horas durante septiembre';$texto='numero de horas contratadas - septiembre :';break;
};

$sql11="SELECT * from ocontratoemp where idcontrato='".$tcontrato."' and nombre='".$dmes."'";

$result11=$conn->query($sql11);
$resultado11=$result11->fetch();
//$num_rows=$result10->fetchAll();
//$row0=count($num_rows);

//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result");
//$resultado11=mysqli_fetch_array($result11);
$orden=$resultado11['orden'];

$sql12="SELECT * from almocontratos where idalmcontrato='".$idcontrato."' and orden='".$orden."'";


$result12=$conn->query($sql12);
$resultado12=$result12->fetch();
//$num_rows=$result10->fetchAll();
//$row0=count($num_rows);

//$result12=mysqli_query ($conn,$sql12) or die ("Invalid result");
//$resultado12=mysqli_fetch_array($result12);
$valor=$resultado12['dato'];
?>

<tr><td><?php  echo strtoupper($texto);?></td><td><?php  echo $valor;?></td></tr>
<?php };?>

<tr><td>nombre de la Comunidad</td><td><?php  echo $nombrep;?></td></tr>
<tr><td>Turno</td><td>
<?php switch ($turno){;
case 1: $d="Ma�ana";break;
case 2: $d="Tarde";break;
case 3: $d="Noche";break;
};
?>
<?php  echo $d;?></td></tr>
<tr><td>Horas</td><td><?php  echo $horas;?></td></tr>
</table>
<table border=0>
<tr class="subenc">
             <td>Dia</td>
             <td>Empleado</td>
</tr>
<tr>
<?php  for ($f=1;$f<$t+1;$f++){;
$t1=date("j-n-Y D",mktime(0,0,0,$mes,$f,$a�o));
$t2=date("Y-n-j",mktime(0,0,0,$mes,$f,$a�o));?>
<td><input type="hidden" name="fecha[<?php  echo $f;?>]" value="<?php  echo $t2;?>"><?php  echo $t1;?></td>
<?php  
$sqldf="select * from diasfestivos where a�o='".$a�o."' and mes='".$mes."' and dia='".$f."'"; 

$resultdf=$conn->query($sqldf);
$resultadomos=$resultdf->fetch();
$num_rows=$resultdf->fetchAll();
$rowdf=count($num_rows);


//$resultdf=mysqli_query ($conn,$sqldf) or die ("Invalid query");
//$rowdf=mysqli_num_rows($resultdf);
?>
<td>
<select name="empleados[<?php  echo $f;?>]" <?php if ($rowdf==1){;?>id="menusel"<?php };?> >
<option value=" "> 
<?php  

foreach ($resultadomos as $row0) {


//for ($j=0; $j<$row0; $j++){;
//mysqli_data_seek($result0,$j);
//$resultado0=mysqli_fetch_array($result0);
$idce=$row0['idempleado'];
$nombree=$row0['nombre'];
$apellidope=$row0['pa'];
$apellidose=$row0['sa'];?>
<option value="<?php  echo $idce?>"><?php  echo strtoupper($nombree)?> <?php  echo strtoupper($apellidope)?> <?php  echo strtoupper($apellidose)?>
<?php };?>
</select>
</td>
</tr>
<?php };?>



</table>
<input class="envio" type="submit" name="enviar" value="enviar">
</form>

<?php };?>
<?php }else{;
include ('../cierre.php');
 };?>

</body>
</html>