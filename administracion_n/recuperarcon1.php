<?php 
$sdato=$_SERVER['HTTP_USER_AGENT'];
$dominio=$_SERVER['SERVER_NAME'];

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

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<title>RECUPERACION DE CONTRASE&Ntilde;A <?php echo strtoupper($nombre);?><</title>  
<link rel="stylesheet" href="solicitud.css">
</head>

<body class='html' style='background-image:url(../img/<?php echo $fondo;?>);
  background-repeat: no-repeat;
  background-size: cover;'>
<div class='cuadro'>
<div class='hijo' style='background-color:#f5f5f5'>


  <div class='imgcontainer'>
    <img src='../img/<?php echo $logo;?>'>
    <h3 style="text-align: center;color:#000000">RECUPERACION DE CONTRASE&Ntilde;A <?php echo strtoupper($nombre);?></h3>
  </div>

<form method="post" action="recuperarcon2.php" name="login_form">
<input type="hidden" name="idpr" value="<?php echo $idpr;?>">
<input type="hidden" name="tipo" value="<?php  echo $tipo;?>">

<center>
<span class="tit3">Para poder recuperar la contrase&ntilde;a, necesitamos que nos indique los siguientes campos</span>
<table border=0>
<?php 
switch($tipo){;
case '1': 
case '2':
echo '<tr><td>DNI:</td><td><input type="text" name="dato"></td></tr>';break;
case '3':
echo '<tr><td>Usuario:</td><td><input type="text" name="dato"></td></tr>';break;
case '4':
case '5':
echo '<tr><td>Telefono:</td><td><input type="text" name="dato"></td></tr>';break;
case '6':
echo '<tr><td>Referencia:</td><td><input type="text" name="dato"></td></tr>';break;
};

?>


<tr><td><input type="submit" value="Enviar"></td></tr>
</table>
</center>
</form>

</div>
</div>

<?php print $pie;?>

<?php 
};
?>