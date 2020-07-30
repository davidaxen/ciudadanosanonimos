<?php 
// numero de proyecto

$sql23="select idproyectos from proyectos order by idproyectos desc";
$result23=mysqli_query ($conn,$sql23) or die ("Invalid result23");
$row=mysqli_num_rows($result23);
if ($row==0){;
$idproyectos="1";
}else{;
$resultado23=mysqli_fetch_array($result23);
$idpro=$resultado23['idproyectos'];
$idproyectos=$idpro+1;
};


// imagenes del proyecto.

$pathi=array('../img/','../img/','../img/');
$dat1=array('log','paypal','boton');
$imagenes=array('logotipo','logopaypal','botondescarga');
$nombrecampo=array('logo','logpaypal','boton');

for($yh=0;$yh<count($dat1);$yh++){;

$rf="";
$mimagen=basename( $_FILES[$imagenes[$yh]]['name']);
$timagen=strtok(basename( $_FILES[$imagenes[$yh]]['name']), '.');
$tipoimagen=strtok('.');


if ($mimagen!=null){;
$path=$pathi[$yh];
$rf='iconos/p-'.$idproyectos.'-'.$dat1[$yh].'.'.$tipoimagen;
$dat2[$yh]=$rf;
//$path = $path . basename( $_FILES['nimagen']['name']);
$path = $path . $rf;
//echo $path;

if(move_uploaded_file($_FILES[$imagenes[$yh]]['tmp_name'], $path)) {;
//echo "El archivo ". basename( $_FILES['nimagen']['name']). " ha sido subido";
echo "El archivo ". $rf . " ha sido subido<br>";
//$sqla=$nombrecampo[$yh]."='".$rf."' ";
//$sql=$sql00.$sqla.$sql01;
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$yh]." ");
}else{;
echo "Ha ocurrido un error, trate de nuevo!<br>";
};

}else{;
$dat2[$yh]="blanco-peq.png";
};

};


// alta de proyecto

$sql1 = "INSERT INTO proyectos (idproyectos,nombre,web,
logo,logopaypal,botondescarga,
colorfondo,colorarriba,colorlateral,colorcentral,
diasprueba,
caracprecio,numadm,numtrab,numcli,tipoprecios,estado,
cuadrante,entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,
productos,revision,trabajo,siniestro,control,mediciones
) 
VALUES ('$idproyectos','$nombre2','$web2',
'$dat2[0]','$dat2[1]','$dat2[2]',
'$cfondo','$carriba','$clateral','$ccentral',
'$dprueba',
'$nomcla','$numadm','$numtrab','$numcli','$tipoprecio','1',
'$datoshn[0]','$datoshn[1]','$datoshn[2]','$datoshn[3]','$datoshn[4]','$datoshn[5]','$datoshn[6]','$datoshn[7]',
'$datoshn[8]','$datoshn[9]','$datoshn[10]','$datoshn[11]','$datoshn[12]','$datoshn[13]')";
//echo $sql1.'<br/>';
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result proyectos");


//pagina 
$sql0="update proyectos set ";
$sql1="where idproyectos='".$idproyectos."'";
$sqla="pagina=\"".$pagweb."\" ";
$sql=$sql0.$sqla.$sql1;
//echo $sql.'<br/>';
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result pagweb ");


// seleccion opciones administrar
$sql2 = "INSERT INTO proyectosadministrar (idproyectos,
clientes,gestores,empleados,empresas,empresa,
usuario,visita,proveedor,puestos,vecinos
) 
VALUES ('$idproyectos',
'$datosan[0]','$datosan[1]','$datosan[2]','$datosan[3]','$datosan[4]',
'$datosan[5]','$datosan[6]','$datosan[7]','$datosan[8]','$datosan[9]')";
//echo $sql2.'<br/>';
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result proyectosadministrar");






//titulo opciones administrar

$sql2 = "INSERT INTO proyectosnombreadm (idproyectos,
clientes,gestores,empleados,empresas,empresa,
usuario,visita,proveedor,puestos,vecinos
) 
VALUES ('$idproyectos',
'$tituloan[0]','$tituloan[1]','$tituloan[2]','$tituloan[3]','$tituloan[4]',
'$tituloan[5]','$tituloan[6]','$tituloan[7]','$tituloan[8]','$tituloan[9]')";
//echo $sql2.'<br/>';
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result iproyecto 2");


//titulo opciones servicios

$sql2 = "INSERT INTO proyectosnombre (idproyectos,
cuadrante,entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,
productos,revision,trabajo,siniestro,control,mediciones
) 
VALUES ('$idproyectos',
'$titulon[0]','$titulon[1]','$titulon[2]','$titulon[3]','$titulon[4]','$titulon[5]','$titulon[6]','$titulon[7]',
'$titulon[8]','$titulon[9]','$titulon[10]','$titulon[11]','$titulon[12]','$titulon[13]')";
//echo $sql2.'<br/>';
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result iproyecto 2");



//iconos de las tareas del proyecto

//$pathi=array('images/','../img/');
//$dat1=array('log','log');
$imagenes=array('imgiconosa0','imgiconosa1','imgiconosa2','imgiconosa3','imgiconosa4','imgiconosa5','imgiconosa6','imgiconosa7','imgiconosa8','imgiconos9a');
$nombrecampo=array('clientes','gestores','empleados','empresas','empresa','usuario','visita','proveedor','puestos','vecinos');

for($yh=0;$yh<count($nombrecampo);$yh++){;

$rf="";
$mimagen=basename( $_FILES[$imagenes[$yh]]['name']);
$timagen=strtok(basename( $_FILES[$imagenes[$yh]]['name']), '.');
$tipoimagen=strtok('.');


if ($mimagen!=null){;
$path='../img/';
$rf='iconos/'.$idproyectos.'-'.$nombrecampo[$yh].'.'.$tipoimagen;
$datimg2[$yh]=$rf;
//$path = $path . basename( $_FILES['nimagen']['name']);
$path = $path . $rf;
//echo $path;

if(move_uploaded_file($_FILES[$imagenes[$yh]]['tmp_name'], $path)) {;
//echo "El archivo ". basename( $_FILES['nimagen']['name']). " ha sido subido";
echo "El archivo ". $rf . " ha sido subido<br>";
//$sqla=$nombrecampo[$yh]."='".$rf."' ";
//$sql=$sql00.$sqla.$sql01;
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$yh]." ");
}else{;
echo "Ha ocurrido un error, trate de nuevo!<br>";
};

}else{;
$datimg2[$yh]="blanco-peq.png";
};

};


$sql3 = "INSERT INTO proyectosimgadm (idproyectos,
clientes,gestores,empleados,empresas,empresa,
usuario,visita,proveedor,puestos,vecinos
) 
VALUES ('$idproyectos',
'$datimg2[0]','$datimg2[1]','$datimg2[2]','$datimg2[3]','$datimg2[4]','$datimg2[5]','$datimg2[6]','$datimg2[7]',
'$datimg2[8]','$datimg2[9]')";
//echo $sql3.'<br/>';
$result3=mysqli_query ($conn,$sql3) or die ("Invalid result proyectosimgadm");




//iconos de servicios

$imagenes=array('imgiconos0','imgiconos1','imgiconos2','imgiconos3','imgiconos4','imgiconos5','imgiconos6','imgiconos7','imgiconos8','imgiconos9','imgiconos10','imgiconos11','imgiconos12','imgiconos13');
$nombrecampo=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus');

for($yh=0;$yh<count($nombrecampo);$yh++){;

$rf="";
$mimagen=basename( $_FILES[$imagenes[$yh]]['name']);
$timagen=strtok(basename( $_FILES[$imagenes[$yh]]['name']), '.');
$tipoimagen=strtok('.');


if ($mimagen!=null){;
$path='../img/';
$rf='iconos/'.$idproyectos.'-'.$nombrecampo[$yh].'.'.$tipoimagen;
$datimg2[$yh]=$rf;
//$path = $path . basename( $_FILES['nimagen']['name']);
$path = $path . $rf;
//echo $path;

if(move_uploaded_file($_FILES[$imagenes[$yh]]['tmp_name'], $path)) {;
//echo "El archivo ". basename( $_FILES['nimagen']['name']). " ha sido subido";
echo "El archivo ". $rf . " ha sido subido<br>";
//$sqla=$nombrecampo[$yh]."='".$rf."' ";
//$sql=$sql00.$sqla.$sql01;
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$yh]." ");
}else{;
echo "Ha ocurrido un error, trate de nuevo!<br>";
};

}else{;
$datimg2[$yh]="blanco-peq.png";
};

};


$sql3 = "INSERT INTO proyectosimg (idproyectos,
cuadrante,entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,
productos,revision,trabajo,siniestro,control,mediciones
) 
VALUES ('$idproyectos',
'$datimg2[0]','$datimg2[1]','$datimg2[2]','$datimg2[3]','$datimg2[4]','$datimg2[5]','$datimg2[6]','$datimg2[7]',
'$datimg2[8]','$datimg2[9]','$datimg2[10]','$datimg2[11]','$datimg2[12]','$datimg2[13]')";
//echo $sql3.'<br/>';
$result3=mysqli_query ($conn,$sql3) or die ("Invalid result proyectosimg");








//paquete por opciones

if ($tipoprecio==2){;

$sql31 = "INSERT INTO precioopc (idpr,nombre,precio,caracprecio,estado,
cuadrante,entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,
productos,revision,trabajo,siniestro,control,mediciones
) 
VALUES ('$idproyectos',
'$nobasico','$pobasico','$nomcla','1',
'$obasico[0]','$obasico[1]','$obasico[2]','$obasico[3]','$obasico[4]','$obasico[5]','$obasico[6]','$obasico[7]',
'$obasico[8]','$obasico[9]','$obasico[10]','$obasico[11]','$obasico[12]','$obasico[13]')";
//echo $sql3.'<br/>';
$result31=mysqli_query ($conn,$sql31) or die ("Invalid result precioopc basico");


$sql32 = "INSERT INTO precioopc (idpr,nombre,precio,caracprecio,estado,
cuadrante,entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,
productos,revision,trabajo,siniestro,control,mediciones
) 
VALUES ('$idproyectos',
'$noavanzado','$poavanzado','$nomcla','1',
'$oavanzado[0]','$oavanzado[1]','$oavanzado[2]','$oavanzado[3]','$oavanzado[4]','$oavanzado[5]','$oavanzado[6]','$oavanzado[7]',
'$oavanzado[8]','$oavanzado[9]','$oavanzado[10]','$oavanzado[11]','$oavanzado[12]','$oavanzado[13]')";
//echo $sql3.'<br/>';
$result32=mysqli_query ($conn,$sql32) or die ("Invalid result precioopc avanzado");


};


//precio de las tareas del proyecto

$sql2 = "INSERT INTO precioproyectos (idproyectos,pbasico,
cuadrante,entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,
productos,revision,trabajo,siniestro,control,mediciones
) 
VALUES ('$idproyectos','$psbasico',
'$precio[0]','$precio[1]','$precio[2]','$precio[3]','$precio[4]','$precio[5]','$precio[6]','$precio[7]',
'$precio[8]','$precio[9]','$precio[10]','$precio[11]','$precio[12]','$precio[13]')";
//echo $sql2.'<br/>';
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result iproyecto 2");


for($thv=0;$thv<count($vnumtrab);$thv++){;
$nomtrab="De ".$vnumtrab[$thv]." Trabajadores";
$sql34 = "INSERT INTO precioempleados (idproyectos,estado,nombregrupo,numempleados,preciogrupo) 
VALUES ('$idproyectos','1','$nomtrab','$vnumtrab[$thv]','$pnumtrab[$thv]')";
//echo $sql3.'<br/>';
$result34=mysqli_query ($conn,$sql34) or die ("Invalid result precioopc basico");
};

for($thv=0;$thv<count($vnumcli);$thv++){;
$nomcli="De ".$vnumcli[$thv]." Clientes/Puesto de Trabajo";
$sql34 = "INSERT INTO preciocliente (idproyectos,estado,nombregrupo,numcliente,preciogrupo) 
VALUES ('$idproyectos','1','$nomcli','$vnumcli[$thv]','$pnumcli[$thv]')";
//echo $sql3.'<br/>';
$result34=mysqli_query ($conn,$sql34) or die ("Invalid result precioopc basico");
};

for($thv=0;$thv<count($vpersonalizacion);$thv++){;
$nomvar="plantilla".$thv;
$sql34 = "INSERT INTO preciopersonalizacion (idproyectos,estado,nombregrupo,nombrevariable,preciogrupo) 
VALUES ('$idproyectos','1','$vpersonalizacion[$thv]','$nomvar','$ppersonalizacion[$thv]')";
//echo $sql3.'<br/>';
$result34=mysqli_query ($conn,$sql34) or die ("Invalid result precioopc basico");
};


?>