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




  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">

    <link rel="stylesheet" type="text/css" href="../ultimasincidencias_t.css">
    <link rel="stylesheet" type="text/css" href="chat1.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script> 

    <meta charset="utf-8">

</head>

<style>
  input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>

<body   style="background-image:url(../../img/iconos/portada_ca.jpg); margin-top: 5%"; >


  <nav style="background-color: transparent;" class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">

      <table style="margin-left: 20px; width: 100%">
    <tr>

      <td style="width: 65%; ">
          <?php
            include_once("../../portada_n/showmenu.php");

          ?>
        </td>
      </tr>
    </table>
    </nav>
      

<div class='wrapper fadeInDown' style="border-radius:10px; background-color: transparent; text-align: center; min-height: 0%; max-width: 850px; margin:auto;">
  <div id='formContent' style="max-width: 850px; background-color: transparent; text-align: left;" >
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

                    <div id="yourBtn" onclick="getFile()"><i style="width: 30px; height: 40px; color: #BC0000" class="far fa-file-pdf"></i></div>
                      <div style='height: 0px;width:0px; overflow:hidden;'>
                        <form method="POST" action="postpdf.php" id="form" enctype="multipart/form-data">
                          <input type="file" name="archivo" id="archivo" onchange="ajaxsubmit()">
                        </form>
                      </div>
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

<script type="text/javascript">

var comprobador;
setInterval (loadLog, 500);

/*objDiv.scrollTop = objDiv.scrollHeight;
objDiv.scrollTop = objDiv.scrollHeight - objDiv.clientHeight;*/

function eliminarTildes(texto) {
    return texto.normalize('NFD').replace(/[\u0300-\u036f]/g,"");
}

function getFile(){
     document.getElementById("archivo").click();
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

/*$('#archivo').change(function() {
  $("#formulario").ajaxForm({url: 'server.php', type: 'post'})
  var file_data = $('.archivo').prop('files')[0]
  var form_data = new FormData();                  
  form_data.append('file', file_data);
  //alert(formdata);
  $.ajax({
    url: "postpdf.php",
    type: "POST",
    dataType : 'json',
    data: form_data,
    success: function(e){
          console.log(e.message);
      },
  });
});*/

function ajaxsubmit(){
    var fd = new FormData(document.getElementById('form'));

    $.ajax({
        url : "postpdf.php",
        type: "POST",
        data : fd,
        processData: false,
        contentType: false,
        success: function(data){
           console.log(data);
       }
    });
}

/*$("#formulario").submit(function(event){
    
  });*/

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
