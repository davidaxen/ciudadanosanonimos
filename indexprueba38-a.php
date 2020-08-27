<?php 
include('bbdd.php');

if ($com=='comprobacion'){;

 include('portada_n/cabecera.php');

 ?>


<div id="main">

<div id="main3">
<span><?php  include('logo2.php');?></span>
<span><?php  include('portada_n/portada2.php');?></span>

</div>

<div id="main4">

<?php 
$sql="select * from portadapag where idempresa=:ide";
//echo $sql;
$result=$conn->prepare($sql);
$result->bindParam(':ide', $ide);
$result->execute();

/*$result=mysqli_query ($conn, $sql) or die ("Invalid result idempresas");
$row=mysqli_num_rows($result);
for ($j=0;$j<$row;$j++){;
mysqli_data_seek($result,$j);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$titulo=$rowmos['titulo'];
$pagport=$rowmos['pag'];
?>
<span>
<center class="enc2"><?php  echo $titulo;?></center>
<iframe style="border:0" name="bloque<?php  echo $j;?>" src="portada_n/<?php  echo $pagport;?>" width="580" height="230" scrolling="auto"></iframe>
</span>

<?php 
};
?>

</div>



</div>
    

</body>

</html>
<?php }else{;
include ('cierre.php');
};?>