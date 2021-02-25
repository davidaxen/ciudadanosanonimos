<?php
    include('../../bbdd.php');
    $mail = $_COOKIE['gente'];

    $sqlcheckuser = "SELECT * FROM usuarios WHERE user = :mail";
    $resultcheckuser=$conn->prepare($sqlcheckuser);
    $resultcheckuser->bindParam(':mail', $mail);
    $resultcheckuser->execute();
    $resultadocheckuser = $resultcheckuser->fetch();

    if ($resultadocheckuser['tusuario'] == 40 || $resultadocheckuser['tusuario'] == 41 || $resultadocheckuser['tusuario'] == 42) {


 ?>
<html>
<head>




  <link rel="stylesheet" type="text/css" href="../../cabecera.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">

    <link rel="stylesheet" type="text/css" href="../ultimasincidencias_t.css">
    <link rel="stylesheet" type="text/css" href="chat1.css">


    <meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

<!-- Bootstrap CSS -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<!--fontawesome-->

<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>

<script type="text/javascript">
  
  function redireccion(ruta) {
    window.location.href = ruta;
  }



</script>

</head>


<body   style="background-image:url(../../img/iconos/portada_ca.jpg); margin-top: 5%"; >



      <nav style="background-color: white;padding-left: 10%" class="navbar navbar-expand-md navbar-light  fixed-top">

          <a class="navbar-brand"><img src="/img/ciudadanoslogo.png"></a>
            <button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
            <span class="navbar-toggler-icon"></span>
            </button>

          <div class="collapse navbar-collapse justify-content-between" id="nav">
            <ul class="navbar-nav">
              <div class="btn-group">
                <li class="nav-item dropdown" data-toggle="dropdown">
                  <a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">GENERAL</a>

                    <div class="dropdown-menu">

                      <a  class="dropdown-item" onclick="redireccion('/portada_n/ultimasentradas_t.php');" href="/portada_n/ultimasentradas_t.php">TUS PREGUNTAS</a>

                      <a class="dropdown-item" onclick="redireccion('/portada_n/ultimasincidencias_t.php');" href="/portada_n/ultimasincidencias_t.php">RESULTADOS</a>

                      <a class="dropdown-item" onclick="redireccion('/incidencias_t.php');" href="/incidencias_t.php">INCIDENCIAS</a>


                    </div>

                </li>

              </div>

          <div class="btn-group">
          <li class="nav-item dropdown" data-toggle="dropdown">

          <a class="nav-link font-weight-bold px-3 dropdown-toggle" href="#">MI CODIGO POSTAL</a>

          <div class="dropdown-menu">

            <a class="dropdown-item" onclick="redireccion('/portada_n/chatcp/index.php');" href="/portada_n/chatcp/index.php">CHAT C.P</a>

          </div>

          </li>
          </div>

        <div class="btn-group">

          <li class="nav-item">

          <a class="nav-link font-weight-bold px-3" href="/portada_n/cuenta.php">MI CUENTA</a>

          </li>

        </div>




        <div class="btn-group">
          <li class="nav-item">

          <a  class="nav-link font-weight-bold px-3" href="/portada_n/salir.php">LOG OUT</a>

          </li>
        </div>

        <div align="center" style="border: 2px solid grey; border-radius: 10px" class="btn-group">

          <li class="nav-item">

          <a class="nav-link font-weight-bold px-3" href="/donaciones/donaciones.php">CUOTA DE PARTICIPACIÓN<br><span style="font-size: 12px; ">-Ayúdanos a crecer-</span></a>

          </li>

        </div>



        </ul>

          </div>

          </nav>

<div class='wrapper fadeInDown' style="border-radius:10px; background-color: transparent; text-align: center; min-height: 0%; max-width: 850px; margin:auto;">
  <div id='formContent' style="max-width: 850px; background-color: transparent;" >
  <div style="background-color: white; border-radius: 10px; padding-top: 2%" class="panel panel-default chat-widget">
    <div style="border-radius: 10px" class="panel-heading">
      <h3 align="center"><i class="fa fa-comments"></i></h3>
      <h3 align="center" style="font-family: Helvetica" class="welcome">Chat codigo postal (<?php echo $resultadocheckuser['cp']; ?>)</h3>
    </div>

    <div class="panel-body">

          <div class="message" style="height: 520px">
            <div class="message-text-wrapper" style="height: 520px">
              <div class="message-text" id="chatbox" style="height: 530px; overflow-y: auto;">
                <?php
                  if(file_exists("log.php") && filesize("log.php") > 0){
                    $handle = fopen("log.php", "r");
                    $contents = fread($handle, filesize("log.php"));
                    fclose($handle);
                  }
                ?>
              </div>
            </div>

          </div>
      </div>


      <table style="margin-bottom: 15px;" align="center">
          <tr>
              <td>
                <div class="panel-footer">
                <div class="input-group">
              </td>
              <td>
                <form  name="message" action="">
                <div align="center">
                  <input class="form-control pr" type="text" id="usermsg" size="63" placeholder="Escriba su mensaje aquí..." /><button class="btn btn-primary" type="submit"  id="submitmsg" value="enviar"/>enviar</button>
                </div>
                </form>
              </td>
              <td>
                </div>
                </div>
              </td>
          </tr>
      </table>

  </div>
</div>





<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">

var comprobador;
setInterval (loadLog, 100);

/*objDiv.scrollTop = objDiv.scrollHeight;
objDiv.scrollTop = objDiv.scrollHeight - objDiv.clientHeight;*/

function eliminarTildes(texto) {
    return texto.normalize('NFD').replace(/[\u0300-\u036f]/g,"");
}

function loadLog(){
  comprobador= true;
  var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
  $.ajax({
    url: "log.php",
    cache: false,
    success: function(html){
      $("#chatbox").html(html); //Insert chat log into the #chatbox div

      //Auto-scroll
      var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
      if(newscrollHeight > oldscrollHeight){
        $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
      }
      },
  });
}

$("#submitmsg").click(function(){
    var groseriaComprobada = true;
    var groserias = ["puta", "puto","marica","pirobo","gonorrea"]
    var textoEnviado = $("#usermsg").val().trim();


    if (textoEnviado != "") {
      var palabraSinTildes = eliminarTildes(textoEnviado);

      var palabrasSeparadas = palabraSinTildes.split(" ");
      var arrayPalabrasSeparadas = new Array();

      for(var i = 0; i < groserias.length;i++){

        for (var j = 0; j< palabrasSeparadas.length; j++) {
          arrayPalabrasSeparadas.push(palabrasSeparadas[j]);

          if (arrayPalabrasSeparadas[j] == groserias[i]) {
            groseriaComprobada = false
          }

          /*console.log(arrayPalabrasSeparadas[j]);
          console.log(" ");*/
        }

      /*regex = new RegExp("(^|\\s)"+groserias[i]+"($|(?=\\s))","gi");
      palabraSinTildes = palabraSinTildes.replace(regex, function($0, $1){return "EsTaPaLaBrANoEsVaLiDa123@@@#123"});*/
      }
      //var clientmsg = $("#usermsg").val();
      //console.log(textoEnviado);

      if (groseriaComprobada) {
          var clientmsg = textoEnviado;
          $.post("post.php", {text: clientmsg});
          $("#usermsg").attr("value", "");
      }else{
          alert("No se pueden introducir groserias");
      }
    }


  return false;
});

if(comprobador){
    var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
}

$(document).ready(function(){
  var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
  $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
});
</script>
</body>
</html>

  <?php

    }else{
      header("Location: /portada_n/ultimasentradas_t.php");
    }

 ?>
