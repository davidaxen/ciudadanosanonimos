<?php   
include('bbdd.php');

if ($ide!=null){;

 include('../portada_n/cabecera2.php');
 
/*
$fecha=$_GET["fecha"];
$idpccat=$_GET["idpccat"];
*/
$año= strtok($fecha, '-');
$mes= strtok('-');
$dia= strtok('-');
$diaa=$dia-1;
$diap=$dia+1;
$fechac=$dia.'/'.$mes.'/'.$año;

$fechaa=date("Y-m-d", mktime(0, 0, 0, $mes, $diaa, $año));
$fechap=date("Y-m-d", mktime(0, 0, 0, $mes, $diap, $año));
$sql12="SELECT * from almpcinci where dia='".$fecha."' and idempresas='".$ide."'";
if($clivp!=0){;
$sql12.=" and idpiscina='".$clivp."'";
};
$sql12.=" and texto!='0' order by id,idempleado"; 
//echo $sql12;

$result12=$conn->query($sql12);
$result12mos=$conn->query($sql12);
$num_rows=$result12->fetchAll();
$row12=count($num_rows);

//$result12=mysqli_query ($conn,$sql12) or die ("Invalid result 1");
//$row12=mysqli_num_rows($result12);
//echo $row12;
?>

<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1000; /* Sit on top */
  padding: 10px; /* Location of the box */
  left: 0;
  top: 0;
  text-align:center;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* The expanding image container */
.container {
  position: relative;
  display: none;
}

/* Expanding image text */
#imgtext {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: white;
  font-size: 20px;
}

/* Closable button inside the expanded image */
.closebtn {
	z-index:1005;
  position: absolute;
  top: 10px;
  right: 115px;
  color: white;
  font-size: 35px;
  cursor: pointer;
}

</style>

<div class="modal">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg" style="width:50%" >
  <div id="imgtext"></div>
</div>

<div id="main">
<div class="titulo">
<p class="enc">
<a href="trabinci.php?fecha=<?php  echo $fechaa;?>&idpccat=20"><img src="../img/minor-event-icon.png" width="20px"></a>
Incidencias enviadas el dia: <?php  echo $fechac;?>
<a href="trabinci.php?fecha=<?php  echo $fechap;?>&idpccat=20"><img src="../img/add-event-icon.png"  width="20px"></a>

</p>


</div>
<div class="contenido">
<br/>
<table border="0">
<tr class="subenc6"><td>Personal</td><td>Texto</td><td>Puesto de Trabajo</td><td>Hora</td><td>Mapa</td><td>Imagen</td><td>Asignar</td></tr>
<?php 

foreach ($result12mos as $row12) {

//for ($j=0;$j<$row12;$j++){;
//mysqli_data_seek($result12,$j);
//$resultado12 = mysqli_fetch_array ($result12);
$idempleado=$row12['idempleado'];
$idpiscina=$row12['idpiscina'];
$hora=$row12['hora'];
$texto=$row12['texto'];
$tiempo=$row12['tiempo'];
$lat=$row12['lat'];
$lon=$row12['lon'];
$urgente=$row12['urgente'];
$imagen=$row12['imagen'];

$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'";

$result10=$conn->query($sql10);
$resultado10=$result10->fetchAll();
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
//$resultado10 = mysqli_fetch_array ($result10);
$nombre=$resultado10['nombre'];
$priape=$resultado10['1apellido'];
$segape=$resultado10['2apellido'];
$tele1=$resultado10['tele1'];
$tele2=$resultado10['tele2'];
$nombretrab=$nombre.' '.$priape.' '.$segape;

if ($idpiscina!=0){;
$sql11="SELECT * from clientes where idclientes='".$idpiscina."' and idempresas='".$ide."'"; 
if ($idcli!=0){;
$sql11.=" and nif='".$gente."'";
}; 

$result11=$conn->query($sql11);
$resultado11=$result11->fetchAll();
$row11=count($num_rows);
//$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
//$resultado11 = mysqli_fetch_array ($result11);
//$row11=mysqli_num_rows($result11);
$nombrecom=$resultado11['nombre'];
}else{;
if($row11==0){;
$row11=1;
};
$nombrecom="Fuera del puesto de Trabajo";
};
?>
<?php if(($idcli!=0 and $idpiscina==0) or $row11==1){;?>
<tr 

<?php 
$h=fmod($j,2);
if ($urgente=='1'){;?>class="mpar"<?php }else{;?> 

<?php if ($h=='0'){;?>class="cpar"<?php }else{;?> 
class="subenc7"
<?php };?> 

<?php };?> 
>
<td><?php  echo strtoupper($nombretrab);?></td>
<td><?php  echo strtoupper($texto);?></td>
<td><?php  echo strtoupper($nombrecom);?></td>
<td><?php  echo strtoupper($hora);?></td>
<td><a href="mapa.php?lon=<?php  echo $lon;?>&lat=<?php  echo $lat;?>&nombrecom=<?php  echo $nombrecom;?>&nombretrab=<?php  echo $nombretrab;?>"><img src="../img/modificar.gif"></a></td>
<td><?php if ($imagen!=null){;?>
<img src="../img/<?php  echo $imagen;?>" style="width:50px;height:50px" onclick="myFunction(this);">
<?php };?></td>
<td><a href="../servicios_n/trabajo/ipuntcont.php?idclientesinc=<?php  echo $idpiscina;?>&descripcion=<?php  echo $texto;?>"><img src="../img/asignacion.png" width="32px"></a></td>
</tr>
<?php 
};
};?>
</table>

</div>

</div>


<script>
function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
</script>



<?php }else{;
include ('../cierre.php');
 };?>
