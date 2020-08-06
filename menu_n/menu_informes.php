<?php

if ($idtrab!=0){;
$sql="select * from empleados where idempleado='".$idempleados."' and idempresa='".$ide."'";	
	};
	
if ($idcli!=0){;
$sql="select * from clientes where nif='".$gente."' and idempresas='".$ide."'";	
	};	

if( ($idtrab==0) and ($idcli==0)){;	
$sql="select * from menuservicios where user='".$gente."' and idempresa='".$ide."'";
};

//echo $sql;

$result=$conn->query($sql);
$resultado=$result->fetch();
//$result=mysqli_query ($conn,$sql) or die ("Invalid result menucontabilidad");
//$resultado=mysqli_fetch_array($result);
$cqr1i[]=$resultado['entrada'];
$cqr1i[]=$resultado['accdiarias'];
$cqr1i[]=$resultado['accmantenimiento'];
$cqr1i[]=$resultado['productos'];
$cqr1i[]=$resultado['niveles'];
$cqr1i[]=$resultado['revision'];
$cqr1i[]=$resultado['envases'];

$cp1i[]=$resultado['trabajo'];
$cp1i[]=$resultado['siniestro'];
$cp1i[]=$resultado['mediciones'];
$cp1i[]=$resultado['control'];
$cp1i[]=$resultado['alarma'];
$cp1i[]=$resultado['ruta'];
$cp1i[]=$resultado['seguimiento'];

$cc1i[]=$resultado['mensaje'];
$cc1i[]=$resultado['incidencia'];
$cc1i[]=$resultado['incidenciasplus'];

$ca1i[]=$resultado['cuadrante'];
$ca1i[]=$resultado['jornadas'];



if ($idtrab==0){
$sql="select * from servicios where idempresa='".$ide."'";
}
//echo $sql;

$result=$conn->query($sql);
$resultado=$result->fetch();
//$result=mysqli_query ($conn,$sql) or die ("Invalid result menucontabilidad");
//$resultado=mysqli_fetch_array($result);
$cqr2i[]=$resultado['entrada'];
$cqr2i[]=$resultado['accdiarias'];
$cqr2i[]=$resultado['accmantenimiento'];
$cqr2i[]=$resultado['productos'];
$cqr2i[]=$resultado['niveles'];
$cqr2i[]=$resultado['revision'];
$cqr2i[]=$resultado['envases'];

$cp2i[]=$resultado['trabajo'];
$cp2i[]=$resultado['siniestro'];
$cp2i[]=$resultado['mediciones'];
$cp2i[]=$resultado['control'];
$cp2i[]=$resultado['alarma'];
$cp2i[]=$resultado['ruta'];
$cp2i[]=$resultado['seguimiento'];

$cc2i[]=$resultado['mensaje'];
$cc2i[]=$resultado['incidencia'];
$cc2i[]=$resultado['incidenciasplus'];

$ca2i[]=$resultado['cuadrante'];
$ca2i[]=$resultado['jornadas'];

for ($t=0;$t<count($cqr1i);$t++){;
if (($cqr1i[$t]==1) and ($cqr2i[$t]==1)){;
$cqri[$t]=1;
}else{
$cqri[$t]=0;
}
}

for ($t=0;$t<count($cc1i);$t++){;
if (($cc1i[$t]==1) and ($cc2i[$t]==1)){;
$cci[$t]=1;
}else{
$cci[$t]=0;
}
}

for ($t=0;$t<count($cp1i);$t++){;
if (($cp1i[$t]==1) and ($cp2i[$t]==1)){;
$cpi[$t]=1;
}else{
$cpi[$t]=0;
}
}


for ($t=0;$t<count($ca1i);$t++){;
if (($ca1i[$t]==1) and ($ca2i[$t]==1)){;
$cai[$t]=1;
}else{
$cai[$t]=0;
}
}



$sql31="select * from menuserviciosnombre where idempresa='".$ide."'";
//echo $sql31;

$result31=$conn->query($sql31);
$resultado31=$result31->fetch();

//$result31=mysqli_query ($conn,$sql31) or die ("Invalid result menucontabilidad");
//$resultado31=mysqli_fetch_array($result31);
$ncqri[]=$resultado31['entrada'];
$ncqri[]=$resultado31['accdiarias'];
$ncqri[]=$resultado31['accmantenimiento'];
$ncqri[]=$resultado31['productos'];
$ncqri[]=$resultado31['niveles'];
$ncqri[]=$resultado31['revision'];
$ncqri[]=$resultado31['envases'];

$ncpi[]=$resultado31['trabajo'];
$ncpi[]=$resultado31['siniestro'];
$ncpi[]=$resultado31['mediciones'];
$ncpi[]=$resultado31['control'];
$ncpi[]=$resultado31['alarma'];
$ncpi[]=$resultado31['ruta'];
$ncpi[]=$resultado31['seguimiento'];


$ncci[]=$resultado31['mensaje'];
$ncci[]=$resultado31['incidencia'];
$ncci[]=$resultado31['incidenciasplus'];

$ncai[]=$resultado31['cuadrante'];
$ncai[]=$resultado31['jornadas'];




$sql32="select * from menuserviciosimg where idempresa='".$ide."'";
//echo $sql32;

$result32=$conn->query($sql32);
$resultado32=$result32->fetch();

//$result32=mysqli_query ($conn,$sql32) or die ("Invalid result menucontabilidad");
//$resultado32=mysqli_fetch_array($result32);
$icqri[]=$resultado32['entrada'];
$icqri[]=$resultado32['accdiarias'];
$icqri[]=$resultado32['accmantenimiento'];
$icqri[]=$resultado32['productos'];
$icqri[]=$resultado32['niveles'];
$icqri[]=$resultado32['revision'];
$icqri[]=$resultado32['envases'];

$icpi[]=$resultado32['trabajo'];
$icpi[]=$resultado32['siniestro'];
$icpi[]=$resultado32['mediciones'];
$icpi[]=$resultado32['control'];
$icpi[]=$resultado32['alarma'];
$icpi[]=$resultado32['ruta'];
$icpi[]=$resultado32['seguimiento'];


$icci[]=$resultado32['mensaje'];
$icci[]=$resultado32['incidencia'];
$icci[]=$resultado32['incidenciasplus'];

$icai[]=$resultado32['cuadrante'];
$icai[]=$resultado32['jornadas'];



$sql33="select * from menuinformeenlace where idempresa='".$ide."'";
//echo $sql33;

$result33=$conn->query($sql33);
$resultado33=$result33->fetch();
//$result33=mysqli_query ($conn,$sql33) or die ("Invalid result menucontabilidad");
//$resultado33=mysqli_fetch_array($result33);
$encqri[]=$resultado33['entrada'];
$encqri[]=$resultado33['accdiarias'];
$encqri[]=$resultado33['accmantenimiento'];
$encqri[]=$resultado33['productos'];
$encqri[]=$resultado33['niveles'];
$encqri[]=$resultado33['revision'];
$encqri[]=$resultado33['envases'];

$encpi[]=$resultado33['trabajo'];
$encpi[]=$resultado33['siniestro'];
$encpi[]=$resultado33['mediciones'];
$encpi[]=$resultado33['control'];
$encpi[]=$resultado33['alarma'];
$encpi[]=$resultado33['ruta'];
$encpi[]=$resultado33['seguimiento'];

$encci[]=$resultado33['mensaje'];
$encci[]=$resultado33['incidencia'];
$encci[]=$resultado33['incidenciasplus'];

$encai[]=$resultado33['cuadrante'];
$encai[]=$resultado33['jornadas'];


$sql33="select * from menuinformeayuda where idempresa='".$ide."'";
//echo $sql33;

$result33=$conn->query($sql33);
$resultado33=$result33->fetch();

//$result33=mysqli_query ($conn,$sql33) or die ("Invalid result menucontabilidad");
//$resultado33=mysqli_fetch_array($result33);
$encqrai[]=$resultado33['entrada'];
$encqrai[]=$resultado33['accdiarias'];
$encqrai[]=$resultado33['accmantenimiento'];
$encqrai[]=$resultado33['productos'];
$encqrai[]=$resultado33['niveles'];
$encqrai[]=$resultado33['revision'];
$encqrai[]=$resultado33['envases'];

$encpai[]=$resultado33['trabajo'];
$encpai[]=$resultado33['siniestro'];
$encpai[]=$resultado33['mediciones'];
$encpai[]=$resultado33['control'];
$encpai[]=$resultado33['alarma'];
$encpai[]=$resultado33['ruta'];
$encpai[]=$resultado33['seguimiento'];

$enccai[]=$resultado33['mensaje'];
$enccai[]=$resultado33['incidencia'];
$enccai[]=$resultado33['incidenciasplus'];

$encaai[]=$resultado33['cuadrante'];
$encaai[]=$resultado33['jornadas'];






?>