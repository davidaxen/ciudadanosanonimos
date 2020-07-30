<?php  
include('bbdd.php');


if ($ide!=null){;

 include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">MI CUENTA</p>
</div>
<!--<div class="contenido">-->
<script>
//var imageUrl="color.png"; // optionally, you can change path for images.


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

$sql2si="select * from menuserviciosimg where idempresa='".$idempresas."' ";
$result2si=mysqli_query ($conn,$sql2si) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
$socosi=mysqli_fetch_array($result2si);
$rowsi=mysqli_affected_rows();
$colsi=mysqli_num_fields($result2si);

$sql2sn="select * from menuserviciosnombre where idempresa='".$idempresas."' ";
$result2sn=mysqli_query ($conn,$sql2sn) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
$socosn=mysqli_fetch_array($result2sn);
$rowsn=mysqli_affected_rows();
$colsn=mysqli_num_fields($result2sn);


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



$sql25="select * from usuarios where idempresas='".$idempresas."' ";
$result25=mysqli_query ($conn,$sql25) or die ("Invalid result23");
$socou=mysqli_fetch_array($result25);
$rowu=mysqli_affected_rows();
$colu=mysqli_num_fields($result25);
?>

<?php 
for ($j=2;$j<3;$j++){;?>
<input type="hidden" name="datosu" value="<?php  echo$socou[$j];?>">
<input type="hidden" name="nombreu" value="<?php  echomysqli_field_name($result25, $j);?>">
<?php };?>


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
<td><a href="#" onclick="mod(1,1,5)"><div class="menup" id="menu1">Datos Empresa</div></a></td>
<td><a href="#" onclick="mod(2,1,5)"><div class="menup" id="menu2">Imagenes</div></a></td>
<td><a href="#" onclick="mod(5,1,5)"><div class="menup" id="menu5">Herramientas</div></a></td>
<td><a href="#" onclick="mod(3,1,5)"><div class="menup" id="menu3">Licencias</div></a></td>
<td><a href="#" onclick="mod(4,1,5)"><div class="menup" id="menu4">Enviar</div></a></td>
<!--

-->
</tr>
</table>
</div>



<div class="pos71" id="ver2" >
<table>
<tr><td>Logotipo</td><td><a href="../img/pl_logo.psd">Plantilla</a></td><td><input type="file" name="logotipo2"></td>
<td><?php $i=14;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(1,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Logotipo pequeño</td><td><a href="../img/pl_logo.psd">Plantilla</a></td><td><input type="file" name="logotipop2"></td>
<td><?php $i=15;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(2,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Firma</td><td><a href="../img/pl_firma.psd">Plantilla</a></td><td><input type="file" name="firma2"></td>
<td><?php $i=16;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(3,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla A4</td><td><a href="../img/pl_a4.psd">Plantilla</a></td><td><input type="file" name="plaa42"></td>
<td><?php $i=17;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(4,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla Hoja1 QR</td><td><a href="../img/pl_a4.psd">Plantilla</a></td><td><input type="file" name="hoja12"></td>
<td><?php $i=44;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(5,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla Hoja2 QR</td><td><a href="../img/pl_a4.psd">Plantilla</a></td><td><input type="file" name="hoja22"></td>
<td><?php $i=45;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(6,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla Sobre</td><td><a href="../img/pl_sobre.psd">Plantilla</a></td><td><input type="file" name="plasob2"></td>
<td><?php $i=18;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(7,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla carnet</td><td><a href="../img/pl-carnet.psd">Plantilla</a></td><td><input type="file" name="placar2"></td>
<td><?php $i=19;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(8,1,10)" width="25px"><?php };?></td></tr>
<tr><td>Plantilla movil</td><td><a href="../img/pl_fondo_movil.psd">Plantilla</a></td><td><input type="file" name="plamov2"></td>
<td><?php $i=20;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(9,1,10)" width="25px"><?php };?></td></tr>
<tr><td colspan="2">Icono</td><td><input type="file" name="ico2"></td>
<td><?php $i=23;?><?php if ($soco[$i]!=null){;?><img src="../img/ver.gif" onclick="mod2(10,1,10)" width="25px"><?php };?></td></tr>
<tr><td colspan="2">Color</td><td>


<?php $i=21;
$r2 = strtok($soco[$i], ',');
$g2 = strtok(',');
$b2 = strtok(',');
$rt2=dechex($r2);
$gt2=dechex($g2);
$bt2=dechex($b2);
$colortt2=$rt2.$gt2.$bt2;
?>

<input type="text" value="#<?php  echo$colortt2;?>" class="izzyColor" name="colort2" id="datosn[<=$i;?>]"></td></tr>
<tr><td colspan="2">Color movil</td><td>


<?php $i=22;
$r2 = strtok($soco[$i], ',');
$g2 = strtok(',');
$b2 = strtok(',');
$rt2=dechex($r2);
$gt2=dechex($g2);
$bt2=dechex($b2);
$colormt2=$rt2.$gt2.$bt2;
?>
<input type="text" value="#<?php  echo$colormt2;?>" class="izzyColor" name="colorm2" id="datosn<?php  echo$i;?>"></td></tr>
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





<div class="pos71" id="ver1" >
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
<td><?php $i=38;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="30"></td>
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
</td>
<td>N.I.F. repres.</td><td><?php $i=7;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="9" maxlength="9"></td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr>
<td>E-mail repres.</td><td><?php $i=39;?><input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="50"></td></tr>
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
<td><input type="text" name="ent2" value="<?php  echo$ent;?>" maxlength="4" size=4></td>
<td><input type="text" name="suc2" value="<?php  echo$suc;?>" maxlength="4" size=4></td>
<td><input type="text" name="dc2" value="<?php  echo$dc;?>" maxlength="2" size=2></td>
<td><input type="text" name="cc2" value="<?php  echo$cc;?>" maxlength="10" size=10></td>
</tr>
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
<tr><td>Clave</td><td><input type="text" name="datosun" size="15" maxlenght="15"> * 15 caracteres</td></tr>
<!--
<tr><td>Estado<td><?php $i=23;?>
<select name="<?php  echomysqli_field_name($result23, $i);?>n" >
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
<img src="../img/inicio_b.png" width="25px"> Puedes elegir que cinco Servicios quieres acceder a ver desde la portada.<br/>
<img src="../img/iconos/hoja.png" width="25px"> Sirve para indicar si quieres tener dichos servicios en hojas A4<br/>
<img src="../img/iconos/etiqueta.png" width="25px"> Sirve para indicar si quieres tener dichos servicios en etiquetas<p>
<div id="main">
<!--
<table>
<tr><td>Servicio</td>

<td>Activo</td>

<td>Portada</td>
<td>Hoja</td><td>Etiquetas</td></tr>
-->
<?php 
$encab=array('Cuadrante','Entrada / Salida','Incidencia','Mensajes','Alarmas','Acciones Diarias','Acciones Mantenimiento','Niveles','Productos','Revision','Trabajo','Siniestro','Control','Mediciones','Ruta','Envases','Incidencias +');

?>
<?php 
for ($t=0;$t<$cols;$t++){;
$i=$t+2;
$y=$t+2;
$u=$t+3;

?>
<?php if($socos[$i]==1){?>

<!--<tr><td>-->
<span><img src="../img/<?php  echo$socosi[$u];?>" width="35px"><br/>
<?php  echo$socosn[$u];?>

<!--</td>-->



<!--<td>--><br/>
<img src="../img/inicio_b.png" width="15px">
<input type="checkbox" name="datospn[<?php  echo$y;?>]" 
onclick="validar(formulario.<?php  echomysqli_field_name($result2s, $i);?>np,0)" 
id="<?php  echomysqli_field_name($result2s, $i);?>np" value="1"
<?php if($socop[$y]==1){?>checked="checked"<?php };?>
<?php if($socos[$i]==0){?> disabled="disabled"<?php };?>>
<?php if($socop[$y]==1){?><script>validar(formulario.<?php  echomysqli_field_name($result2s, $i);?>np,0);</script><?php };?>

<!--</td>-->


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
<!--<td>-->

<img src="../img/iconos/hoja.png" width="15px">
<input type="checkbox" name="datoshn[<?php  echo$y;?>]" id="datoshn[<?php  echo$y;?>]" value="1"
<?php if($socoh[$y]==1){?>checked="checked"<?php };?>
 <?php if($socos[$i]==0){?>disabled="disabled"<?php };?> >
 <!--</td>-->
<img src="../img/iconos/etiqueta.png" width="15px">

<!--<td>-->

<input type="checkbox" name="datosen[<?php  echo$y;?>]" id="datoshn[<?php  echo$y;?>]" value="1"
<?php if($socoe[$y]==1){?>checked="checked"<?php };?>
<?php if($socos[$i]==0){?> disabled="disabled"<?php };?>>
<!--</td>-->
<?php };?>
</span>
<!--</tr>-->

<?php };?>

<?php };?>

</div>
<!--</table>-->
</div>




</form>

<!--</div>-->
</div>

<?php } else {;

include ('../cierre.php');

 };
 ?>