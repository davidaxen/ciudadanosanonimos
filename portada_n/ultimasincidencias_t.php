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


  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">


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

<body   style="background-image:url(../img/iconos/portada_ca.jpg);"; id="alturalinea">



  
					<?php
						include_once("showmenu.php");

					?>
		




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