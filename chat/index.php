<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
</head>
 
<style type="text/css">
	/* CSS Document */
body {
    font-family: "Times New Roman", Times, serif;
    color: #222;
    text-align:center;
    padding:35px; }
  
form, p, span {
    font-family: Helvetica;
    margin:0;
    padding:0; }


  
input { font:12px arial; }
  
a {
    color:#0000FF;
    text-decoration:none; }
  
    a:hover { text-decoration:underline; }
  
#wrapper, #loginform {
    border-radius: 2%;
    margin:0 auto;
    padding-bottom:25px;
    background:#EAF0F2;
    width:504px;
    border:3px solid grey; }
  
#loginform { padding-top:18px; }
  
#loginform p { margin: 5px; }
  
#chatbox {
    border-radius: 2%;
    background-image: url("marca4.png"); 
    background-color: white;
    text-align:left;
    margin:0 auto;
    margin-bottom:25px;
    padding:10px;
    height:270px;
    width:430px;
    border:2px solid grey;
    overflow:auto;    
     }
  
#usermsg {
    border-radius: 2%;
    height: 30px;
    width:395px;
    border:2px solid grey; }
  

.redondo{
background-color: #EAF0F2;
  border-color: black;
  color: black;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

.redondo1:hover{
  border-color: black;
  color: white; 
  background-color: black;
  display: block;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
  
.error { color: #ff0000; }
  
#menu { padding:12.5px 25px 12.5px 25px; }
  
.welcome { float:left; }
  
.logout { float:right; }
  
.msgln { margin:0 0 2px 0; }
</style>



<div id="wrapper">
  <div id="menu">
        <p style="font-family: Helvetica" class="welcome">Bienvenidos Ciudadanos Anonimos<b></b></p>
        <div style="clear:both"></div>
    </div>
    <div class="chatbox" id="chatbox">
    	<?php
		if(file_exists("log.html") && filesize("log.html") > 0){
		    $handle = fopen("log.html", "r");

		    $contents = fread($handle, filesize("log.html"));
		    fclose($handle);
		     
		    echo $contents;
		}
		?>
    </div>
    <table align="center">
    <form name="message" action="">
        <tr>
        <td><input name="usermsg" type="text" id="usermsg" size="63" placeholder="Escriba su mensaje aquí..." /></td>
        <td><input class="redondo redondo1" type="submit"  id="submitmsg" value="enviar" /></td>
        </tr>
        
    </form>
    </table>
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
		url: "log.html",
		cache: false,
		success: function(html){		
			$("#chatbox").html(html); //Insert chat log into the #chatbox div	
			
			//Auto-scroll			
			var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
            //console.log(newscrollHeight +" - "+ oldscrollHeight);
			if(newscrollHeight > oldscrollHeight){
                //console.log("prueba");
				$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
			}
	  	},
	});
}

$("#submitmsg").click(function(){
    var groserias = ["puta", "puto","marica","pirobo","gonorrea"]
    var textoEnviado = $("#usermsg").val();

    var palabraSinTildes = eliminarTildes(textoEnviado);

    for(var i = 0; i < groserias.length;i++){
        regex = new RegExp("(^|\\s)"+groserias[i]+"($|(?=\\s))","gi");
        palabraSinTildes = palabraSinTildes.replace(regex, function($0, $1){return "EsTaPaLaBrANoEsVaLiDa"});
    }
	//var clientmsg = $("#usermsg").val();
    //console.log(textoEnviado);
    if (palabraSinTildes != "EsTaPaLaBrANoEsVaLiDa" ) {
        var clientmsg = textoEnviado;
        $.post("post.php", {text: clientmsg});              
        $("#usermsg").attr("value", "");
    }else if(palabraSinTildes == ""){
        null;
    }else{
        alert("No se pueden introducir groserias");
    }
    
	return false;
});

if(comprobador){
    console.log("hola");
    var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
}else{
    console.log("no");
}

$(document).ready(function(){

});
</script>
</body>
</html>