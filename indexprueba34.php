<?php 

extract($_COOKIE);

if ($com=='comprobacion'){;

date_default_timezone_set('Europe/Madrid');
$dbh=mysql_connect ("bbddsmartcbc.db.11415121.hostedresource.com", "bbddsmartcbc", "Jas170174#") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("bbddsmartcbc");


$sql1="select * from usuarios where user='".$user."' and password='".$pass."'"; 
//echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result empresas 1");

$admi=mysql_result($result1,0,'administracion');
$serv=mysql_result($result1,0,'servicios');
$info=mysql_result($result1,0,'informes');
$docu=mysql_result($result1,0,'documentacion');
$trab=mysql_result($result1,0,'trabajador');
$cli=mysql_result($result1,0,'cliente');
$ges=mysql_result($result1,0,'gestor');

$idtrab=mysql_result($result1,0,'idempleados');
$idcli=mysql_result($result1,0,'idcliente');
$idges=mysql_result($result1,0,'idgestor');


$datlat=mysql_result($result1,0,'datoslateral');
$datlat2=mysql_result($result1,0,'datoslateral2');
$port=mysql_result($result1,0,'portada');

setcookie("idtrab",$idtrab);
setcookie("idcli",$idcli);
setcookie("idges",$idges);



$sql10="select * from visitas where usuario='".$user."' order by dia desc,hora desc"; 
$result10=mysql_query ($sql10) or die ("Invalid result empresas 10");
$row10=mysql_affected_rows();

if ($row10==0){;
$dia1="Bienvenido";
$hora1="";
}else{;
$dia1=mysql_result($result10,0,'dia');
$hora1=mysql_result($result10,0,'hora');
};

?>
<script>
function funciones(){
top.document.cerrar=true;
top.document.location.href="<?php  echo $web;?>";
};
</script>

<?php  include('portada_n/cabecera.php');?>


<div class="colocacion centro">
<center class="enc2">Acciones Actuales</center>
<?php  include('portada_n/portada2.php');?>

</div>

<div class="arriba">
<left class="enc2">Ultimas Entradas</left><br/>
<iframe  style="border:0" name="arriba" src="portada_n/ultimasentradas.php" width="800" height="240" scrolling="no"></iframe>
</div>

<div class="medio">
<left class="enc2">Ultimas Incidencias</left><br/>
<iframe  style="border:0" name="arriba" src="portada_n/ultimasincidencias.php" width="800" height="130" scrolling="no"></iframe>
</div>
   		
<div class="abajo">
<left class="enc2">Alarmas</left><br/>
<iframe style="border:0" name="abajo" src="portada_n/trabcua.php" width="800" height="40" scrolling="no"></iframe>
</div>

    

	




</body>

</html>
<?php }else{;
include ('cierre.php');
};?>
