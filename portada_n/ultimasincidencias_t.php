<?php
error_reporting(0);

include('bbdd.php');

$fecha=$_GET["fecha"];


$año= strtok($fecha, '-');
$mes= strtok('-');
$dia= strtok('-');
$fechac=$dia.'/'.$mes.'/'.$año;
$fechac='20/08/2015';

$mesa=str_split($mes);

if ($mesa[0]==0){;
$mes=$mesa[1];
};
//dia='".$fechac."' and

$mail = $_COOKIE['gente'];
$sqltusuario = "SELECT * FROM usuarios WHERE user = :gente";
$resultusuario=$conn->prepare($sqltusuario);
$resultusuario->bindParam(':gente', $mail);
$resultusuario->execute();
$resultadousuario = $resultusuario->fetch();

$sql="SELECT * from mensajes where id in (SELECT idmensaje FROM respuestamensajes WHERE iduser=".$resultadousuario['id'].") order by fechafin desc ";
$result=$conn->query($sql);

	if (isset($_COOKIE['lang']) && $_COOKIE['lang']!='') {
    $idiomacookie=strtolower($_COOKIE['lang']);
  }else{
    $idiomacookie='es';
  }

  $idioma = $resultadousuario['lang'];
  if ($idiomacookie != $idioma) {
    include($_SERVER['DOCUMENT_ROOT']."/lang/$idiomacookie.php");
    $sqlupdatelang = "UPDATE usuarios SET lang = '".$idiomacookie."' WHERE id = ".$resultadousuario['id'].";";
    $conn->exec($sqlupdatelang);
  }else{
    include($_SERVER['DOCUMENT_ROOT']."/lang/$idioma.php");
  }
  
	
?>

<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="ultimasincidencias_t.css">

  	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
  	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">


<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

<!-- Bootstrap CSS -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<!--fontawesome-->

<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>

<script>
	function refrescar()
	{
		window.location.reload();
	}

</script>


<script type="text/javascript">
	
	function redireccion(ruta) {
		window.location.href = ruta;
	}

	function changeLang(lang, iduser){
		console.log(lang);
		switch(lang){
			case 1: document.cookie="lang=es; path=/;"; break;
			case 2: document.cookie="lang=en; path=/;"; break;
			case 3: document.cookie="lang=he; path=/;"; break;
		}

		$.ajax({
			url: "ajaxchangelang.php",
			type: "POST",
			dataType : 'json',
			data: {
				iduser: iduser,
				lang: lang
			},
			success: function(e){
			  	console.log(e.message);

			},
			error: function(e) {
		       	console.log(e.message);
		    }
		});
		/*
		if (lang == 1) {
			document.cookie = "lang=es;";
		}else{
			document.cookie = "lang=en;";
		}
		*/
		
		location.reload();
		
	}

</script>
<style>
	#alturalinea {
		line-height: 1.15;
	}
</style>

</head>

<body   style="background-image:url(../img/iconos/portada_ca.jpg)"; >


<nav style="padding-left: 10%; background-color: white;"  class="navbar navbar-expand-md navbar-light fixed-top">
   				
					<a class="navbar-brand"><img src="<?php echo $LOGOPRIN;?>"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

				


					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav" id="alturalinea">



				<div  class="btn-group">

					<li class="btn-group">
				
							<div><a class="nav-link font-weight-bold px-3" href="#" onclick="changeLang(1, <?php echo $resultadousuario['id']; ?>); return false;"><img height="10" width="20" src="/img/bandera_esp.png"></a></div>
						
								<a class="nav-link font-weight-bold px-3" href="#" onclick="changeLang(2, <?php echo $resultadousuario['id']; ?>); return false;"><img height="10" width="20" src="/img/bandera_usa.png"></a>
							
								<a class="nav-link font-weight-bold px-3" href="#" onclick="changeLang(3, <?php echo $resultadousuario['id']; ?>); return false;"><img height="10" width="20" src="/img/bandera_he.png"></a>
					
				
				      </li>
					
				</div>

					<div class="btn-group">

						<li class="nav-item">

						<a class="nav-link font-weight-bold px-3" href="/portada_n/ultimasentradas_t.php"><?php echo $MENU_TUSPREGUNTAS; ?></a>

						</li>
					</div>


				<div class="btn-group">
					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/portada_n/ultimasincidencias_t.php"><?php echo $MENU_RESULTADOS; ?></a>

					</li>
				</div>

				<div class="btn-group">
					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/portada_n/incidencias_t.php"><?php echo $MENU_INCIDENCIAS; ?></a>

					</li>
				</div>

						<div class="btn-group">

						<li class="nav-item">

						<a class="nav-link font-weight-bold px-3" href="/portada_n/cuenta.php"><?php echo $MENU_MICUENTA; ?></a>

						</li>

					</div>

				<div class="btn-group">
					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/portada_n/salir.php"><?php echo $MENU_SALIR; ?></a>

					</li>
				</div>

				<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php"><?php echo $RUTAAPORTACION; ?></a>

					</li>

				</div>

				

				</div>


				</ul>

					</div>

			</nav>


<div style=" display: flex; justify-content: center; margin-top: 15%" class='wrapper fadeInDown' >
	<div id='formContent' >	
		<table style=" display: flex; justify-content: center;" >
			<tr>
				<td colspan="2" style="text-align: center;"><i class="fas fa-book" style="font-size: 30px"></i></td>
			</tr>

				<tr><td colspan="2">&nbsp;</td></tr>
				<tr><td colspan="2">&nbsp;</td></tr>

			<tr>
				<td colspan="2">
					<p style=" 	text-align: center;
 								font-family: Convergence;
 								font-size: 20px;
 								font-style: normal;
 								font-variant: normal;
 								font-weight: 400;
 								line-height: 20px; "><?php echo $TITULOULTINCIDENCIAS; ?></p>
				</td>
			</tr>

<?php

	foreach ($result as $rowmos) {

	$idmensaje=$rowmos['id'];
	$fechafin=$rowmos['fechafin'];
	$texto=$rowmos['texto'];

?>
	<tr>
		<td style="text-align: left;">
			<span>
				<?php echo " ".$texto;?>
			</span>
		</td>
		<td style="text-align: top; padding-left: 10px">
			<img src="./grafico.png" onclick="openmodal(<?php echo $idmensaje;?>)" style="height: 30px; width: 30px;" />
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
<?php


} ?>


		</table>
	</div>
</div>


	<div id="myModal" class="modal">
		<div class="modal-content">
		</div>
	</div>

	<style>
		.modal{
			background:rgba(1,1,1,0.5);
		}

		.modal-content{
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
		}
	</style>

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


</body>
</html>