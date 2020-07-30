<?php
$sql="select * from menuexistencias where user='".$user."' and idempresa='".$ide."'";
$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menuexistencias");
$ex1=mysqli_result($result,0,'materiales');
$ex2=mysqli_result($result,0,'herramientas');
$ex3=mysqli_result($result,0,'vestuario');
$ex4=mysqli_result($result,0,'tienda');
?>

<!-- EXISTENCIAS -->
			<li><a href="#">Existencias</a>
		
				<ul>
        <?php if ($ex1=='1'){;?>          
          <li><a href="/existencias_n/dexistencia.php">Materiales</a>
                    <?php };?>
        <?php if ($ex2=='1'){;?>
          <li><a href="/existencias_n/dherramientas.php">Herramientas</a>
          <?php };?>
        <?php if ($ex3=='1'){;?>
					<li><a href="/existencias_n/dropa.php">Vestuario</a></li>
					<?php };?>
        <?php if ($ex4=='1'){;?>
					<li><a href="/existencias_n/dtienda.php">Tienda</a></li>
					<?php };?>

		
				</ul>
			</li>
<!-- FIN EXISTENCIAS -->