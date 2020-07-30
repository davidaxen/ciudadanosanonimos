<?php
$sql="select * from menuadministracion where user='".$user."' and idempresa='".$ide."'";
$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menuempleados");
$e1=mysqli_result($result,0,'clientes');
$e2=mysqli_result($result,0,'empleados');
$e3=mysqli_result($result,0,'gestores');
$e4=mysqli_result($result,0,'empresas');
$e5=mysqli_result($result,0,'empresa');

$e6=mysqli_result($result,0,'usuario');

$e7=mysqli_result($result,0,'visita');
?>



      <?php if ($e5=='1'){;?>
      <?php if ($estadoemp=='1'){;?>
            <li><a href="/administracion_n/modempresa2.php?idempresas=<?php  echo $ide;?>">Mi Cuenta</a></li>
		<?php };?>
		 <?php if ($estadoemp=='2'){;?>
            <li><a href="/administracion_n/modempresav2.php?idempresas=<?php  echo $ide;?>">Mi Cuenta</a></li>
      <?php };?>

      <?php };?>