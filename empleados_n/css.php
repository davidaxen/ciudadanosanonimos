<html>
<head>
<title>Calculo de la Seguridad Social</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('bbdd.php');

?>

<?php if ($enviar=="Enviar"){;
$sql1="select sum(sse) as sset, sum(sst) as value, sum(salariobruto) as valor, empleados.nombre, empleados.1apellido, empleados.2apellido, nif, nss from nomina, empleados where nomina.idempleado=empleados.idempleado";
switch ($mes){ ;
case "1" : $sql1.=" and finicio between '".date("Y-n-j",mktime(0,0,0,$mes,1,$faño))."' and '".date("Y-n-j",mktime(0,0,0,$mes,31,$faño))."'";$tmes="Enero";$fmes=$mes+1;$fañot=$faño;break; 
case "2" : $sql1.=" and finicio between '".date("Y-n-j",mktime(0,0,0,$mes,1,$faño))."' and '".date("Y-n-j",mktime(0,0,0,$mes,28,$faño))."'";$tmes="Febrero";$fmes=$mes+1;$fañot=$faño;break;
case "3" : $sql1.=" and finicio between '".date("Y-n-j",mktime(0,0,0,$mes,1,$faño))."' and '".date("Y-n-j",mktime(0,0,0,$mes,31,$faño))."'";$tmes="Marzo";$fmes=$mes+1;$fañot=$faño;break;
case "4" : $sql1.=" and finicio between '".date("Y-n-j",mktime(0,0,0,$mes,1,$faño))."' and '".date("Y-n-j",mktime(0,0,0,$mes,30,$faño))."'";$tmes="Abril";$fmes=$mes+1;$fañot=$faño;break;
case "5" : $sql1.=" and finicio between '".date("Y-n-j",mktime(0,0,0,$mes,1,$faño))."' and '".date("Y-n-j",mktime(0,0,0,$mes,31,$faño))."'";$tmes="Mayo";$fmes=$mes+1;$fañot=$faño;break;
case "6" : $sql1.=" and finicio between '".date("Y-n-j",mktime(0,0,0,$mes,1,$faño))."' and '".date("Y-n-j",mktime(0,0,0,$mes,30,$faño))."'";$tmes="Junio";$fmes=$mes+1;$fañot=$faño;break;
case "7" : $sql1.=" and finicio between '".date("Y-n-j",mktime(0,0,0,$mes,1,$faño))."' and '".date("Y-n-j",mktime(0,0,0,$mes,31,$faño))."'";$tmes="Julio";$fmes=$mes+1;$fañot=$faño;break;
case "8" : $sql1.=" and finicio between '".date("Y-n-j",mktime(0,0,0,$mes,1,$faño))."' and '".date("Y-n-j",mktime(0,0,0,$mes,31,$faño))."'";$tmes="Agosto";$fmes=$mes+1;$fañot=$faño;break;
case "9" : $sql1.=" and finicio between '".date("Y-n-j",mktime(0,0,0,$mes,1,$faño))."' and '".date("Y-n-j",mktime(0,0,0,$mes,30,$faño))."'";$tmes="Septiembre";$fmes=$mes+1;$fañot=$faño;break;
case "10" : $sql1.=" and finicio between '".date("Y-n-j",mktime(0,0,0,$mes,1,$faño))."' and '".date("Y-n-j",mktime(0,0,0,$mes,31,$faño))."'";$tmes="Octubre";$fmes=$mes+1;$fañot=$faño;break;
case "11" : $sql1.=" and finicio between '".date("Y-n-j",mktime(0,0,0,$mes,1,$faño))."' and '".date("Y-n-j",mktime(0,0,0,$mes,30,$faño))."'";$tmes="Noviembre";$fmes=$mes+1;$fañot=$faño;break;
case "12" : $sql1.=" and finicio between '".date("Y-n-j",mktime(0,0,0,$mes,1,$faño))."' and '".date("Y-n-j",mktime(0,0,0,$mes,31,$faño))."'";$tmes="Diciembre";$fmes=1;$fañot=$faño+1;break;
}; 
$sql1.=" and nomina.idempresa=empleados.idempresa and nomina.idempresa='".$ide."' group by nomina.idempleado";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$row=mysqli_num_rows($result1);


$titulo="Pago Seg Social - ".$mes."-".$faño;

?>

<body>

<table>
<tr><td rowspan=2><img src="../img/<?php  echo $img;?>"></td><td><font face="Tahoma" size="5">Calculo de la Seguridad Social</font></td></tr>
<tr><td><font face="Tahoma" size="5"><?php  echo $tmes;?> - <?php  echo $faño;?></font></td></tr>
</table>
<p>
<?php if ($crear!="Asiento"){;
$sset=0;
?>
<table>
    <tr>
    <td width="200" height="25"><font face="Tahoma" size="1">Nombre, Apellidos</font></td>
    <td width="109" height="25"><font face="Tahoma" size="1">N.I.F</font></td>
    <td width="109" height="25"><font face="Tahoma" size="1">Nº Seg. Social</font></td>
    <td width="109" height="25"><font face="Tahoma" size="1">Salario Bruto</font></td>
    <td width="109" height="25"><font face="Tahoma" size="1">Seguridad Social para cotizacion:</font></td>
    <td width="109" height="25"><font face="Tahoma" size="1">Seguridad Social empleados:</font></td>
  </tr>  
  <?php for ($j=0;$j<$row;$j++){;
  mysqli_data_seek($result1,$j);
  $resultado1=mysqli_fetch_array($result1);
  $sst=$resultado1['value'];
$salariot=$resultado1['valor'];
$nombreemp=$resultado1['nombre'];
$primapeemp=$resultado1['1apellido'];
$segapeemp=$resultado1['2apellido'];
$nif=$resultado1['nif'];
$nss=$resultado1['nss'];
$sse=$resultado1['sset'];
$sset=$sset+$sse;
?>
   <tr>
    <td width="200" height="25"><font face="Tahoma" size="1"><?php  echo $nombreemp;?>, <?php  echo $primapeemp;?> <?php  echo $segapeemp;?></font></td>
    <td width="109" height="25"><font face="Tahoma" size="1"><?php  echo $nif;?></font></td>
    <td width="109" height="25"><font face="Tahoma" size="1"><?php  echo $nss;?></font></td>
		<td width="109" height="25"><font face="Tahoma" size="1"><?php  echo $salariot;?></font></td>
  	<td width="109" height="25"><font face="Tahoma" size="1"><?php  echo $sst;?></font></td>
  	<td width="109" height="25"><font face="Tahoma" size="1"><?php  echo $sset;?></font></td>
  	
  </tr>
  <?php };?>

</table>
<?php 
include('../contabilidad/sqlcontabilidad.php');

$sql33="select * from asientos where obs='".$titulo."' and idempresas='".$ide."' and año='".$faño."'"; 
$result33=mysqli_query ($conn,$sql33) or die ("Invalid result33");
$row33=mysqli_num_rows($result33);
?>
<?php if ($row33==null){;?>
<form action="css.php" method="get">
<input type="hidden" name="sset" value="<?php  echo $sset;?>">
<input type="hidden" name="mes" value="<?php  echo $mes;?>">
<input type="hidden" name="faño" value="<?php  echo $faño;?>">
<input type="hidden" name="enviar" value="Enviar">
<table>
<tr><td>Fecha de Pago</td><td><input type="text" name="dia" maxlength="2" size=2> - 
<input type="text" name="mesa" maxlength="2" value="<?php  echo $fmes;?>" size=2> - <?php  echo $faño;?></td></tr>
<tr><td>Importe pagado a Seg Social</td><td><input type="text" name="banco" ></td></tr>
<tr><td><input type="submit" name="crear" value="Asiento"></td></tr>
</form>
<?php }else{;?>
Asiento Realizado
<table>
<tr><td>Asiento</td><td>Cuenta</td><td>Fecha</td><td>Observaciones</td><td>Debe</td><td>Haber</td></tr>
<?php for ($i=0;$i<$row33;$i++){;
mysqli_data_seek($result33,$i);
$resultado33=mysqli_fetch_array($result33);
$idasiento=$resultado33['idasiento'];
$categoria=$resultado33['categoria'];
$fecha=$resultado33['fecha'];
$debe=$resultado33['debe'];
$debe=$resultado33['debe'];
$haber=$resultado33['haber'];
$obs=$resultado33['obs'];
?>
<tr>
<td><?php  echo $idasiento;?></td>
<?php 
$sql34="select descripcion from cuentas where subcuenta='".$categoria."'"; 
$result34=mysqli_query ($conn,$sql34) or die ("Invalid result34");
$resultado34=mysqli_fetch_array($result34);
$ncat=$resultado34['descripcion'];
?>
<td><?php  echo $categoria;?> - <?php  echo $ncat;?></td>
<td><?php  echo $fecha;?></td>
<td><?php  echo $obs;?></td>
<td>
<?php if ($debe!=null){;?>
<?php  echo $debe;?>
<?php };?></td>

<td>
<?php if ($haber!=null){;?>
<?php  echo $haber;?>
<?php };?></td>

<?php };?>
</table>
<?php };?>

<?php }else{;?>
<?php 
include('../contabilidad/sqlcontabilidad.php');
$sql21="select idasiento from asientos where idempresas='".$ide."' order by idasiento desc";
$result21=mysqli_query ($conn,$sql21) or die ("Invalid result categoria");
ç$resultado21=mysqli_fetch_array($result21);
$idasiento=$resultado21['idasiento'];
if ($idasiento!=null){;
$idasiento=$idasiento+1;
}else{;
$idasiento=1;
};

$fechaa=$faño."-".$mesa."-".$dia;

$segsocemp=$banco-$sset;

$mest=$mesa-1;

$sql21="select subcuenta from cuentas where cuenta='476' and idempresa='".$ide."'";
$result21=mysqli_query ($conn,$sql21) or die ("Invalid result22");
$coss=$resultado21['subcuenta'];

$sql22="select subcuenta from cuentas where cuenta='572' and idempresa='".$ide."'";
$result22=mysqli_query ($conn,$sql22) or die ("Invalid result22");
$resultado22=mysqli_fetch_array($result22);
$cban=$resultado22['subcuenta'];

$sql23="select subcuenta from cuentas where cuenta='642' and idempresa='".$ide."'";
$result23=mysqli_query ($conn,$sql23) or die ("Invalid result22");
$resultado23=mysqli_fetch_array($result23);
$csse=$resultado23['subcuenta'];

$sql11="insert into asientos (idasiento,idempresas,fecha,año,debe,haber,categoria,obs) 
values ('$idasiento','$ide','$fechaa','$faño','$sset','','$coss','$titulo')";
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result11");

$sql12="insert into asientos (idasiento,idempresas,fecha,año,debe,haber,categoria,obs) 
values ('$idasiento','$ide','$fechaa','$faño','$segsocemp','','$csse','$titulo')";
$result12=mysqli_query ($conn,$sql12) or die ("Invalid result12");

$sql13="insert into asientos (idasiento,idempresas,fecha,año,debe,haber,categoria,obs) 
values ('$idasiento','$ide','$fechaa','$faño','','$banco','$cban','$titulo')";
$result13=mysqli_query ($conn,$sql13) or die ("Invalid result12");




?>
<p>
Asiento Contable Introducido.

<?php };?>




<?php }else{;
include ('../cierre.php');
 };?>
</body>

</html>
