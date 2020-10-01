<?php 
include('bbdd.php');
?>

<link rel="stylesheet" href="/estilo/estilonuevo.php" type="text/css" media="screen" charset="utf-8" >
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
        <meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">
        
<form method="POST" action="ultimosvideos.php" enctype="multipart/form-data">
	<h1>introduzca URL</h1>
	<input type="text" name="url">
	<input type="submit" class="envio" value="enviar" name="enviar">

</form>
