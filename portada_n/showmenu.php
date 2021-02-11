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

<div class="[ collapse navbar-collapse ]" id="bs-example-navbar-collapse-1">


   	<?php if ($resultadousuario['tusuario'] == 3) {
   		
   		?>
		<ul class="[ nav navbar-nav navbar-left mx-auto]">
			<li class="[ animate ]"><a href="#" class="[ animate ]" onclick="changeOptions(1); return false;" >GENERAL</a></li>
			<li><a href="/portada_n/cuenta.php" class="[ animate ]" >MI CUENTA</a></li>
		</ul>
		<br><br><br>
	   <ul class="[ nav navbar-nav navbar-left ]">

	    <li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMAS ENTRADAS</a></li>
	    <li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMOS RESULTADOS</a></li>
	    <li><a href="/incidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >INCIDENCIAS</a></li>
	    <li><a href="/chat/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT</a></li>
	    <li><a href="/portada_n/salir.php" class="[ animate ]" onclick="openCity(event, 'd0')" >LOG OUT</a></li>
	    
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

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMAS ENTRADAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMOS RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >INCIDENCIAS</a></li>
				<li><a href="/portada_n/chatcp/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT</a></li>
				<li><a href="/portada_n/salir.php" class="[ animate ]" onclick="openCity(event, 'd0')" >LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatcp/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT C.P</a></li>
				<li><a href="/portada_n/calendario.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CALENDARIO</a></li>
		    
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

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMAS ENTRADAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMOS RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >INCIDENCIAS</a></li>
				<li><a href="/chat/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT</a></li>
				<li><a href="/portada_n/salir.php" class="[ animate ]" onclick="openCity(event, 'd0')" >LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatcp/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT C.P</a></li>
				<li><a href="/portada_n/calendario.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CALENDARIO</a></li>
				<li><a href="/portada_n/mensaje/dpuntcont.php" class="[ animate ]" onclick="openCity(event, 'd0')" >PREGUNTAS C.P</a></li>
				<li><a href="/portada_n/solicitudes/aceptarcolaboradores.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ACEPTAR COLABORADOR C.P</a></li>
		    
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

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMAS ENTRADAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMOS RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >INCIDENCIAS</a></li>
				<li><a href="/chat/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT</a></li>
				<li><a href="/portada_n/salir.php" class="[ animate ]" onclick="openCity(event, 'd0')" >LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatcp/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT C.P</a></li>
				<li><a href="/portada_n/calendario.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CALENDARIO</a></li>
				<li><a href="/portada_n/mensaje/dpuntcont.php" class="[ animate ]" onclick="openCity(event, 'd0')" >PREGUNTAS C.P</a></li>
				<li><a href="/portada_n/solicitudes/aceptarcolaboradores.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ACEPTAR COLABORADOR C.P</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="gest" style="display: none;">

				<li><a href="/portada_n/chatciudad/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT CIUDAD</a></li>
				<li><a href="/portada_n/calendario.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CALENDARIO</a></li>
				
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

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMAS ENTRADAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMOS RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >INCIDENCIAS</a></li>
				<li><a href="/chat/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT</a></li>
				<li><a href="/portada_n/salir.php" class="[ animate ]" onclick="openCity(event, 'd0')" >LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatciudad/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT CIUDAD</a></li>
				<li><a href="/portada_n/calendario.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CALENDARIO</a></li>
		    
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

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMAS ENTRADAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMOS RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >INCIDENCIAS</a></li>
				<li><a href="/chat/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT</a></li>
				<li><a href="/portada_n/salir.php" class="[ animate ]" onclick="openCity(event, 'd0')" >LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatciudad/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT CIUDAD</a></li>
				<li><a href="/portada_n/calendario.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CALENDARIO</a></li>
				<li><a href="/portada_n/mensaje/dpuntcont.php" class="[ animate ]" onclick="openCity(event, 'd0')" >PREGUNTAS CIUDAD</a></li>
				<li><a href="/portada_n/solicitudes/aceptarcolaboradores.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ACEPTAR COLABORADOR CIUDAD</a></li>
				<li><a href="/portada_n/solicitudes/aceptargestores.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ACEPTAR GESTOR C.P</a></li>
		    
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

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMAS ENTRADAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMOS RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >INCIDENCIAS</a></li>
				<li><a href="/chat/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT</a></li>
				<li><a href="/portada_n/salir.php" class="[ animate ]" onclick="openCity(event, 'd0')" >LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatciudad/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT CIUDAD</a></li>
				<li><a href="/portada_n/calendario.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CALENDARIO</a></li>
				<li><a href="/portada_n/mensaje/dpuntcont.php" class="[ animate ]" onclick="openCity(event, 'd0')" >PREGUNTAS CIUDAD</a></li>
				<li><a href="/portada_n/solicitudes/aceptarcolaboradores.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ACEPTAR COLABORADOR CIUDAD</a></li>
				<li><a href="/portada_n/solicitudes/aceptargestores.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ACEPTAR GESTOR C.P</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="gest" style="display: none;">

				<li><a href="/portada_n/chatpais/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT PAIS</a></li>
				<li><a href="/portada_n/calendario.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CALENDARIO</a></li>
		    
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

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMAS ENTRADAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMOS RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >INCIDENCIAS</a></li>
				<li><a href="/chat/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT</a></li>
				<li><a href="/portada_n/salir.php" class="[ animate ]" onclick="openCity(event, 'd0')" >LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatpais/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT PAIS</a></li>
				<li><a href="/portada_n/calendario.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CALENDARIO</a></li>
		    
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

				<li><a href="/portada_n/ultimasentradas_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMAS ENTRADAS</a></li>
				<li><a href="/portada_n/ultimasincidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMOS RESULTADOS</a></li>
				<li><a href="/incidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >INCIDENCIAS</a></li>
				<li><a href="/chat/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT</a></li>
				<li><a href="/portada_n/salir.php" class="[ animate ]" onclick="openCity(event, 'd0')" >LOG OUT</a></li>
		    
	 		</ul>

	 		<ul class="[ nav navbar-nav navbar-left ]" id="colab" style="display: none;">

				<li><a href="/portada_n/chatpais/index.php" class="[ animate ]" onclick="changeOptions(2)" >CHAT PAIS</a></li>
				<li><a href="/portada_n/calendario.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CALENDARIO</a></li>
				<li><a href="/portada_n/mensaje/dpuntcont.php" class="[ animate ]" onclick="openCity(event, 'd0')" >PREGUNTAS PAIS</a></li>
				<li><a href="/portada_n/solicitudes/aceptarcolaboradores.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ACEPTAR COLABORADOR PAIS</a></li>
				<li><a href="/portada_n/solicitudes/aceptargestores.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ACEPTAR GESTOR CIUDAD</a></li>
		    
	 		</ul>


	 		<ul class="[ nav navbar-nav navbar-left ]" id="gest" style="display: none;">
				
		    
	 		</ul>

	 <?php 
   		} 
   	?>


</div>

