<?php   
include('bbdd.php');

$fechac=date("Y-m-d",time());


$sql1="SELECT * from mensajes where  idempresa='".$ide."' and fechafin>'".$fechac."' or fechafin is null";
//echo $sql1;

$result1=$conn->query($sql1);
$result1row=$conn->query($sql1);
$row=count($result1row->fetchAll());

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_num_rows($result1);*/

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
    border: 0px solid;
    width: 100%;
    height: 90px;
    font-size: 18px;
    /*border-bottom:5px inset #000;*/
    /*vertical-align: middle;*/
    margin:5px;
    /*border-radius: 8px;*/
    background-color:white;
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
  margin-top: -142px;
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
    left: 50%;
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
<script>

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}


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
<body >
<?php 
/*for ($j=0;$j<$row1;$j++){;
mysqli_data_seek($result1,$j);
$resultado1=mysqli_fetch_array($result1);*/
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
	<div class="slideshow-container" style="text-align:center;">


<div class="slideshow-container" style="text-align: center;">
	<div class="mySlides fade">
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
	 	<div class="main">
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
	</div>
</div>

<?php 
};

$i=$i+1;
};?>

<!--agregado nuedo SCROLL-->

<!-- The dots/circles -->
<?php 
for ($i=1; $i <= $row; $i++) { 
	
 ?>
<div id="wrap" style="margin-top: 20px;">
	<div style="text-align:center">
	  <span class="dot" onclick="currentSlide(<?php echo $i; ?>)"></span>
	</div>
</div>

<?php } ?>

<script>
	currentSlide(1);
</script>

</body>
