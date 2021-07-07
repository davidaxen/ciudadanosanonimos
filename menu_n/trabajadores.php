<?php
$sql2="select idempleado,estado from empleados where nif='".$user."' and idempresa='".$ide."'";
$result2=$conn->query($sql2);
$resultado2=$result2->fetchAll();
$idempl=$resultado2[0]['idempleado'];
$estado=$resultado2[0]['estado'];

/*$result2=mysqli_query ($conn,$conn,$sql2) or die ("Invalid result empleados");
$idempl=mysqli_result($result2,0,'idempleado');
$estado=mysqli_result($result2,0,'estado');*/
?>

<li><a>TRABAJADORES</a>
		
				<ul>
          <li><a href="empleados/lempleados.php?idempl=<?php  echo $idempl;?>" target="principal">DATOS</a></li>				
          <li><a href="empleados/lempcont.php?idempl=<?php  echo $idempl;?>" target="principal">CONTRATO</a></li>
					<li><a href="empleados/dvrecibosempl.php?idempl=<?php  echo $idempl;?>" target="principal">RECIBOS</a></li>
					<li><a href="empleados/dvnominas.php?idempl=<?php  echo $idempl;?>" target="principal">NOMINAS</a></li>
          <li><a href="empleados/dvcertifiempl.php?idempl=<?php  echo $idempl;?>" target="principal">CERTIFICADOS</a></li>
					<li><a>VACACIONES >></a>
						<ul>
							<li><a href="empleados/avaca.php?idempl=<?php  echo $idempl;?>" target="principal">ALTA</a></li>
							<li><a href="empleados/lvaca.php?idempl=<?php  echo $idempl;?>" target="principal">LISTADO</a></li>
						</ul>
					</li>
					<?php  if ($estado==1){;?>
          <li><a href="empleados/lcuadranteemp.php?idempl=<?php  echo $idempl;?>" target="principal">CUADRANTES</a></li>
					<?php };?>
		
				</ul>
				</li>