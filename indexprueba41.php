<?php 
//extract($_GET);
extract($_COOKIE);
//extract($_POST);

if ($com=='comprobacion'){;

?>

<head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="boostrapNav.css">
<link rel="stylesheet" type="text/css" href="nav.js">
</head>

<body style="background-image:url(img/iconos/portada_ca.jpg)"; >
<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">
  <div class="[ navbar-header ]">
        <div class="[ animbrand ]">
          <a class="[ navbar-brand ][ animate ]" href="inicio1.php"><img src="img/ciudadanoslogo.png"></a>
        </div>
  </div>
<div class="[ container ]">

  <div class="[ collapse navbar-collapse ]" id="bs-example-navbar-collapse-1">
       <ul class="[ nav navbar-nav navbar-right ]">
        <li><a href="portada_n/ultimasincidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMOS RESULTADOS</a></li>
        <li><a href="incidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >INCIDENCIAS</a></li>
        <li><a href="chat/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT</a></li>
        <li><a href="portada_n/salir.php" class="[ animate ]" onclick="openCity(event, 'd0')" >LOG OUT</a></li>
        <li><a href="portada_n/ultimasentradas_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMAS ENTRADAS</a></li>
     </ul>
   </div>
 </nav>
<br>
<br>
<br>
<br>
<br>
   <div id="d0" class="tabcontent">

<div id="d0" class="tabcontent">
  <h3 align="center" style="color: white;" ><img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;"> Preguntas Lanzadas</h3>

  <p><a style="border:0" name="bloque0" src="portada_n/ultimasentradas_t.php" width="100%" height="680" scrolling="auto"></a></p>

</div>



</div>
  
<!--  <button class="tablinks" onclick="openCity(event, 'd2')" id="defaultOpen"><img src="../img/iconos/mensajes.png" width="32px" style="vertical-align:middle;"> Ultimos mensajes enviados con respuesta</button>-->









</div>



  <!--<p><iframe style="border:0;" name="bloque0" src="portada_n/videos_t.php" width="25%" height="25%" scrolling="no"></iframe></p>-->


<!--
<div id="d2" class="tabcontent">
  <h3><img src="../img/iconos/mensajes.png" width="32px" style="vertical-align:middle;"> Ultimos mensajes enviados con respuesta</h3>
  <p><iframe style="border:0" name="bloque0" src="portada_n/mensajesconrespuesta_t.php" width="100%" height="325" scrolling="auto"></iframe></p>
</div>
-->

<?php include ('js/tabjs.htm');?>




    

</body>

</html>
<?php }else{;
include ('cierre.php');
};?>