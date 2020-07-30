<?php 
$sdato=$_SERVER['HTTP_USER_AGENT'];
$dominio=$_SERVER['SERVER_NAME'];
setcookie("user","");
setcookie("pass","");


include('bbdd/sqlsmartcbc.php');


$sql="select * from portada where dominio='".$dominio."'";
//echo $sql;
$result=mysql_query ($sql) or die ("Este dominio no tiene acceso al sistema, por favor hable con el departamento Tecnico");
$row=mysql_affected_rows();

if ($row==0){
?>
Este dominio no tiene acceso al sistema, por favor hable con el departamento de sistemas.
<?php 	
	}else{;
$logo=mysql_result($result,0,'logo');
$imgder=mysql_result($result,0,'imgderecha');
$imgizq=mysql_result($result,0,'imgizquierda');
$fondo=mysql_result($result,0,'fondo');
$icono=mysql_result($result,0,'icono');


?>
<HTML>
<HEAD>
<TITLE>PROGRAMA DE GESTION DE PERSONAL Y TRABAJO</TITLE>


<link rel="stylesheet" href="estilo/estilo.css">
<script>document.write("<link rel='shortcut icon' href='" + imgico + "'>")</script>
<meta name="author" content="Aequipamientos_002" >
<meta name="KeyWords" content="Control de rondas, gestion de personal, Administracion de Fincas, Piscinas, Limpieza, Formación, Conserjeria, Retirada de Cubos, Outsourcing, Creación de Páginas WEB, Desarrollo de Proyectos, Analisis de Empresas, Mediador de Seguros de Credito">
<meta name="Description" content="PROGRAMA DE GESTION DE PERSONAL Y TRABAJO">



</HEAD>



<?php 	
if ($fondo==null){;
echo ("<body { bgcolor='white' text='black' link='White'>");
}else{
echo("<body background='img/".$fondo."' text='black' link='White'>");
	}
?>	



<div id="zoom" align="center" style="position: absolute; top: 300; left: 100; width: 742; height: 19"></div>

<div id="container" style="position: relative;width: 800px;padding: 0px 0px 0 0;margin: auto;text-align: left">
<?php if ($imgder!=''){;?><img src="img/<?php  echo $imgder;?>" style="position:absolute;top:0;left:0;index-z:12"><?php };?>
<?php if ($imgizq!=''){;?><img src="img/<?php  echo $imgizq;?>" style="position:absolute;top:0;right:0;index-z:13"><?php };?>
<center>
<img src="img/<?php  echo $logo;?>">
</center>
<p> </p>
<p> </p>

<form method="post" action="inicio.php" name="login_form">

<center>
<table border=0>
<tr><td>Nombre:</td><td><input type="text" name="user" onFocus="encender(this)" onBlur="apagar(this)"></td></tr>
<tr><td>Password:</td><td><input type="password" name="pass" onFocus="encender(this)" onBlur="apagar(this)"></td></tr>
<tr><td><input type="submit" value="Enviar"></td></tr>
</table>
</center>
</form>
<script>
function setFocus() {	document.login_form.user.focus(); }
window.onload = setFocus; 
</script>
</div>
</BODY>
</HTML>

<?php };?>