<?php   
include('bbdd.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>

<title>PORTADA DE PROGRAMA</title>

<link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="../css/imageMenu.css">
<link rel="stylesheet" type="text/css" media="screen" href="../css/lightbox.css">
<link rel="stylesheet" type="text/css" media="screen" href="../css/multibox.css">
<link rel="stylesheet" href="estilo/estilo.css" type="text/css">

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

<style>

<?php 
$sql01="SELECT * from portadai where idempresa='".$ide."'"; 
//echo $sql01;

$result01=$conn->query($sql01);

//$result01=mysqli_query ($conn,$sql01) or die ("Invalid result 1");
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
for ($j=0;$j<count($valores);$j++){
//echo $valores[$j].'-'.$dato[$j].'-'.$ipcat[$j];
if ($dato[$j]==1){;
$idpccat=$ipcat[$j];
$sql02="SELECT * from categorias where idpccat='".$idpccat."'";

$result02=$conn->query($sql02);

//$result02=mysqli_query ($conn,$sql02) or die ("Invalid result 1");


//comentar con david
$imagen=$num_rows[0]['imagen'];
//$imagen=mysqli_result($result02,0,'imagen');

?>

#kwick .opt<?php  echo $t;?> {
	background: #ccc url('../img/<?php  echo $imagen;?>');

}
<?php 
$t=$t+1;
};?>
<?php };?>


</style>

</head>
<body onUnload="GUnload()">


		<script type="text/javascript">
			var box = {};
			window.addEvent('domready', function(){
				box = new MultiBox('mb', {descClassName: 'multiBoxDesc', useOverlay: true});
			});
						var box = {};
			window.addEvent('domready', function(){
				box = new MultiBox('mb0', {descClassName: 'multiBoxDesc', useOverlay: true});
			});
						var box = {};
			window.addEvent('domready', function(){
				box = new MultiBox('mb1', {descClassName: 'multiBoxDesc', useOverlay: true});
			});
									var box = {};
			window.addEvent('domready', function(){
				box = new MultiBox('mb2', {descClassName: 'multiBoxDesc', useOverlay: true});
			});
									var box = {};
			window.addEvent('domready', function(){
				box = new MultiBox('mb3', {descClassName: 'multiBoxDesc', useOverlay: true});
			});
									var box = {};
			window.addEvent('domready', function(){
				box = new MultiBox('mb4', {descClassName: 'multiBoxDesc', useOverlay: true});
			});
									var box = {};
			window.addEvent('domready', function(){
				box = new MultiBox('mb5', {descClassName: 'multiBoxDesc', useOverlay: true});
			});
		</script>

		
<div id="fondo"><img src="../img/personal22.jpg" /></div>


<div id="container">
		<div class="title">
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr><td rowspan="2" valign="top"><img border="0" src="../img/<?php  echo $img;?>" width="300" height="81"></td>
	<td align="right" rowspan="2" class="enc">PORTADA DE INFORMACION</td></tr>
</table>

	</div>
	
	
	
	<div id="kwick">
		<ul class="kwicks">
		<!--
			<li class="kwick opt1"><span>PERSONAL POR CUADRANTE</span></li>
			<li class="kwick opt2"><span>PERSONAL EN PUESTO</span></li>
			<li class="kwick opt3"><span>INCIDENCIAS</span></li>
			-->
<?php 
$t=1;
for ($j=0;$j<count($valores);$j++){;
if ($dato[$j]==1){;
$idpccat=$ipcat[$j];
$sql02="SELECT * from categorias where idpccat='".$idpccat."'"; 
$result02=mysqli_query ($conn,$sql02) or die ("Invalid result 1");
$categoria=mysqli_result($result02,0,'nombre');
?>
<li class="kwick opt<?php  echo $t;?>"><span><?php  echo strtoupper($categoria);?></span></li>

<?php 
$t=$t+1;
};?>
<?php };?>			


		</ul>
	</div>
	
<?php 
$dia=date("j",time());
$mes=date("n",time());
$año=date("Y",time());
$fechaant=date("Y-m-d", mktime (0,0,0,$mes,$dia-1,$año));
$fechapant=date("Y-m-d", mktime (0,0,0,$mes,$dia-2,$año));
$fechaactual=date("Y-m-d", mktime (0,0,0,$mes,$dia,$año));
$fechaman=date("Y-m-d", mktime (0,0,0,$mes,$dia+1,$año));
$fechapman=date("Y-m-d", mktime (0,0,0,$mes,$dia+2,$año));
?>



	
	

<?php 
for ($j=0;$j<count($valores);$j++){;
if ($dato[$j]==1){;
$idpccat=$ipcat[$j];
$sql02="SELECT * from categorias where idpccat='".$idpccat."'"; 
$result02=mysqli_query ($conn,$sql02) or die ("Invalid result 1");
$categoria=mysqli_result($result02,0,'nombre');
$iconos=mysqli_result($result02,0,'iconos');
$pagina=mysqli_result($result02,0,'pagina');
?>

	<div id="<?php  echo $categoria;?>" class="thumbnailContainer">	
	<div class="clipper">
<h4><?php  echo strtoupper($categoria);?></h4>  
<table align="center">
  <tr>
  <td><a href="<?php  echo $pagina;?>?fecha=<?php  echo $fechaactual;?>&idpccat=<?php  echo $idpccat;?>" rel="width:800,height:500" id="mb12" class="mb2" title="<?php  echo $categoria;?> - Dia <?php  echo $fechaactual;?>">
<img border="0" src="../img/<?php  echo $iconos;?>"  border=0 width="75"><br>Dia <?php  echo $fechaactual;?></a></td>  
 <td>&nbsp;</td>
  <td><a href="<?php  echo $pagina;?>?fecha=<?php  echo $fechaant;?>&idpccat=<?php  echo $idpccat;?>" rel="width:800,height:500" id="mb12" class="mb2" title="<?php  echo $categoria;?> - Dia <?php  echo $fechaant;?>">
<img border="0" src="../img/<?php  echo $iconos;?>"  border=0 width="75"><br>Dia <?php  echo $fechaant;?></a></td>
 <td>&nbsp;</td>
  <td><a href="<?php  echo $pagina;?>?fecha=<?php  echo $fechapant;?>&idpccat=<?php  echo $idpccat;?>" rel="width:800,height:500" id="mb12" class="mb2" title="<?php  echo $categoria;?> - Dia <?php  echo $fechapant;?>">
<img border="0" src="../img/<?php  echo $iconos;?>"  border=0 width="75"><br>Dia <?php  echo $fechapant;?></a></td>
  </tr>
</table>
	</div>
	</div>
	<?php };?>
<?php };?>	
	
	
	
	<div id="footer">
	</div>

</div>

</body>
</html>