<?php 
//extract($_GET);
extract($_COOKIE);
//extract($_POST);

if ($com=='comprobacion'){;

include('portada_n/cabecera.php');?>

<script type="">
  
$(document).ready(function () {
    $(".popup").hide();
    $(".openpop").click(function (e) {
        e.preventDefault();
        $("iframe").attr("src", $(this).attr('href'));
        $(".links").fadeOut('slow');
        $(".popup").fadeIn('slow');
    });

    $(".close").click(function () {
        $(this).parent().fadeOut("slow");
        $(".links").fadeIn("slow");
    });
});

</script>

<style>
.main3 {
	 /*width: calc (100% - 200px);*/
	 width:100%;
	 position:relative;
	 top:0px;
    border: 0px solid #fff;
    text-align:center;
    display:inline-table;
}

.caja3{
	 padding-top:5px;
	 padding-left:5px;
	 padding-right:5px;
    border: 0px solid <?php  echo $colorborder;?>;
    text-align:center;
    min-width: 100px;
    height: 90px;
    border-bottom:5px inset #000;
    vertical-align: middle;
    margin:5px;
    border-radius: 8px;
    background-color:white;
    box-shadow: 1px 15px 18px #888888;
	 display:inline-table;
	 text-align:center;
}


.main6 {
	 /*width: calc (100% - 200px);

	 */
	 top:10px; 
	 width:100%;
	 position:relative;
	 padding:10px;
    border: 0px solid #fff;
    text-align:center;

}




</style>



<div id="main">

<div class="main3">
<span><?php // include('portada_n/portada2_t.php');?></span>

</div>


<div class="main6">
<?php include ('estilo/tab.htm');?>


<table align="center">
<th><div class="tab">

  <th><button class="tablinks" onclick="openCity(event, 'd0')" id="defaultOpen"><img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;"> Preguntas Lanzadas</button></th>
  <th><button class="tablinks" onclick="openCity(event, 'd1')" id="defaultOpen"><img src="../img/iconos/incidencias.png" width="32px" style="vertical-align:middle;"> Ultimos Resultados</button></th>
  <th><button class="tablinks" onclick="openCity(event, 'd2')" id="defaultOpen"><img src="../img/iconos/18-incidencia.png" width="32px" style="vertical-align:middle;"> Incidencias</button></th>
  <!--<th><button class="tablinks" onclick="openCity(event, 'd3')" id="defaultOpen"><img src="../img/iconos/18-incidencia.png" width="32px" style="vertical-align:middle;"> Videos</button></th>-->

  
<!--  <button class="tablinks" onclick="openCity(event, 'd2')" id="defaultOpen"><img src="../img/iconos/mensajes.png" width="32px" style="vertical-align:middle;"> Ultimos mensajes enviados con respuesta</button>-->
</div></th>
</table>


<div id="d0" class="tabcontent">
  <h3><img src="../img/iconos/serviciose.png" width="32px" style="vertical-align:middle;"> Preguntas Lanzadas</h3>
  <p><iframe style="border:0" name="bloque0" src="portada_n/ultimasentradas_t.php" width="100%" height="325" scrolling="no"></iframe></p>


</div>

<div id="d1" class="tabcontent">
  <h3><img src="../img/iconos/incidencias.png" width="32px" style="vertical-align:middle;"> Ultimos Resultados</h3>
  <p><iframe style="border:0" name="bloque0" src="portada_n/ultimasincidencias_t.php" width="100%" height="325" scrolling="auto"></iframe></p>
</div>


<div id="d2" class="tabcontent">
  <h3><img src="../img/iconos/18-incidencia.png" width="32px" style="vertical-align:middle;"> Incidencias</h3>
  <p><iframe style="border:0" name="bloque0" src="portada_n/incidencias_t.php" width="100%" height="325" scrolling="no"></iframe></p>

</div>


<div id="d3" class="tabcontent">
  <h3><img src="../img/iconos/18-incidencia.png" width="32px" style="vertical-align:middle;"> Videos</h3>

   <div class="links">
    <a class="openpop" href="<?php 
      $sql1="SELECT url from videos";
      $result1=$conn->query($sql1);
      $url=$result1->fetch(); 
      echo($url[0]);?>">VIDEOS</a>
</div>
<div class="wrapper">
    <div class="popup">
        <iframe src="">
            <p>Your browser does not support iframes.</p>
        </iframe>
<a href="#" class="close">X</a>
    </div>
</div>

  <!--<p><iframe style="border:0;" name="bloque0" src="portada_n/videos_t.php" width="25%" height="25%" scrolling="no"></iframe></p>-->
</div>

<!--
<div id="d2" class="tabcontent">
  <h3><img src="../img/iconos/mensajes.png" width="32px" style="vertical-align:middle;"> Ultimos mensajes enviados con respuesta</h3>
  <p><iframe style="border:0" name="bloque0" src="portada_n/mensajesconrespuesta_t.php" width="100%" height="325" scrolling="auto"></iframe></p>
</div>
-->

<?php include ('js/tabjs.htm');?>



</div>

</div>
    

</body>

</html>
<?php }else{;
include ('cierre.php');
};?>