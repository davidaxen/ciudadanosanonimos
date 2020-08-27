<?php
$sql="select * from menufacturacion where user='".$user."' and idempresa='".$ide."'";
$result=$conn->query($sql);
$resultado=$result->fetchAll();

$f1=$resultado[0]['clientes'];
$f2=$resultado[0]['gestores'];
$f3=$resultado[0]['proveedores'];
$f4=$resultado[0]['banco'];
$f5=$resultado[0]['grupos'];
$f6=$resultado[0]['facturas'];
$f7=$resultado[0]['albaran'];
$f8=$resultado[0]['facturasrecibidas'];
$f9=$resultado[0]['hacienda'];


/*$result=mysqli_query ($conn,$conn,$sql) or die ("Invalid result menuempleados");
$f1=mysqli_result($result,0,'clientes');
$f2=mysqli_result($result,0,'gestores');
$f3=mysqli_result($result,0,'proveedores');
$f4=mysqli_result($result,0,'banco');
$f5=mysqli_result($result,0,'grupos');
$f6=mysqli_result($result,0,'facturas');
$f7=mysqli_result($result,0,'albaran');
$f8=mysqli_result($result,0,'facturasrecibidas');
$f9=mysqli_result($result,0,'hacienda');*/

$sql30="select * from menufacturacionnombre where user='".$user."' and idempresa='".$ide."'";
$result30=$conn->query($sql30);
$resultado30=$result30->fetchAll();

$nf1=$resultado30[0]['clientes'];
$nf2=$resultado30[0]['gestores'];
$nf3=$resultado30[0]['proveedores'];
$nf4=$resultado30[0]['banco'];
$nf5=$resultado30[0]['grupos'];
$nf6=$resultado30[0]['facturas'];
$nf7=$resultado30[0]['albaran'];
$nf8=$resultado30[0]['facturasrecibidas'];
$nf9=$resultado30[0]['hacienda'];

/*$result30=mysqli_query ($conn,$conn,$sql30) or die ("Invalid result menuempleados");
$nf1=mysqli_result($result30,0,'clientes');
$nf2=mysqli_result($result30,0,'gestores');
$nf3=mysqli_result($result30,0,'proveedores');
$nf4=mysqli_result($result30,0,'banco');
$nf5=mysqli_result($result30,0,'grupos');
$nf6=mysqli_result($result30,0,'facturas');
$nf7=mysqli_result($result30,0,'albaran');
$nf8=mysqli_result($result30,0,'facturasrecibidas');
$nf9=mysqli_result($result30,0,'hacienda');*/
?>


<!-- FACTURACION -->
			<li><a href="#">Facturacion</a>
		
				<ul>
<?php if ($f1=='1'){;?><li><a href="/facturacion_n/dclientes.php">
<?php if ($nf1!=null){;?><?php  echo $nf1;?><?php $titcliente=$nf1;?><?php }else{;?>Clientes<?php $titcliente='Clientes';?><?php };?>
</a></li><?php };?>
<?php if ($f2=='1'){;?><li><a href="/facturacion_n/dgestores.php">
<?php if ($nf2!=null){;?><?php  echo $nf2;?><?php $titgestores=$nf2;?><?php }else{;?>Gestores<?php $titgestores='Gestores';?><?php };?>
</a></li><?php };?>
<?php if ($f3=='1'){;?><li><a href="/facturacion_n/dproveedores.php">
<?php if ($nf3!=null){;?><?php  echo $nf3;?><?php }else{;?>Proveedores<?php };?>
</a></li><?php };?>
<?php if ($f4=='1'){;?><li><a href="/facturacion_n/dbancos.php">
<?php if ($nf4!=null){;?><?php  echo $nf4;?><?php }else{;?>Bancos<?php };?>
</a></li><?php };?>
<?php if ($f5=='1'){;?><li><a href="/facturacion_n/dgrupos.php">
<?php if ($nf5!=null){;?><?php  echo $nf5;?><?php }else{;?>Grupos<?php };?>
</a></li><?php };?>
<?php if ($f6=='1'){;?><li><a href="/facturacion_n/dfactura.php">
<?php if ($nf6!=null){;?><?php  echo $nf6;?><?php }else{;?>Facturas<?php };?>
</a></li><?php };?>
<?php if ($f7=='1'){;?><li><a href="/facturacion_n/dalbaran.php">
<?php if ($nf7!=null){;?><?php  echo $nf7;?><?php }else{;?>Albaran<?php };?>
</a></li><?php };?>
<?php if ($f8=='1'){;?><li><a href="/facturacion_n/dfrecibidas.php">
<?php if ($nf8!=null){;?><?php  echo $nf8;?><?php }else{;?>Facturas Recibidas<?php };?>
</a></li><?php };?>
<?php if ($f9=='1'){;?><li><a href="/facturacion_n/dhacienda.php">
<?php if ($nf9!=null){;?><?php  echo $nf9;?><?php }else{;?>Hacienda<?php };?>
</a></li><?php };?>

				</ul>
			</li>
<!-- FIN FACTURACION -->
