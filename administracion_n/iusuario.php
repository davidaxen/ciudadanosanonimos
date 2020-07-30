<?php   
include('bbdd.php');


if ($ide!=null){;
include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">CREACION DE ADMINISTRADORES</p>
</div>
<div class="contenido">
<script>
    function at5(num,d1,d2,d3,d4,d5,d6)
    {
    if(document.getElementById(num).checked){
                    document.getElementById(d1).disabled =false;
                    document.getElementById(d2).disabled =false;
                    document.getElementById(d3).disabled =false;
                    document.getElementById(d4).disabled =false;
                    document.getElementById(d5).disabled =false;
						  document.getElementById(d6).disabled =false;
    }      
    else{
                    	document.getElementById(d1).disabled=true;
							document.getElementById(d2).disabled=true;
							document.getElementById(d3).disabled=true;
							document.getElementById(d4).disabled=true;
						   document.getElementById(d5).disabled=true;
							document.getElementById(d6).disabled=true;
                    //t5.value="";
    }
    }
    
        function at6(num,d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11)
    {
    if(document.getElementById(num).checked){
                    document.getElementById(d1).disabled =false;
                    document.getElementById(d2).disabled =false;
                    document.getElementById(d3).disabled =false;
                    document.getElementById(d4).disabled =false;
                    document.getElementById(d5).disabled =false;
						  document.getElementById(d6).disabled =false;
						  document.getElementById(d7).disabled =false;
						  document.getElementById(d8).disabled =false;
						  document.getElementById(d9).disabled =false;
						  document.getElementById(d10).disabled =false;
						  document.getElementById(d11).disabled =false;
    }      
    else{
                    	document.getElementById(d1).disabled=true;
							document.getElementById(d2).disabled=true;
							document.getElementById(d3).disabled=true;
							document.getElementById(d4).disabled=true;
						   document.getElementById(d5).disabled=true;
							document.getElementById(d6).disabled=true;
							document.getElementById(d7).disabled=true;
							document.getElementById(d8).disabled=true;
							document.getElementById(d9).disabled=true;
							document.getElementById(d10).disabled=true;
							document.getElementById(d11).disabled=true;
                    //t5.value="";
    }
    }
</script>

</head>

<?php  
$sql10="select licadm from empresas where idempresas='".$ide."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result lic");
$resultado10=mysqli_fetch_array($result10);
$licadm=$resultado10['licadm'];

$sql10="select count(idusuario) as tot from usuariost where idempresa='".$ide."' and estado='1'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result empleados");
$resultado10=mysqli_fetch_array($result10);
$tota=$resultado10['tot'];

//echo $lictra;
//echo $tota;

if ($licadm>$tota){;?>

<form action="intro2.php " method="post" name="form2">
<input type="hidden" name="tabla" value="idusuario">
<table>

<tr><td>Nombre del Usuario</td><td><input type="text" name="usuario"></td></tr>
<tr><td>NIF</td><td><input type="text" name="nif" maxlength="9"></td></tr>
<tr><td>Servicios</td><td>Activo</td></tr>

<tr><td>Portada</td>
<td><input type="checkbox" name="portada" value="1" id="portada"></td>
</tr>

<tr><td>Documentacion</td>
<td><input type="checkbox" name="documentacion" value="1" id="documentacion"></td>
</tr>




<tr><td>Administracion</td>
<td><input type="checkbox" name="administracion" value="1" id="administracion" 
onclick="at5('administracion','administracionemp','administracioncli','administracionempl','administracionges','administracionusu','administracionvis')">
</td></tr>
<tr><td colspan="2">
<table>
<tr><td>Empresa</td><td>Cliente</td><td>Empleados</td><td>Gestores</td><td>Usuarios</td><td>Visitas</td></tr>
<tr>
<td><input type="checkbox" name="administracionemp" id="administracionemp" value="1" disabled="disabled"></td>
<td><input type="checkbox" name="administracioncli" id="administracioncli" value="1" disabled="disabled"></td>
<td><input type="checkbox" name="administracionempl" id="administracionempl" value="1" disabled="disabled"></td>
<td><input type="checkbox" name="administracionges" id="administracionges" value="1" disabled="disabled"></td>
<td><input type="checkbox" name="administracionusu" id="administracionusu" value="1" disabled="disabled"></td>
<td><input type="checkbox" name="administracionvis" id="administracionvis" value="1" disabled="disabled"></td>
</tr>
</table>
</td>
</tr>
<?php  
$sql23="select * from empresas where idempresas='".$ide."' ";
$result23=mysqli_query ($conn,$sql23) or die ("Invalid result232");
$resultado23=mysqli_fetch_array($result23);
$cuadrante=$resultado23['cuadrante'];
$entrada=$resultado23['entrada'];
$incidencia=$resultado23['incidencia'];
$mensaje=$resultado23['mensaje'];
$alarma=$resultado23['alarma'];
$accdiarias=$resultado23['accdiarias'];
$accmantenimiento=$resultado23['accmantenimiento'];
$niveles=$resultado23['niveles'];
$productos=$resultado23['productos'];
$revision=$resultado23['revision'];
$trabajo=$resultado23['trabajo'];
$siniestro=$resultado23['siniestro'];
$mediciones=$resultado23['mediciones'];
?>



<tr><td>Servicios</td>
<td><input type="checkbox" name="servicios" value="1" id="servicios" 
onclick="at6('servicios'
<?php  if ($cuadrante==1){;?>,'servicioscua'<?php  };?>
<?php  if ($entrada==1){;?>,'serviciosent'<?php  };?>
<?php  if ($incidencia==1){;?>,'serviciosinc'<?php  };?>
<?php  if ($mensaje==1){;?>,'serviciosmen'<?php  };?>
<?php  if ($alarma==1){;?>,'serviciosala'<?php  };?>
<?php  if ($accdiarias==1){;?>,'serviciosadi'<?php  };?>
<?php  if ($accmantenimiento==1){;?>,'serviciosama'<?php  };?>
<?php  if ($niveles==1){;?>,'serviciosniv'<?php  };?>
<?php  if ($productos==1){;?>,'serviciospro'<?php  };?>
<?php  if ($revision==1){;?>,'serviciosrev'<?php  };?>
<?php  if ($trabajo==1){;?>,'serviciostra'<?php  };?>
<?php  if ($siniestro==1){;?>,'serviciossin'<?php  };?>
<?php  if ($mediciones==1){;?>,'serviciosmed'<?php  };?>
)">
</td></tr>
<tr><td colspan="2">
<table>
<tr>
<?php  if ($cuadrante==1){;?><td>Cuadrante</td><?php  };?>
<?php  if ($entrada==1){;?><td>Entrada</td><?php  };?>
<?php  if ($incidencia==1){;?><td>Incidencia</td><?php  };?>
<?php  if ($mensaje==1){;?><td>Mensaje</td><?php  };?>
<?php  if ($alarma==1){;?><td>Alarma</td><?php  };?>
<?php  if ($accdiarias==1){;?><td>Tareas Habituales</td><?php  };?>
<?php  if ($accmantenimiento==1){;?><td>Tareas Adicionales</td><?php  };?>
<?php  if ($niveles==1){;?><td>Paramentros</td><?php  };?>
<?php  if ($productos==1){;?><td>Existencias</td><?php  };?>
<?php  if ($revision==1){;?><td>Circuito</td><?php  };?>
<?php  if ($trabajo==1){;?><td>Trabajo</td><?php  };?>
<?php  if ($siniestro==1){;?><td>Ordenes</td><?php  };?>
<?php  if ($mediciones==1){;?><td>Lecturas</td><?php  };?>
</tr>

<tr>

<?php  if ($cuadrante==1){;?><td><input type="checkbox" name="servicioscua" id="servicioscua" value="1" disabled="disabled"></td><?php  };?>
<?php  if ($entrada==1){;?><td><input type="checkbox" name="serviciosent" id="serviciosent" value="1" disabled="disabled"></td><?php  };?>
<?php  if ($incidencia==1){;?><td><input type="checkbox" name="serviciosinc" id="serviciosinc" value="1" disabled="disabled"></td><?php  };?>
<?php  if ($mensaje==1){;?><td><input type="checkbox" name="serviciosmen" id="serviciosmen" value="1" disabled="disabled"></td><?php  };?>
<?php  if ($alarma==1){;?><td><input type="checkbox" name="serviciosala" id="serviciosala" value="1" disabled="disabled"></td><?php  };?>
<?php  if ($accdiarias==1){;?><td><input type="checkbox" name="serviciosadi" id="serviciosadi" value="1" disabled="disabled"></td><?php  };?>
<?php  if ($accmantenimiento==1){;?><td><input type="checkbox" name="serviciosama" id="serviciosama" value="1" disabled="disabled"><?php  };?>
<?php  if ($niveles==1){;?><td><input type="checkbox" name="serviciosniv" id="serviciosniv" value="1" disabled="disabled"><?php  };?>
<?php  if ($productos==1){;?><td><input type="checkbox" name="serviciospro" id="serviciospro" value="1" disabled="disabled"><?php  };?>
<?php  if ($revision==1){;?><td><input type="checkbox" name="serviciosrev" id="serviciosrev" value="1" disabled="disabled"><?php  };?>
<?php  if ($trabajo==1){;?><td><input type="checkbox" name="serviciostra" id="serviciostra" value="1" disabled="disabled"><?php  };?>
<?php  if ($siniestro==1){;?><td><input type="checkbox" name="serviciossin" id="serviciossin" value="1" disabled="disabled"><?php  };?>
<?php  if ($mediciones==1){;?><td><input type="checkbox" name="serviciosmed" id="serviciosmed" value="1" disabled="disabled"><?php  };?>

</tr>

</table>
</td>
</tr>


<tr><td>Informes</td>
<td><input type="checkbox" name="informes" value="1" id="informes" 
onclick="at6('informes'
<?php  if ($cuadrante==1){;?>,'informescua'<?php  };?>
<?php  if ($entrada==1){;?>,'informesent'<?php  };?>
<?php  if ($incidencia==1){;?>,'informesinc'<?php  };?>
<?php  if ($mensaje==1){;?>,'informesmen'<?php  };?>
<?php  if ($alarma==1){;?>,'informesala'<?php  };?>
<?php  if ($accdiarias==1){;?>,'informesadi'<?php  };?>
<?php  if ($accmantenimiento==1){;?>,'informesama'<?php  };?>
<?php  if ($niveles==1){;?>,'informesniv'<?php  };?>
<?php  if ($productos==1){;?>,'informespro'<?php  };?>
<?php  if ($revision==1){;?>,'informesrev'<?php  };?>
<?php  if ($trabajo==1){;?>,'informestra'<?php  };?>
<?php  if ($siniestro==1){;?>,'informessin'<?php  };?>
<?php  if ($mediciones==1){;?>,'informesmed'<?php  };?>
)">
</td></tr>
<tr><td colspan="2">
<table>
<tr>
<?php  if ($cuadrante==1){;?><td>Cuadrante</td><?php  };?>
<?php  if ($entrada==1){;?><td>Entrada</td><?php  };?>
<?php  if ($incidencia==1){;?><td>Incidencia</td><?php  };?>
<?php  if ($mensaje==1){;?><td>Mensaje</td><?php  };?>
<?php  if ($alarma==1){;?><td>Alarma</td><?php  };?>
<?php  if ($accdiarias==1){;?><td>Tareas Habituales</td><?php  };?>
<?php  if ($accmantenimiento==1){;?><td>Tareas Adicionales</td><?php  };?>
<?php  if ($niveles==1){;?><td>Paramentros</td><?php  };?>
<?php  if ($productos==1){;?><td>Existencias</td><?php  };?>
<?php  if ($revision==1){;?><td>Circuito</td><?php  };?>
<?php  if ($trabajo==1){;?><td>Trabajo</td><?php  };?>
<?php  if ($siniestro==1){;?><td>Ordenes</td><?php  };?>
<?php  if ($mediciones==1){;?><td>Lecturas</td><?php  };?>
</tr>

<tr>

<?php  if ($cuadrante==1){;?><td><input type="checkbox" name="informescua" id="informescua" value="1" disabled="disabled"></td><?php  };?>
<?php  if ($entrada==1){;?><td><input type="checkbox" name="informesent" id="informesent" value="1" disabled="disabled"></td><?php  };?>
<?php  if ($incidencia==1){;?><td><input type="checkbox" name="informesinc" id="informesinc" value="1" disabled="disabled"></td><?php  };?>
<?php  if ($mensaje==1){;?><td><input type="checkbox" name="informesmen" id="informesmen" value="1" disabled="disabled"></td><?php  };?>
<?php  if ($alarma==1){;?><td><input type="checkbox" name="informesala" id="informesala" value="1" disabled="disabled"></td><?php  };?>
<?php  if ($accdiarias==1){;?><td><input type="checkbox" name="informesadi" id="informesadi" value="1" disabled="disabled"></td><?php  };?>
<?php  if ($accmantenimiento==1){;?><td><input type="checkbox" name="informesama" id="informesama" value="1" disabled="disabled"><?php  };?>
<?php  if ($niveles==1){;?><td><input type="checkbox" name="informesniv" id="informesniv" value="1" disabled="disabled"><?php  };?>
<?php  if ($productos==1){;?><td><input type="checkbox" name="informespro" id="informespro" value="1" disabled="disabled"><?php  };?>
<?php  if ($revision==1){;?><td><input type="checkbox" name="informesrev" id="informesrev" value="1" disabled="disabled"><?php  };?>
<?php  if ($trabajo==1){;?><td><input type="checkbox" name="informestra" id="informestra" value="1" disabled="disabled"><?php  };?>
<?php  if ($siniestro==1){;?><td><input type="checkbox" name="informessin" id="informessin" value="1" disabled="disabled"><?php  };?>
<?php  if ($mediciones==1){;?><td><input type="checkbox" name="informesmed" id="informesmed" value="1" disabled="disabled"><?php  };?>
</tr>

</table>
</td>
</tr>







<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>

<?php  } else {;?>
<p>
<table>
<tr><td class="enc">Ya ha utilizado todas las licencias contratadas</td></tr>
<tr><td class="enc">Póngase en contacto con su comercial</td></tr>
</table>

<?php  };?>
</div>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>

