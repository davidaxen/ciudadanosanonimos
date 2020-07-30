<?php 
if ($nif!=null){;

$sql="select idusuario from usuariost where idempresa='".$ide."' order by idusuario desc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result sql");
$row=mysqli_affected_rows();

if ($row==0){;
$idc=1;
}else{;
$idc=mysqli_result($result,0,'idusuario');
$idc=$idc+1;
};

$sql1 = "INSERT INTO usuariost (idusuario,nombre,nif,estado,idempresa,administracion,servicios,documentacion,informes,portada) 
VALUES ('$idc','$usuario','$nif','1','$ide','$administracion','$servicios','$documentacion','$informes','$portada')";
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result sql1");
//echo $sql1;

$passnif=substr($nemp,0,4).substr($nif,0,4);

$sql2 = "INSERT INTO usuarios (user,password,idempresas,administracion,servicios,documentacion,informes,portada) VALUES ('$nif','$passnif','$ide','$administracion','$servicios','$documentacion','$informes','$portada')";
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result sql2");



$sql3 = "INSERT INTO menuadministracion (user,idempresa,clientes,gestores,empleados,empresas,empresa,usuario,visita) 
VALUES ('$nif','$ide','$administracioncli','$administracionges','$administracionempl','0','$administracionemp','$administracionusu','$administracionvis')";
//echo $sql3;
$result3=mysqli_query ($conn,$sql3) or die ("Invalid result sql3");


$sql4 = "INSERT INTO menuinforme (user,idempresa,cuadrante,entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,productos,revision,trabajo,siniestro,mediciones,jornadas,informes,ruta,envases,incidenciasplus) 
VALUES ('$nif','$ide','$informescua','$informesent','$informesinc','$informesmen','$informesala','$informesadi','$informesama','$informesniv','$informespro','$informesrev','$informestra','$informessin','$informesmed','$informesjor','$informesinf','$informesrut','$informesenv','$informesinp')";
//echo $sql4;
$result4=mysqli_query ($conn,$sql4) or die ("Invalid result sql4");

$sql5 = "INSERT INTO menuservicios (user,idempresa,cuadrante,entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,productos,revision,trabajo,siniestro,mediciones,jornadas,informes,ruta,envases,incidenciasplus) 
VALUES ('$nif','$ide','$servicioscua','$serviciosent','$serviciosinc','$serviciosmen','$serviciosala','$serviciosadi','$serviciosama','$serviciosniv','$serviciospro','$serviciosrev','$serviciostra','$serviciossin','$serviciosmed','$serviciosjor','$serviciosinf','$serviciosrut','$serviciosenv','$serviciosinp')";
//echo $sql5;
$result5=mysqli_query ($conn,$sql5) or die ("Invalid result sql5");


}else{;

$valorintro="mal";
};


?>