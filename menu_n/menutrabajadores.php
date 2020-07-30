<?php

include('../bbdd/sqlfacturacion.php');
extract($_POST);
extract($_GET);
extract($_COOKIE);

$sql2="select idempleado,estado from empleados where nif='".$user."' and idempresa='".$ide."'"; 
$result2=mysqli_query ($conn,$conn,$sql2) or die ("Invalid result empleados");
$idempl=mysqli_result($result2,0,'idempleado');
$estado=mysqli_result($result2,0,'estado');
?>
<table>
<tr>
<td>
<a href="../empleados/lempleados.php?idempl=<?php  echo $idempl;?>" target="principal">
<img src="../img/datos_trab.png" width="160px"><br/>
DATOS</a>
</td>

<td>
<a href="../empleados/lempcont.php?idempl=<?php  echo $idempl;?>" target="principal">
<img src="../img/contrato.png" width="160px">
<br/>CONTRATO</a>
</td>

<td>
<a href="../empleados/dvrecibosempl.php?idempl=<?php  echo $idempl;?>" target="principal">
<img src="../img/recibos.png" width="160px">
<br/>RECIBOS</a>
</td>

<td>
<a href="../empleados/dvnominas.php?idempl=<?php  echo $idempl;?>" target="principal">
<img src="../img/recibos.png" width="160px">
<br/>NOMINAS
</a>
</td>

</tr>

<tr>
<td>
<a href="../empleados/dvcertifiempl.php?idempl=<?php  echo $idempl;?>" target="principal">
<img src="../img/certificados.png" width="160px">
<br/>
CERTIFICADOS</a>
</td>


		<?php  if ($estado==1){;?>
		    <td>
          <a href="../empleados/avaca.php?idempl=<?php  echo $idempl;?>" target="principal">
          <img src="../img/cuadrante.png" width="160px">
			 <br/>
          SOLICITUD DE VACACIONES</a>
          </td>


		    <td>
          <a href="../empleados/lvaca.php?idempl=<?php  echo $idempl;?>" target="principal">
          <img src="../img/cuadrante.png" width="160px">
			 <br/>
          LISTADO DE VACACIONES</a>
          </td>

		    <td>
          <a href="../empleados/lcuadranteemp.php?idempl=<?php  echo $idempl;?>" target="principal">
          <img src="../img/cuadrante.png" width="160px">
			 <br/>
          CUADRANTES</a>
          </td>
     <?php };?>



</tr>


</table>
