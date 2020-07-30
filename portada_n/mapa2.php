<?php  
include('bbdd.php');

// include('../portada_n/cabecera2.php');?>

<?php 
$lon1=strtok($lon,".");
$lon2=strtok(".");
$lona=$lon1.".".$lon2;

$lat1=strtok($lat,".");
$lat2=strtok(".");
$lata=$lat1.".".$lat2;
?>

<div id="main">
<div class="titulo">
<p class="enc">Mapa de Localizacion</p>
</div>
<div class="contenido">
<!--
<style>
      #map {
        height:300px;
        width:625px;
        left:25px;
        top:80px;
        position:absolute;
      }
    </style>
-->
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-8zBVd7OV2Y0pRN5Q5m5E6X9DGszU3yk">
</script>

<script>
var myCenter=new google.maps.LatLng(<?php  echo $lata;?>,<?php  echo $lona;?>);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:18,
  disableDefaultUI:true,  
  mapTypeId:google.maps.MapTypeId.SATELLITE
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
map.setTilt(0);

  var marker = new google.maps.Marker({
    position: myCenter,
    map: map,
    title: '<?php  echo strtoupper($nombrecom);?>'
  });


}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>




<table>
<tr>
<td>Puesto</td><td><?php  echo strtoupper($nombrecom);?></td>
</tr>
<tr>
<td>Trabajador</td><td><?php  echo strtoupper($nombretrab);?></td>
</tr>
<tr><td colspan="2">
<img alt="volver" border="0" src="../img/Reload-icon.png" width="32px" onclick="history.back()"></td></tr>
</table>

<div id="googleMap" style="width:625px;height:300px;"></div>


</div>
</div>