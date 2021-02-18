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


<!-- cabecera -->
  <link rel="stylesheet" type="text/css" href="../cabecera.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- chat -->
  <link rel="stylesheet" type="text/css" href="chat1.css">
  <link rel="stylesheet" type="text/css" href="../ultimasincidencias_t.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<style>
@media (min-width: 1192px){
     .external-collapse.navbar-collapse {
         display: -webkit-box!important;
         display: -ms-flexbox!important;
         display: flex!important;
     }

 }

 @media (min-width: 768px){
     .hid {
          visibility: hidden;
     }
}
</style>
  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">

</head>


<body   style="background-image:url(../../img/iconos/portada_ca.jpg)"; >


		<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">

  		<table style="margin-left: 20px; width: 100%">
		<tr>
			<td style="width: 20%; ">
	    		<div class="[ navbar-header ]">
	        		<div class="[ animbrand ]">
	            		<a style="float: none;" class="[ navbar-brand ][ animate ]" href="../../inicio1.php"><img src="../../img/ciudadanoslogo.png"></a>

	        		</div>
	    		</div>
	    	</td>
			<td style="width: 65%; ">
				<nav class="navbar navbar-expand-lg navbar-light">
									<div class="navbar-header">
											<button type="button" class="navbar-toggler hid" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
											Menu
											</button>
											<div class="pull-left">
											</div>
									</div>
									<div class="navbar-collapse collapse">
										<div>
							<?php
								include_once("../showmenu.php");

							?>
							<td>
										<div>
									<?php include ('../../donaciones/index.php')?>
								</div>
							</td>
						</div>
									</div>

					</nav>



						</td>
					</tr>
				</table>
				</nav>

<div class="container fadeInDown" style="margin-top: 160px;padding-right: 160px;  padding-left: 160px">
  <div class="panel panel-default chat-widget">
    <div class="panel-heading">
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


      <table  style="margin-bottom: 15px;" align="center">
          <tr>
            <td>
              <div class="panel-footer">
              <div class="input-group">
            </td>
            <td>
              <form  name="message" action="">
              <input class="form-control pr" type="text" id="usermsg" size="63" placeholder="Escriba su mensaje aquí..." />
             <td>
              <button class="btn btn-primary" type="submit"  id="submitmsg" value="enviar"/>enviar</button>
              </form>
              </td>
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
