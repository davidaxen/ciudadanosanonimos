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
	  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" >
	  <script src="//maxcdn.bootstrapcdn.com"></script>

	  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="incidencias_t.css">
		<link rel="stylesheet" type="text/css" href="portada_n/cabecera.css">
		<link rel="stylesheet" type="text/css" href="nav.js">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

	<script type="text/javascript">
		$('document').ready(function(){

			var b = document.cookie.match('(^|;)\\s*menuselected\\s*=\\s*([^;]+)');

			var x = b ? b.pop() : 1;

    		changeOptions(x);

		});

		
		function changeOptions(selected) {
			document.cookie = "menuselected=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
			
			if (selected == 1) {
				document.getElementById('colab').style.display = "none";
				document.getElementById('gest').style.display = "none";
				document.getElementById('resp').style.display = "block";

			}else if (selected == 2) {
				document.getElementById('resp').style.display = "none";
				document.getElementById('gest').style.display = "none";
				document.getElementById('colab').style.display = "block";

			}else if (selected == 3) {
				document.getElementById('resp').style.display = "none";
				document.getElementById('colab').style.display = "none";
				document.getElementById('gest').style.display = "block";
			}

			document.cookie = "menuselected="+selected+"; path=/";

			//window.location.reload();
			
		}
	</script>
	<style>
		 @media (min-width: 992px){
   		   .external-collapse.navbar-collapse {
        	  display: -webkit-box!important;
         	  display: -ms-flexbox!important;
          	  display: flex!important;
      }

  }

          .collapse {
    	display: none;
    	visibility: visible;
}
	</style>

<div class="[ collapse navbar-collapse ]" id="bs-example-navbar-collapse-1">


   	<?php if ($resultadousuario['tusuario'] == 3) {
   		
   		?>
		<ul class="[ nav navbar-nav navbar-left mx-auto]">
			<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(1); return false;" >GENERAL</a></li>
			<li><a href="/portada_n/cuenta.php" class="[ animate ]" >MI CUENTA</a></li>
		</ul>
		<br><br><br>
	   <ul class="[ nav navbar-nav navbar-left ]">

	    <li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]">TUS PREGUNTAS</a></li>
	    <li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]">RESULTADOS</a></li>
	    <li><a href="/incidencias_t.php" class="[ animate ]">INCIDENCIAS</a></li>
	    <!--<li><a href="/chat/index.php" class="[ animate ]">CHAT</a></li>-->
	    <li><a href="/portada_n/salir.php" class="[ animate ]" >LOG OUT</a></li>
	    
	 </ul>

	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 40) {
   		
   		?>
   			<ul class="[ nav navbar-nav navbar-left mx-auto]">

				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(1); return false;" >GENERAL</a></li>
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(2); return false;" >MI CODIGO POSTAL</a></li>
				<li><a href="/portada_n/cuenta.php" class="[ animate ]">MI CUENTA</a></li>

			</ul>
			<br><br><br>

			<ul class="[ nav navbar-nav navbar-left ]" id="resp">

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]">TUS PREGUNTAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]">RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]">INCIDENCIAS</a></li>
				<li><a href="../donaciones/donaciones.php" class="[ animate ]">AYÚDANOS A CRECER</a></li>
				<!--<li><a href="/chat/index.php" class="[ animate ]">CHAT</a></li>-->
				<li><a href="/portada_n/salir.php" class="[ animate ]">LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatcp/index.php" class="[ animate ]">CHAT C.P</a></li>
				<!--<li><a href="/portada_n/calendario.php" class="[ animate ]">CALENDARIO</a></li>-->
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="gest" style="display: none;">
		    
	 		</ul>

	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 41) {
   		
   		?>

   			<ul class="[ nav navbar-nav navbar-left mx-auto]">
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(1); return false;" >GENERAL</a></li>
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(2); return false;" >MI CODIGO POSTAL</a></li>
				<!--<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(3)" >GESTOR C.P</a></li>-->
				<li><a href="/portada_n/cuenta.php" class="[ animate ]" >MI CUENTA</a></li>

			</ul>
			<br><br><br>

			<ul class="[ nav navbar-nav navbar-left ]" id="resp">

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]">TUS PREGUNTAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]">RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]">INCIDENCIAS</a></li>
				<li><a href="../donaciones/donaciones.php" class="[ animate ]">AYÚDANOS A CRECER</a></li>
				<!--<li><a href="/chat/index.php" class="[ animate ]">CHAT</a></li>-->
				<li><a href="/portada_n/salir.php" class="[ animate ]">LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatcp/index.php" class="[ animate ]">CHAT C.P</a></li>
				<!--<li><a href="/portada_n/calendario.php" class="[ animate ]">CALENDARIO</a></li>-->
				<li><a href="/portada_n/mensaje/dpuntcont.php" class="[ animate ]">PREGUNTAS C.P</a></li>
				<li><a href="/portada_n/solicitudes/aceptarcolaboradores.php" class="[ animate ]">ACEPTAR COLABORADOR C.P</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="gest" style="display: none;">
				
	 		</ul>

	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 42) {
   		
   		?>
   			<ul class="[ nav navbar-nav navbar-left mx-auto]">
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(1); return false;" >GENERAL</a></li>
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(2); return false;" >MI CODIGO POSTAL</a></li>
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(3); return false;" >MI CIUDAD</a></li>
				<li><a href="/portada_n/cuenta.php" class="[ animate ]" >MI CUENTA</a></li>

			</ul>
			<br><br><br>

			<ul class="[ nav navbar-nav navbar-left ]" id="resp">

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]">TUS PREGUNTAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]">RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]">INCIDENCIAS</a></li>
				<li><a href="../donaciones/donaciones.php" class="[ animate ]">AYÚDANOS A CRECER</a></li>
				<!--<li><a href="/chat/index.php" class="[ animate ]">CHAT</a></li>-->
				<li><a href="/portada_n/salir.php" class="[ animate ]">LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatcp/index.php" class="[ animate ]">CHAT C.P</a></li>
				<!--<li><a href="/portada_n/calendario.php" class="[ animate ]">CALENDARIO</a></li>-->
				<li><a href="/portada_n/mensaje/dpuntcont.php" class="[ animate ]">PREGUNTAS C.P</a></li>
				<li><a href="/portada_n/solicitudes/aceptarcolaboradores.php" class="[ animate ]">ACEPTAR COLABORADOR C.P</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="gest" style="display: none;">

				<li><a href="/portada_n/chatciudad/index.php" class="[ animate ]">CHAT CIUDAD</a></li>
				<!--<li><a href="/portada_n/calendario.php" class="[ animate ]">CALENDARIO</a></li>-->
				
	 		</ul>

	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 50) {
   		
   		?>
   			<ul class="[ nav navbar-nav navbar-left mx-auto]">
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(1); return false;" >GENERAL</a></li>
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(2); return false;" >MI CIUDAD</a></li>
				<li><a href="/portada_n/cuenta.php" class="[ animate ]" >MI CUENTA</a></li>

			</ul>
			<br><br><br>

			<ul class="[ nav navbar-nav navbar-left ]" id="resp">

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]">TUS PREGUNTAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]">RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]">INCIDENCIAS</a></li>
				<li><a href="../donaciones/donaciones.php" class="[ animate ]">AYÚDANOS A CRECER</a></li>
				<!--<li><a href="/chat/index.php" class="[ animate ]">CHAT</a></li>-->
				<li><a href="/portada_n/salir.php" class="[ animate ]">LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatciudad/index.php" class="[ animate ]">CHAT CIUDAD</a></li>
				<!--<li><a href="/portada_n/calendario.php" class="[ animate ]">CALENDARIO</a></li>-->
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="gest" style="display: none;">
		    
	 		</ul>

	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 51) {
   		
   		?>
   			<ul class="[ nav navbar-nav navbar-left mx-auto]">
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(1); return false;" >GENERAL</a></li>
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(2); return false;" >MI CIUDAD</a></li>
				<li><a href="/portada_n/cuenta.php" class="[ animate ]" >MI CUENTA</a></li>

			</ul>
		
			<br><br><br>
			<ul class="[ nav navbar-nav navbar-left ]" id="resp">

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]">TUS PREGUNTAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]">RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]">INCIDENCIAS</a></li>
				<li><a href="../donaciones/donaciones.php" class="[ animate ]">AYÚDANOS A CRECER</a></li>
				<!--<li><a href="/chat/index.php" class="[ animate ]">CHAT</a></li>-->
				<li><a href="/portada_n/salir.php" class="[ animate ]">LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatciudad/index.php" class="[ animate ]">CHAT CIUDAD</a></li>
				<!--<li><a href="/portada_n/calendario.php" class="[ animate ]">CALENDARIO</a></li>-->
				<li><a href="/portada_n/mensaje/dpuntcont.php" class="[ animate ]">PREGUNTAS CIUDAD</a></li>
				<li><a href="/portada_n/solicitudes/aceptarcolaboradores.php" class="[ animate ]">ACEPTAR COLABORADOR CIUDAD</a></li>
				<li><a href="/portada_n/solicitudes/aceptargestores.php" class="[ animate ]">ACEPTAR GESTOR C.P</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="gest" style="display: none;">
				
		    
	 		</ul>

	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 52) {
   		
   		?>
   			<ul class="[ nav navbar-nav navbar-left mx-auto]">
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(1); return false;" >GENERAL</a></li>
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(2); return false;" >MI CIUDAD</a></li>
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(3); return false;" >MI PAIS</a></li>
				<li><a href="/portada_n/cuenta.php" class="[ animate ]" >MI CUENTA</a></li>

			</ul>
		
			<br><br><br>
			<ul class="[ nav navbar-nav navbar-left ]" id="resp">

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]">TUS PREGUNTAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]">RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]">INCIDENCIAS</a></li>
				<li><a href="../donaciones/donaciones.php" class="[ animate ]">AYÚDANOS A CRECER</a></li>
				<!--<li><a href="/chat/index.php" class="[ animate ]">CHAT</a></li>-->
				<li><a href="/portada_n/salir.php" class="[ animate ]">LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatciudad/index.php" class="[ animate ]" >CHAT CIUDAD</a></li>
				<!--<li><a href="/portada_n/calendario.php" class="[ animate ]">CALENDARIO</a></li>-->
				<li><a href="/portada_n/mensaje/dpuntcont.php" class="[ animate ]" >PREGUNTAS CIUDAD</a></li>
				<li><a href="/portada_n/solicitudes/aceptarcolaboradores.php" class="[ animate ]">ACEPTAR COLABORADOR CIUDAD</a></li>
				<li><a href="/portada_n/solicitudes/aceptargestores.php" class="[ animate ]">ACEPTAR GESTOR C.P</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="gest" style="display: none;">

				<li><a href="/portada_n/chatpais/index.php" class="[ animate ]">CHAT PAIS</a></li>
				<!--<li><a href="/portada_n/calendario.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CALENDARIO</a></li>-->
		    
	 		</ul>

	 <?php 
   		} 
   	?>

   	<?php if ($resultadousuario['tusuario'] == 60) {
   		
   		?>
   			<ul class="[ nav navbar-nav navbar-left mx-auto]">
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(1); return false;" >GENERAL</a></li>
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(2); return false;" >MI PAIS</a></li>
				<li><a href="/portada_n/cuenta.php" class="[ animate ]" >MI CUENTA</a></li>

			</ul>
		
			<br><br><br>
			<ul class="[ nav navbar-nav navbar-left ]" id="resp">

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]">TUS PREGUNTAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]">RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]">INCIDENCIAS</a></li>
				<li><a href="../donaciones/donaciones.php" class="[ animate ]">AYÚDANOS A CRECER</a></li>
				<!--<li><a href="/chat/index.php" class="[ animate ]">CHAT</a></li>-->
				<li><a href="/portada_n/salir.php" class="[ animate ]">LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatpais/index.php" class="[ animate ]">CHAT PAIS</a></li>
				<!--<li><a href="/portada_n/calendario.php" class="[ animate ]">CALENDARIO</a></li>-->
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="gest" style="display: none;">
		    
	 		</ul>



	 <?php 
   		} 
   	?>
   	<?php if ($resultadousuario['tusuario'] == 61) {
   		
   		?>
   			<ul class="[ nav navbar-nav navbar-left mx-auto]">
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(1); return false;" >GENERAL</a></li>
				<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(2); return false;" >MI PAIS</a></li>
				<!--<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(3)" >GESTOR PAIS</a></li>-->
				<li><a href="/portada_n/cuenta.php" class="[ animate ]" >MI CUENTA</a></li>

			</ul>
			<br><br><br>

			<ul class="[ nav navbar-nav navbar-left ]" id="resp">

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]">TUS PREGUNTAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]">RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]">INCIDENCIAS</a></li>
				<li><a href="../donaciones/donaciones.php" class="[ animate ]">AYÚDANOS A CRECER</a></li>
				<!--<li><a href="/chat/index.php" class="[ animate ]">CHAT</a></li>-->
				<li><a href="/portada_n/salir.php" class="[ animate ]">LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatpais/index.php" class="[ animate ]">CHAT PAIS</a></li>
				<!--<li><a href="/portada_n/calendario.php" class="[ animate ]">CALENDARIO</a></li>-->
				<li><a href="/portada_n/mensaje/dpuntcont.php" class="[ animate ]">PREGUNTAS PAIS</a></li>
				<li><a href="/portada_n/solicitudes/aceptarcolaboradores.php" class="[ animate ]">ACEPTAR COLABORADOR PAIS</a></li>
				<li><a href="/portada_n/solicitudes/aceptargestores.php" class="[ animate ]">ACEPTAR GESTOR CIUDAD</a></li>
		    
	 		</ul>


	 		<ul class="[ nav navbar-nav navbar-left ]" id="gest" style="display: none;">
				
		    
	 		</ul>

	 <?php 
   		} 
   	?>


</div>

