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


<?php  
include('bbdd.php');

if ($ide!=null){;
 include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">MODIFICACION DE USUARIOS</p>
</div>
<div class="contenido">



<?php 
$sql="select * from usuariost where idempresa='".$ide."' and nif='".$nif."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result usuarios");
$resultado=mysqli_fetch_array($result);
$estado=$resultado['estado'];
$nombre=$resultado['nombre'];
$portada=$resultado['portada'];
$administracion=$resultado['administracion'];
$servicios=$resultado['servicios'];
$documentacion=$resultado['documentacion'];
$informes=$resultado['informes'];
?>

<?php 
$sql="select * from menuadministracion where idempresa='".$ide."' and user='".$nif."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result usuarios");
$resultado=mysqli_fetch_array($result);
$administracioncli=$resultado['clientes'];
$administracionges=$resultado['gestores'];
$administracionempl=$resultado['empleados'];
$administracionemp=$resultado['empresa'];
$administracionusu=$resultado['usuario'];
$administracionvis=$resultado['visita'];
?>


<?php 
$sql="select * from menuservicios where idempresa='".$ide."' and user='".$nif."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result usuarios");
$resultado=mysqli_fetch_array($result);
$servicioscua=$resultado['cuadrante'];
$serviciosent=$resultado['entrada'];
$serviciosinc=$resultado['incidencia'];
$serviciosmen=$resultado['mensaje'];
$serviciosala=$resultado['alarma'];
$serviciosadi=$resultado['accdiarias'];
$serviciosama=$resultado['accmantenimiento'];
$serviciosniv=$resultado['niveles'];
$serviciospro=$resultado['productos'];
$serviciosrev=$resultado['revision'];
$serviciostra=$resultado['trabajo'];
$serviciossin=$resultado['siniestro'];
$serviciosmed=$resultado['mediciones'];
?>

<?php 
$sql="select * from menuinforme where idempresa='".$ide."' and user='".$nif."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result usuarios");
$resultado=mysqli_fetch_array($result);
$informescua=$resultado['cuadrante'];
$informesent=$resultado['entrada'];
$informesinc=$resultado['incidencia'];
$informesmen=$resultado['mensaje'];
$informesala=$resultado['alarma'];
$informesadi=$resultado['accdiarias'];
$informesama=$resultado['accmantenimiento'];
$informesniv=$resultado['niveles'];
$informespro=$resultado['productos'];
$informesrev=$resultado['revision'];
$informestra=$resultado['trabajo'];
$informessin=$resultado['siniestro'];
$informesmed=$resultado['mediciones'];
?>

<form action="intro2.php" method="post" name="form2">

<input type="hidden" name="tablas" value="modificaru">
<input type="hidden" name="nombre" value="<?php  echo$nombre;?>">
<input type="hidden" name="idempresasa" value="<?php  echo$ide;?>">
<input type="hidden" name="nifa" value="<?php  echo$nif;?>">
<input type="hidden" name="estado" value="<?php  echo$estado;?>">
<input type="hidden" name="portada" value="<?php  echo$portada;?>">
<input type="hidden" name="administracion" value="<?php  echo$administracion;?>">
<input type="hidden" name="servicios" value="<?php  echo$servicios;?>">
<input type="hidden" name="documentacion" value="<?php  echo$documentacion;?>">
<input type="hidden" name="informes" value="<?php  echo$informes;?>">

<input type="hidden" name="administracioncli" value="<?php  echo$administracioncli;?>">
<input type="hidden" name="administracionges" value="<?php  echo$administracionges;?>">
<input type="hidden" name="administracionempl" value="<?php  echo$administracionempl;?>">
<input type="hidden" name="administracionemp" value="<?php  echo$administracionemp;?>">
<input type="hidden" name="administracionusu" value="<?php  echo$administracionusu;?>">
<input type="hidden" name="administracionvis" value="<?php  echo$administracionvis;?>">

<input type="hidden" name="servicioscua" value="<?php  echo$servicioscua;?>">
<input type="hidden" name="serviciosent" value="<?php  echo$serviciosent;?>">
<input type="hidden" name="serviciosinc" value="<?php  echo$serviciosinc;?>">
<input type="hidden" name="serviciosmen" value="<?php  echo$serviciosmen;?>">
<input type="hidden" name="serviciosala" value="<?php  echo$serviciosala;?>">
<input type="hidden" name="serviciosadi" value="<?php  echo$serviciosadi;?>">
<input type="hidden" name="serviciosama" value="<?php  echo$serviciosama;?>">
<input type="hidden" name="serviciosniv" value="<?php  echo$serviciosniv;?>">
<input type="hidden" name="serviciospro" value="<?php  echo$serviciospro;?>">
<input type="hidden" name="serviciosrev" value="<?php  echo$serviciosrev;?>">
<input type="hidden" name="serviciostra" value="<?php  echo$serviciostra;?>">
<input type="hidden" name="serviciossin" value="<?php  echo$serviciossin;?>">
<input type="hidden" name="serviciosmed" value="<?php  echo$serviciosmed;?>">

<input type="hidden" name="informescua" value="<?php  echo$informescua;?>">
<input type="hidden" name="informesent" value="<?php  echo$informesent;?>">
<input type="hidden" name="informesinc" value="<?php  echo$informesinc;?>">
<input type="hidden" name="informesmen" value="<?php  echo$informesmen;?>">
<input type="hidden" name="informesala" value="<?php  echo$informesala;?>">
<input type="hidden" name="informesadi" value="<?php  echo$informesadi;?>">
<input type="hidden" name="informesama" value="<?php  echo$informesama;?>">
<input type="hidden" name="informesniv" value="<?php  echo$informesniv;?>">
<input type="hidden" name="informespro" value="<?php  echo$informespro;?>">
<input type="hidden" name="informesrev" value="<?php  echo$informesrev;?>">
<input type="hidden" name="informestra" value="<?php  echo$informestra;?>">
<input type="hidden" name="informessin" value="<?php  echo$informessin;?>">
<input type="hidden" name="informesmed" value="<?php  echo$informesmed;?>">
<table>

<tr><td>Nombre del Usuario</td><td><input type="text" name="nombren" value="<?php  echo$nombre;?>"></td></tr>
<tr><td>NIF</td><td><?php  echo$nif;?></td></tr>
<tr><td>Estado<td>
<select name="estadon" >
<option value="0" <?php if($estado==0){?>selected <?php };?> >Baja
<option value="1" <?php if($estado==1){?>selected <?php };?> >Alta
</select>
</td></tr>

<tr><td>Servicios</td><td>Activo</td></tr>

<tr><td>Portada</td>
<td><input type="checkbox" name="portadan" value="1" id="portadan" <?php if ($portada=='1'){;?>checked="checked"<?php };?>></td>
</tr>

<tr><td>Documentacion</td>
<td><input type="checkbox" name="documentacionn" value="1" id="documentacionn" <?php if ($documentacion=='1'){;?>checked="checked"<?php };?>></td>
</tr>




<tr><td>Administracion</td>
<td><input type="checkbox" name="administracionn" value="1" id="administracionn" <?php if ($administracion=='1'){;?>checked="checked"<?php };?>
onclick="at5('administracion','administracionempn','administracionclin','administracionempln','administraciongesn','administracionusun','administracionvisn')">
</td></tr>
<tr><td colspan="2">
<table>
<tr><td>Empresa</td><td>Cliente</td><td>Empleados</td><td>Gestores</td><td>Usuarios</td><td>Visitas</td></tr>
<tr>
<td><input type="checkbox" name="administracionempn" id="administracionempn" value="1" 
<?php if ($administracionemp=='1'){;?>checked="checked"<?php };?>
<?php if ($administracion!='1'){;?>disabled="disabled"<?php };?>></td>
<td><input type="checkbox" name="administracionclin" id="administracionclin" value="1" 
<?php if ($administracioncli=='1'){;?>checked="checked"<?php };?>
<?php if ($administracion!='1'){;?>disabled="disabled"<?php };?>></td>
<td><input type="checkbox" name="administracionempln" id="administracionempln" value="1" 
<?php if ($administracionempl=='1'){;?>checked="checked"<?php };?>
<?php if ($administracion!='1'){;?>disabled="disabled"<?php };?>></td>
<td><input type="checkbox" name="administraciongesn" id="administraciongesn" value="1" 
<?php if ($administracionges=='1'){;?>checked="checked"<?php };?>
<?php if ($administracion!='1'){;?>disabled="disabled"<?php };?>></td>
<td><input type="checkbox" name="administracionusun" id="administracionusun" value="1" 
<?php if ($administracionusu=='1'){;?>checked="checked"<?php };?>
<?php if ($administracion!='1'){;?>disabled="disabled"<?php };?>></td>
<td><input type="checkbox" name="administracionvisn" id="administracionvisn" value="1"
<?php if ($administracionvis=='1'){;?>checked="checked"<?php };?> 
<?php if ($administracion!='1'){;?>disabled="disabled"<?php };?>></td>
</tr>
</table>
</td>
</tr>
<?php 
$sql23="select * from empresas where idempresas='".$ide."' ";
$result23=mysqli_query ($conn,$sql23) or die ("Invalid result232");
$i=0;
$cuadrante=mysqli_result($result23,$i,'cuadrante');
$entrada=mysqli_result($result23,$i,'entrada');
$incidencia=mysqli_result($result23,$i,'incidencia');
$mensaje=mysqli_result($result23,$i,'mensaje');
$alarma=mysqli_result($result23,$i,'alarma');
$accdiarias=mysqli_result($result23,$i,'accdiarias');
$accmantenimiento=mysqli_result($result23,$i,'accmantenimiento');
$niveles=mysqli_result($result23,$i,'niveles');
$productos=mysqli_result($result23,$i,'productos');
$revision=mysqli_result($result23,$i,'revision');
$trabajo=mysqli_result($result23,$i,'trabajo');
$siniestro=mysqli_result($result23,$i,'siniestro');
$mediciones=mysqli_result($result23,$i,'mediciones');
?>



<tr><td>Servicios</td>
<td><input type="checkbox" name="serviciosn" value="1" id="serviciosn"  <?php if ($servicios=='1'){;?>checked="checked"<?php };?>
onclick="at6('servicios'
<?php if ($cuadrante==1){;?>,'servicioscuan'<?php };?>
<?php if ($entrada==1){;?>,'serviciosentn'<?php };?>
<?php if ($incidencia==1){;?>,'serviciosincn'<?php };?>
<?php if ($mensaje==1){;?>,'serviciosmenn'<?php };?>
<?php if ($alarma==1){;?>,'serviciosalan'<?php };?>
<?php if ($accdiarias==1){;?>,'serviciosadin'<?php };?>
<?php if ($accmantenimiento==1){;?>,'serviciosaman'<?php };?>
<?php if ($niveles==1){;?>,'serviciosnivn'<?php };?>
<?php if ($productos==1){;?>,'serviciospron'<?php };?>
<?php if ($revision==1){;?>,'serviciosrevn'<?php };?>
<?php if ($trabajo==1){;?>,'serviciostran'<?php };?>
<?php if ($siniestro==1){;?>,'serviciossin'<?php };?>
<?php if ($mediciones==1){;?>,'serviciosmed'<?php };?>
)">
</td></tr>
<tr><td colspan="2">
<table>
<?php if ($siniestro==1){;?><td><input type="checkbox" name="informessin" id="informessin" value="1" disabled="disabled"><?php };?>
<tr>
<?php if ($cuadrante==1){;?><td>Cuadrante</td><?php };?>
<?php if ($entrada==1){;?><td>Entrada</td><?php };?>
<?php if ($incidencia==1){;?><td>Incidencia</td><?php };?>
<?php if ($mensaje==1){;?><td>Mensaje</td><?php };?>
<?php if ($alarma==1){;?><td>Alarma</td><?php };?>
<?php if ($accdiarias==1){;?><td>Tareas Habituales</td><?php };?>
<?php if ($accmantenimiento==1){;?><td>Tareas Adicionales</td><?php };?>
<?php if ($niveles==1){;?><td>Parametros</td><?php };?>
<?php if ($productos==1){;?><td>Existencias</td><?php };?>
<?php if ($revision==1){;?><td>Circuito</td><?php };?>
<?php if ($trabajo==1){;?><td>Trabajo</td><?php };?>
<?php if ($siniestro==1){;?><td>Ordenes</td><?php };?>
<?php if ($mediciones==1){;?><td>Lecturas</td><?php };?>
</tr>

<tr>

<?php if ($cuadrante==1){;?><td><input type="checkbox" name="servicioscuan" id="servicioscuan" value="1" 
<?php if ($servicioscua=='1'){;?>checked="checked"<?php };?> 
<?php if ($servicios!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($entrada==1){;?><td><input type="checkbox" name="serviciosentn" id="serviciosentn" value="1" 
<?php if ($serviciosent=='1'){;?>checked="checked"<?php };?> 
<?php if ($servicios!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($incidencia==1){;?><td><input type="checkbox" name="serviciosincn" id="serviciosincn" value="1" 
<?php if ($serviciosinc=='1'){;?>checked="checked"<?php };?> 
<?php if ($servicios!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($mensaje==1){;?><td><input type="checkbox" name="serviciosmenn" id="serviciosmenn" value="1" 
<?php if ($serviciosmen=='1'){;?>checked="checked"<?php };?> 
<?php if ($servicios!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($alarma==1){;?><td><input type="checkbox" name="serviciosalan" id="serviciosalan" value="1" 
<?php if ($serviciosala=='1'){;?>checked="checked"<?php };?> 
<?php if ($servicios!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($accdiarias==1){;?><td><input type="checkbox" name="serviciosadin" id="serviciosadin" value="1" 
<?php if ($serviciosadi=='1'){;?>checked="checked"<?php };?> 
<?php if ($servicios!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($accmantenimiento==1){;?><td><input type="checkbox" name="serviciosaman" id="serviciosaman" value="1" 
<?php if ($serviciosama=='1'){;?>checked="checked"<?php };?> 
<?php if ($servicios!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($niveles==1){;?><td><input type="checkbox" name="serviciosnivn" id="serviciosnivn" value="1" 
<?php if ($serviciosniv=='1'){;?>checked="checked"<?php };?> 
<?php if ($servicios!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($productos==1){;?><td><input type="checkbox" name="serviciospron" id="serviciospron" value="1" 
<?php if ($serviciospro=='1'){;?>checked="checked"<?php };?> 
<?php if ($servicios!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($revision==1){;?><td><input type="checkbox" name="serviciosrevn" id="serviciosrevn" value="1" 
<?php if ($serviciosrev=='1'){;?>checked="checked"<?php };?> 
<?php if ($servicios!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($trabajo==1){;?><td><input type="checkbox" name="serviciostran" id="serviciostran" value="1" 
<?php if ($serviciostra=='1'){;?>checked="checked"<?php };?> 
<?php if ($servicios!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($siniestro==1){;?><td><input type="checkbox" name="serviciossinn" id="serviciossinn" value="1" 
<?php if ($serviciossin=='1'){;?>checked="checked"<?php };?> 
<?php if ($servicios!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($mediciones==1){;?><td><input type="checkbox" name="serviciosmedn" id="serviciosmedn" value="1" 
<?php if ($serviciosmed=='1'){;?>checked="checked"<?php };?> 
<?php if ($servicios!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
</tr>

</table>
</td>
</tr>


<tr><td>Informes</td>
<td><input type="checkbox" name="informesn" value="1" id="informesn" <?php if ($informes=='1'){;?>checked="checked"<?php };?>
onclick="at6('informes'
<?php if ($cuadrante==1){;?>,'informescuan'<?php };?>
<?php if ($entrada==1){;?>,'informesentn'<?php };?>
<?php if ($incidencia==1){;?>,'informesincn'<?php };?>
<?php if ($mensaje==1){;?>,'informesmenn'<?php };?>
<?php if ($alarma==1){;?>,'informesalan'<?php };?>
<?php if ($accdiarias==1){;?>,'informesadin'<?php };?>
<?php if ($accmantenimiento==1){;?>,'informesaman'<?php };?>
<?php if ($niveles==1){;?>,'informesnivn'<?php };?>
<?php if ($productos==1){;?>,'informespron'<?php };?>
<?php if ($revision==1){;?>,'informesrevn'<?php };?>
<?php if ($trabajo==1){;?>,'informestran'<?php };?>
<?php if ($siniestro==1){;?>,'informessinn'<?php };?>
<?php if ($mediciones==1){;?>,'informesmedn'<?php };?>
)">
</td></tr>
<tr><td colspan="2">
<table>
<tr>
<?php if ($cuadrante==1){;?><td>Cuadrante</td><?php };?>
<?php if ($entrada==1){;?><td>Entrada</td><?php };?>
<?php if ($incidencia==1){;?><td>Incidencia</td><?php };?>
<?php if ($mensaje==1){;?><td>Mensaje</td><?php };?>
<?php if ($alarma==1){;?><td>Alarma</td><?php };?>
<?php if ($accdiarias==1){;?><td>Tareas Habituales</td><?php };?>
<?php if ($accmantenimiento==1){;?><td>Tareas Adicionales</td><?php };?>
<?php if ($niveles==1){;?><td>Parametros</td><?php };?>
<?php if ($productos==1){;?><td>Existencias</td><?php };?>
<?php if ($revision==1){;?><td>Circuito</td><?php };?>
<?php if ($trabajo==1){;?><td>Trabajo</td><?php };?>
<?php if ($siniestro==1){;?><td>Ordenes</td><?php };?>
<?php if ($mediciones==1){;?><td>Lecturas</td><?php };?>
</tr>

<tr>

<?php if ($cuadrante==1){;?><td><input type="checkbox" name="informescuan" id="informescuan" value="1" 
<?php if ($informescua=='1'){;?>checked="checked"<?php };?> 
<?php if ($informes!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($entrada==1){;?><td><input type="checkbox" name="informesentn" id="informesentn" value="1" 
<?php if ($informesent=='1'){;?>checked="checked"<?php };?> 
<?php if ($informes!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($incidencia==1){;?><td><input type="checkbox" name="informesincn" id="informesincn" value="1" 
<?php if ($informesinc=='1'){;?>checked="checked"<?php };?> 
<?php if ($informes!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($mensaje==1){;?><td><input type="checkbox" name="informesmenn" id="informesmenn" value="1" 
<?php if ($informesmen=='1'){;?>checked="checked"<?php };?> 
<?php if ($informes!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($alarma==1){;?><td><input type="checkbox" name="informesalan" id="informesalan" value="1" 
<?php if ($informesala=='1'){;?>checked="checked"<?php };?> 
<?php if ($informes!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($accdiarias==1){;?><td><input type="checkbox" name="informesadin" id="informesadin" value="1" 
<?php if ($informesadi=='1'){;?>checked="checked"<?php };?> 
<?php if ($informes!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($accmantenimiento==1){;?><td><input type="checkbox" name="informesaman" id="informesaman" value="1" 
<?php if ($informesama=='1'){;?>checked="checked"<?php };?> 
<?php if ($informes!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($niveles==1){;?><td><input type="checkbox" name="informesnivn" id="informesnivn" value="1" 
<?php if ($informesniv=='1'){;?>checked="checked"<?php };?> 
<?php if ($informes!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($productos==1){;?><td><input type="checkbox" name="informespron" id="informespron" value="1" 
<?php if ($informespro=='1'){;?>checked="checked"<?php };?> 
<?php if ($informes!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($revision==1){;?><td><input type="checkbox" name="informesrevn" id="informesrevn" value="1" 
<?php if ($informesrev=='1'){;?>checked="checked"<?php };?> 
<?php if ($informes!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($trabajo==1){;?><td><input type="checkbox" name="informestran" id="informestran" value="1" 
<?php if ($informestra=='1'){;?>checked="checked"<?php };?> 
<?php if ($informes!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($siniestro==1){;?><td><input type="checkbox" name="informessinn" id="informessinn" value="1" 
<?php if ($informessin=='1'){;?>checked="checked"<?php };?> 
<?php if ($informes!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
<?php if ($mediciones==1){;?><td><input type="checkbox" name="informesmedn" id="informesmedn" value="1" 
<?php if ($informesmed=='1'){;?>checked="checked"<?php };?> 
<?php if ($informes!='1'){;?>disabled="disabled"<?php };?> ></td><?php };?>
</tr>

</table>
</td>
</tr>







<tr><td colspan="2"><input class="envio" type="submit" value="enviar" name="enviar"></td></tr>
</table>
</form>

</div>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>
