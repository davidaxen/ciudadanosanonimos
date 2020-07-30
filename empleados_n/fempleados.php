<?php 
include('bbdd.php');
?>

<?php  include('../portada_n/cabecera2.php');

$sql31="select * from menuadministracionnombre where idempresa='".$ide."'";
$result31=mysql_query ($sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);
switch($tipo){
case 1: $nc=$resultado31['clientes'];break;
case 2: $nc=$resultado31['puestos'];break;
}
$sql32="select * from menuadministracionimg where idempresa='".$ide."'";
$result32=mysql_query ($sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);
switch($tipo){
case 1: $ic=$resultado32['clientes'];break;
case 2: $ic=$resultado32['puestos'];break;
};
?>



<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCI&OacuteN DE <?php  echo strtoupper($nc);?> DESDE FICHERO</p></div>
<div class="contenido">


<?php 
if ($idct==null){;?>
Estructura del fichero csv que debes de crear:

<table>
<tr>
<td class="tit">Nombre</td>
<td class="tit">Primer Apellido</td>
<td class="tit">Segundo Apellido</td>
<td class="tit">NIF</td><td>
<?php 
$dat2=array('entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento');
$dat=array('mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento');

$sql10="select * from servicios where idempresa='".$ide."'"; 
$result10=mysql_query ($sql10) or die ("Invalid result clientes");


$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
$result31=mysql_query ($sql31) or die ("Invalid result menucontabilidad");
?>


<?php for ($t=0;$t<count($dat);$t++){;?>

<?php 
$dgtt=mysql_result($result10,0,$dat[$t]);
$sernom=$resultado31[$dat[$t]);
if ($dgtt==1){;
?>
<td class="tit"><b><?php  echo $sernom;?></b></td>



<?php };?>

<?php };?>
</tr>
</table>

*NOTA:<br/> 
Los campos en negrita deben de ser rellenados con valores 0 (si no quieres) y 1 (si lo quieres) para cada uno de los clientes
<p>&nbsp;</p>
<p>&nbsp;</p>

<div class="outer-container">
  <form action="fempleados.php" method="post"
      name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
      <input type="hidden" value="1" name="idct">

<?php for ($t=0;$t<count($dat);$t++){;?>

<?php 
$dgtt=mysql_result($result10,0,$dat[$t]);
if ($dgtt==1){;
?>
<input type="hidden" name="servicios[]" value="<?php  echo $dat[$t];?>">

<?php };?>
<?php };?>
      
      
    <div>
      <label>Elija Archivo Excel</label>
      <input type="file" name="file"
              id="file" accept=".csv">
      <button type="submit" id="submit" name="import"
              class="btn-submit">Importar Registros</button>
    </div>
  </form>
</div>



<p>&nbsp;</p>


<?php } else {;?>



<?php
 
 
    if(isset($_POST['import']))
    {
        //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['file']['name'];
         echo 'Cargando nombre del archivo: '.$fname.' <br>';
         $chk_ext = explode(".",$fname);
 
         if(strtolower(end($chk_ext)) == "csv")
         {
             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['file']['tmp_name'];
             $handle = fopen($filename, "r");
 
             while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
             {
             	
$sqlid="SELECT idempleado from empleados where idempresa='".$ide."' order by idempleado desc";
//echo $sqlid;
$resultid=mysql_query($sqlid);
$row=mysql_affected_rows();
if ($row==0){;
$idnue=11;
}else{;
$idult=mysql_result($resultid,0,'idempleado');
$idnue=$idult+1;
};
//echo $idnue;   
$valor=explode(';',$data[0]);
      	
               //Insertamos los datos con los valores...
                $sql = "INSERT into empleados 
                (idempleado,idempresa,estado,entrada,incidencia,nombre,1apellido,2apellido,nif";
for ($yt=0;$yt<count($servicios);$yt++){
$sql.=','.$servicios[$yt];
}                             
                $sql.=") 
                values
                ('$idnue','$ide','1','1','1','$valor[0]','$valor[1]','$valor[2]','$valor[3]'";
                
  for ($yt=0;$yt<count($servicios);$yt++){
  	$yh=$yt+4;
$sql.=",'$valor[$yh]'";
}              
               $sql.=")";
                //echo $sql.'<br>';
               mysql_query($sql) or die('Error: '.mysql_error());

$sql2 = "INSERT INTO usuarios (user,password,idempresas,idempleados,trabajador,tusuario,modulo) VALUES ('$valor[3]','aaaaaaaa','$ide','$idnue','1','3','41')";
$result2=mysql_query ($sql2) or die ("Invalid result usuarios");
           
               
               
               
               
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
             echo "Importación exitosa!";
         }
         else
         {
            //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             
//ver si esta separado por " , "
             echo "Archivo invalido!";
         }
         }

 
?>


<p>&nbsp;</p>

<?php };?>

