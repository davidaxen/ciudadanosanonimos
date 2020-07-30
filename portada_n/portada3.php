<?php   
include('bbdd2.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>

<title>PORTADA DE PROGRAMA</title>

<!--
<link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="../css/imageMenu.css">
<link rel="stylesheet" type="text/css" media="screen" href="../css/lightbox.css">
<link rel="stylesheet" type="text/css" media="screen" href="../css/multibox.css">
<link rel="stylesheet" href="estilo/estilo.css" type="text/css">
-->

<script type="text/javascript" src="../script/mootools.js"></script>
<script type="text/javascript" src="../script/imageMenu.js"></script>
<script type="text/javascript" src="../script/lightbox.js"></script>
<script type="text/javascript" src="../script/images.js"></script>


<script type="text/javascript" src="../script/overlay.js"></script>
<script type="text/javascript" src="../script/multibox.js"></script>

<script type="text/javascript">
	window.addEvent('domready', function(){
		var myMenu = new ImageMenu($$('#kwick .kwick'),{openWidth:300, onClick:openThumbs});
		//Lightbox.init({showControls: true});
	});
</script>


</head>
<body onUnload="GUnload()">

<?php 
$sql01="SELECT * from portadai where idempresa='".$ide."'"; 
//echo $sql01;
$result01=mysqli_query ($conn,$sql01) or die ("Invalid result 1");
$valores=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro');
$ipcat=array('0','1','20','30','40','3','4','2','5','6','7','8');
$dato[]=mysqli_result($result01,0,'cuadrante');
$dato[]=mysqli_result($result01,0,'entrada');
$dato[]=mysqli_result($result01,0,'incidencia');
$dato[]=mysqli_result($result01,0,'mensaje');	
$dato[]=mysqli_result($result01,0,'alarma');
$dato[]=mysqli_result($result01,0,'accdiarias');
$dato[]=mysqli_result($result01,0,'accmantenimiento');
$dato[]=mysqli_result($result01,0,'niveles');
$dato[]=mysqli_result($result01,0,'productos');
$dato[]=mysqli_result($result01,0,'revision');
$dato[]=mysqli_result($result01,0,'trabajo');
$dato[]=mysqli_result($result01,0,'siniestro');
$t=1;
for ($j=0;$j<count($valores);$j++){;
?>
<tr>

<?php 
if ($dato[$j]==1){;
?>
<td>
<?php 
$idpccat=$ipcat[$j];
$sql02="SELECT * from categorias where idpccat='".$idpccat."'"; 
$result02=mysqli_query ($conn,$sql02) or die ("Invalid result 1");
$imagen=mysqli_result($result02,0,'imagen');
?>
<img src="img/<?php  echo $imagen;?>" width="140">
</td>
<?php };?>
</tr>


<?php };?>
</table>




</body>
</html>