<?php
$sdato=$_SERVER['HTTP_USER_AGENT'];
$dominio=$_SERVER['SERVER_NAME'];
error_reporting(0);
include('bbdd.php');


$sql="select * from proyectos where idproyectos='".$idpr."'";
//echo $sql;
$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$resultadorow=$result->fetchAll();
$row=count($resultadorow);

/*$result=mysqli_query ($conn,$sql) or die ("Este dominio no tiene acceso al sistema, por favor hable con el departamento Tecnico");
$row=mysqli_num_rows($result);*/

if ($row==0){
?>
Este dominio no tiene acceso al sistema, por favor hable con el departamento de sistemas.
<?php
	}else{;
//$resultado=mysqli_fetch_array($result);
$resultado=$resultmos->fetch();
$nombre=$resultado['nombre'];
$logo=$resultado['logo'];
$fondo=$resultado['fondo'];
$imgizq=$resultado['imgizquierda'];
$fondo=$resultado['fondo'];
$icono=$resultado['icono'];
$pie=$resultado['pie'];
$reseteo=$resultado['reseteo'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
	<link rel="stylesheet" type="text/css" href="../portada_n/ultimasincidencias_t.css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<title>RECUPERACION DE CONTRASE&Ntilde;A <?php echo strtoupper($nombre);?><</title>
</head>

<body style="background-image:url(../img/iconos/portada_ca.jpg);">
<div class=' fadeInDown'>
	<div align="center" class='formContent' style="background-color: white; border-radius: 15px; margin-top: 19%; margin-left: 32%; max-width: 650px">
	<h2>Recuperación de contraseña</h2>
		<p>Indique su dirección de correo electrónico para poder enviar un mensaje con su contraseña</p>
		<div>
    	<form action="sendmailrecuperarcon.php">
			<div class="form-group">
				<label for="mail">Correo electrónico:</label> <br>
				<input type="text" style="text-align:left;" class="form-control" name="mail">
			</div>
			<button type="submit" name="submit" class="btn btn-default" value="enviar">Enviar</button>
   			 </form> <br>
  		</div>

</div>
</div>

<?php };?>
