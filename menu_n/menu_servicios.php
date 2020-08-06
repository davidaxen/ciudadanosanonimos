<?php

if ($idtrab!=0){;
$sql="select * from empleados where idempleado='".$idempleados."' and idempresa='".$ide."'";	
	};
	
if ($idcli!=0){;
$sql="select * from clientes where nif='".$gente."' and idempresas='".$ide."'";	
	};	

if( ($idtrab==0) and ($idcli==0)){;	
$sql="select * from menuservicios where user='".$gente."' and idempresa='".$ide."'";
//echo $sql;
};

//echo $sql;

$result=$conn->query($sql);
$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result menucontabilidad");
$resultado=mysqli_fetch_array($result);*/

$cqr1[]=$resultado['entrada'];
$cqr1[]=$resultado['accdiarias'];
$cqr1[]=$resultado['accmantenimiento'];
$cqr1[]=$resultado['productos'];
$cqr1[]=$resultado['niveles'];
$cqr1[]=$resultado['revision'];
$cqr1[]=$resultado['envases'];

$cp1[]=$resultado['trabajo'];
$cp1[]=$resultado['siniestro'];
$cp1[]=$resultado['mediciones'];
$cp1[]=$resultado['control'];
$cp1[]=$resultado['alarma'];
$cp1[]=$resultado['ruta'];
$cp1[]=$resultado['seguimiento'];

$cc1[]=$resultado['mensaje'];
$cc1[]=$resultado['incidencia'];
$cc1[]=$resultado['incidenciasplus'];

$ca1[]=$resultado['cuadrante'];
$ca1[]=$resultado['jornadas'];



if ($idtrab==0){
$sql="select * from servicios where idempresa='".$ide."'";
}
//echo $sql;

$result=$conn->query($sql);
$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result menucontabilidad");
$resultado=mysqli_fetch_array($result);*/

$cqr2[]=$resultado['entrada'];
$cqr2[]=$resultado['accdiarias'];
$cqr2[]=$resultado['accmantenimiento'];
$cqr2[]=$resultado['productos'];
$cqr2[]=$resultado['niveles'];
$cqr2[]=$resultado['revision'];
$cqr2[]=$resultado['envases'];

$cp2[]=$resultado['trabajo'];
$cp2[]=$resultado['siniestro'];
$cp2[]=$resultado['mediciones'];
$cp2[]=$resultado['control'];
$cp2[]=$resultado['alarma'];
$cp2[]=$resultado['ruta'];
$cp2[]=$resultado['seguimiento'];

$cc2[]=$resultado['mensaje'];
$cc2[]=$resultado['incidencia'];
$cc2[]=$resultado['incidenciasplus'];

$ca2[]=$resultado['cuadrante'];
$ca2[]=$resultado['jornadas'];

for ($t=0;$t<count($cqr1);$t++){;
if (($cqr1[$t]==1) and ($cqr2[$t]==1)){;
$cqr[$t]=1;
}else{
$cqr[$t]=0;
}
}

for ($t=0;$t<count($cc1);$t++){;
if (($cc1[$t]==1) and ($cc2[$t]==1)){;
$cc[$t]=1;
}else{
$cc[$t]=0;
}
}

for ($t=0;$t<count($cp1);$t++){;
if (($cp1[$t]==1) and ($cp2[$t]==1)){;
$cp[$t]=1;
}else{
$cp[$t]=0;
}
}


for ($t=0;$t<count($ca1);$t++){;
if (($ca1[$t]==1) and ($ca2[$t]==1)){;
$ca[$t]=1;
}else{
$ca[$t]=0;
}
}



$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
//echo $sql31;

$result31=$conn->query($sql31);
$resultado31=$result31->fetch();

/*$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
$resultado31=mysqli_fetch_array($result31);*/

$ncqr[]=$resultado31['entrada'];
$ncqr[]=$resultado31['accdiarias'];
$ncqr[]=$resultado31['accmantenimiento'];
$ncqr[]=$resultado31['productos'];
$ncqr[]=$resultado31['niveles'];
$ncqr[]=$resultado31['revision'];
$ncqr[]=$resultado31['envases'];

$ncp[]=$resultado31['trabajo'];
$ncp[]=$resultado31['siniestro'];
$ncp[]=$resultado31['mediciones'];
$ncp[]=$resultado31['control'];
$ncp[]=$resultado31['alarma'];
$ncp[]=$resultado31['ruta'];
$ncp[]=$resultado31['seguimiento'];


$ncc[]=$resultado31['mensaje'];
$ncc[]=$resultado31['incidencia'];
$ncc[]=$resultado31['incidenciasplus'];

$nca[]=$resultado31['cuadrante'];
$nca[]=$resultado31['jornadas'];




$sql32="select * from menuserviciosimg where idempresa='".$ide."'";
//echo $sql32;

$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

/*$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
$resultado32=mysqli_fetch_array($result32);*/

$icqr[]=$resultado32['entrada'];
$icqr[]=$resultado32['accdiarias'];
$icqr[]=$resultado32['accmantenimiento'];
$icqr[]=$resultado32['productos'];
$icqr[]=$resultado32['niveles'];
$icqr[]=$resultado32['revision'];
$icqr[]=$resultado32['envases'];

$icp[]=$resultado32['trabajo'];
$icp[]=$resultado32['siniestro'];
$icp[]=$resultado32['mediciones'];
$icp[]=$resultado32['control'];
$icp[]=$resultado32['alarma'];
$icp[]=$resultado32['ruta'];
$icp[]=$resultado32['seguimiento'];


$icc[]=$resultado32['mensaje'];
$icc[]=$resultado32['incidencia'];
$icc[]=$resultado32['incidenciasplus'];

$ica[]=$resultado32['cuadrante'];
$ica[]=$resultado32['jornadas'];



$sql33="select * from menuserviciosenlace where idempresa='".$ide."'";
//echo $sql33;

$result33=$conn->query($sql33);
$resultado33=$result33->fetch();

/*$result33=mysqli_query ($conn,$sql33) or die ("Invalid result menucontabilidad");
$resultado33=mysqli_fetch_array($result33);*/

$encqr[]=$resultado33['entrada'];
$encqr[]=$resultado33['accdiarias'];
$encqr[]=$resultado33['accmantenimiento'];
$encqr[]=$resultado33['productos'];
$encqr[]=$resultado33['niveles'];
$encqr[]=$resultado33['revision'];
$encqr[]=$resultado33['envases'];

$encp[]=$resultado33['trabajo'];
$encp[]=$resultado33['siniestro'];
$encp[]=$resultado33['mediciones'];
$encp[]=$resultado33['control'];
$encp[]=$resultado33['alarma'];
$encp[]=$resultado33['ruta'];
$encp[]=$resultado33['seguimiento'];

$encc[]=$resultado33['mensaje'];
$encc[]=$resultado33['incidencia'];
$encc[]=$resultado33['incidenciasplus'];

$enca[]=$resultado33['cuadrante'];
$enca[]=$resultado33['jornadas'];

$sql33="select * from menuserviciosayuda where idempresa='".$ide."'";
//echo $sql33;

$result33=$conn->query($sql33);
$resultado33=$result33->fetch();

/*$result33=mysqli_query ($conn,$sql33) or die ("Invalid result menucontabilidad");
$resultado33=mysqli_fetch_array($result33);*/

$encqra[]=$resultado33['entrada'];
$encqra[]=$resultado33['accdiarias'];
$encqra[]=$resultado33['accmantenimiento'];
$encqra[]=$resultado33['productos'];
$encqra[]=$resultado33['niveles'];
$encqra[]=$resultado33['revision'];
$encqra[]=$resultado33['envases'];

$encpa[]=$resultado33['trabajo'];
$encpa[]=$resultado33['siniestro'];
$encpa[]=$resultado33['mediciones'];
$encpa[]=$resultado33['control'];
$encpa[]=$resultado33['alarma'];
$encpa[]=$resultado33['ruta'];
$encpa[]=$resultado33['seguimiento'];

$encca[]=$resultado33['mensaje'];
$encca[]=$resultado33['incidencia'];
$encca[]=$resultado33['incidenciasplus'];

$encaa[]=$resultado33['cuadrante'];
$encaa[]=$resultado33['jornadas'];
?>