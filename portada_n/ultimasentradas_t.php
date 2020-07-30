<?php   
include('bbdd.php');

$fechac=date("Y-m-d",time());


$sql1="SELECT * from mensajes where  idempresa='".$ide."' and fechafin>'".$fechac."' or fechafin is null";
//echo $sql1; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_num_rows($result1);

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
    border: 0px solid ;
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
<script>

function refrescar1()
{
	window.location.reload();
}

</script>
<style type="text/css" media="print">
.nover {display:none}
</style>

		<link rel="stylesheet" href="/estilo/estilonuevo.php" type="text/css" media="screen" charset="utf-8" >
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">
<!--onload="setTimeout('refrescar1()', 5000);"-->
<body  >
<?php 
for ($j=0;$j<$row1;$j++){;
mysqli_data_seek($result1,$j);
$resultado1=mysqli_fetch_array($result1);
$pais=$resultado1['pais'];
$provincia=$resultado1['provincia'];
$localidad=$resultado1['localidad'];
$cp=$resultado1['cp'];
$texto=$resultado1['texto'];
$idmensaje=$resultado1['id'];

$sql10="SELECT * from respuestamensajes where  idempresa='".$ide."' and id='".$idmensaje."' and idempleado='".$idtrab."'";
//echo $sql10; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 1");
$row10=mysqli_num_rows($result10);
if ($row10==0){;
?>

<a href="../servicios_n/mensaje/responder.php?id=<?php echo $idmensaje;?>" target="_parent"> 
<span class="caja3">
<img src="../img/pencil.png" class="cuadro">
<p><?php  echo $texto;?></p>
</span>
</a>

<?php 
};
};?>

</body>
