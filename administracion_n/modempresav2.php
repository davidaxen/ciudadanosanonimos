<?php  
include('bbdd.php');

if ($ide!=null){;

 include('../portada_n/cabecera4p.php');?>


<div id="main">
<div class="titulo">
<p class="enc">EL PERIODO DE PRUEBA YA HA ACABADO</p>
</div>
<!--<div class="contenido">-->
<script>
//var imageUrl="color.png"; // optionally, you can change path for images.
function calculo (){
		
	admin=formulario2.administrador.value
	puest=formulario2.puestos.value
	empl=formulario2.empleados.value
	totales=parseFloat(admin)+parseFloat(puest)+parseFloat(empl)
   //importes=parseFloat(totales)

if  ( totales <=  10 )  { 
      importes =  350 ; 
}  else  if  ( totales <=  20 )  { 
			cant=parseFloat(totales)-10;
			importes=350+(parseFloat(cant)*7);
}  else  if  ( totales <=  50 )  { 
			cant=parseFloat(totales)-20;
			importes=420+(parseFloat(cant)*6);
}  else  if  ( totales <=  100 )  { 
			cant=parseFloat(totales)-50;
			importes=600+(parseFloat(cant)*5);
}  else  if  ( totales <=  1000 )  { 
			cant=parseFloat(totales)-100;
			importes=850+(parseFloat(cant)*4);											
}  else  { 
			cant=parseFloat(totales)-1000;
			importes=4450+(parseFloat(cant)*3);		
}


	formulario2.amount.value=parseFloat(importes)/2
	//formulario2.os0[0].value=importes;
	//formulario2.os0[0].text=importes;
	formulario2.os0.value=importes
	}

function mod2(num,numi,numf){
for (i=numi;i<numf+1;i++){
elem1=eval("verf"+i)
if (i==num){
elem1.style.visibility="visible"
}else{
elem1.style.visibility="hidden"
}
}
}



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
    

//Número máximo de casillas marcadas por cada fila

var maxi=5;
var maxi2=0;
//El contador es un arrayo de forma que cada posición del array es una linea del formulario
var contador=new Array(0,0);

function validar(check,grupo) {
	//Compruebo si la casilla está marcada
	if (check.checked==true){
		//está marcada, entonces aumento en uno el contador del grupo
		contador[grupo]++;
		//alert(contador[grupo]);
		//compruebo si el contador ha llegado al maximo permitido
		if (contador[grupo]>maxi) {
			//si ha llegado al máximo, muestro mensaje de error
			alert('No se pueden elegir mas de '+maxi+' casillas a la vez.');
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


<?php 
$idempresas=$ide;

$sql33="select * from portadai where idempresa='".$idempresas."'";
$result33=mysqli_query ($conn,$sql33) or die ("Invalid result232");
$soco33=mysqli_fetch_array($result33);
$ttg=0;
for ($tg=2;$tg<count($soco33);$tg++){;
if ($soco33[$tg]==1){;
	$ttg=$ttg+1;
	//echo $ttg;
	};
};
$ttg=6-$ttg;
?>



<form action="intro2.php" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
<input type="hidden" name="tablas" value="modificar">
<input type="hidden" name="idcm" value="20">
<?php 
$sql23="select * from empresas where idempresas='".$idempresas."' ";
$result23=mysqli_query ($conn,$sql23) or die ("Invalid result23");
$soco=mysqli_fetch_array($result23);
$row=mysqli_affected_rows();
$col=mysqli_num_fields($result23);


$usera=mysqli_field_name($result23, 2);

$sql2s="select * from servicios where idempresa='".$idempresas."' ";
$result2s=mysqli_query ($conn,$sql2s) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
$socos=mysqli_fetch_array($result2s);
$rows=mysqli_affected_rows();
$cols=mysqli_num_fields($result2s);




$sql2p="select * from portadai where idempresa='".$idempresas."' ";
$result2p=mysqli_query ($conn,$sql2p) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
$socop=mysqli_fetch_array($result2p);
$rowp=mysqli_affected_rows();
$colp=mysqli_num_fields($result2p);


$sql2h="select * from hoja where idempresa='".$idempresas."' ";
$result2h=mysqli_query ($conn,$sql2h) or die ("Invalid result2h");
//$bbddh=mysqli_fetch_array($result2h);
$socoh=mysqli_fetch_array($result2h);
$rowh=mysqli_affected_rows();
$colh=mysqli_num_fields($result2h);


$sql2e="select * from etiquetas where idempresa='".$idempresas."' ";
$result2e=mysqli_query ($conn,$sql2e) or die ("Invalid result2e");
//$bbdde=mysqli_fetch_array($result2e);
$socoe=mysqli_fetch_array($result2e);
$rowe=mysqli_affected_rows();
$cole=mysqli_num_fields($result2e);

?>
<?php 
for ($j=0;$j<23;$j++){;?>
<input type="hidden" name="datosa[<?php  echo$j;?>]" value="<?php  echo$soco[$j];?>">
<input type="hidden" name="nombrea[<?php  echo$j;?>]" value="<?php  echomysqli_field_name($result23, $j);?>">
<?php };?>
<?php for ($j=38;$j<$col;$j++){;?>
<input type="hidden" name="datosa[<?php  echo$j;?>]" value="<?php  echo$soco[$j];?>">
<input type="hidden" name="nombrea[<?php  echo$j;?>]" value="<?php  echomysqli_field_name($result23, $j);?>">
<?php };?>

<?php for ($j=2;$j<$cols;$j++){;?>
<input type="hidden" name="datossa[<?php  echo$j;?>]" value="<?php  echo$socos[$j];?>">
<input type="hidden" name="nombresa[<?php  echo$j;?>]" value="<?php  echomysqli_field_name($result2s, $j);?>">
<?php };?>


<?php for ($j=2;$j<$colp;$j++){;?>
<input type="hidden" name="datospa[<?php  echo$j;?>]" value="<?php  echo$socop[$j];?>">
<input type="hidden" name="nombrepa[<?php  echo$j;?>]" value="<?php  echomysqli_field_name($result2p, $j);?>">
<?php };?>

<?php for ($j=2;$j<$colh;$j++){;?>
<input type="hidden" name="datosha[<?php  echo$j;?>]" value="<?php  echo$socoh[$j];?>">
<input type="hidden" name="nombreha[<?php  echo$j;?>]" value="<?php  echomysqli_field_name($result2h, $j);?>">
<?php };?>

<?php for ($j=2;$j<$cole;$j++){;?>
<input type="hidden" name="datosea[<?php  echo$j;?>]" value="<?php  echo$socoe[$j];?>">
<input type="hidden" name="nombreea[<?php  echo$j;?>]" value="<?php  echomysqli_field_name($result2e, $j);?>">
<?php };?>

<div class="pos5">
<table>
<tr>
<td><a href="#" onclick="mod(1,1,6)"><div class="menup" id="menu1">Comprar</div></a></td>
<!--
<td><a href="#" onclick="mod(6,1,6)"><div class="menup" id="menu6">Datos Empresa</div></a></td>
<td><a href="#" onclick="mod(2,1,6)"><div class="menup" id="menu2">Imagenes</div></a></td>
<td><a href="#" onclick="mod(5,1,6)"><div class="menup" id="menu5">Servicios</div></a></td>
<td><a href="#" onclick="mod(3,1,6)"><div class="menup" id="menu3">Licencias</div></a></td>
<td><a href="#" onclick="mod(4,1,6)"><div class="menup" id="menu4">Enviar</div></a></td>
-->
<!--

-->
</tr>
</table>
</div>



<div class="pos71" id="ver2" >
<table>
<tr><td>Logotipo</td><td><?php $i=14;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(1,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Logotipo peque&ntilde;o</td><td><?php $i=15;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(2,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Firma</td><td><?php $i=16;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(3,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla A4</td><td><?php $i=17;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(4,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla Hoja1 QR</td><td><?php $i=44;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(5,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla Hoja2 QR</td><td><?php $i=45;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(6,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla Sobre</td><td><?php $i=18;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(7,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla carnet</td><td><?php $i=19;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(8,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla movil</td><td><?php $i=20;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(9,1,10)" width="25px"><?php };?></td></tr>
<tr><td colspan="2">Icono</td><td><?php $i=23;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(10,1,10)" width="25px"><?php };?></td></tr>
</table>




<div class="posf1" id="verf1" ><?php $i=14;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf2" ><?php $i=15;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf3" ><?php $i=16;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf4" ><?php $i=17;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf5" ><?php $i=44;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf6" ><?php $i=45;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf7" ><?php $i=18;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf8" ><?php $i=19;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf9" ><?php $i=20;?><img src="../img/<?php  echo$soco[$i];?>" width="200" ></div>
<div class="posf1" id="verf10" ><?php $i=23;?><img src="../img/<?php  echo$soco[$i];?>" width="100" ></div>

</div>





<div class="pos71" id="ver6" >
<table>
<?php $i=0;?><input type="hidden" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>">
<tr><td>
<table>
<tr><td>Nombre de la Empresa</td><td><?php $i=1;?>
<input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="40">
<!--<input type="text" name="<?php  echomysqli_field_name($result23, $i);?>n" value="<?php  echo$soco[$i];?>" size="40">-->
</td>
<td>N.I.F.</td><td><?php $i=2;?><?php  echo$soco[$i];?>
<input type="hidden" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>">
</td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Domicilio</td><td><?php $i=3;?>
<input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="50">
<!--<input type="text" name="<?php  echomysqli_field_name($result23, $i);?>n" value="<?php  echo$soco[$i];?>" size="50">--></td>
<td>C.P.</td><td><?php $i=4;?>
<input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="5">
<!--<input type="text" name="<?php  echomysqli_field_name($result23, $i);?>n" value="<?php  echo$soco[$i];?>" size="5">-->
</td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Tel. fijo</td><td>Tel. movil</td><td>Fax</td><td>E-mail</td><td>Web</td></tr>
<tr>
<td><?php $i=8;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="9" maxlength="9"></td>
<td><?php $i=9;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="9" maxlength="9"></td>
<td><?php $i=10;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="9" maxlength="9"></td>
<td><?php $i=38;?><?php  echo$soco[$i];?></td>
<td><?php $i=40;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="30"></td>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Provincia</td><td>Localidad</td></tr>
<tr>
<td><?php $i=12;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="50" ></td>
<td><?php $i=13;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="50" ></td>
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
?>
<?php $i=11;?>
<select name="datosn[<?php  echo$i;?>]">
<?php $idpaisa=$soco[$i];?>
<?php for ($i;$i<$row;$i++){;
$idpais=mysqli_result($result,$i,'idpais');
$nombrepais=mysqli_result($result,$i,'nombrepais');
?>
<option value="<?php  echo$idpais;?>" <?php if ($idpais==$idpaisa){;?>selected<?php };?> ><?php  echo$nombrepais;?>
<?php };?>
</select>
</td></tr>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Nombre del Representante</td><td>
<?php $i=6;?>
<input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="40" maxlength="40">
</td></tr>
</table>
</td></tr>






</table>
</div>







<div class="pos71" id="ver3" >
<table>
<tr><td>&nbsp;</td><td>Contratadas</td><td>Utilizadas</td><td>Dados de Baja</td></tr>
<?php 
$sql23a="select count(idusuario) as tot from usuariost where idempresa='".$idempresas."' and estado='1'";
$result23a=mysqli_query ($conn,$sql23a) or die ("Invalid result23");
$tota=mysqli_result($result23a,0,'tot');
$sql23b="select count(idusuario) as tot from usuariost where idempresa='".$idempresas."' and estado='0'";
$result23b=mysqli_query ($conn,$sql23b) or die ("Invalid result23");
$totb=mysqli_result($result23b,0,'tot');
?>


<tr><td>Administradores</td><td><?php $i=41;?><?php  echo$soco[$i];?>
<input type="hidden" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>">
</td><td><?php  echo$tota;?></td><td><?php  echo$totb;?></td></tr>
<?php 
$sql23a="select count(idclientes) as tot from clientes where idempresas='".$idempresas."' and estado='1'";
$result23a=mysqli_query ($conn,$sql23a) or die ("Invalid result23");
$tota=mysqli_result($result23a,0,'tot');
$sql23b="select count(idclientes) as tot from clientes where idempresas='".$idempresas."' and estado='0'";
$result23b=mysqli_query ($conn,$sql23b) or die ("Invalid result23");
$totb=mysqli_result($result23b,0,'tot');
?>


<tr><td>Puesto de Trabajo - Clientes</td><td><?php $i=42;?><?php  echo$soco[$i];?>
<input type="hidden" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>">
</td><td><?php  echo$tota;?></td><td><?php  echo$totb;?></td></tr>
<?php 
$sql23a="select count(idempleado) as tot from empleados where idempresa='".$idempresas."' and estado='1'";
$result23a=mysqli_query ($conn,$sql23a) or die ("Invalid result23");
$tota=mysqli_result($result23a,0,'tot');
$sql23b="select count(idempleado) as tot from empleados where idempresa='".$idempresas."' and estado='0'";
$result23b=mysqli_query ($conn,$sql23b) or die ("Invalid result23");
$totb=mysqli_result($result23b,0,'tot');
?>

<tr><td>Trabajadores</td><td><?php $i=43;?><?php  echo$soco[$i];?>
<input type="hidden" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>">
</td><td><?php  echo$tota;?></td><td><?php  echo$totb;?></td></tr>


</table>
</div>

<div class="pos71" id="ver4" >

<table>
<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</div>


<div class="pos71" id="ver5" >
<table>
<tr><td>Servicio</td>
<!--
<td>Activo</td>
-->
<td>Portada</td>
<td>Hoja</td><td>Etiquetas</td></tr>

<?php 
$encab=array('Cuadrante','Entrada / Salida','Incidencia','Mensajes','Alarmas','Acciones Diarias','Acciones Mantenimiento','Niveles','Productos','Revision','Trabajo','Siniestro','Control','Mediciones','Jornadas','Informes','Ruta','Envases','Incidencias +');
?>
<?php for ($t=0;$t<count($encab);$t++){;
$i=$t+2;
$y=$t+2;
?>
<?php if($socos[$i]==1){?>

<tr><td><?php  echo$encab[$t];?></td>



<td>
<input type="checkbox" name="datospn[<?php  echo$y;?>]" 
onclick="validar(formulario.<?php  echomysqli_field_name($result2s, $i);?>np,0)" 
id="<?php  echomysqli_field_name($result2s, $i);?>np" value="1"
<?php if($socop[$y]==1){?>checked="checked"<?php };?>
<?php if($socos[$i]==0){?> disabled="disabled"<?php };?>>
<?php if($socop[$y]==1){?><script>validar(formulario.<?php  echomysqli_field_name($result2s, $i);?>np,0);</script><?php };?>

</td>


<?php  
switch($t){;
case 1:
case 5:
case 6:
case 7:
case 8:
$ga=1;break;
default:
$ga=0;
};
if ($ga==1) {;?>
<td><input type="checkbox" name="datoshn[<?php  echo$y;?>]" id="datoshn[<?php  echo$y;?>]" value="1"
<?php if($socoh[$y]==1){?>checked="checked"<?php };?>
 <?php if($socos[$i]==0){?>disabled="disabled"<?php };?>></td>
<td><input type="checkbox" name="datosen[<?php  echo$y;?>]" id="datoshn[<?php  echo$y;?>]" value="1"
<?php if($socoe[$y]==1){?>checked="checked"<?php };?>
<?php if($socos[$i]==0){?> disabled="disabled"<?php };?>></td>
<?php };?>
</tr>

<?php };?>

<?php };?>


</table>
</div>




</form>





<div class="pos71" id="ver1" >

<h4>Estimado Cliente:</h4>
<h5>Ya se ha superado el periodo de prueba que tenia asignado para poder continuar debe de adquirir las licencias que le interesan.</h5>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" name="formulario2">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="E5WNQ3R8S2CJS">
<table>
<input type="hidden" name="ide" value="<?php  echo$ide;?>">
<input type="hidden" name="idpr" value="<?php $idpr;?>">
<tr><td>Numero de Administradores</td><td><input type="text" name="administrador" value="1" onchange="calculo()"></td></tr>
<tr><td>Numero de Puestos de Trabajo</td><td><input type="text" name="puestos" value="3" onchange="calculo()"></td></tr>
<tr><td>Numero de Empleados</td><td><input type="text" name="empleados" value="3" onchange="calculo()"></td></tr>

<tr><td><input type="hidden" name="on0" value="APP NATIVE CBC">Importe 1&deg; A&ntilde;o</td><td><input type="text" name="os0"></td></tr>
<tr><td>Importe 2&deg; A&ntilde;o y sucesivos</td><td><input type="text" name="amount" value="175"></td></tr>
</table>
<input type="hidden" name="currency_code" value="EUR">
<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
</form>









</div>





<!--</div>-->
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>
