<?php  
include('bbdd.php');

if ($ide!=null){;

include('../portada_n/cabecera2.php');
 include('../estilo/acordeon.php');  
?>


<div id="main">
<div class="titulo">
<p class="enc">MI CUENTA</p>
</div>
<div class="contenido"  style="padding-left:10px">
<script>
//var imageUrl="color.png"; // optionally, you can change path for images.

var maxi=5;
var maxi2=0;
//El contador es un arrayo de forma que cada posición del array es una linea del formulario
var contador=new Array(0,0);

function validar(check,grupo) {
	//Compruebo si la casilla está marcada
	if (check.checked==true){
		//está marcada, entonces aumento en uno el contador del grupo
		contador[grupo]++;
		//alert(contador[grupo]);
		//compruebo si el contador ha llegado al maximo permitido
		if (contador[grupo]>maxi) {
			//si ha llegado al máximo, muestro mensaje de error
			alert('No se pueden elegir mas de '+maxi+' casillas a la vez.');
			//desmarco la casilla, porque no se puede permitir marcar
			check.checked=false;
			//resto una unidad al contador de grupo, porque he desmarcado una casilla
			contador[grupo]--;
		}
	}else {
		//si la casilla no estaba marcada, resto uno al contador de grupo
		contador[grupo]--;
	}
}
</script>


<style>
a {text-decoration:none}
a hover: {text-decoration:none}
		
</style>


<?php 
$sql33="select * from portadai where idempresa='".$idempresas."'";
$result33=mysqli_query ($conn,$sql33) or die ("Invalid result232");
$soco33=mysqli_fetch_array($result33);
$ttg=0;
for ($tg=2;$tg<count($soco33);$tg++){;
if ($soco33[$tg]==1){;
	$ttg=$ttg+1;
	//echo $ttg;
	};
};
$ttg=6-$ttg;
?>



<form action="intro2.php" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
<input type="hidden" name="tablas" value="modificar">
<input type="hidden" name="subtabla" value="portada">
<input type="hidden" name="idcm" value="20">
<?php 
$sql23="select * from empresas where idempresas='".$idempresas."' ";
$result23=mysqli_query ($conn,$sql23) or die ("Invalid result23");
$soco=mysqli_fetch_array($result23);
$row=mysqli_num_rows($result23);
$col=mysqli_num_fields($result23);

mysqli_field_seek($result23, 2);
$usera=mysqli_fetch_field($result23)->name;


$sql2s="select * from servicios where idempresa='".$idempresas."' ";
$result2s=mysqli_query ($conn,$sql2s) or die ("Invalid result2p");
$socos=mysqli_fetch_array($result2s);
$rows=mysqli_num_rows($result2s);
$cols=mysqli_num_fields($result2s);


$sql2si="select * from menuserviciosimg where idempresa='".$idempresas."' ";
$result2si=mysqli_query ($conn,$sql2si) or die ("Invalid result2p");
$socosi=mysqli_fetch_array($result2si);
$rowsi=mysqli_num_rows($result2si);
$colsi=mysqli_num_fields($result2si);

$sql2sn="select * from menuserviciosnombre where idempresa='".$idempresas."' ";
$result2sn=mysqli_query ($conn,$sql2sn) or die ("Invalid result2p");
$socosn=mysqli_fetch_array($result2sn);
$rowsn=mysqli_num_rows($result2sn);
$colsn=mysqli_num_fields($result2sn);


$sql2p="select * from portadai where idempresa='".$idempresas."' ";
$result2p=mysqli_query ($conn,$sql2p) or die ("Invalid result2p");
$socop=mysqli_fetch_array($result2p);
$rowp=mysqli_num_rows($result2p);
$colp=mysqli_num_fields($result2p);


$sql2h="select * from hoja where idempresa='".$idempresas."' ";
$result2h=mysqli_query ($conn,$sql2h) or die ("Invalid result2h");
$socoh=mysqli_fetch_array($result2h);
$rowh=mysqli_num_rows($result2h);
$colh=mysqli_num_fields($result2h);


$sql2e="select * from etiquetas where idempresa='".$idempresas."' ";
$result2e=mysqli_query ($conn,$sql2e) or die ("Invalid result2e");
$socoe=mysqli_fetch_array($result2e);
$rowe=mysqli_num_rows($result2e);
$cole=mysqli_num_fields($result2e);


$sql25="select * from usuarios where idempresas='".$idempresas."' ";
$result25=mysqli_query ($conn,$sql25) or die ("Invalid result23");
$socou=mysqli_fetch_array($result25);
$rowu=mysqli_num_rows($result25);
$colu=mysqli_num_fields($result25);


for ($j=0;$j<1;$j++){;
mysqli_field_seek($result23, $j);
$nomb23=mysqli_fetch_field($result23)->name;
?>
<input type="hidden" name="datosa[<?php  echo$j;?>]" value="<?php  echo$soco[$j];?>">
<input type="hidden" name="nombrea[<?php  echo$j;?>]" value="<?php  echo$nomb23;?>">
<?php };?>


<?php 
for ($j=2;$j<$cols;$j++){;
mysqli_field_seek($result2s, $j);
$nomb2s=mysqli_fetch_field($result2s)->name;
?>
<input type="hidden" name="datossa[<?php  echo$j;?>]" value="<?php  echo$socos[$j];?>">
<input type="hidden" name="nombresa[<?php  echo$j;?>]" value="<?php  echo$nomb2s;?>">
<?php };?>


<?php for ($j=2;$j<$colp;$j++){;
mysqli_field_seek($result2p, $j);
$nomb2p=mysqli_fetch_field($result2p)->name;
?>
<input type="hidden" name="datospa[<?php  echo$j;?>]" value="<?php  echo$socop[$j];?>">
<input type="hidden" name="nombrepa[<?php  echo$j;?>]" value="<?php  echo$nomb2p;?>">
<?php };?>

<?php for ($j=2;$j<$colh;$j++){;
mysqli_field_seek($result2h, $j);
$nomb2h=mysqli_fetch_field($result2h)->name;
?>
<input type="hidden" name="datosha[<?php  echo$j;?>]" value="<?php  echo$socoh[$j];?>">
<input type="hidden" name="nombreha[<?php  echo$j;?>]" value="<?php  echo$nomb2h;?>">
<?php };?>

<?php for ($j=2;$j<$cole;$j++){;
mysqli_field_seek($result2e, $j);
$nomb2e=mysqli_fetch_field($result2e)->name;
?>
<input type="hidden" name="datosea[<?php  echo$j;?>]" value="<?php  echo$socoe[$j];?>">
<input type="hidden" name="nombreea[<?php  echo$j;?>]" value="<?php  echo$nomb2e;?>">
<?php };?>



<div class="accordion">
<img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;"> Servicios
</div>
<div class="panel" style="display:block;">

<img src="../img/iconos/inicio-g.png" width="25px"> Puedes elegir que cinco Servicios quieres acceder a ver desde la portada.<br/>
<img src="../img/iconos/hoja.png" width="25px"> Sirve para indicar si quieres tener dichos servicios en hojas A4<br/>
<img src="../img/iconos/etiqueta.png" width="25px"> Sirve para indicar si quieres tener dichos servicios en etiquetas<p>



<div class="main">

<?php 
$encab=array('Cuadrante','Entrada / Salida','Incidencia','Mensajes','Alarmas','Acciones Diarias','Acciones Mantenimiento','Niveles','Productos','Revision','Trabajo','Siniestro','Control','Mediciones','Ruta','Envases','Incidencias +');


for ($t=0;$t<$cols;$t++){;
$i=$t+2;
$y=$t+2;
$u=$t+3;
mysqli_field_seek($result2s, $i);
$nomb2s=mysqli_fetch_field($result2s)->name;
?>
<?php if($socos[$i]==1){?>

<span class="caja"><img src="../img/<?php  echo$socosi[$u];?>" width="35px"><br/>
<?php  echo$socosn[$u];?>

<br/>
<img src="../img/iconos/inicio-g.png" width="15px">
<input type="checkbox" name="datospn[<?php  echo$y;?>]" 
onclick="validar(formulario.<?php  echo$nomb2s;?>np,0)" 
id="<?php  echo$nomb2s;?>np" value="1"
<?php if($socop[$y]==1){?>checked="checked"<?php };?>
<?php if($socos[$i]==0){?> disabled="disabled"<?php };?>>
<?php if($socop[$y]==1){?><script>validar(formulario.<?php  echo$nomb2s;?>np,0);</script><?php };?>



<?php  
switch($t){;
case 1:
case 5:
case 6:
case 7:
case 8:
$ga=1;break;
default:
$ga=0;
};
if ($ga==1) {;?>
<!--<td>-->

<img src="../img/iconos/hoja.png" width="15px">
<input type="checkbox" name="datoshn[<?php  echo$y;?>]" id="datoshn[<?php  echo$y;?>]" value="1"
<?php if($socoh[$y]==1){?>checked="checked"<?php };?>
 <?php if($socos[$i]==0){?>disabled="disabled"<?php };?> >

<img src="../img/iconos/etiqueta.png" width="15px">


<input type="checkbox" name="datosen[<?php  echo$y;?>]" id="datoshn[<?php  echo$y;?>]" value="1"
<?php if($socoe[$y]==1){?>checked="checked"<?php };?>
<?php if($socos[$i]==0){?> disabled="disabled"<?php };?>>

<?php };?>
</span>


<?php };?>

<?php };?>

</div>
</div>

<button class="accordion">
<img src="../img/iconos/enviar.png" width="32px" style="vertical-align:middle;">  Enviar
</button>


<!--</table>-->
</div>




<?php  include ('../js/acordeonjs.php');?>


</form>

</div>
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>
