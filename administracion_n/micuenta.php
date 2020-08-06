<?php  
include('bbdd.php');

if ($ide!=null){;

include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">MI CUENTA</p>
</div>
<!--<div class="contenido">-->

<style>
.main3 {
	 /* width: calc (100% - 100px);*/
	width:95%;
	 position:relative;
	 top:310px;
    border: 0px solid #000;
    /*text-align:center;*/
    display:inline-table;
    padding:10px;
    
}

.caja3{
	 padding-top:5px;
	 padding-left:5px;
	 padding-right:5px;
    border: 0px solid ;
    text-align:center;
    min-width: 100px;
    height: 70px;
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
	 /* width:100%;
top:10px;
	 */
	  width: calc (100% - 200px);
	
	/*height:350px;*/
	 position:relative;
	 padding:10px;
    border: 2px solid #000;
    text-align:center;
}




a {text-decoration:none}
a hover: {text-decoration:none}
		
</style>




<form action="intro2.php" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
<input type="hidden" name="tablas" value="modificar">
<input type="hidden" name="idcm" value="20">
<?php 
$sql23="select * from empresas where idempresas='".$idempresas."' ";


$result23=$conn->query($sql23);
$soco=$result23->fetch();
$num_rows=$result23->fetchAll();
$row=count($num_rows);

//$result23=mysqli_query ($conn,$sql23) or die ("Invalid result23");
//$soco=mysqli_fetch_array($result23);
//$row=mysqli_num_rows($result23);
//$col=mysqli_num_fields($result23);


//$usera=mysqli_field_name($result23, 2);

$sql2s="select * from servicios where idempresa='".$idempresas."' ";


$result2s=$conn->query($sql2s);
$socos=$result2s->fetch();
$num_rows=$result2s->fetchAll();
$rows=count($num_rows);

//$result2s=mysqli_query ($conn,$sql2s) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
//$socos=mysqli_fetch_array($result2s);
//$rows=mysqli_num_rows($result2s);
//$cols=mysqli_num_fields($result2s);

$sql2si="select * from menuserviciosimg where idempresa='".$idempresas."' ";

$result2si=$conn->query($sql2si);
$socosi=$result2si->fetch();
$num_rows=$result2si->fetchAll();
$rowsi=count($num_rows);

//$result2si=mysqli_query ($conn,$sql2si) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
//$socosi=mysqli_fetch_array($result2si);
//$rowsi=mysqli_num_rows($result2si);
//$colsi=mysqli_num_fields($result2si);

$sql2sn="select * from menuserviciosnombre where idempresa='".$idempresas."' ";

$result2sn=$conn->query($sql2sn);
$socosn=$result2sn->fetch();
$num_rows=$result2sn->fetchAll();
$rowsn=count($num_rows);

//$result2sn=mysqli_query ($conn,$sql2sn) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
//$socosn=mysqli_fetch_array($result2sn);
//$rowsn=mysqli_num_rows($result2sn);
//$colsn=mysqli_num_fields($result2sn);


$sql2p="select * from portadai where idempresa='".$idempresas."' ";

$result2p=$conn->query($sql2p);
$socop=$result2p->fetch();
$num_rows=$result2p->fetchAll();
$rowp=count($num_rows);

//$result2p=mysqli_query ($conn,$sql2p) or die ("Invalid result2p");
//$bbddp=mysqli_fetch_array($result2p);
//$socop=mysqli_fetch_array($result2p);
//$rowp=mysqli_num_rows($result2p);
//$colp=mysqli_num_fields($result2p);


$sql2h="select * from hoja where idempresa='".$idempresas."' ";

$result2h=$conn->query($sql2h);
$socoh=$result2h->fetch();
$num_rows=$result2h->fetchAll();
$rowh=count($num_rows);

//$result2h=mysqli_query ($conn,$sql2h) or die ("Invalid result2h");
//$bbddh=mysqli_fetch_array($result2h);
//$socoh=mysqli_fetch_array($result2h);
//$rowh=mysqli_num_rows($result2h);
//$colh=mysqli_num_fields($result2h);


$sql2e="select * from etiquetas where idempresa='".$idempresas."' ";


$result2e=$conn->query($sql2e);
$socoe=$result2e->fetch();
$num_rows=$result2e->fetchAll();
$rowe=count($num_rows);

//$result2e=mysqli_query ($conn,$sql2e) or die ("Invalid result2e");
//$bbdde=mysqli_fetch_array($result2e);
//$socoe=mysqli_fetch_array($result2e);
//$rowe=mysqli_num_rows($result2e);
//$cole=mysqli_num_fields($result2e);



$sql25="select * from usuarios where idempresas='".$idempresas."' ";

$result25=$conn->query($sql25);
$socou=$result25->fetch();
$num_rows=$result25->fetchAll();
$rowu=count($num_rows);

//$result25=mysqli_query ($conn,$sql25) or die ("Invalid result23");
//$socou=mysqli_fetch_array($result25);
//$rowu=mysqli_num_rows($result25);
//$colu=mysqli_num_fields($result25);
?>

<div class="main6">

<div class="micuenta1">

<h2>Datos de la Empresa</h2>

<table>
<tr><td>
<table>
<tr><td class="enctab">Nombre de la Empresa</td><td><?php $i=1;?><?php  echo $soco[$i];?></td>
<td class="enctab">N.I.F.</td><td><?php $i=2;?><?php  echo $soco[$i];?></td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td class="enctab">Domicilio</td><td><?php $i=3;?><?php  echo $soco[$i];?></td>
<td class="enctab">C.P.</td><td><?php $i=4;?><?php  echo $soco[$i];?></td></tr>
</table>
</td></tr>

<tr><td>
<table>
<tr class="enctab"><td>Tel. fijo</td><td>Tel. movil</td><td>Fax</td></tr>
<tr>
<td><?php $i=8;?><?php  echo $soco[$i];?></td>
<td><?php $i=9;?><?php  echo $soco[$i];?></td>
<td><?php $i=10;?><?php  echo $soco[$i];?></td>
</tr>
<tr class="enctab">
<td>E-mail</td><td>Web</td>
</tr>
<tr>
<td><?php $i=38;?><?php  echo $soco[$i];?></td>
<td><?php $i=40;?><?php  echo $soco[$i];?></td>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr><td class="enctab">Provincia</td><td><?php $i=12;?><?php  echo $soco[$i];?></td>
<td class="enctab">Localidad</td><td><?php $i=13;?><?php  echo $soco[$i];?></td>
</tr>
</table>
</td></tr>

<tr><td>
<table>
<tr>
<td class="enctab">Pais</td>
<td>
<?php 
$sql="select * from pais order by nombrepais asc"; 

$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$num_rows=$result->fetchAll();
$row=count($num_rows);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result empleados");
//$row=mysqli_num_rows($result);
?>
<?php $i=11;?>
<?php $idpaisa=$soco[$i];?>
<?php 

foreach ($resultmos as $row1) {

//for ($i;$i<$row;$i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
$idpais=$row1['idpais'];
$nombrepais=$row1['nombrepais'];
?>
<?php if ($idpais==$idpaisa){;?><?php  echo $nombrepais;?><?php };?>
<?php };?>
</td></tr>
</tr>
</table>
</td></tr>

</table>

</div>


<div class="micuenta2">

<?php $i=14;?><img src="../img/<?php  echo $soco[$i];?>" width="300" >

</div>



<?php if ($idtrab=='0' and $idcli=='0'){;?>

<div class="micuenta3">
<table>
<tr class="enctab"><td>&nbsp;</td><td>Contratadas</td><td>Utilizadas</td><td>Dados de Baja</td></tr>
<?php 
$sql23a="select count(idusuario) as tot from usuariost where idempresa='".$idempresas."' and estado='1'";

$result23a=$conn->query($sql23a);
$resultado23a=$result23a->fetch();
//$result23a=mysqli_query ($conn,$sql23a) or die ("Invalid result23");
//$resultado23a=mysqli_fetch_array($result23a);
$tota=$resultado23a['tot'];
$sql23b="select count(idusuario) as tot from usuariost where idempresa='".$idempresas."' and estado='0'";

$result23b=$conn->query($sql23b);
$resultado23b=$result23b->fetch();

//$result23b=mysqli_query ($conn,$sql23b) or die ("Invalid result23");
//$resultado23b=mysqli_fetch_array($result23b);
$totb=$resultado23b['tot'];
?>


<tr><td class="enctab">Administradores</td><td><?php $i=41;?><?php  echo $soco[$i];?>
<input type="hidden" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>">
</td><td><?php  echo $tota;?></td><td><?php  echo $totb;?></td></tr>
<?php 
$sql23a="select count(idclientes) as tot from clientes where idempresas='".$idempresas."' and estado='1'";

$result23a=$conn->query($sql23a);
$resultado23a=$result23a->fetch();
//$result23a=mysqli_query ($conn,$sql23a) or die ("Invalid result23");
//$resultado23a=mysqli_fetch_array($result23a);
$tota=$resultado23a['tot'];
$sql23b="select count(idclientes) as tot from clientes where idempresas='".$idempresas."' and estado='0'";

$result23b=$conn->query($sql23b);
$resultado23b=$result23b->fetch();
//$result23b=mysqli_query ($conn,$sql23b) or die ("Invalid result23");
//$resultado23b=mysqli_fetch_array($result23b);
$totb=$resultado23b['tot'];
?>


<tr><td class="enctab">Puesto de Trabajo - Clientes</td><td><?php $i=42;?><?php  echo $soco[$i];?>
<input type="hidden" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>">
</td><td><?php  echo $tota;?></td><td><?php  echo $totb;?></td></tr>
<?php 
$sql23a="select count(idempleado) as tot from empleados where idempresa='".$idempresas."' and estado='1'";

$result23a=$conn->query($sql23a);
$resultado23a=$result23a->fetch();
//$result23a=mysqli_query ($conn,$sql23a) or die ("Invalid result23");
//$resultado23a=mysqli_fetch_array($result23a);
$tota=$resultado23a['tot'];
$sql23b="select count(idempleado) as tot from empleados where idempresa='".$idempresas."' and estado='0'";

$result23b=$conn->query($sql23b);
$resultado23b=$result23b->fetch();
//$result23b=mysqli_query ($conn,$sql23b) or die ("Invalid result23");
//$resultado23b=mysqli_fetch_array($result23b);
$totb=$resultado23b['tot'];
?>

<tr><td class="enctab">Trabajadores</td><td><?php $i=43;?><?php  echo $soco[$i];?>
<input type="hidden" name="datosn[<?php  echo $i;?>]" value="<?php  echo $soco[$i];?>">
</td><td><?php  echo $tota;?></td><td><?php  echo $totb;?></td></tr>


</table>
</div>

<?php };?>
</div>

<?php if ($idcli==0){;?>
<div class="main3">
<h2>Modificaciones</h2>

<a href="modclave.php?idempresas=<?php  echo $idempresas;?>">
<span class="caja3"><img src="/img/iconos/clave.png" width="40px"><br/>Resetear Clave</span></a>
<?php if ($idtrab=='0'){?>
<a href="moddatos.php?idempresas=<?php  echo $idempresas;?>"><span class="caja3">
<img src="/img/iconos/datos.png" width="40px" alt="Datos de Empresa"><br/>Datos Empresa</span></a>
<a href="modportadapag.php?idempresas=<?php  echo $idempresas;?>"><span class="caja3">
<img src="/img/iconos/portadapag.png" width="40px" alt="Portada"><br/>Portada</span></a>
<a href="modimagenes.php?idempresas=<?php  echo $idempresas;?>"><span class="caja3">
<img src="/img/iconos/imagen.png" width="40px" alt="Imagenes"><br/>Imagenes</span></a></span>
<a href="modportada.php?idempresas=<?php  echo $idempresas;?>"><span class="caja3">
<img src="/img/iconos/servicios.png" width="40px" alt="Servicios"><br/>Servicios</span></a>
<!--
<a href="modiconos.php?idempresas=<?php  echo $idempresas;?>"><span class="caja3">
<img src="/img/iconos/iconos.png" width="35px" alt="Iconos"><br/>Iconos</span></a>
-->
<a href="modtitulos.php?idempresas=<?php  echo $idempresas;?>"><span class="caja3">
<img src="/img/iconos/portadapag.png" width="40px" alt="Titulos"><br/>Titulos</span></a>
<?php };?>


</div>
<?php };?>


<!--</div>-->


<?php } else {;

include ('../cierre.php');

 };
 ?>
