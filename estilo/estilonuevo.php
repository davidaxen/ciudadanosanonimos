<?php 
header('content-type:text/css');
include('bbdd.php');
if (isset($colorarriba)==false){;
$colorarriba=null;
};

if($colorarriba==null){;
$colorhtml="#bfae4d";
$colorencabezado="#4c4c4c";
$colorborder="#8AC007";
$colormenulateral="#003b29";
}else{
$colorhtml="#".$colorcentral;
$colorencabezado="#".$colorarriba;
$colorborder="#8AC007";
$colormenulateral="#".$colorlateral;
};

switch($dispositivo){
case "tablet": include('estilotablet.css');break;
case "movil": include('estilomovil.css');break;
default: include('estilopc.css');
}
?>