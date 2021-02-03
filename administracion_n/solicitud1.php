<?php 
include('bbdd.php');
$idpr=1;
if ($idpr!=null){;

$sql="SELECT * from proyectos where idproyectos='".$idpr."'";
$result=$conn->query($sql);
$resultado=$result->fetch();
/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
$nombre=$resultado['nombre'];
$logo=$resultado['logo'];

?>



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>PROGRAMA DE GESTION DE CIUDADANOS ANONIMOS</TITLE>

<link rel="stylesheet" type="text/css" href="boostrap1.css" media="screen" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="ajax.js"></script>
<script>

//==================
function mostrarCodigosPostales(){
 
    divResultado = document.getElementById('codigospostales');
    mun=document.getElementById('obj_municipio').value;
    ajax=objetoAjax();
    ajax.open("POST", "codigospostales.php");
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            divResultado.innerHTML = ajax.responseText
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("idmun="+mun)
}
 

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


<body class='html' style='background-image:url(../img/iconos/portada_ca.jpg);'>

<div class='wrapper fadeInDown'>
  <div id='formContent'>
<form name="form1" method="post" action="registro1.php">
  <input type="hidden" name="idpr" value="<?php echo $idpr ?>">
  <div class='fadeIn first'>
    <img src='../img/logo-ciud-anonimos.png' width='200px'>
    <h3 style="text-align: center;color:#000">SOLICITUD DE PARTICIPACI&Oacute;N EN CIUDADANOS ANONIMOS</h3>
  </div>

  <input placeholder="Nombre" class="fadeIn second" tabindex="2" name="nombreemp" id="nombre" type="text" required/>

  <input placeholder="Correo Electrónico" class="fadeIn second" tabindex="3" name="emailemp" id="emailemp" type="text" required onblur="emailc()"/>


    <input placeholder="Contraseña" class="fadeIn third" type="password" tabindex=4 id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Al menos una minuscula, una mayuscula, un numero y minimo 8 caracteres" required>
    <br>
    <img align="center" src='../img/iconos/pass.png' width='32px' onclick="myFunction('psw')"  style='vertical-align:middle'>
    <br>
    <input placeholder="Repetir Contraseña" class="fadeIn third" tabindex="5" name="psw2" id="psw2" required type="password" required  onblur="contrase()"  />
    <br>
    <img src='../img/iconos/pass.png' width='32px' onclick="myFunction('psw2')"  style='vertical-align:middle'>
    <br>


<!--<div id="message">
  <h4>Condiciones para la contrase&ntilde;a:</h4>
  <span id="letter" class="invalid">Al menos una letra <b>minusculas</b></span><br/>
  <span id="capital" class="invalid">Al menos una letra <b>mayusculas</b></span><br/>
  <span id="number" class="invalid">Al menos un <b>numero</b></span><br/>
  <span id="length" class="invalid">Minimo <b>8 caracteres</b></span><br/>
</div>-->

  <input class="fadeIn second" placeholder="telefono de Contacto" tabindex="6" name="telcontacto" id="telcontacto" required type="text"/>
<br>
  <b>Pais</b>
  <br>
  <?php include('provincias.php'); ?>
  <br>
  <b>Ciudad</b>
  <div id="listamunicipios">
       <?php include('municipios.php'); ?>
    </div>
    <b>Codigo postal</b>
  <div id="codigospostales">
       <?php include('codigospostales.php'); ?>
    </div>
     
    <div class="formFooter" >
        <a class="underlineHover" href="https://www.ciudadanosanonimos.com/politica-y-aviso">Politica de Privacidad y Aviso Legal</a>
         <input name="politica" id="politica" required type="checkbox"/>
    </div>
<br>
    <input type='submit' class="fadeIn fourth" type='submit' value='Enviar'>
</form>

</div>
</div>
</body>
    <script language="javascript"> 
        
    function emailc(){
      valueForm=document.form1.emailemp.value;
    var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    
    if(valueForm.search(patron)==0){
    	var valormail=1;
    //alert (valormail);
    } else { 
    alert ("La \"Direccion de Email\" no es correcta");
    document.form1.emailemp.value=null;
    document.form1.telcontacto.focus();
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
  //var lowerCaseLetters = /^[a-z]+$/;
  if(myInput.value.match(lowerCaseLetters)) { 
    myInput.setCustomValidity('');    
    /*letter.classList.remove("invalid");
    letter.classList.add("valid");*/
  } else {
    myInput.setCustomValidity('Tiene que haber alguna mínuscula');
    /*letter.classList.remove("valid");
    letter.classList.add("invalid");*/
  }


  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  

    myInput.setCustomValidity('');
    /*capital.classList.remove("invalid");
    capital.classList.add("valid");*/
  } else {
    myInput.setCustomValidity('Tiene que haber alguna mayúscula');
    /*capital.classList.remove("valid");
    capital.classList.add("invalid");*/
  }


  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    myInput.setCustomValidity('');
    /*number.classList.remove("invalid");
    number.classList.add("valid");*/
  } else {
    myInput.setCustomValidity('Tiene que haber mínimo un numero');
    /*number.classList.remove("valid");
    number.classList.add("invalid");*/
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    myInput.setCustomValidity('');
    /*length.classList.remove("invalid");
    length.classList.add("valid");*/
  } else {
    myInput.setCustomValidity('Mínimo 8 caracteres');
    /*length.classList.remove("valid");
    length.classList.add("invalid");*/
  }
}
</script>
</html>

<?php 
} else {;

include ('../cierre.php');

 };
 ?>