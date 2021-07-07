<?php
include('bbdd.php');
//error_reporting(0);

$sqluser = "SELECT * FROM usuarios WHERE user = :mail";
$resultuser=$conn->prepare($sqluser);
$resultuser->bindParam(':mail', $_COOKIE['gente']);
$resultuser->execute();
$resultadouser=$resultuser->fetch();

$sql1="SELECT * from mensajes where user = ".$resultadouser['id'];

//$sql1.=" order by tiempo desc, hora desc limit 0,5";
//echo $sql1;

$result1=$conn->query($sql1);

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_num_rows($result1);*/

?>
<script>
function refrescar()
{
	window.location.reload();
}
</script>

<style type="text/css" media="print">
.nover {display:none}
</style>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<link rel="stylesheet" type="text/css" href="boostrapUlt.css">
<link rel="stylesheet" type="text/css" href="ultimasincidencias_t.css">
<link rel="stylesheet" type="text/css" href="nav.js">
<meta charset="utf-8">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<style>
@media (min-width: 1192px){
		 .external-collapse.navbar-collapse {
				 display: -webkit-box!important;
				 display: -ms-flexbox!important;
				 display: flex!important;
		 }

 }

 @media (min-width: 768px){
		 .hid {
					visibility: hidden;
		 }
}
</style>

<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">
<!--<body onload="setTimeout('refrescar()', 5000);">-->
<body  style="background-image:url(../img/iconos/portada_ca.jpg)"; >


		<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">

  		<table style="margin-left: 20px; width: 100%">
		<tr>
			<td style="width: 20%; ">
	    		<div class="[ navbar-header ]">
	        		<div class="[ animbrand ]">
	            		<a style="float: none;" class="[ navbar-brand ][ animate ]" href="../inicio1.php"><img src="../img/ciudadanoslogo.png"></a>

	        		</div>
	    		</div>
	    	</td>
			<td style="width: 65%; ">
							<?php
								include_once("showmenu2.php");

							?>
						</td>
					</tr>
				</table>
				</nav>

<div style=" display: flex; justify-content: center;" class='wrapper fadeInDown' >
	<div id='formContent' style="background-color: white">	
		<table style=" display: flex; justify-content: center;">
			<tr>
				<td colspan="2" style="text-align: center;"></td>
			</tr>

				<tr><td colspan="2">&nbsp;</td></tr>
				<tr><td colspan="2">&nbsp;</td></tr>

			<tr>
				<td colspan="2" style="width: 70%">
					<p style=" 	text-align: center;
 								font-family: Convergence;
 								font-size: 20px;
 								font-style: normal;
 								font-variant: normal;
 								font-weight: 400;
 								line-height: 20px; ">Tus preguntas realizadas:</p>
				</td>
			</tr>

<?php
/*for ($j=0;$j<$row1;$j++){;
mysqli_data_seek($result1,$j);
$resultados1 = mysqli_fetch_array ($result1);*/
$j=0;
foreach ($result1 as $row1mos) {
/*$idempleado=$row1mos['idempleado'];
$idpiscina=$row1mos['idpiscina'];
$dia=$row1mos['dia'];
$hora=$row1mos['hora'];
$tiempo=$row1mos['tiempo'];
$lat=$row1mos['lat'];
$lon=$row1mos['lon'];*/
$idmensaje=$row1mos['id'];
$texto=$row1mos['texto'];


/*$sql10="SELECT * from empleados where idempleado='".$idempleado."' and idempresa='".$ide."'";
$result10=$conn->query($sql10);
$resultados10=$result10->fetch();*/

/*$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$resultados10 = mysqli_fetch_array ($result10);*/

/*$nombre=$resultados10['nombre'];
$priape=$resultados10['1apellido'];
$segape=$resultados10['2apellido'];
$nombretrab=$nombre.' '.$priape.' '.$segape;*/


/*$sql11="SELECT * from clientes where idclientes='".$idempleado."' and idempresas='".$ide."'";
$result11=$conn->query($sql11);
$result11fetch=$conn->query($sql11);

$resultados11=$result11->fetch();
$row11=count($result11fetch->fetchAll());*/

/*$result11=mysqli_query ($conn,$sql11) or die ("Invalid result 11");
$resultados11 = mysqli_fetch_array ($result11);
$row11=mysqli_num_rows($result11);*/
/*if ($row11==0){;
$nombrecom="Fuera de Puesto";
}else{;
$nombrecom=$resultados11['nombre'];
};*/
$f=fmod($j,2);
?>
<?php if ($f==0){;?>
<tr class="dattab3">
<?php }else{;?>
<tr class="dattab">
<?php };?>

<!--<td><?php  echo strtoupper($nombrecom);?></td>
<td><?php  echo strtoupper($nombretrab);?></td>-->
<!--<td><?php  echo strtoupper($dia);?></td>
<td><?php  echo strtoupper($hora);?></td>-->
<td><?php  echo strtoupper($texto);?></td>
<td style="text-align: right; padding-left: 10px">
	<img src="./grafico.png" onclick="openmodal(<?php echo $idmensaje;?>);" style="height: 30px; width: 30px;" />
</td>
<!--<td><a href="../servicios_n/trabajo/ipuntcont.php?idclientesinc=<?php  echo $idempleado;?>&descripcion=<?php  echo $texto;?>" target="_parent"><img src="../img/asignacion.png" width="20px"></a></td>-->

</tr>
<?php
$j=$j+1;
};?>
</table>
</div>
</div>

<div id="myModal" class="modal">
		<div class="modal-content">
		</div>
	</div>

	<script>
	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];


	function openmodal(id) {
		 modal.style.display = "block";

		 $.ajax({
          	type : 'post',
			url : 'ajaxmodal.php', // in here you should put your query
			data :  'id='+id, // here you pass your id via ajax .
			success : function(html){
				// now you can show output in your modal
				$('.modal-content').show().html(html);
			}
		});
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
	    modal.style.display = "none";
	  }
	}
	</script>

	<style>
		.modal {
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 2; /* Sit on top */
		  padding-top: 100px; /* Location of the box */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		  background-color: #fefefe;
		  margin: auto;
		  top: 30%;
		  padding: 20px;
		  border: 1px solid #888;
		  width: 80%;
		}

		/* The Close Button */
		.close {
		  color: #aaaaaa;
		  float: right;
		  font-size: 28px;
		  font-weight: bold;
		}

		.close:hover,
		.close:focus {
		  color: #000;
		  text-decoration: none;
		  cursor: pointer;
		}

	</style>
</body>
