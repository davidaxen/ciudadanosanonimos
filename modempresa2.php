<?php  
include('bbdd.php');

if ($ide!=null){;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="html" lang="es-ES">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<head runat="server" >
    	<title><?php  echo strtoupper($nemp);?> - SISTEMA PARA CONTROL Y GESTION DE EMPRESAS</title>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
		<link rel="stylesheet" href="../estilo/estilonuevo.css" type="text/css" media="screen" charset="utf-8" >
	   <link rel="stylesheet" href="../estilo/MenuMatic34.css" type="text/css" media="screen" charset="utf-8" href="menu/" />
	  <!-- <link rel="stylesheet" href="../estilo/estilo.css">-->

</head>
<body>

<div class="encabezado"></div>
<div class="pie"></div>
<div class="cartel" ><?php  include('../menu/cartel.php');?></div>	
<div class="logo"><?php  include('../utilidades/logo_nuevo.php');?></div> 
<div class="menu"><?php  include('../menu/menup.php');?></div>
<div class="colocacion izquierda">
<center>Tareas Habituales</center>
<?php  include('../portada/portada4.php');?>
</div>


<div class="colocacion derecha">
<div class="titulo">
<p class="enc">MI CUENTA</p>
</div>
<!--<div class="contenido">-->
<script>
//var imageUrl="color.png"; // optionally, you can change path for images.

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
var maxi=<?php  echo $ttg;?>;
var maxi2=6;
//El contador es un arrayo de forma que cada posición del array es una linea del formulario
var contador=new Array(0,0);
</script>
<script>

function validar(check,grupo) {
	//Compruebo si la casilla está marcada
	if (check.checked==true){
		//está marcada, entonces aumento en uno el contador del grupo
		contador[grupo]++;
		//compruebo si el contador ha llegado al maximo permitido
		if (contador[grupo]>maxi) {
			//si ha llegado al máximo, muestro mensaje de error
			alert('No se pueden elegir más de '+maxi2+' casillas a la vez.');
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
$sql33="select * from portadai where idempresa='".$idempresas."'";
$result33=mysql_query ($sql33) or die ("Invalid result232");
$soco33=mysql_fetch_array($result33);
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
$result23=mysql_query ($sql23) or die ("Invalid result23");
$soco=mysql_fetch_array($result23);
$row=mysql_affected_rows();
$col=mysql_num_fields($result23);


$usera=mysql_field_name($result23, 2);

$sql2p="select * from portadai where idempresa='".$idempresas."' ";
$result2p=mysql_query ($sql2p) or die ("Invalid result2p");
//$bbddp=mysql_fetch_array($result2p);
$socop=mysql_fetch_array($result2p);
$rowp=mysql_affected_rows();
$colp=mysql_num_fields($result2p);


$sql2h="select * from hoja where idempresa='".$idempresas."' ";
$result2h=mysql_query ($sql2h) or die ("Invalid result2h");
//$bbddh=mysql_fetch_array($result2h);
$socoh=mysql_fetch_array($result2h);
$rowh=mysql_affected_rows();
$colh=mysql_num_fields($result2h);


$sql2e="select * from etiquetas where idempresa='".$idempresas."' ";
$result2e=mysql_query ($sql2e) or die ("Invalid result2e");
//$bbdde=mysql_fetch_array($result2e);
$socoe=mysql_fetch_array($result2e);
$rowe=mysql_affected_rows();
$cole=mysql_num_fields($result2e);

?>
<?php for ($j=0;$j<23;$j++){;?>
<input type="hidden" name="<?php  echo mysql_field_name($result23, $j);?>a" value="<?php  echo $soco[$j];?>">
<?php };?>
<?php for ($j=35;$j<$col;$j++){;?>
<input type="hidden" name="<?php  echo mysql_field_name($result23, $j);?>a" value="<?php  echo $soco[$j];?>">
<?php };?>
<?php for ($j=2;$j<$colp;$j++){;?>
<input type="hidden" name="<?php  echo mysql_field_name($result2p, $j);?>ap" value="<?php  echo $socop[$j];?>">
<?php };?>
<?php for ($j=2;$j<$colh;$j++){;?>
<input type="hidden" name="<?php  echo mysql_field_name($result2h, $j);?>ah" value="<?php  echo $socoh[$j];?>">
<?php };?>
<?php for ($j=2;$j<$cole;$j++){;?>
<input type="hidden" name="<?php  echo mysql_field_name($result2e, $j);?>ae" value="<?php  echo $socoe[$j];?>">
<?php };?>
<div class="pos5">
<table>
<tr>
<td><a href="#" onclick="mod(1,1,5)"><div class="menup" id="menu1">Datos Empresa</div></a></td>
<td><a href="#" onclick="mod(2,1,5)"><div class="menup" id="menu2">Imagenes</div></a></td>
<td><a href="#" onclick="mod(5,1,5)"><div class="menup" id="menu5">Servicios</div></a></td>
<td><a href="#" onclick="mod(3,1,5)"><div class="menup" id="menu3">Licencias</div></a></td>
<td><a href="#" onclick="mod(4,1,5)"><div class="menup" id="menu4">Enviar</div></a></td>
<!--

-->
</tr>
</table>
</div>

<div class="pos71" id="ver1" >
<table>

<tr><td>
<table>
<tr><td>Nombre de la Empresa</td><td><?php $i=1;?><input type="text" name="<?php  echo mysql_field_name($result23, $i);?>n" value="<?php  echo $soco[$i];?>" size="40"></td>
<td>N.I.F.</td><td><?php $i=2;?><?php  echo $soco[$i];?></td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Domicilio</td><td><?php $i=3;?><input type="text" name="<?php  echo mysql_field_name($result23, $i);?>n" value="<?php  echo $soco[$i];?>" size="50"></td>
<td>C.P.</td><td><?php $i=4;?><input type="text" name="<?php  echo mysql_field_name($result23, $i);?>n" value="<?php  echo $soco[$i];?>" size="5"></td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Tel. fijo</td><td>Tel. movil</td><td>Fax</td><td>E-mail</td><td>Web</td></tr>
<tr>
<td><?php $i=8;?><input type="text" name="<?php  echo mysql_field_name($result23, $i);?>n" value="<?php  echo $soco[$i];?>" size="9" maxlength="9"></td>
<td><?php $i=9;?><input type="text" name="<?php  echo mysql_field_name($result23, $i);?>n" value="<?php  echo $soco[$i];?>" size="9" maxlength="9"></td>
<td><?php $i=10;?><input type="text" name="<?php  echo mysql_field_name($result23, $i);?>n" value="<?php  echo $soco[$i];?>" size="9" maxlength="9"></td>
<td><?php $i=36;?><input type="text" name="<?php  echo mysql_field_name($result23, $i);?>n" value="<?php  echo $soco[$i];?>" size="30"></td>
<td><?php $i=38;?><input type="text" name="<?php  echo mysql_field_name($result23, $i);?>n" value="<?php  echo $soco[$i];?>" size="30"></td>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Provincia</td><td>Localidad</td></tr>
<tr>
<td><?php $i=12;?><input type="text" name="<?php  echo mysql_field_name($result23, $i);?>n" value="<?php  echo $soco[$i];?>" size="50" ></td>
<td><?php $i=13;?><input type="text" name="<?php  echo mysql_field_name($result23, $i);?>n" value="<?php  echo $soco[$i];?>" size="50" ></td>
</table>
</td></tr>

<tr><td>
<table>
<tr>
<td>Pais</td>
<td>
<?php 
$sql="select * from pais order by nombrepais asc"; 
$result=mysql_query ($sql) or die ("Invalid result empleados");
$row=mysql_affected_rows();
?>
<?php $i=11;?>
<select name="<?php  echo mysql_field_name($result23, $i);?>n">
<?php $idpaisa=$soco[$i];?>
<?php for ($i;$i<$row;$i++){;
$idpais=mysql_result($result,$i,'idpais');
$nombrepais=mysql_result($result,$i,'nombrepais');
?>
<option value="<?php  echo $idpais;?>" <?php if ($idpais==$idpaisa){;?>selected<?php };?> ><?php  echo $nombrepais;?>
<?php };?>
</select>
</td></tr>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Nombre del Representante</td><td><?php $i=6;?><input type="text" name="<?php  echo mysql_field_name($result23, $i);?>n" value="<?php  echo $soco[$i];?>" size="40" maxlength="40"></td>
<td>N.I.F. repres.</td><td><?php $i=7;?><input type="text" name="<?php  echo mysql_field_name($result23, $i);?>n" value="<?php  echo $soco[$i];?>" size="9" maxlength="9"></td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr>
<td>E-mail repres.</td><td><?php $i=37;?><input type="text" name="<?php  echo mysql_field_name($result23, $i);?>n" value="<?php  echo $soco[$i];?>" size="50"></td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Entidad</td><td>Sucursal</td><td>DC</td><td>Numero de Cuenta</td></tr>

<?php $i=5;
$ent = strtok($soco[$i], '-');
$suc = strtok('-');
$dc = strtok('-');
$cc = strtok('-');
?>
<tr>
<td><input type="text" name="ent2" value="<?php  echo $ent;?>" maxlength="4" size=4></td>
<td><input type="text" name="suc2" value="<?php  echo $suc;?>" maxlength="4" size=4></td>
<td><input type="text" name="dc2" value="<?php  echo $dc;?>" maxlength="2" size=2></td>
<td><input type="text" name="cc2" value="<?php  echo $cc;?>" maxlength="10" size=10></td>
</tr>
</table>
</td></tr>



</table>
</div>
<div class="pos71" id="ver2" >
<table>
<tr><td>Logotipo</td><td><a href="../img/pl_logo.psd">Plantilla</a></td><td><input type="file" name="logotipo2"></td></tr>
<tr><td>Firma</td><td><a href="../img/pl_firma.psd">Plantilla</a></td><td><input type="file" name="firma2"></td></tr>
<tr><td>Plantilla A4</td><td><a href="../img/pl_a4.psd">Plantilla</a></td><td><input type="file" name="plaa42"></td></tr>
<tr><td>Plantilla Sobre</td><td><a href="../img/pl_sobre.psd">Plantilla</a></td><td><input type="file" name="plasob2"></td></tr>
<tr><td>Plantilla carnet</td><td><a href="../img/pl-carnet.psd">Plantilla</a></td><td><input type="file" name="placar2"></td></tr>
<tr><td>Plantilla movil</td><td><a href="../img/pl_fondo_movil.psd">Plantilla</a></td><td><input type="file" name="plamov2"></td></tr>
<tr><td colspan="2">Icono</td><td><input type="file" name="ico2"></td></tr>
<tr><td colspan="2">Color</td><td>


<?php $i=20;
$r2 = strtok($soco[$i], ',');
$g2 = strtok(',');
$b2 = strtok(',');
$rt2=dechex($r2);
$gt2=dechex($g2);
$bt2=dechex($b2);
$colortt2=$rt2.$gt2.$bt2;
?>

<input type="text" value="#<?php  echo $colortt2;?>" class="izzyColor" name="colort2" id="<?php  echo mysql_field_name($result23, $i);?>n"></td></tr>
<tr><td colspan="2">Color movil</td><td>


<?php $i=21;
$r2 = strtok($soco[$i], ',');
$g2 = strtok(',');
$b2 = strtok(',');
$rt2=dechex($r2);
$gt2=dechex($g2);
$bt2=dechex($b2);
$colormt2=$rt2.$gt2.$bt2;
?>
<input type="text" value="#<?php  echo $colormt2;?>" class="izzyColor" name="colorm2" id="<?php  echo mysql_field_name($result23, $i);?>n"></td></tr>
</table>
</div>

<div class="pos71" id="ver3" >
<table>
<tr><td>&nbsp;</td><td>Contratadas</td><td>Utilizadas</td><td>Dados de Baja</td></tr>
<?php 
$sql23="select count(idusuario) as tot from usuariost where idempresa='".$idempresas."' and estado='1'";
$result23=mysql_query ($sql23) or die ("Invalid result23");
$tota=mysql_result($result23,0,'tot');
$sql23="select count(idusuario) as tot from usuariost where idempresa='".$idempresas."' and estado='0'";
$result23=mysql_query ($sql23) or die ("Invalid result23");
$totb=mysql_result($result23,0,'tot');
?>


<tr><td>Administradores</td><td><?php $i=41;?><?php  echo $soco[$i];?></td><td><?php  echo $tota;?></td><td><?php  echo $totb;?></td></tr>
<?php 
$sql23="select count(idclientes) as tot from clientes where idempresas='".$idempresas."' and estado='1'";
$result23=mysql_query ($sql23) or die ("Invalid result23");
$tota=mysql_result($result23,0,'tot');
$sql23="select count(idclientes) as tot from clientes where idempresas='".$idempresas."' and estado='0'";
$result23=mysql_query ($sql23) or die ("Invalid result23");
$totb=mysql_result($result23,0,'tot');
?>


<tr><td>Puesto de Trabajo - Clientes</td><td><?php $i=42;?><?php  echo $soco[$i];?></td><td><?php  echo $tota;?></td><td><?php  echo $totb;?></td></tr>
<?php 
$sql23="select count(idempleado) as tot from empleados where idempresa='".$idempresas."' and estado='1'";
$result23=mysql_query ($sql23) or die ("Invalid result23");
$tota=mysql_result($result23,0,'tot');
$sql23="select count(idempleado) as tot from empleados where idempresa='".$idempresas."' and estado='0'";
$result23=mysql_query ($sql23) or die ("Invalid result23");
$totb=mysql_result($result23,0,'tot');
?>

<tr><td>Trabajadores</td><td><?php $i=43;?><?php  echo $soco[$i];?></td><td><?php  echo $tota;?></td><td><?php  echo $totb;?></td></tr>


</table>
</div>

<div class="pos71" id="ver4" >
<table>
<tr><td>Clave</td><td><input type="text" name="claven" size="8" maxlenght="8"> * 8 caracteres</td></tr>
<!--
<tr><td>Estado<td><?php $i=23;?>
<select name="<?php  echo mysql_field_name($result23, $i);?>n" >
<option value="0" <?php if($soco[$i]==0){?>selected <?php };?> >Baja
<option value="1" <?php if($soco[$i]==1){?>selected <?php };?> >Alta
</select>
</td></tr>
-->
</table>
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
$encab=array('Cuadrante','Entrada / Salida','Incidencia','Mensajes','Alarmas','Acciones Diarias','Acciones Mantenimiento','Niveles','Productos','Revision','Trabajo','Siniestro');
?>
<?php for ($t=0;$t<count($encab);$t++){;
$i=$t+25;
$y=$t+2;
?>
<?php if($soco[$i]==1){?>

<tr><td><?php  echo $encab[$t];?></td>



<td><input type="checkbox" name="<?php  echo mysql_field_name($result23, $i);?>np" 
onclick="validar(formulario.<?php  echo mysql_field_name($result23, $i);?>np,0)" 
id="<?php  echo mysql_field_name($result23, $i);?>np" value="1"
<?php if($socop[$y]==1){?>checked="checked"<?php };?>
<?php if($soco[$i]==0){?> disabled="disabled"<?php };?>></td>


<?php  
$ga=1;
switch($t){;
case 0:
case 2:
case 3:
case 4:
$ga=0;break;
};
if ($ga==1) {;?>
<td><input type="checkbox" name="<?php  echo mysql_field_name($result23, $i);?>nh" id="<?php  echo mysql_field_name($result23, $i);?>nh" value="1"
<?php if($socoh[$y]==1){?>checked="checked"<?php };?>
 <?php if($soco[$i]==0){?>disabled="disabled"<?php };?>></td>
<td><input type="checkbox" name="<?php  echo mysql_field_name($result23, $i);?>ne" id="<?php  echo mysql_field_name($result23, $i);?>ne" value="1"
<?php if($socoe[$y]==1){?>checked="checked"<?php };?>
<?php if($soco[$i]==0){?> disabled="disabled"<?php };?>></td>
<?php };?>
</tr>

<?php };?>

<?php };?>


</table>
</div>




</form>

<!--</div>-->
</div>

<?php }else{;
include ('cierre.php');
};?>
