<?php  
include('bbdd.php');

if (($ide!=null) or ($validar==0)){;

 include('portada_n/cabecera4.php');?>


<div id="main">
<div class="titulo">
<p class="enc">CONFIGURACION DE LA CUENTA</p>
</div>
<!--<div class="contenido">-->
<?php 
$sql="SELECT * from validar where email='".$user."' and password='".$pass."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$nombreemp=mysqli_result($result,0,'nombreemp');
$nifemp=mysqli_result($result,0,'nifemp');
$percontacto=mysqli_result($result,0,'percontacto');
$telcontacto=mysqli_result($result,0,'telcontacto');
$idpr=mysqli_result($result,0,'idpr');
?>


<script>
var imageUrl="color.png"; // optionally, you can change path for images.

function mod(num,numi,numf){
for (i=numi;i<numf+1;i++){
elem1=eval("ver"+i)
elem2=eval("menu"+i)	
if (i==num){
elem1.style.visibility="visible"
elem2.style.background="#DEE9F7"
elem2.style.color="#016EA3"
}else{
elem1.style.visibility="hidden"
elem2.style.background="#016EA3"
elem2.style.color="#DEE9F7"
}
}
}


    function at5(num,d1,d2,d3)
    {
    if(document.getElementById(num).checked){
                    document.getElementById(d1).disabled =false;
                    document.getElementById(d2).disabled =false;
                    document.getElementById(d3).disabled =false;
    }      
    else{
                    	document.getElementById(d1).disabled=true;
							document.getElementById(d2).disabled=true;
							document.getElementById(d3).disabled=true;
                    //t5.value="";
    }
    }
    
        function at6(num,d1)
    {
    if(document.getElementById(num).checked){
                    document.getElementById(d1).disabled =false;
                   // document.getElementById(d2).disabled =false;
                   // document.getElementById(d3).disabled =false;
    }      
    else{
                    	document.getElementById(d1).disabled=true;
							//document.getElementById(d2).disabled=true;
							//document.getElementById(d3).disabled=true;
                    //t5.value="";
    }
    }

</script>

<script>
//Número máximo de casillas marcadas por cada fila
var maxi=1;

//El contador es un arrayo de forma que cada posición del array es una linea del formulario
var contador=new Array(0,0);

function validar(check,grupo) {
	//Compruebo si la casilla está marcada
	if (check.checked==true){
		//está marcada, entonces aumento en uno el contador del grupo
		contador[grupo]++;
		//compruebo si el contador ha llegado al maximo permitido
		if (contador[grupo]>maxi) {
			//si ha llegado al máximo, muestro mensaje de error
			alert('No se pueden elegir mas de '+maxi+' casillas a la vez, durante el periodo de prueba.');
			//desmarco la casilla, porque no se puede permitir marcar
			check.checked=false;
			//resto una unidad al contador de grupo, porque he desmarcado una casilla
			contador[grupo]--;
		}
	}else {
		//si la casilla no estaba marcada, resto uno al contador de grupo
		contador[grupo]--;
	}
}
</script>

<style>
a {text-decoration:none}
a hover: {text-decoration:none}
		
</style>


<form action="administracion_n/intro2.php" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
<input type="hidden" name="tabla" value="iempresav">
<input type="hidden" name="idc" value="0">
<input type="hidden" name="idpr" value="<?php  echo$idpr;?>">
<input type="hidden" name="usuario2" value="<?php  echo$user;?>">
<div class="pos5">
<table>
<tr>
<td><a href="#" onclick="mod(1,1,5)"><div class="menup" id="menu1">Datos Empresa</div></a></td>
<td><a href="#" onclick="mod(2,1,5)"><div class="menup" id="menu2">Imagenes</div></a></td>
<td><a href="#" onclick="mod(3,1,5)"><div class="menup" id="menu3">Herramientas</div></a></td>
<td><a href="#" onclick="mod(4,1,5)"><div class="menup" id="menu4">Licencias</div></a></td>
<td><a href="#" onclick="mod(5,1,5)"><div class="menup" id="menu5">Enviar</div></a></td>
</tr>
</table>
</div>

<div class="pos71" id="ver1" >
<table>

<tr><td>
<table>
<tr><td>Nombre de la Empresa</td><td><input type="hidden" name="nombre2" value="<?php  echo$nombreemp;?>"><?php  echo$nombreemp;?></td>
<td>N.I.F.</td><td><input type="hidden" name="nif2" value="<?php  echo$nifemp;?>"><?php  echo$nifemp;?></td>
<input type="hidden" name="clave2" size="8" maxlenght="8" value="<?php  echo$pass;?>">
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Domicilio</td><td><input type="text" name="domicilio2" size="50"></td>
<td>C.P.</td><td><input type="text" name="cp2" size="5"></td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Tel. contacto 1</td><td>Tel. contacto 2</td><td>Fax</td><td>E-mail</td><td>Web</td></tr>
<tr>
<td><input type="hidden" name="tfijo2" value="<?php  echo$telcontacto;?>"><?php  echo$telcontacto;?></td>
<td><input type="text" name="tmovil2" size="9" maxlength="9"></td>
<td><input type="text" name="tfax2" size="9" maxlength="9"></td>
<td><input type="hidden" name="email2" size="30" value="<?php  echo$user;?>"><?php  echo$user;?></td>
<td><input type="text" name="web2" size="30"></td>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Provincia</td><td>Localidad</td></tr>
<tr>
<td><input type="text" name="provincia2" size="50"></td>
<td><input type="text" name="localidad2" size="50"></td>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr>
<td>Pais</td>
<td>
<?php 
$sql="select * from pais order by nombrepais asc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result empleados");
$row=mysqli_affected_rows();
?><select name="pais2">
<?php for ($i;$i<$row;$i++){;
$idpais=mysqli_result($result,$i,'idpais');
$nombrepais=mysqli_result($result,$i,'nombrepais');
?>
<option value="<?php  echo$idpais;?>" <?php if ($idpais==724){;?>selected<?php };?> ><?php  echo$nombrepais;?>
<?php };?>
</select></td>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Nombre del Representante</td><td><input type="hidden" name="nombrer" value="<?php  echo$percontacto;?>"><?php  echo$percontacto;?></td>
<?php if ($idpr=='2'){;?>
<td>N.I.F. repres.</td><td><input type="text" name="nifr" size="9" maxlength="9"></td>
<?php };?>
</tr>
</table>
</td></tr>
</table>
</div>
<div class="pos71" id="ver2" >

En esta opci&oacuten va a poder modificar su logotipo, el fondo de los documentos, la plantilla del carnet, ...<br/>
Le mostramos alguna de las imagenes con las que va a funcionar con la demo.
<table><tr><td valign="top">Imagen de Logo<br/>
<img src="../img/pp_logo.png" width="75%">
</td>
<td>Imagen de Fondo de Movil<br/>
<img src="../img/pp_fondo_movil.png" width="50%">
</td>
</tr>
</table>
</div>
<div class="pos71" id="ver3" >

<!--<div style="border-style:solid;border-width:0px;top:0px;left:10px;position:absolute;width:350px">-->
En esta operativa de prueba solo podr&aacute; usar:
<ul>
<li> Entrada/Salida
<li> Incidencia 
<li> Y podr&aacute; elegir uno de los servicios que aparecen
</ul>
<!--</div>-->

<!--
<table border="0">
<tr><td>Servicio</td><td>Activo</td>
</tr>
-->
<div id="main">
<?php 
$dat=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus');

$sql1n="SELECT * from proyectosnombre where idproyectos='".$idpr."'"; 
$result1n=mysqli_query ($conn,$sql1n) or die ("Invalid result");
$datosproyn=mysqli_fetch_row($result1n);

for ($i=0;$i<count($dat);$i++){;
$u=$i+5;
$encab[$i]=$datosproyn[$u];
};

$sql1i="SELECT * from proyectosimg where idproyectos='".$idpr."'"; 
$result1i=mysqli_query ($conn,$sql1i) or die ("Invalid result");
$datosproyi=mysqli_fetch_row($result1i);

for ($i=0;$i<count($dat);$i++){;
$u=$i+5;
$imgpt[$i]=$datosproyi[$u];
};

$sql1="SELECT * from proyectos where idproyectos='".$idpr."'"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
$datosproy=mysqli_fetch_row($result1);

for ($i=0;$i<count($dat);$i++){;
$u=$i+19;
$datp[$i]=$datosproy[$u];
};
?>
<?php for ($t=0;$t<count($encab);$t++){;?>
<?php 
if($datp[$t]==1){;
?>
<!--<tr><td>-->

<span><img src="img/<?php  echo$imgpt[$t];?>" width="30px"><br/><?php  echo$encab[$t];?>

<!--</td>-->

<?php  
switch($t){;
case 1:
?>
<!--<td>-->
<input type="hidden" name="datos[<?php  echo$t;?>]"  value="1"><input type="checkbox"  id="<?php  echo$dat[$t];?>" 
disabled="disabled" checked="checked"></td>
<input type="hidden" name="datosp[<?php  echo$t;?>]"  value="1">
<input type="hidden" name="datosh[<?php  echo$t;?>]"  value="1">
<input type="hidden" name="datose[<?php  echo$t;?>]"  value="1">
<!--</td>-->
<?php 
;break;
case 2:
?>
<!--<td>-->
<input type="hidden" name="datos[<?php  echo$t;?>]"  value="1"><input type="checkbox"  id="<?php  echo$dat[$t];?>" 
disabled="disabled" checked="checked"></td>
<input type="hidden" name="datosp[<?php  echo$t;?>]"  value="1">
<input type="hidden" name="datosh[<?php  echo$t;?>]"  value="0">
<input type="hidden" name="datose[<?php  echo$t;?>]"  value="0">
<!--</td>-->
<?php 
;break;
case 5:
case 6:
case 7:
case 8:
?>
<!--<td>-->
<input type="checkbox" name="datos[<?php  echo$t;?>]" onclick="validar(formulario.<?php  echo$dat[$t];?>,0)" id="<?php  echo$dat[$t];?>" value="1"><!--</td>-->
<input type="hidden" name="datosp[<?php  echo$t;?>]"  value="0">
<input type="hidden" name="datosh[<?php  echo$t;?>]"  value="0">
<input type="hidden" name="datose[<?php  echo$t;?>]"  value="0">
<?php 
;break;
default:
?>
<!--<td>-->
<input type="checkbox" name="datos[<?php  echo$t;?>]"  onclick="validar(formulario.<?php  echo$dat[$t];?>,0)" id="<?php  echo$dat[$t];?>" value="1"><!--</td>-->
<input type="hidden" name="datosp[<?php  echo$t;?>]"  value="0">
<input type="hidden" name="datosh[<?php  echo$t;?>]"  value="0">
<input type="hidden" name="datose[<?php  echo$t;?>]"  value="0">
<?php 
};
?>
</span>
<!--</tr>-->
<?php };?>

<?php };?>



</div>
<!--</table>-->



</div>

<div class="pos71" id="ver4" >
<table>

<tr><td>
<table>
<tr><td>Administradores</td><td><input type="hidden" name="licadm" size="4" value="1">1</td></tr>
<tr><td>Puestos de Trabajo - Clientes</td><td><input type="hidden" name="liccli" size="4" value="3">3</td></tr>
<tr><td>Trabajadores</td><td><input type="hidden" name="lictra" size="4" value="3">3</td></tr>
</table>


</td></tr>


</table>
</div>

<div class="pos71" id="ver5" >
<table>
<tr><td>Pulse sobre el bot&oacute;n de enviar para actualizar su nueva configuraci&oacute;n</td></tr>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</div>

</form>
<?php } else {;

include ('../cierre.php');

 };
 ?>
