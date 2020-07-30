<?php  
include('bbdd.php');

include('../portada_n/cab_repr2.php');?>

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
src="https://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(<?php  echo $lat;?>,<?php  echo $lon;?>);

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