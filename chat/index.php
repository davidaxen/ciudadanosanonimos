<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<!-- cabecera -->
  <link rel="stylesheet" type="text/css" href="cabecera.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" >
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!-- chat -->
  <link rel="stylesheet" type="text/css" href="chat1.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=ISO-8859-1">

</head>
 

<body style="background-image:url(../img/iconos/portada_ca.jpg)" >


  <nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">
        <div class="[ navbar-header ]">
            <div class="[ animbrand ]">
                <a class="[ navbar-brand ][ animate ]" href="../inicio1.php"><img src="../img/ciudadanoslogo.png"></a>
            </div>
        </div>
    <div class="[ container ]">
      <div class="[ collapse navbar-collapse ]" id="bs-example-navbar-collapse-1">
          <ul class="[ nav navbar-nav navbar-right ]">
            <li><a href="../portada_n/ultimasincidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >ULTIMOS RESULTADOS</a></li>
            <li><a href="../incidencias_t.php" class="[ animate ]" onclick="openCity(event, 'd0')" >INCIDENCIAS</a></li>
            <li><a href="../chat/index.php" class="[ animate ]" onclick="openCity(event, 'd0')" >CHAT</a></li>
            <li><a href="../portada_n/salir.php" class="[ animate ]" onclick="openCity(event, 'd0')" >LOG OUT</a></li>
        </ul>
      </div>
  </nav>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


 
<div class="col-md-6 col-lg-7 col-md-offset-3" >
  <div class="panel panel-default chat-widget">
    <div class="panel-heading">
      <h3 align="center"><i class="fa fa-comments"></i></h3>
      <h3 align="center" style="font-family: Helvetica" class="welcome">Bienvenidos Ciudadanos Anonimos</h3>
    </div>
    
    <div class="panel-body">

       <?php
              if(file_exists("log.html") && filesize("log.html") > 0){
                $handle = fopen("log.html", "r");
                 $contents = fread($handle, filesize("log.html"));
                fclose($handle);
          ?>

          <div class="message">
            <div class="message-text-wrapper">
              <div class="message-text" id="chatbox" >
                <?php        
                  echo $contents;
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
// jQuery Document
setInterval (loadLog, 500);
function loadLog(){   
  var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
  $.ajax({
    url: "log.html",
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
  var clientmsg = $("#usermsg").val();
  $.post("post.php", {text: clientmsg});        
  $("#usermsg").attr("value", "");
  return false;
});

$(document).ready(function(){
 
});
</script>
</body>
</html>