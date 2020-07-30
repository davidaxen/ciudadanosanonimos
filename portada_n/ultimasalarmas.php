<?php   
include('bbdd.php');


$ft=date('Y-n-j');
$tf=date(N);
$hfa=date('H:i:s',mktime( date(H),date(i)-60,0,0,0,0) );
$hfi=date('H:i:s',mktime( date(H),date(i)-20,0,0,0,0) );
$hff=date('H:i:s',mktime( date(H),date(i),0,0,0,0) );
//$hfi='06:46:00';
//$hff='07:05:00';
$sql1="SELECT * from jornadas where  idempresas='".$ide."' ";
switch($tf){;
case 1: $sql1.=" and lun='1' ";break;
case 2: $sql1.=" and mar='1' ";break;
case 3: $sql1.=" and mie='1' ";break;
case 4: $sql1.=" and jue='1' ";break;
case 5: $sql1.=" and vie='1' ";break; 
case 6: $sql1.=" and sab='1' ";break;
case 7: $sql1.=" and dom='1' ";break;
};
$sql1.=" and finicio<='".$ft."' and ffin>='".$ft."' ";
$sql1.=" and horario between '".$hfi."' and '".$hff."' ";
$sql1.="order by horario asc"; 
//echo $sql1;
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_affected_rows();


?>
<script>
function refrescar()
{
	window.location.reload();
}
</script>

<style type="text/css" media="print">
.nover {display:none}
</style>

		<link rel="stylesheet" href="/estilo/estilonuevo.css" type="text/css" media="screen" charset="utf-8" >
	   <link rel="stylesheet" href="/estilo/MenuMatic34.css" type="text/css" media="screen" charset="utf-8" href="menu/" />
	   
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">
<body onload="setTimeout('refrescar()', 60000);">

<table>
<tr class="enctab"><td>Puesto de Trabajo</td><td>Dia</td><td>Hora de Entrada</td><td>Personal Asignado</td></tr>

<?php 
for ($j=0;$j<$row1;$j++){;
$idclientes=mysqli_result($result1,$j,'idclientes');
$horario=mysqli_result($result1,$j,'horario');
$h1=strtok($horario,':');
$m1=strtok(':');
$s1=strtok(':');
$margen=mysqli_result($result1,$j,'margen');
$h2=strtok($margen,':');
$m2=strtok(':');
$s2=strtok(':');
$h=$h1+$h2;
$m=$m1+$m2;
$s=$s1+$s2;
$horalimite=date('H:i:s',mktime( $h,$m,$s,0,0,0) );

if (($horalimite==$hff) or ($horario==$hff)) {;
$sql10="SELECT * from almpc where idpiscina='".$idclientes."' and idempresas='".$ide."'
and idpccat='1' and idpcsubcat='1' and dia='".$ft."' and hora between '".$hfi."' and '".$hff."' ";
//echo $sql10;
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$row10=mysqli_affected_rows();

if ($row10==0){;

if ($horalimite==$hff){;
$sql13 = "INSERT INTO retrasojor(idempresas,idclientes,dia,hora,dsemana,ingreso) 
VALUES ('$ide','$idclientes','$ft','$hff','$tf','1')";
//echo $sql13;
$result13=mysqli_query ($conn,$sql13) or die ("Invalid result iclientes");
};


};
};
};



$sql14="SELECT * from retrasojor where idempresas='".$ide."' and dia='".$ft."' and hora between '".$hfa."' and '".$hff."'"; 
$result14=mysqli_query ($conn,$sql14) or die ("Invalid result 11");
$row14=mysqli_affected_rows();

for ($jk=0;$jk<$row14;$jk++){;
$idclientesa=mysqli_result($result14,$jk,'idclientes');
$diaa=mysqli_result($result14,$jk,'dia');
$horaa=mysqli_result($result14,$jk,'hora');

$sql11="SELECT * from clientes where idclientes='".$idclientesa."' and idempresas='".$ide."'"; 
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");

$nombre=mysqli_result($result11,0,'nombre');
?>
<tr class="dattab">
<td><?php  echo strtoupper($nombre);?></td>
<td><?php  echo strtoupper($diaa);?></td>
<td><?php  echo strtoupper($horaa);?></td>
<td><?php  echo strtoupper($personal);?></td>


</tr>
<?php };?>
</table>
</body>
