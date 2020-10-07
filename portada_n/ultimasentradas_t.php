<?php   
include('bbdd.php');

$fechac=date("Y-m-d",time());


$sql1="SELECT * from mensajes where  idempresa='".$ide."' and fechafin>'".$fechac."' or fechafin is null and id not in (SELECT idmensaje FROM respuestamensajes WHERE idempleado='".$idtrab."')";
//echo $sql1;

$result1=$conn->query($sql1);
$result1row=$conn->query($sql1);
$row=count($result1row->fetchAll());

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_num_rows($result1);*/

?>
<script src="../js/ultimasentradas_tjs.js">

</script>



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
    border: 0px solid;
    width: 100%;
    height: 90px;
    font-size: 18px;
    /*border-bottom:5px inset #000;*/
    /*vertical-align: middle;*/
    margin:5px;
    /*border-radius: 8px;*/
    /*box-shadow: 1px 15px 18px #888888;*/
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

/*agregado nuedo SCROLL*/

.slideshow-container {
  max-width: 1250px;
  position: relative;
  margin: auto;
}

.caja3 .numbertext {
  font-size: 15px;
  text-align: left;
  top: 0;
}


.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -50px;
  vertical-align: center;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev, .next {
  background-color:black;
}

.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  float: left;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

#wrap {
    float: left;
    position: relative;
    left: 48%;
}

.active, .dot:hover {
  background-color: #717171;
}


.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

</style>


<style type="text/css" media="print">
.nover {display:none}
</style>

		<link rel="stylesheet" href="/estilo/estilonuevo.php" type="text/css" media="screen" charset="utf-8" >
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">
<!--onload="setTimeout('refrescar1()', 5000);"-->
<body >
<?php 
/*for ($j=0;$j<$row1;$j++){;
mysqli_data_seek($result1,$j);
$resultado1=mysqli_fetch_array($result1);*/
if ($row) {

$i=1;
foreach ($result1 as $row1mos) {
$pais=$row1mos['pais'];
$provincia=$row1mos['provincia'];
$localidad=$row1mos['localidad'];
$cp=$row1mos['cp'];
$texto=$row1mos['texto'];
$idmensaje=$row1mos['id'];


$sql10="SELECT * from respuestamensajes where  idempresa='".$ide."' and id='".$idmensaje."' and idempleado='".$idtrab."'";
//echo $sql10; 
$result10=$conn->query($sql10);
$row10=count($result10->fetchAll());
/*$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 1");
$row10=mysqli_num_rows($result10);*/
if ($row10==0){;

?>
		<!-- Next and previous buttons -->
	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>
  	
<form action="../servicios_n/mensaje/introrespuesta.php" method="post" enctype="multipart/form-data">
<div class="slideshow-container" style="text-align: center;">
	
	<input type="hidden" name="id" value="<?php echo $idmensaje;?>">
	<div class="mySlides fade">
		<div style="float: right; font-size: 18px; position: absolute; left: 70%;">Hemos recibido un total de: 
			<?php 
				$sqlCount="SELECT COUNT(*) FROM respuestamensajes WHERE idmensaje=$idmensaje"; 
				$result=$conn->query($sqlCount);
				$cantidad=$result->fetch();
				echo "$cantidad[0]";

			?> respuestas</div>
		<!--<a href="../servicios_n/mensaje/responder.php?id=<?php echo $idmensaje;?>" target="_parent">-->
		<span class="caja3">
		<div class="numbertext" style="font-size: 20px;"><?php echo "$i/$row"; ?></div>
		
		<!--<img src="../img/pencil.png" class="cuadro">-->
		<p><?php  echo $texto;?></p>
		</span>
		<!--</a>-->

		<?php
			$sql="SELECT * from mensajes where id=:id";
			$result=$conn->prepare($sql);
			$result->bindParam(':id', $idmensaje);
			$result->execute();
			$resultado=$result->fetch();

			$texto=$resultado['texto'];
			$fichero=$resultado['fichero'];
			$otrosmot=$resultado['otrosmot'];

			$sql2="SELECT * from respuesta where idmensaje=:id";
			$result2=$conn->prepare($sql2);
			$result2->bindParam(':id', $idmensaje);
			$result2->execute();
		 ?>
	 	<div class="main" style="text-align: center;">


	 		

			<!--<div class="links">
			    <a class="openpop" href="<?php 
			      $sql1="SELECT url from videos";
			      $result1=$conn->query($sql1);
			      $url=$result1->fetch(); 
			      echo($url[0]);?>">VIDEOS</a>
			</div>
			<div class="wrapper">
			    <div class="popup">
			        <iframe src="">
			            <p>Your browser does not support iframes.</p>
			        </iframe>
			<a href="#" class="close">X</a>
			    </div>
			</div>-->


			<?php 
			foreach ($result2 as $row2mos) {
			$valor=$row2mos['valor'];
			$textores=$row2mos['texto'];
			?>
			<label>
				<span class="caja">
					 <b><?php echo strtoupper($textores);?></b><br/>
					 <input type="radio" name="respuesta" value="<?php echo $valor;?>">
				</span>
			</label>

			<?php };?>
			<?php 
			if($otrosmot=='1'){ ?>
			<label>
				<span class="caja">
				 <b>Otros Motivos</b>
				 <br/>
				 <input type="radio" name="respuesta" value="99" id="radiotext">
				 <br/>
				 <br/>
				 <input type="text" name="textotro" size="20" maxlength="250" onfocus="document.getElementById('radiotext').checked = true;">
				</span>
			</label>


			<?php } ?>



		</div>
		
		

		<input style="" type="submit" class="envio" value="enviar" name="enviar">

		</br></br></br>

		<table align="center" >
			<tr>
				<td>
					<div style=" border: solid 5px; border-radius: 10px 10px 10px 10px; padding: 5px; align-content: center;" >
			 			<iframe width="400" height="275" 

			 			allowfullscreen="allowfullscreen"
				       	mozallowfullscreen="mozallowfullscreen" 
				        msallowfullscreen="msallowfullscreen" 
				        oallowfullscreen="oallowfullscreen" 
				        webkitallowfullscreen="webkitallowfullscreen"

						src="<?php 
				          $sql1="SELECT url from videos";
				          $result1=$conn->query($sql1);
				          $url=$result1->fetch(); 
				          echo($url[0]);?>">
						</iframe>
					</div>
				</td>
			</tr>
			
		</table>

		
	</div>
</div>


</form>
<?php 
};

$i=$i+1;
};?>

<!--agregado nuedo SCROLL-->

<!-- The dots/circles -->
<?php 
for ($i=1; $i <= $row; $i++) { 
	
 ?>
<div id="wrap" style="margin-top: 10px;">
	<div style="text-align:center">
	  <span class="dot" onclick="currentSlide(<?php echo $i; ?>)"></span>
	</div>
</div>

<script>
	currentSlide(1);
</script>

<?php }
}else{
?>
<div style="font-size: 15px; text-align: center;">GRACIAS POR RESPONDER A TODAS LAS PREGUNTAS</div>
<a href="/inicio1.php" target="_parent" style="text-align: center;">Volver al inicio</a>
<?php
} ?>
</body>
