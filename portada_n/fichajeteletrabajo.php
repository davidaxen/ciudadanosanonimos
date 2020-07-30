<?php  
include('bbdd.php');

$ip=$_SERVER['REMOTE_ADDR'];

$idpccat=1;
if ($ide!=null){;

include('../portada_n/cabecera2.php');

include('combo.php');?>

<div id="main">
<div class="titulo">
<p class="enc">FICHAJE EN TELETRABAJO</p></div>
<div class="contenido">

<?php if($lat==null){;?> 
<style>
.loader {
  border: 16px solid #f40b0c;
  border-radius: 50%;
  border-top: 16px solid #373e46;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

<div class="loader"></div>

<form action="fichajeteletrabajo.php" method="get" name="miformulario"> 
    <input id="latitud" name="lat" type="hidden" />
    <input id="longitud" name="lon" type="hidden" />
   <!-- <input id="aceptar" type="submit" value="Aceptar" />-->
</form>

<script>
window.onload = getLocation();

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
         document.getElementById("latitud").value=position.coords.latitude;
         document.getElementById("longitud").value=position.coords.longitude;
		   document.forms["miformulario"].submit();
}
</script>



<?php }else{;?>





<?php 
$diaa=date("Y-m-d",time());
$hora=date("H:i:s", time());
$valor="Teletrabajo ".$ip;
/*
echo 'dia '.$diaa.'<br/>';
echo 'hora '.$hora.'<br/>';
echo 'observaciones '.$valor.'<br/>';
*/
$sqlcent="select * from almpc where idempresas='".$ide."' and idempleado='".$idtrab."' and idpccat='1' order by id desc";
//echo $sqlcent.'<br/>';
$resultcent=mysqli_query ($conn,$sqlcent) or die ("Invalid result comprobar entrada");
$resultado=mysqli_fetch_array($resultcent);
$idcoment=$resultado['idpiscina'];
$idpcsubcat=$resultado['idpcsubcat'];
$horaant=$resultado['hora'];
/*
echo 'idcomunidad '.$idcoment.'<br/>';
echo 'idsubcat '.$idpcsubcat.'<br/>';
echo 'horaant '.$horaant.'<br/>';
*/
if ($idpcsubcat=='2'){;

$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$ide','$idtrab','1','1','1','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
//echo $sql11.'<br/>';
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
echo "Se ha producido la entrada en el puesto de Teletrabajo con fecha $diaa y hora $hora";
}else{;

if ($idcoment==1){;
$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$ide','$idtrab','1','1','2','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
//echo $sql11.'<br/>';
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
echo "Se ha producido la salida en el puesto de Teletrabajo con fecha $diaa y hora $hora";
}else{;
$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$ide','$idtrab','$idcoment','1','2','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
//echo $sql11.'<br/>';
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
$hora=date("H:i:s", time()+0.001);
$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$ide','$idtrab','1','1','1','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
//echo $sql11.'<br/>';
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
$hora=date("H:i:s", time()+0.001);
$sql11 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro) VALUES ('$ide','$idtrab','1','1','2','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro')";
//echo $sql11.'<br/>';
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result icarnet");
echo "Hemos detectado que habeis entrado en otro puesto de trabajo, procedemos al ajuste del sistema con fecha $diaa y hora $hora";

};

};


?>


<?php };?>
</div>
</div>
<?php } else {;
include ('../../cierre.php');
 };?>
