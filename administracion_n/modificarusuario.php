<?php 


$sql0="update usuariost set ";
$sql1="where idempresa='".$ide."' and nif='".$nif."' ";

$sql00="update usuarios set ";
$sql01="where idempresas='".$ide."' and user='".$nif."' ";
//echo $sql0;
//echo $sql1;
$nombrecampo=array('nombre','estado','portada','administracion','servicios','documentacion','informes');
$valoractual=array($nombre,$estado,$portada,$administracion,$servicios,$documentacion,$informes);
$valornuevo=array($nombren,$estadon,$portadan,$administracionn,$serviciosn,$documentacionn,$informesn);
//echo (count($valoractual));
for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql.'<br>');
if ($j>1){;
$sql=$sql00.$sqla.$sql01;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql.'<br>');
};
};
};




$tablas=array('menuadministracion');
$nombrec=array('empresa','clientes','empleados','gestores','usuario','visita');
$valora=array($administracionemp,$administracioncli,$administracionempl,$administracionges,$administracionusu,$administracionvis);
$valorn=array($administracionempn,$administracionclin,$administracionempln,$administraciongesn,$administracionusun,$administracionvisn);


for ($t=0;$t<count($tablas);$t++){;

$sql00="update ".$tablas[$t]." set ";
$sql01="where user='".$nifa."' and idempresa='".$idempresasa."'";
for ($j=0;$j<count($nombrec);$j++){;
if ($valora[$j]!=$valorn[$j]){;
$sqla=$nombrec[$j]."='".$valorn[$j]."' ";
$sql=$sql00.$sqla.$sql01;
echo ($sql.'<br>');
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrec[$j]." ");

};
};

};



$tablas=array('menuinforme');
$nombrec=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus');
$valora=array($informescua,$informesent,$informesinc,$informesmen,$informesala,$informesadi,$informesama,$informesniv,$informespro,$informesrev,$informestra,$informessin,$informesmed,$informesjor,$informesinf,$informesrut,$informesenv,$informesminp);
$valorn=array($informescuan,$informesentn,$informesincn,$informesmenn,$informesalan,$informesadin,$informesaman,$informesnivn,$informespron,$informesrevn,$informestran,$informessinn,$informesmedn,$informesjorn,$informesinfn,$informesrutn,$informesenvn,$informesminpn);


for ($t=0;$t<count($tablas);$t++){;

$sql00="update ".$tablas[$t]." set ";
$sql01="where user='".$nifa."' and idempresa='".$idempresasa."' ";
for ($j=0;$j<count($nombrec);$j++){;
if ($valora[$j]!=$valorn[$j]){;
$sqla=$nombrec[$j]."='".$valorn[$j]."' ";
$sql=$sql00.$sqla.$sql01;
echo ($sql.'<br>');
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrec[$j]." ");

};
};

};



$tablas=array('menuservicios');
$nombrec=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus');
$valora=array($servicioscua,$serviciosent,$serviciosinc,$serviciosmen,$serviciosala,$serviciosadi,$serviciosama,$serviciosniv,$serviciospro,$serviciosrev,$serviciostra,$serviciossin,$serviciosmed,$serviciosjor,$serviciosinf,$serviciosrut,$serviciosenv,$serviciosinp);
$valorn=array($servicioscuan,$serviciosentn,$serviciosincn,$serviciosmenn,$serviciosalan,$serviciosadin,$serviciosaman,$serviciosnivn,$serviciospron,$serviciosrevn,$serviciostran,$serviciossinn,$serviciosmedn,$serviciosjorn,$serviciosinfn,$serviciosrutn,$serviciosenvn,$serviciosinpn);


for ($t=0;$t<count($tablas);$t++){;

$sql00="update ".$tablas[$t]." set ";
$sql01="where user='".$nifa."' and idempresa='".$idempresasa."'";
for ($j=0;$j<count($nombrec);$j++){;
if ($valora[$j]!=$valorn[$j]){;
$sqla=$nombrec[$j]."='".$valorn[$j]."' ";
$sql=$sql00.$sqla.$sql01;
echo ($sql.'<br>');
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrec[$j]." ");

};
};

};



?>