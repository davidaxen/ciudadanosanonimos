<?php 
include('bbdd.php');
$idpr=8;
if ($idpr!=null){;

$sql="SELECT * from proyectos where idproyectos='".$idpr."'"; 
$result=$conn->query($sql);
$resultado=$result->fetch();
/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
$nombre=$resultado['nombre'];
$logo=$resultado['logo'];

?>



<HTML><HEAD>
<TITLE>PROGRAMA DE GESTION DE PERSONAL Y TRABAJO</TITLE>
<meta name='author' content='smartcbc' >
<meta name='Description' content='PROGRAMA DE GESTION DE PERSONAL Y TRABAJO'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel="stylesheet" href="solicitud.css">

<script>

function myFunction(valor) {

  var x = document.getElementById(valor);
  if (x.type === 'password') {
    x.type = 'text';
  } else {
    x.type = 'password';
  }

}
</script>

</head>
<body class='html' style='background-image:url(../img/iconos/checkporter-fondo.jpg);
  background-repeat: no-repeat;
  background-size: cover;'>
<div class='cuadro'>
<div class='hijo' style='background-color:#f5f5f5'>

<form name="form1" method="post" action="registro8.php"> 

  <div class='imgcontainer'>
    <img src='../img/iconos/p-8-log.png' width="250px">
    <h3 style="text-align: center;color:#000">SOLICITUD DE PRUEBA EN SERVICIO</h3>
  </div>

  <div class='container'>
<table>
<tr><td><b>Nombre de la Empresa</b></td><td><input  tabindex="1" type='text' name='nombremp' required >
</td></tr>
<tr><td><b>NIF/CIF</b></td><td><input tabindex="2" type='text' name='nifemp' required onblur="numcol()" >
</td></tr>

<tr><td><b>E-mail</b></td><td><input tabindex="3" name="emailemp" id="emailemp" type="text" required onblur="emailc()" /></td></tr>

<tr><td><b>Contrase&ntilde;a</b></td><td>
    <input type="password" tabindex=4 id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required >
<img src='../img/iconos/pass.png' width='32px' onclick="myFunction('psw')" style='vertical-align:middle'>
</td></tr>

<tr><td><b>Repetir Contrase&ntilde;a</b></td><td><input tabindex="5" name="psw2" id="psw2" required type="password" required  onblur="contrase()"  />
<img src='../img/iconos/pass.png' width='32px' onclick="myFunction('psw2')"  style='vertical-align:middle'>
</td></tr>

<tr><td><b>Tel&eacute;fono Contacto</b></td><td><input tabindex="6" name="telcontacto" id="telcontacto" required type="text" maxlength="9" onblur="EsTelefonoMovil()" /></td></tr>

<input type="hidden" name="idpr" value="<?php  echo $idpr;?>">

</table>
<br/>

       
    <button>Enviar</button>
  </div>

</form>
</div>
</div>
<p>
 
</p>



    <script language="javascript"> 
    
   function numcol(){
    var ercp=/(([A-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))|(([A-Z]{1})([-]?)(\d{8}))$/;
    if (!(ercp.test(form1.nifemp.value))) { 
    alert('Contenido del nif no valido, las letras tienen que ir en mayusculas');
    document.form1.nifemp.value=null;
    document.form1.nombremp.focus();
    }      	
   }    
    
    function emailc(){
      valueForm=document.form1.emailemp.value;
    var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    
    if(valueForm.search(patron)==0){
    	var valormail=1;
    //alert (valormail);
    } else { 
    alert ("La \"Direccion de Email\" no es correcta");
    document.form1.emailemp.value=null;
    document.form1.nifemp.focus();
    }  
   } 
    
    function contrase(){
     pasNew1=document.form1.psw;
//alert (pasNew1.value);
	pasNew2=document.form1.psw2;
//alert (pasNew2.value);

	if(pasNew1.value==pasNew2.value){
    	var valorpass=1;
	}else{
			alert("La copia de la password no coincide");
    		document.form1.psw2.value=null;
			document.form1.nombremp.focus();	
	}
}	
   
     function EsTelefonoMovil() {
    var telReg=/(^([0-9]{9,9})|^)$/;
    if (!(telReg.test(form1.telcontacto.value))) { 
    alert('El telefono no es valido');
    document.form1.telcontacto.value=null;
    document.form1.nombremp.focus();
	 document.form1.telcontacto.focus();
    }    

     } 
    

    </script>


<div id="message">
  <h4>Condiciones para la contrase&ntilde;a:</h4>
  <span id="letter" class="invalid">Al menos una letra <b>minusculas</b></span><br/>
  <span id="capital" class="invalid">Al menos una letra <b>mayusculas</b></span><br/>
  <span id="number" class="invalid">Al menos un <b>numero</b></span><br/>
  <span id="length" class="invalid">Minimo <b>8 caracteres</b></span><br/>
</div>
				
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>



<div class='cuadro' style='background-color:#c5c5c5;height:220px;color:#fff;'>
<div class='hijo2'>


  <div class='imgcontainer'>
<img src='../img/iconos/p-8-log.png' width='250px'>
      <br/>Una aplicaci&oacute;n simplifica una tarea
  </div>

  <div class='container' style='column-count:2;background-color:transparent;'>
Tel.: 912 810 133<br/>
Movil.: 695 175 000<br/>
Email: info@checkporter.com<br/>

Cadalso de los Vidrios 14 - local 12 - 28035 Madrid<br/>
Horario Ma&ntilde;anas: De 9:30 a 14:00<br/>
Horario Tarde: De 17:30 a 19:00<br/>        
  </div>


</div>
</div>

<?php 
} else {;

include ('../cierre.php');

 };
 ?>