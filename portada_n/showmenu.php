<?php 
	error_reporting(0);
	include('bbdd.php');
	$sqltusuario = "SELECT * FROM usuarios WHERE user = :gente";
	$resultusuario=$conn->prepare($sqltusuario);
	$resultusuario->bindParam(':gente', $_COOKIE['gente']);
	$resultusuario->execute();
	$resultadousuario = $resultusuario->fetch();


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




</script>

<div>



   	<?php if ($resultadousuario['tusuario'] == 3) {
   		
   		?>


   		<nav style="background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">

					<a class="navbar-brand"><img src="../img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">


					<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

					<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/cuenta.php">TUS PREGUNTAS</a>

					</li>

				</div>

				<div class="btn-group">
					<li class="nav-item">

					<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/ultimasentradas_t.php">RESULTADOS</a>

					</li>
				</div>

				<div class="btn-group">
					<li class="nav-item">

					<a class="nav-link text-light font-weight-bold px-3" href="/incidencias_t.php">INCIDENCIAS</a>

					</li>
				</div>

				<div class="btn-group">
					<li class="nav-item">

					<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>

				</ul>

					</div>

					</nav>

	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 40) {
   		
   		?>

   		<nav style="background-color: white" class="navbar navbar-expand-md navbar-light  fixed-top">

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

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php">CUOTA DE PARTICIPACIÓN<br><span style="font-size: 12px; ">-Ayúdanos a crecer-</span></a>

					</li>

				</div>


				<div class="btn-group">
					<li class="nav-item">

					<div><img src="/img/usaa.png"></div>

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

   		<nav style="background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">

					<a class="navbar-brand"><img src="../img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">
							<div class="btn-group">
								<li class="nav-item dropdown" data-toggle="dropdown">
									<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

										<div class="dropdown-menu">

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

											<a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>

											<a class="dropdown-item" onclick="redireccion('/donaciones/donaciones.php');" href="/donaciones/donaciones.php">AYÚDANOS A CRECER</a>

										</div>

								</li>

							</div>

					<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">MI CODIGO POSTAL</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatcp/index.php');" href="/portada_n/chatcp/index.php">CHAT C.P</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/mensaje/dpuntcont.php');" href="/portada_n/mensaje/dpuntcont.php">PREGUNTAS C.P</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptarcolaboradores.php');" href="/portada_n/solicitudes/aceptarcolaboradores.php">ACEPTAR COLABORADOR C.P</a>

					</div>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

						<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>

				</div>

				<div class="btn-group">
					<li class="nav-item">

						<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>

				<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php">CUOTA DE PARTICIPACIÓN<br><span style="font-size: 12px; ">-Ayúdanos a crecer-</span></a>

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

  		<nav style="background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">

					<a class="navbar-brand"><img src="../img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">
							<div class="btn-group">
								<li class="nav-item dropdown" data-toggle="dropdown">
									<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

										<div class="dropdown-menu">

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

											<a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>

											<a class="dropdown-item" onclick="redireccion('/donaciones/donaciones.php');" href="/donaciones/donaciones.php">AYÚDANOS A CRECER</a>

										</div>

								</li>

							</div>

					<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">MI CODIGO POSTAL</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatcp/index.php');" href="/portada_n/chatcp/index.php">CHAT C.P</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/mensaje/dpuntcont.php');" href="/portada_n/mensaje/dpuntcont.php">PREGUNTAS C.P</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptarcolaboradores.php');" href="/portada_n/solicitudes/aceptarcolaboradores.php">ACEPTAR COLABORADOR C.P</a>

					</div>

					</li>
					</div>


				<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">MI CIUDAD</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatciudad/index.php');" href="/portada_n/chatciudad/index.php">CHAT CIUDAD</a>

					</div>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

						<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>

				</div>

				<div class="btn-group">
					<li class="nav-item">

						<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>


				<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php">CUOTA DE PARTICIPACIÓN<br><span style="font-size: 12px; ">-Ayúdanos a crecer-</span></a>

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

  		<nav style="background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">

					<a class="navbar-brand"><img src="../img/ciudadanoslogo.png"></a>

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

											<a class="dropdown-item" onclick="redireccion('/donaciones/donaciones.php');" href="/donaciones/donaciones.php">AYÚDANOS A CRECER</a>

										</div>

								</li>

							</div>


				<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link  font-weight-bold px-3 dropdown-toggle" href="#">MI CIUDAD</a>

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

						<a class="nav-link font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>

					<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php">CUOTA DE PARTICIPACIÓN<br><span style="font-size: 12px; ">-Ayúdanos a crecer-</span></a>

					</li>

				</div>

				<div style="padding-top: 1%;">
				<table>	
					<tr>
						<td>
							<div><img width="20" height="10" src="/img/usaa.png"></div>
					
							<div style="padding-top: 20%"><img width="20" height="10" src="/img/bandera.png"></div> 
					
							<div  style="padding-top: 20%"><img width="20" height="10" src="/img/israaael.png"></div>
						</td>
					</tr>
				<table>
				</div>
					




				</ul>

					</div>

					</nav>


	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 51) {
   		
   		?>

<nav style="background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">

					<a class="navbar-brand"><img src="../img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">
							<div class="btn-group">
								<li class="nav-item dropdown" data-toggle="dropdown">
									<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

										<div class="dropdown-menu">

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

											<a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>

											<a class="dropdown-item" onclick="redireccion('/donaciones/donaciones.php');" href="/donaciones/donaciones.php">AYÚDANOS A CRECER</a>

										</div>

								</li>

							</div>


				<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">MI CIUDAD</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatciudad/index.php');" href="/portada_n/chatciudad/index.php">CHAT CIUDAD</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/mensaje/dpuntcont.php');" href="/portada_n/mensaje/dpuntcont.php">PREGUNTAS CIUDAD</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptarcolaboradores.php');" href="/portada_n/solicitudes/aceptarcolaboradores.php">ACEPTAR COLABORADOR CIUDAD</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptargestores.php');" href="/portada_n/solicitudes/aceptargestores.php">ACEPTAR GESTOR C.P</a>

					</div>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

						<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>

				</div>

				<div class="btn-group">
					<li class="nav-item">

						<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>


				<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php">CUOTA DE PARTICIPACIÓN<br><span style="font-size: 12px; ">-Ayúdanos a crecer-</span></a>

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


<nav style="background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">

					<a class="navbar-brand"><img src="../img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">
							<div class="btn-group">
								<li class="nav-item dropdown" data-toggle="dropdown">
									<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

										<div class="dropdown-menu">

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

											<a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>

											<a class="dropdown-item" onclick="redireccion('/donaciones/donaciones.php');" href="/donaciones/donaciones.php">AYÚDANOS A CRECER</a>

										</div>

								</li>

							</div>


				<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">MI CIUDAD</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatciudad/index.php');" href="/portada_n/chatciudad/index.php">CHAT CIUDAD</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/mensaje/dpuntcont.php');" href="/portada_n/mensaje/dpuntcont.php">PREGUNTAS CIUDAD</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptarcolaboradores.php');" href="/portada_n/solicitudes/aceptarcolaboradores.php">ACEPTAR COLABORADOR CIUDAD</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptargestores.php');" href="/portada_n/solicitudes/aceptargestores.php">ACEPTAR GESTOR C.P</a>

					</div>

					</li>
					</div>


				<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">MI PAIS</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatpais/index.php');" href="/portada_n/chatpais/index.php">CHAT PAIS</a>

					</div>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

						<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>

				</div>

				<div class="btn-group">
					<li class="nav-item">

						<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>

				<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php">CUOTA DE PARTICIPACIÓN<br><span style="font-size: 12px; ">-Ayúdanos a crecer-</span></a>

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


<nav style="background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">

					<a class="navbar-brand"><img src="../img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">
							<div class="btn-group">
								<li class="nav-item dropdown" data-toggle="dropdown">
									<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

										<div class="dropdown-menu">

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

											<a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>

											<a class="dropdown-item" onclick="redireccion('/donaciones/donaciones.php');" href="/donaciones/donaciones.php">AYÚDANOS A CRECER</a>

										</div>

								</li>

							</div>

				<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">MI PAIS</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatpais/index.php');" href="/portada_n/chatpais/index.php">CHAT PAIS</a>

					</div>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

						<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>

				</div>

				<div class="btn-group">
					<li class="nav-item">

						<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>


				<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php">CUOTA DE PARTICIPACIÓN<br><span style="font-size: 12px; ">-Ayúdanos a crecer-</span></a>

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


<nav style="background-color: white"  class="navbar navbar-expand-md navbar-light fixed-top">

					<a class="navbar-brand"><img src="../img/ciudadanoslogo.png"></a>
						<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
						<span class="navbar-toggler-icon"></span>
						</button>

					<div class="collapse navbar-collapse justify-content-between" id="nav">
						<ul class="navbar-nav">
							<div class="btn-group">
								<li class="nav-item dropdown" data-toggle="dropdown">
									<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

										<div class="dropdown-menu">

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

											<a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

											<a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>

											<a class="dropdown-item" onclick="redireccion('/donaciones/donaciones.php');" href="/donaciones/donaciones.php">AYÚDANOS A CRECER</a>

										</div>

								</li>

							</div>

				<div class="btn-group">
					<li class="nav-item dropdown" data-toggle="dropdown">

					<a class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">MI PAIS</a>

					<div class="dropdown-menu">

						<a class="dropdown-item" onclick="redireccion('/portada_n/chatpais/index.php');" href="/portada_n/chatpais/index.php">CHAT PAIS</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/mensaje/dpuntcont.php');" href="/portada_n/mensaje/dpuntcont.php">PREGUNTAS PAIS</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptarcolaboradores.php');" href="/portada_n/solicitudes/aceptarcolaboradores.php">ACEPTAR COLABORADOR PAIS</a>

						<a class="dropdown-item" onclick="redireccion('/portada_n/solicitudes/aceptargestores.php');" href="/portada_n/solicitudes/aceptargestores.php">ACEPTAR GESTOR CIUDAD</a>

					</div>

					</li>
					</div>

				<div class="btn-group">

					<li class="nav-item">

						<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

					</li>

				</div>

				<div class="btn-group">
					<li class="nav-item">

						<a class="nav-link text-light font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

					</li>
				</div>


				<div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

					<li class="nav-item">

					<a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php">CUOTA DE PARTICIPACIÓN<br><span style="font-size: 12px; ">-Ayúdanos a crecer-</span></a>

					</li>

				</div>				

				</ul>

					</div>

					</nav>

	 <?php 
   		} 
   	?>


</div>

