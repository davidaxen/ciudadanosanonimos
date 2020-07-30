<?php  
include('bbdd.php');

if ($com=='comprobacion'){;

 include('portada_n/cabecera42.php');

 ?>


<div class="colocacion derecha">

<div id="main3">
<span><?php  include('logo2.php');?></span>
<span><?php  include('portada_n/portada2.php');?></span>

</div>

<div id="main4">
<?php include ('estilo/tab.htm');?>

<?php 
$sql="select * from portadapag where idempresa='".$ide."'";
//echo $sql;
$result=mysqli_query ($conn, $sql) or die ("Invalid result idempresas");
$row=mysqli_num_rows($result);
?>


<div class="tab">
<?php 
for ($j=0;$j<$row;$j++){;
mysqli_data_seek($result,$j);
$resultado=mysqli_fetch_array($result);
$titulo=$resultado['titulo'];
$pagport=$resultado['pag'];
?>

  <button class="tablinks" onclick="openCity(event, '<?php  echo $titulo;?>')" <?php if($j==0){;?>id="defaultOpen"<?php }?> ><?php  echo $titulo;?></button>
  
 <?php 
};
?> 
</div>




<?php 
for ($j=0;$j<$row;$j++){;
mysqli_data_seek($result,$j);
$resultado=mysqli_fetch_array($result);
$titulo=$resultado['titulo'];
$pagport=$resultado['pag'];
?>
<div id="<?php  echo $titulo;?>" class="tabcontent">
  <h3><?php  echo $titulo;?></h3>
  <p><iframe style="border:0" name="bloque<?php  echo $j;?>" src="portada_n/<?php  echo $pagport;?>" width="100%" height="325" scrolling="auto"></iframe></p>
</div>


<?php 
};
?>
<?php include ('js/tabjs.htm');?>



</div>



</div>
    

</body>

</html>
<?php }else{;?>
<html>
<head>
<title>
SMARTCBC - PROGRAMA DE GESTION DE PERSONAL Y TRABAJO - 
</title>
<link rel="stylesheet" href="estilo/estilo.css">
</head>
<body>
<img src="/img/smartcbc_logo.png" height=80>
<p> </p>
<center>No tiene permisos para acceder a la pagina de native</center>
<a href="https://www.nativecbc.com">Ir al inicio</a>

</body>

</html>
<?php };?>