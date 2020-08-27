<?php 
include('bbdd.php');

if ($com=='comprobacion'){;

  include('portada_n/cabecera.php');
  ?>

<style>
.main3 {
	 /*width: calc (100% - 200px);*/
	 width:100%;
	 position:relative;
	 top:0px;
    border: 0px solid #fff;
    text-align:center;
    display:inline-table;
}

.caja3{
	 padding-top:5px;
	 padding-left:5px;
	 padding-right:5px;
    border: 0px solid <?php  echo $colorborder;?>;
    text-align:center;
    min-width: 100px;
    height: 90px;
    border-bottom:5px inset #000;
    vertical-align: middle;
    margin:5px;
    border-radius: 8px;
    background-color:white;
    box-shadow: 1px 15px 18px #888888;
	 display:inline-table;
	 text-align:center;
}


.main6 {
	 /*width: calc (100% - 200px);

	 */
	 top:10px; 
	 width:100%;
	 position:relative;
	 padding:10px;
    border: 0px solid #fff;
    text-align:center;
}




</style>


<div id="main">

<div id="main3">
<span><?php  include('portada_n/portada2.php');?></span>
<!--portada2_g.php-->
</div>

<div class="main6">
<?php include ('estilo/tab.htm');?>

<?php 
$sql="select * from portadapag,paginapor where paginapor.idpag=portadapag.idpag and idempresa=:ide and paginapor.idpag in ('1','2') order by idportada asc";
//echo $sql;
$result=$conn->prepare($sql);
$result->bindParam(':ide', $ide);
$result->execute();
/*$result=mysqli_query ($conn, $sql) or die ("Invalid result idempresas");
$row=mysqli_num_rows($result);*/
?>


<div class="tab">
<?php 
/*for ($j=0;$j<$row;$j++){;
mysqli_data_seek($result,$j);
$resultado=mysqli_fetch_array($result);*/
$j=0;
foreach ($result as $rowmos) {
$titulo=$rowmos['titulo'];
$pagport=$rowmos['pag'];
?>

  <button class="tablinks" onclick="openCity(event, 'd<?php  echo $j;?>')" <?php if($j==0){;?>id="defaultOpen"<?php }?> ><?php  echo $titulo;?></button>
  
 <?php 
 $j=$j+1;
};
?> 
</div>




<?php 
/*for ($j=0;$j<$row;$j++){;
mysqli_data_seek($result,$j);
$resultado=mysqli_fetch_array($result);*/
$j=0;
foreach ($result as $rowmos) {
$titulo=$rowmos['titulo'];
$pagport=$rowmos['pag'];
?>
<div id="d<?php  echo $j;?>" class="tabcontent">
  <h3><?php  echo $titulo;?></h3>
  <p><iframe style="border:0" name="bloque<?php  echo $j;?>" src="portada_n/<?php  echo $pagport;?>" width="100%" height="325" scrolling="auto"></iframe></p>
</div>


<?php 
$j=$j+1;
};
?>
<?php include ('js/tabjs.htm');?>



</div>



</div>
    

</body>

</html>
<?php }else{;
include ('cierre.php');
};?>