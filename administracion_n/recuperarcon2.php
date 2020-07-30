<?php 
$sdato=$_SERVER['HTTP_USER_AGENT'];
$dominio=$_SERVER['SERVER_NAME'];

include('bbdd.php');


$sql="select * from proyectos where idproyectos='".$idpr."'";
//echo $sql;
$result=mysqli_query ($conn,$sql) or die ("Este dominio no tiene acceso al sistema, por favor hable con el departamento Tecnico");
$row=mysqli_num_rows($result);

if ($row==0){
?>
Este dominio no tiene acceso al sistema, por favor hable con el departamento de sistemas.
<?php 	
	}else{;
$resultado=mysqli_fetch_array($result);
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

<form method="post" action="recuperarcon3.php" name="login_form">
<center>
<input type="hidden" name="tipo" value="<?php  echo $tipo;?>">
<input type="hidden" name="dato" value="<?php  echo $dato;?>">


<?php 
if ($tipo==1){;

$sql23="select * from empleados where nif='".$dato."'";
//echo $sql;
$result23=mysqli_query ($conn,$sql23) or die ("Este dominio no tiene acceso al sistema, por favor hable con el departamento Tecnico");
$row23=mysqli_num_rows($result23);

if($row23>0){;
?>

<table border=0>
<span class="tit3">Hemos comprobado que estas dado de alta en varias empresas. Por favor selecciona a cual es la que no recuerdas tu acceso</span>
<tr><td>Empresa</td><td><select name="ide">
<?php 
for ($i=0;$i<$row23;$i++){;
mysqli_data_seek($result23,$i);
$resultado23=mysqli_fetch_array($result23);
$ide=$resultado23['idempresa'];
$sql01="select * from empresas where idempresas='".$ide."'";
//echo $sql;
$result01=mysqli_query ($conn,$sql01) or die ("Este dominio no tiene acceso al sistema, por favor hable con el departamento Tecnico");
$resultado01=mysqli_fetch_array($result01);
$nombre=$resultado01['nombre'];
?>
<option value="<?php  echo $ide;?>"><?php  echo $nombre;?>
<?php };?>
</select></td></tr>

<?php 
}else{;
 
$resultado23=mysqli_fetch_array($result23);
$ide=$resultado23['idempresa'];
echo '<input type="hidden" name="ide" value="<?php  echo $ide;?>">';
};
 
};
?>




<?php 
if ($tipo==4){;

$sql23="select distinct(idempresa) from gestores where telefono1='".$telef."'";
//echo $sql;
$result23=mysqli_query ($conn,$sql23) or die ("Este dominio no tiene acceso al sistema, por favor hable con el departamento Tecnico");
$row23=mysqli_num_rows($result23);

if($row23>0){;
?>
<table border=0>
<span class="tit3">Hemos comprobado que estas dado de alta en varias empresas. Por favor selecciona a cual es la que no recuerdas su acceso</span>
<tr><td>Empresa</td><td><select name="ide">
<?php 
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result23,$i);
$resultado23=mysqli_fetch_array($result23);
$ide=$resultado23['idempresa'];
$sql01="select * from empresas where idempresas='".$ide."'";
//echo $sql;
$result01=mysqli_query ($conn,$sql01) or die ("Este dominio no tiene acceso al sistema, por favor hable con el departamento Tecnico");
$resultado01=mysqli_fetch_array($result01);
$nombre=$resultado01['nombre'];
?>
<option value="<?php  echo$ide;?>"><?php  echo $nombre;?>
<?php };?>
</select></td></tr>
<?php 
}else{;


$resultado23=mysqli_fetch_array($result23);
$ide=$resultado23['idempresa'];
echo '<input type="hidden" name="ide" value="<?php  echo$ide;?>">';
};

};
?>


<table border=0>
<span class="tit3">Necesitamos su Correo para enviarle el usuario y una contrase&ntilde;a.</span>
<tr><td>Email</td><td><input type="text" name="email"></td></tr>
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