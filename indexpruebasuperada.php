<?php 
include('bbdd.php');

if ($com=='comprobacion'){;

 include('portada_n/cabeceralibre.php');
 include('estilo/acordeon.php'); 

$sql56="select * from proyectos where idproyectos='".$idpr."'";
//echo $sql56;
$result56=$conn->query($sql56);
$resultados56=$result56->fetch();

/*$result56=mysqli_query ($conn, $sql56) or die ("Invalid result sql56");
$resultados56 = mysqli_fetch_array ($result56);*/
$dprueba=$resultados56['diasprueba'];


 ?>
<style>
.main3 {
	 /*width: calc (100% - 200px);*/
	 width:100%;
	 position:relative;
	 top:0px;
    border: 0px solid #fff;
    text-align:center;
    display:inline-table;
}

.caja3{
	 padding-top:5px;
	 padding-left:5px;
	 padding-right:5px;
    border: 0px solid <?php  echo $colorborder;?>;
    text-align:center;
    min-width: 100px;
    height: 90px;
    border-bottom:5px inset #000;
    vertical-align: middle;
    margin:5px;
    border-radius: 8px;
    background-color:white;
    box-shadow: 1px 15px 18px #888888;
	 display:inline-table;
	 text-align:center;
}


.main6 {
	 /*width: calc (100% - 200px);

	 */
	 top:10px; 
	 width:100%;
	 position:relative;
	 padding:10px;
    border: 0px solid #fff;
    text-align:center;
}




</style>
<script language="JavaScript">

function bancoletras(contenido){
var valor;
 valor=contenido;
  if(isNaN(valor)){
  document.form2.entn.value="0000";
  }
  if(contenido.length<4){
  alert("Debe introducir 4 digitos.");
 }  
} 
function sucursalletras(contenido){
var valor;
 valor=contenido;
 if(isNaN(valor)){
  document.form2.sucn.value="0000";
  }
  if(contenido.length<4){
  alert("Debes de introducir 4 digitos.");
 }  
 
} 
function cuentaletras(contenido){
var valor;
 valor=contenido;
  if(isNaN(valor)){
  document.form2.ncuentan.value="0000000000";
  }
  if(contenido.length<4){
  alert("Debe introducir 10 digitos.");
 }  
} 

function digito(){
var numero, total,total1,total2,subtotal,subtotal2;
var digitos;
numero = 0;
total = 0;
subtotal = 0;
if(document.form2.entn.length==1) {
 document.form2.entn.value = "000" + document.form2.entn.value
  }
   else if(document.form2.entn.length==2) {
    document.form2.entn.value = "00" + document.form2.entn.value
   }  
   else if(document.form2.entn.length==3){
    document.form2.entn.value= "0" + document.form2.entn.value
   }
if(document.form2.sucn.length==1) {
 document.form2.sucn.value = "000" + document.form2.sucn.value
  }
   else if(document.form2.sucn.length==2) {
    document.form2.sucn.value = "00" + document.form2.sucn.value
   }  
   else if(document.form2.sucn.length==3){
    document.form2.sucn.value= "0" + document.form2.sucn.value
   }
numero = form2.entn.value;
numero = numero + form2.sucn.value;
total = parseInt(total + (numero%10)*6);
numero = parseInt(numero/10);
total = parseInt(total + (numero%10)*3);
numero = parseInt(numero/10);
total = parseInt(total + (numero%10)*7);
numero = parseInt(numero/10);
total = parseInt(total + (numero%10)*9);
numero = parseInt(numero/10);
total = parseInt(total + (numero%10)*10);
numero = parseInt(numero/10);
total = parseInt(total + (numero%10)*5);
numero = parseInt(numero/10);
total = parseInt(total + (numero%10)*8);
numero = parseInt(numero/10);
total = parseInt(total + (numero%10)*4);
numero = parseInt(numero/10);
total = total%11;
subtotal = 11-(total%11)
if(subtotal==11) {
 subtotal=0;
 }
 else if(subtotal==10){ 
  subtotal=1;
}  
total1 = 0;
total2=0;
total = form2.ncuentan.value;
total1 = total.charAt(9);
total2 = total1*6;
total1 = 0
total1= total.charAt(8);
total2= total2 + (total1*3);
total1=0;
total1= total.charAt(7);
total2= total2 + (total1*7);
total1=0
total1= total.charAt(6);
total2= total2 + (total1*9);
total1=0
total1= total.charAt(5);
total2= total2 + (total1*10);
total1=0
total1= total.charAt(4);
total2= total2 + (total1*5);
total1=0
total1= total.charAt(3);
total2= total2 + (total1*8);
total1=0
total1= total.charAt(2);
total2= total2 + (total1*4);
total1=0
total1= total.charAt(1);
total2= total2 + (total1*2);
total1=0
total1= total.charAt(0);
total2= total2 + (total1*1);
total = total2;
total = total %11;
subtotal2 = 11 - (total%11);
if (subtotal2 == 11) {
 subtotal2=0;
}
else if (subtotal2==10) {
 subtotal2=1;
}
document.form2.dcn.value = subtotal;
document.form2.dcn.value = document.form2.dcn.value + subtotal2;

var dat=document.form2.paisn.value

res=dat.split("-");


var Country_Code = res[2]; // Código de españa

// 10,11,12,13,4,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35
//A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z


			var iban = String(form2.entn.value) + String(form2.sucn.value);
			var MOD_1 = iban % 97;
			iban = "" + MOD_1 + form2.dcn.value + form2.ncuentan.value.substring(0,2);
			MOD_1 = iban % 97;
			iban = "" + MOD_1 + form2.ncuentan.value.substring(2,form2.ncuentan.value.length) + Country_Code + '00';
			MOD_iban = iban % 97;
			CC_iban = 98 - MOD_iban;
			if(CC_iban<10){
				CC_iban = "0" + CC_iban;
			}
			



document.form2.ibann.value=res[1] + CC_iban + form2.entn.value + form2.sucn.value + form2.dcn.value + form2.ncuentan.value;
}

function fechaiva(form){
ans=prompt("Has modificado el IVA /n Indicame ha partir de que fecha quieres que se utilice este porcentajes /n Formato de Fecha: año-mes-dia ej: 2010-07-01")
form.fiva.value=ans
alert (form.fiva.value) 
}



</script>

<div id="main">

<div class="main3"><span><?php  //include('portada_n/portada2.php');?></span></div>

<div class="main6"><?php //include ('estilo/tab.htm');?>
<?php 
$sql="select * from portadapag,paginapor where paginapor.idpag=portadapag.idpag and idempresa='".$ide."' and paginapor.idpag in ('1','2') order by idportada asc";
//echo $sql;
$result=$conn->query($sql);
$row=count($result->fetchAll());

/*$result=mysqli_query ($conn, $sql) or die ("Invalid result idempresas");
$row=mysqli_num_rows($result);*/
?>
</div>


<div class="titulo">
<p class="enc">HEMOS SUPERADO EL PERIODO DE PRUEBA DE <?php echo $dprueba;?> D&Iacute;AS</p>
</div>

<div class="contenido"  style="padding-left:10px">

<style>
a {text-decoration:none}
a hover: {text-decoration:none}
		
</style>


<?php 
$sql33="select * from portadai where idempresa='".$idempresacontrol."'";
$result33=$conn->query($sql33);
$soco33=$result33->fetch();

/*$result33=mysqli_query ($conn,$sql33) or die ("Invalid result232");
$soco33=mysqli_fetch_array($result33);*/
$ttg=0;
for ($tg=2;$tg<count($soco33);$tg++){;
if ($soco33[$tg]==1){;
	$ttg=$ttg+1;
	//echo $ttg;
	};
};
$ttg=6-$ttg;
?>



<form action="intro2c.php" method="post" enctype="multipart/form-data" name="form2" id="formulario">
<input type="hidden" name="tablas" value="modificar">
<input type="hidden" name="subtabla" value="datos">
<input type="hidden" name="idcm" value="20">

<?php 
$sql23="select * from empresas where idempresas='".$idempresacontrol."' ";
$result23=$conn->query($sql23);
$soco=$result23->fetch();

/*$result23=mysqli_query ($conn,$sql23) or die ("Invalid result23");
$soco=mysqli_fetch_array($result23);
$row=mysqli_num_rows($result23);
$col=mysqli_field_count($result23);*/

/*mysqli_field_seek($result23, 2);
$usera=mysqli_fetch_field($result23)->name;*/


$sql2s="select * from servicios where idempresa='".$idempresacontrol."' ";
$result2s=$conn->query($sql2s);
$socos=$result2s->fetch();

/*$result2s=mysqli_query ($conn,$sql2s) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
$socos=mysqli_fetch_array($result2s);
$rows=mysqli_num_rows($result2s);
$cols=mysqli_field_count($result2s);*/

$sql2si="select * from menuserviciosimg where idempresa='".$idempresacontrol."' ";
$result2si=$conn->query($sql2si);
$socosi=$result2si->fetch();

/*$result2si=mysqli_query ($conn,$sql2si) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
$socosi=mysqli_fetch_array($result2si);
$rowsi=mysqli_num_rows($result2si);
$colsi=mysqli_field_count($result2si);*/

$sql2sn="select * from menuserviciosnombre where idempresa='".$idempresacontrol."' ";
$result2sn=$conn->query($sql2sn);
$socosn=$result2sn->fetch();

/*$result2sn=mysqli_query ($conn,$sql2sn) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
$socosn=mysqli_fetch_array($result2sn);
$rowsn=mysqli_num_rows($result2sn);
$colsn=mysqli_field_count($result2sn);*/


$sql2p="select * from portadai where idempresa='".$idempresacontrol."' ";
$result2p=$conn->query($sql2p);
$socop=$result2p->fetch();

/*$result2p=mysqli_query ($conn,$sql2p) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
$socop=mysqli_fetch_array($result2p);
$rowp=mysqli_num_rows($result2p);
$colp=mysqli_field_count($result2p);*/


$sql2h="select * from hoja where idempresa='".$idempresacontrol."' ";
$result2h=$conn->query($sql2h);
$socoh=$result2h->fetch();

/*$result2h=mysqli_query ($conn,$sql2h) or die ("Invalid result2h");
//$bbddh=mysqli_fetch_array($result2h);
$socoh=mysqli_fetch_array($result2h);
$rowh=mysqli_num_rows($result2h);
$colh=mysqli_field_count($result2h);*/


$sql2e="select * from etiquetas where idempresa='".$idempresacontrol."' ";
$result2e=$conn->query($sql2e);
$socoe=$result2e->fetch();

/*$result2e=mysqli_query ($conn,$sql2e) or die ("Invalid result2e");
//$bbdde=mysqli_fetch_array($result2e);
$socoe=mysqli_fetch_array($result2e);
$rowe=mysqli_num_rows($result2e);
$cole=mysqli_field_count($result2e);*/



$sql25="select * from usuarios where idempresas='".$idempresacontrol."' ";
$result25=$conn->query($sql25);
$socou=$result25->fetch();

/*$result25=mysqli_query ($conn,$sql25) or die ("Invalid result23");
$socou=mysqli_fetch_array($result25);
$rowu=mysqli_num_rows($result25);
$colu=mysqli_field_count($result25);*/


for ($j=0;$j<14;$j++){;
/*mysqli_field_seek($result23, $j);
$nomb23=mysqli_fetch_field($result23)->name;*/
$nomb23=$result23->getColumnMeta($j, ['name']);
?>
<input type="hidden" name="datosa[<?php  echo $j;?>]" value="<?php  echo $soco[$j];?>">
<input type="hidden" name="nombrea[<?php  echo $j;?>]" value="<?php  echo $nomb23;?>">
<?php };?>

<?php for ($j=38;$j<41;$j++){;
/*mysqli_field_seek($result23, $j);
$nomb23=mysqli_fetch_field($result23)->name;*/
$nomb23=$result23->getColumnMeta($j, ['name']);
?>
<input type="hidden" name="datosa[<?php  echo $j;?>]" value="<?php  echo $soco[$j];?>">
<input type="hidden" name="nombrea[<?php  echo $j;?>]" value="<?php  echo $nomb23;?>">
<?php };?>

<input type="hidden" name="datosa[24]" value="<?php  echo $soco[24];?>">
<input type="hidden" name="nombrea[24]" value="estado">
<input type="hidden" name="datosn[24]" value="1">

<input type="hidden" name="datosa[61]" value="<?php  echo $soco[61];?>">
<input type="hidden" name="nombrea[61]" value="iban">


<div class="accordion">
<img src="img/iconos/datos_personales.png" width="32px" style="vertical-align:middle;"> Datos Empresa
</div>
<div class="panel">
<table>
<?php $i=0;?><input type="hidden" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>">
<tr><td>
<table>
<tr><td>Nombre de la Empresa</td><td><?php $i=1;?>
<b><?php  echo $soco[$i];?></b>
</td>
<td>N.I.F.</td><td><?php $i=2;?><b><?php  echo $soco[$i];?></b>
<input type="hidden" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>">
</td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Domicilio</td><td><?php $i=3;?>
<input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="50">
</td>
<td>C.P.</td><td><?php $i=4;?>
<input type="text" name="datosn[<?php  echo$i;?>]" value="<?php  echo$soco[$i];?>" size="5">
</td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Tel. fijo</td><td>Tel. movil</td><td>Fax</td><td>E-mail</td><td>Web</td></tr>
<tr>
<td><?php $i=8;?><input type="text" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>" size="9" maxlength="9"></td>
<td><?php $i=9;?><input type="text" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>" size="9" maxlength="9"></td>
<td><?php $i=10;?><input type="text" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>" size="9" maxlength="9"></td>
<td><?php $i=38;?><input type="text" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>" size="30"></td>
<td><?php $i=40;?><input type="text" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>" size="30"></td>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td>Provincia</td><td>Localidad</td></tr>
<tr>
<td><?php $i=12;?><input type="text" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>" size="50" ></td>
<td><?php $i=13;?><input type="text" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>" size="50" ></td>
</table>
</td></tr>

<tr><td>
<table>
<tr>
<td>Pais</td>
<td>
<?php 
$sql="select * from paises order by pais asc";
$result=$conn->query($sql);

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result empleados");
$row=mysqli_num_rows($result);*/
?>
<?php $i=11;?>
<select name="paisn">
<?php $idpaisa=$soco[$i];?>
<?php 
/*for ($i;$i<$row;$i++){;
mysqli_data_seek($result, $i);
$resultado=mysqli_fetch_array($result);*/
foreach ($result as $rowmos) {
$idpais1=$rowmos['idpais'];
$npais1=$rowmos['pais'];
$sig1=$rowmos['sig'];
$numsig1=$rowmos['numsig'];
$valorpais=$idpais1."-".$sig1."-".$numsig1;
?>
<option value="<?php  echo $valorpais;?>" <?php if ($idpais==$idpaisa){;?>selected<?php };?> ><?php  echo $npais1;?>
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
<input type="text" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>" size="40" maxlength="40">
</td>
<td>N.I.F. repres.</td><td><?php $i=7;?><input type="text" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>" size="9" maxlength="9"></td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr>
<td>E-mail repres.</td><td><?php $i=39;?><input type="text" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>" size="50"></td></tr>
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
<input type="hidden" name="enta" value="<?php  echo $ent;?>">
<input type="hidden" name="suca" value="<?php  echo $suc;?>">
<input type="hidden" name="dca" value="<?php  echo $dc;?>">
<input type="hidden" name="ncuentaa" value="<?php  echo $cc;?>">

<tr>
<td><input type="text" name="entn" value="<?php  echo $ent;?>" maxlength="4" required  size=4></td>
<td><input type="text" name="sucn" value="<?php  echo $suc;?>" maxlength="4" required  size=4></td>
<td><input type="text" name="dcn" value="<?php  echo $dc;?>" maxlength="2" required  size=2></td>
<td><input type="text" name="ncuentan" value="<?php  echo $cc;?>" maxlength="10" size=10  required onblur='digito()'></td>
</tr>
</table>
</td></tr>

<tr>
<td>Cuenta IBAN</td>
<td colspan="4"><?$iban=$soco[61];?></td></tr>
<tr><td>
<input type="hidden" name="ibana" value="<?php echo $iban;?>">
<input type="text" name="ibann" value="<?php echo $iban;?>" size="50" required  onblur="Iban()">
</td>
</tr>


</table>
</div>



<button class="accordion">
<img src="../img/iconos/enviar.png" width="32px" style="vertical-align:middle;">  Enviar
</button>
<!--
[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}
-->
    
</form>
<?php  include ('js/acordeonjs.php');?>
</div>
</div>
<script>
     function Iban() {
    var telReg=/[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}$/;
    if (!(telReg.test(form2.ibann.value))) { 
    alert('El iban no es valido');
    document.form2.ibann.value=null;
    document.form2.ncuentan.focus();
	 }    

     } 
     
</script> 


</body>

</html>
<?php }else{;
include ('cierre.php');
};?>