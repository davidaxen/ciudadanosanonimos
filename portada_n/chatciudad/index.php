<?php 
    include('../../bbdd.php');
    $mail = $_COOKIE['gente'];

    $sqlcheckuser = "SELECT * FROM usuarios WHERE user = :mail";
    $resultcheckuser=$conn->prepare($sqlcheckuser);
    $resultcheckuser->bindParam(':mail', $mail);
    $resultcheckuser->execute();
    $resultadocheckuser = $resultcheckuser->fetch();

    if ($resultadocheckuser['tusuario'] == 50 || $resultadocheckuser['tusuario'] == 51 || $resultadocheckuser['tusuario'] == 52 || $resultadocheckuser['tusuario'] == 42) {

    $sql1 = "SELECT * FROM ciudades WHERE idciudad = :idciudad";
    $result1=$conn->prepare($sql1);
    $result1->bindParam(':idciudad', $resultadocheckuser['localidad']);
    $result1->execute();
    $resultado1 = $result1->fetch();

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
  <link rel="stylesheet" type="text/css" href="chat1.css">
  <link rel="stylesheet" type="text/css" href="../ultimasincidencias_t.css">

</head>
 

<body style="background-image:url(../../img/iconos/portada_ca.jpg); padding-top: 5%" >


  <nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">
    <table style="margin-left: 20px; width: 100%">
    <tr>
      <td style="width: 65%;">
        <div >
        <?php
          include_once("../../portada_n/showmenu.php");

        ?>  
        
      </div>
      </td>
    </tr>
  </table>
  </nav>
 
<div class='wrapper fadeInDown' style="border-radius:10px; background-color: transparent; text-align: center; min-height: 0%; max-width: 850px; margin:auto;">
  <div id='formContent' style="max-width: 850px; background-color: transparent; text-align: left;" >
  <div style="background-color: white; border-radius: 10px; padding-top: 2%" class="panel panel-default chat-widget">
    <div style="border-radius: 10px" class="panel-heading">
      <h3 align="center"><i class="fa fa-comments"></i></h3>
      <h3 align="center" style="font-family: Helvetica" class="welcome">Chat ciudad (<?php echo $resultado1['ciudad']; ?>)</h3>
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