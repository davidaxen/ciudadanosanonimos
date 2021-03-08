<?php 
	error_reporting(0);
	include('bbdd.php');
	$sqltusuario = "SELECT * FROM usuarios WHERE user = :gente";
	$resultusuario=$conn->prepare($sqltusuario);
	$resultusuario->bindParam(':gente', $_COOKIE['gente']);
	$resultusuario->execute();
	$resultadousuario = $resultusuario->fetch();

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

<head>
	 

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

<!-- Bootstrap CSS -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<!--fontawesome-->

<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
		
		
</head>



</style>

<script type="text/javascript">
	
	function redireccion(ruta) {
		window.location.href = ruta;
	}

	function changeLang(lang, iduser){
		console.log(lang);
		switch(lang){
			case 1: document.cookie="lang=es;"; break;
			case 2: document.cookie="lang=en;"; break;
			case 3: document.cookie="lang=he;"; break;
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

<div>


   	<?php if ($resultadousuario['tusuario'] == 3) {
   		
   		?>


   		<nav style="padding-left: 10%; background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">
   				
					<a class="navbar-brand"><img src="../img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<table> 
				          <tr>
				            <td>
						
							<div><a class="nav-link font-weight-bold px-3" href="#" onclick="changeLang(1, <?php echo $resultadousuario['id']; ?>); return false;"><img height="10" width="20" src="/img/bandera_esp.png"></a></div>
						
								<a class="nav-link font-weight-bold px-3" href="#" onclick="changeLang(2, <?php echo $resultadousuario['id']; ?>); return false;"><img height="10" width="20" src="/img/bandera_usa.png"></a>
							
								<a class="nav-link font-weight-bold px-3" href="#" onclick="changeLang(3, <?php echo $resultadousuario['id']; ?>); return false;"><img height="10" width="20" src="/img/bandera_he.png"></a>
							</td>
				          </tr>
				        <table>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">
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

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php"><img src="<?php echo $RUTAAPORTACION; ?>"></a>

					</li>

				</div>

				

				</div>


				</ul>

					</div>

					</nav>

	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 40) {
   		
   		?>

   		<nav style="padding-left: 10%; background-color: white" class="navbar navbar-expand-md navbar-light  fixed-top">

					<a class="navbar-brand"><img src="/img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">
							<div class="btn-group">
								<li class="nav-item dropdown" data-toggle="dropdown">
									<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

										<div class="dropdown-menu">

											<a  class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

											<a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>


										</div>

								</li>

							</div>

					<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">MI CODIGO POSTAL</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatcp/index.php');" href="/portada_n/chatcp/index.php">CHAT C.P</a>

					</div>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>

				</div>




				<div class="btn-group">
					<li class="nav-item">

					<a  class="nav-link font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>

				<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php">
					<img src="/img/cuota-ayudanos.png">	</a>

					</li>

				</div>



				</ul>

					</div>

					</nav>
   		
 
	 		
	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 41) {
   		
   		?>

   		<nav style="background-color: white; padding-left: 10%"  class="navbar navbar-expand-md navbar-light fixed-top">

					<a class="navbar-brand"><img src="/img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse" id="nav">
						<ul class="navbar-nav">
							<div class="btn-group">
								<li class="nav-item dropdown" data-toggle="dropdown">
									<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

										<div class="dropdown-menu">

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

											<a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>

										</div>

								</li>

							</div>

					<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">MI CODIGO POSTAL</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatcp/index.php');" href="/portada_n/chatcp/index.php">CHAT C.P</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/mensaje/dpuntcont.php');" href="/portada_n/mensaje/dpuntcont.php">PREGUNTAS C.P</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptarcolaboradores.php');" href="/portada_n/solicitudes/aceptarcolaboradores.php">ACEPTAR COLABORADOR C.P</a>

					</div>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

						<a class="nav-link font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>

				</div>

				<div class="btn-group">
					<li class="nav-item">

						<a class="nav-link font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>

				<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php"><img src="/img/cuota-ayudanos.png"></a>

					</li>

				</div>


				</ul>

					</div>

					</nav>

	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 42) {
   		
   		?>

  		<nav style="padding-left: 10%; background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">

					<a class="navbar-brand"><img src="/img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">
							<div class="btn-group">
								<li class="nav-item dropdown" data-toggle="dropdown">
									<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

										<div class="dropdown-menu">

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

											<a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>

										</div>

								</li>

							</div>

					<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">MI CODIGO POSTAL</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatcp/index.php');" href="/portada_n/chatcp/index.php">CHAT C.P</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/mensaje/dpuntcont.php');" href="/portada_n/mensaje/dpuntcont.php">PREGUNTAS C.P</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptarcolaboradores.php');" href="/portada_n/solicitudes/aceptarcolaboradores.php">ACEPTAR COLABORADOR C.P</a>

					</div>

					</li>
					</div>


				<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">MI CIUDAD</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatciudad/index.php');" href="/portada_n/chatciudad/index.php">CHAT CIUDAD</a>

					</div>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

						<a class="nav-link  font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>

				</div>

				<div class="btn-group">
					<li class="nav-item">

						<a class="nav-link  font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>


				<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php">
					<img src="/img/cuota-ayudanos.png"></a>

					</li>

				</div>


				</ul>

					</div>

					</nav>

	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 50) {
   		
   		?>

  		<nav style="padding-left: 10%; background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">

					<a class="navbar-brand"><img src="/img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">
							<div class="btn-group">
								<li class="nav-item dropdown" data-toggle="dropdown">
									<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

										<div class="dropdown-menu">

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

											<a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>

										</div>

								</li>

							</div>


				<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">MI CIUDAD</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatciudad/index.php');" href="/portada_n/chatciudad/index.php">CHAT CIUDAD</a>

					</div>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

						<a class="nav-link font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>

				</div>

				<div class="btn-group">
					<li class="nav-item">

						<a class="nav-link font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>

					<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php">
					<img src="/img/cuota-ayudanos.png"></a>

					</li>

				</div>



				</ul>

					</div>

					</nav>


	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 51) {
   		
   		?>

		<nav style="padding-left: 10%; background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">
	
					<a class="navbar-brand"><img src="/img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">
							<div class="btn-group">
								<li class="nav-item dropdown" data-toggle="dropdown">
									<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

										<div class="dropdown-menu">

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

											<a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>

										</div>

								</li>

							</div>


				<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">MI CIUDAD</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatciudad/index.php');" href="/portada_n/chatciudad/index.php">CHAT CIUDAD</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/mensaje/dpuntcont.php');" href="/portada_n/mensaje/dpuntcont.php">PREGUNTAS CIUDAD</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptarcolaboradores.php');" href="/portada_n/solicitudes/aceptarcolaboradores.php">ACEPTAR COLABORADOR CIUDAD</a>

						<!--<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptargestores.php');" href="/portada_n/solicitudes/aceptargestores.php">ACEPTAR GESTOR C.P</a>-->

					</div>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

						<a class="nav-link font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>

				</div>

				<div class="btn-group">
					<li class="nav-item">

						<a class="nav-link font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>


				<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php"><img src="/img/cuota-ayudanos.png"></a>

					</li>

				</div>


				</ul>

					</div>

					</nav>

	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 52) {
   		
   		?>


		<nav style="padding-left: 10%; background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">

					<a class="navbar-brand"><img src="/img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">
							<div class="btn-group">
								<li class="nav-item dropdown" data-toggle="dropdown">
									<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

										<div class="dropdown-menu">

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

											<a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>

										</div>

								</li>

							</div>


				<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">MI CIUDAD</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatciudad/index.php');" href="/portada_n/chatciudad/index.php">CHAT CIUDAD</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/mensaje/dpuntcont.php');" href="/portada_n/mensaje/dpuntcont.php">PREGUNTAS CIUDAD</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptarcolaboradores.php');" href="/portada_n/solicitudes/aceptarcolaboradores.php">ACEPTAR COLABORADOR CIUDAD</a>

					<!--	<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptargestores.php');" href="/portada_n/solicitudes/aceptargestores.php">ACEPTAR GESTOR C.P</a>-->

					</div>

					</li>
					</div>


				<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">MI PAIS</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatpais/index.php');" href="/portada_n/chatpais/index.php">CHAT PAIS</a>

					</div>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

						<a class="nav-link font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>

				</div>

				<div class="btn-group">
					<li class="nav-item">

						<a class="nav-link font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>

				<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php"><img src="/img/cuota-ayudanos.png"></a>

					</li>

				</div>



				</ul>

					</div>

					</nav>

	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 60) {
   		
   		?>


			<nav style="padding-left: 10%; background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">

					<a class="navbar-brand"><img src="/img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">
							<div class="btn-group">
								<li class="nav-item dropdown" data-toggle="dropdown">
									<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

										<div class="dropdown-menu">

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

											<a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>

										</div>

								</li>

							</div>

				<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">MI PAIS</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatpais/index.php');" href="/portada_n/chatpais/index.php">CHAT PAIS</a>

					</div>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

						<a class="nav-link font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>

				</div>

				<div class="btn-group">
					<li class="nav-item">

						<a class="nav-link font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>


				<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php"><img src="/img/cuota-ayudanos.png"></a>

					</li>

				</div>

				</ul>

					</div>

					</nav>
		


	 <?php 
   		} 
   	?>
   	<?php if ($resultadousuario['tusuario'] == 61) {
   		
   		?>


			<nav style="padding-left: 10%; background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">

					<a class="navbar-brand"><img src="/img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">
							<div class="btn-group">
								<li class="nav-item dropdown" data-toggle="dropdown">
									<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

										<div class="dropdown-menu">

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

											<a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>

										</div>

								</li>

							</div>

				<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">MI PAIS</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatpais/index.php');" href="/portada_n/chatpais/index.php">CHAT PAIS</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/mensaje/dpuntcont.php');" href="/portada_n/mensaje/dpuntcont.php">PREGUNTAS PAIS</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptarcolaboradores.php');" href="/portada_n/solicitudes/aceptarcolaboradores.php">ACEPTAR COLABORADOR PAIS</a>

						<!--<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptargestores.php');" href="/portada_n/solicitudes/aceptargestores.php">ACEPTAR GESTOR CIUDAD</a>-->

					</div>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

						<a class="nav-link font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>

				</div>

				<div class="btn-group">
					<li class="nav-item">

						<a class="nav-link font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>


				<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php"><img src="/img/cuota-ayudanos.png">	
					</a>
<!--					<span style="font-size: 12px;">CUOTA DE PARTICIPACIÓN</span><br><span style="font-size: 10px;">-Ayúdanos a crecer-</span>-->

					</li>

				</div>				

				</ul>

					</div>

					</nav>

	 <?php 
   		} 
   	?>


</div>