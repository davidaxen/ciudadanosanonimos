<?php 
// numero de proyecto

$sql23="select idproyectos from proyectos order by idproyectos desc";
$result23=$conn->query($sql23);
$result23mos=$conn->query($sql23);
$row=count($result23->fetchAll());

/*$result23=mysqli_query ($conn,$sql23) or die ("Invalid result23");
$row=mysqli_num_rows($result23);*/
if ($row==0){;
$idproyectos="1";
}else{;
$resultado23=$result23mos->fetch();
//$resultado23=mysqli_fetch_array($result23);
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
VALUES (:idproyectos,:nombre2,:web2,
:dat20,:dat21,:dat22,
:cfondo,:carriba,:clateral,:ccentral,
:dprueba,
:nomcla,:numadm,:numtrab,:numcli,:tipoprecio,'1',
:datoshn0,:datoshn1,:datoshn2,:datoshn3,:datoshn4,:datoshn5,:datoshn6,:datoshn7,
:datoshn8,:datoshn9,:datoshn10,:datoshn11,:datoshn12,:datoshn13)";
//echo $sql1.'<br/>';
$result1=$conn->prepare($sql1);
$result1->bindParam(':idproyectos', $idproyectos);
$result1->bindParam(':nombre2', $nombre2);
$result1->bindParam(':web2', $web2);

$result1->bindParam(':dat20', $dat2[0]);
$result1->bindParam(':dat21', $dat2[1]);
$result1->bindParam(':dat22', $dat2[2]);

$result1->bindParam(':cfondo', $cfondo);
$result1->bindParam(':carriba', $carriba);
$result1->bindParam(':clateral', $clateral);
$result1->bindParam(':ccentral', $ccentral);

$result1->bindParam(':dprueba', $dprueba);

$result1->bindParam(':nomcla', $nomcla);
$result1->bindParam(':numadm', $numadm);
$result1->bindParam(':numtrab', $numtrab);
$result1->bindParam(':numcli', $numcli);
$result1->bindParam(':tipoprecio', $tipoprecio);

$result1->bindParam(':datoshn0', $datoshn[0]);
$result1->bindParam(':datoshn1', $datoshn[1]);
$result1->bindParam(':datoshn2', $datoshn[2]);
$result1->bindParam(':datoshn3', $datoshn[3]);
$result1->bindParam(':datoshn4', $datoshn[4]);
$result1->bindParam(':datoshn5', $datoshn[5]);
$result1->bindParam(':datoshn6', $datoshn[6]);
$result1->bindParam(':datoshn7', $datoshn[7]);

$result1->bindParam(':datoshn8', $datoshn[8]);
$result1->bindParam(':datoshn9', $datoshn[9]);
$result1->bindParam(':datoshn10', $datoshn[10]);
$result1->bindParam(':datoshn11', $datoshn[11]);
$result1->bindParam(':datoshn12', $datoshn[12]);
$result1->bindParam(':datoshn13', $datoshn[13]);
$result1->execute();

//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result proyectos");


//pagina 
$sql0="update proyectos set ";
$sql1="where idproyectos=:idproyectos";
$sqla="pagina=\"".$pagweb."\" ";
$sql=$sql0.$sqla.$sql1;
//echo $sql.'<br/>';
$resultd=$conn->prepare($sql);
$resultd->bindParam(':idproyectos', $idproyectos);
$resultd->execute();

//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result pagweb ");


// seleccion opciones administrar
$sql2 = "INSERT INTO proyectosadministrar (idproyectos,
clientes,gestores,empleados,empresas,empresa,
usuario,visita,proveedor,puestos,vecinos
) 
VALUES (:idproyectos,
:datosan0,:datosan1,:datosan2,:datosan3,:datosan4,
:datosan5,:datosan6,:datosan7,:datosan8,:datosan9)";
//echo $sql2.'<br/>';
$result2=$conn->prepare($sql2);
$result2->bindParam(':idproyectos', $idproyectos);

$result2->bindParam(':datosan0', $datosan[0]);
$result2->bindParam(':datosan1', $datosan[1]);
$result2->bindParam(':datosan2', $datosan[2]);
$result2->bindParam(':datosan3', $datosan[3]);
$result2->bindParam(':datosan4', $datosan[4]);

$result2->bindParam(':datosan5', $datosan[5]);
$result2->bindParam(':datosan6', $datosan[6]);
$result2->bindParam(':datosan7', $datosan[7]);
$result2->bindParam(':datosan8', $datosan[8]);
$result2->bindParam(':datosan9', $datosan[9]);

$result2->execute();

//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result proyectosadministrar");






//titulo opciones administrar

$sql2 = "INSERT INTO proyectosnombreadm (idproyectos,
clientes,gestores,empleados,empresas,empresa,
usuario,visita,proveedor,puestos,vecinos
) 
VALUES (:idproyectos,
:tituloan0,:tituloan1,:tituloan2,:tituloan3,:tituloan4,
:tituloan5,:tituloan6,:tituloan7,:tituloan8,:tituloan9)";
//echo $sql2.'<br/>';
$result2=$conn->prepare($sql2);
$result2->bindParam(':idproyectos', $idproyectos);

$result2->bindParam(':tituloan0', $titulon[0]);
$result2->bindParam(':tituloan1', $titulon[1]);
$result2->bindParam(':tituloan2', $titulon[2]);
$result2->bindParam(':tituloan3', $titulon[3]);
$result2->bindParam(':tituloan4', $titulon[4]);

$result2->bindParam(':tituloan5', $titulon[5]);
$result2->bindParam(':tituloan6', $titulon[6]);
$result2->bindParam(':tituloan7', $titulon[7]);
$result2->bindParam(':tituloan8', $titulon[8]);
$result2->bindParam(':tituloan9', $titulon[9]);

$result2->execute();

//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result iproyecto 2");


//titulo opciones servicios

$sql2 = "INSERT INTO proyectosnombre (idproyectos,
cuadrante,entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,
productos,revision,trabajo,siniestro,control,mediciones
) 
VALUES (:idproyectos,
:titulon0,:titulon1,:titulon2,:titulon3,:titulon4,:titulon5,:titulon6,:titulon7,
:titulon8,:titulon9,:titulon10,:titulon11,:titulon12,:titulon13)";
//echo $sql2.'<br/>';

$result2=$conn->prepare($sql2);
$result2->bindParam(':idproyectos', $idproyectos);

$result2->bindParam(':titulon0', $titulon[0]);
$result2->bindParam(':titulon1', $titulon[1]);
$result2->bindParam(':titulon2', $titulon[2]);
$result2->bindParam(':titulon3', $titulon[3]);
$result2->bindParam(':titulon4', $titulon[4]);
$result2->bindParam(':titulon5', $titulon[5]);
$result2->bindParam(':titulon6', $titulon[6]);
$result2->bindParam(':titulon7', $titulon[7]);

$result2->bindParam(':datosan8', $titulon[8]);
$result2->bindParam(':datosan9', $titulon[9]);
$result2->bindParam(':titulon10', $titulon[10]);
$result2->bindParam(':titulon11', $titulon[11]);
$result2->bindParam(':titulon12', $titulon[12]);
$result2->bindParam(':titulon13', $titulon[13]);

$result2->execute();

//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result iproyecto 2");



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
VALUES (:idproyectos,
:datimg20,:datimg21,:datimg22,:datimg23,:datimg24,:datimg25,:datimg26,:datimg27,
:datimg28,:datimg29)";
//echo $sql3.'<br/>';

$result3=$conn->prepare($sql3);
$result3->bindParam(':idproyectos', $idproyectos);

$result3->bindParam(':datimg20', $datimg2[0]);
$result3->bindParam(':datimg21', $datimg2[1]);
$result3->bindParam(':datimg22', $datimg2[2]);
$result3->bindParam(':datimg23', $datimg2[3]);
$result3->bindParam(':datimg24', $datimg2[4]);
$result3->bindParam(':datimg25', $datimg2[5]);
$result3->bindParam(':datimg26', $datimg2[6]);
$result3->bindParam(':datimg27', $datimg2[7]);

$result3->bindParam(':datimg28', $datimg2[8]);
$result3->bindParam(':datimg29', $datimg2[9]);

$result3->execute();

//$result3=mysqli_query ($conn,$sql3) or die ("Invalid result proyectosimgadm");




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
VALUES (:idproyectos,
:datimg20,:datimg21,:datimg22,:datimg23,:datimg24,:datimg25,:datimg26,:datimg27,
:datimg28,:datimg29,:datimg210,:datimg211,:datimg212,:datimg213)";
//echo $sql3.'<br/>';

$result3=$conn->prepare($sql3);
$result3->bindParam(':idproyectos', $idproyectos);

$result3->bindParam(':datimg20', $datimg2[0]);
$result3->bindParam(':datimg21', $datimg2[1]);
$result3->bindParam(':datimg22', $datimg2[2]);
$result3->bindParam(':datimg23', $datimg2[3]);
$result3->bindParam(':datimg24', $datimg2[4]);
$result3->bindParam(':datimg25', $datimg2[5]);
$result3->bindParam(':datimg26', $datimg2[6]);
$result3->bindParam(':datimg27', $datimg2[7]);

$result3->bindParam(':datimg28', $datimg2[8]);
$result3->bindParam(':datimg29', $datimg2[9]);
$result3->bindParam(':datimg210', $datimg2[10]);
$result3->bindParam(':datimg211', $datimg2[11]);
$result3->bindParam(':datimg212', $datimg2[12]);
$result3->bindParam(':datimg213', $datimg2[13]);

$result3->execute();

//$result3=mysqli_query ($conn,$sql3) or die ("Invalid result proyectosimg");

//paquete por opciones

if ($tipoprecio==2){;

$sql31 = "INSERT INTO precioopc (idpr,nombre,precio,caracprecio,estado,
cuadrante,entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,
productos,revision,trabajo,siniestro,control,mediciones
) 
VALUES (:idproyectos,
:nobasico,:pobasico,:nomcla','1',
:obasico0,:obasico1,:obasico2,:obasico3,:obasico4,:obasico5,:obasico6,:obasico7,
:obasico8,:obasico9,:obasico10,:obasico11,:obasico12,:obasico13)";
//echo $sql3.'<br/>';

$result3=$conn->prepare($sql31);
$result3->bindParam(':idproyectos', $idproyectos);

$result3->bindParam(':nobasico', $nobasico);
$result3->bindParam(':pobasico', $pobasico);
$result3->bindParam(':nomcla', $nomcla);

$result3->bindParam(':obasico0', $obasico[0]);
$result3->bindParam(':obasico1', $obasico[1]);
$result3->bindParam(':obasico2', $obasico[2]);
$result3->bindParam(':obasico3', $obasico[3]);
$result3->bindParam(':obasico4', $obasico[4]);
$result3->bindParam(':obasico5', $obasico[5]);
$result3->bindParam(':obasico6', $obasico[6]);
$result3->bindParam(':obasico7', $obasico[7]);

$result3->bindParam(':obasico8', $obasico[8]);
$result3->bindParam(':obasico9', $obasico[9]);
$result3->bindParam(':obasico10', $obasico[10]);
$result3->bindParam(':obasico11', $obasico[11]);
$result3->bindParam(':obasico12', $obasico[12]);
$result3->bindParam(':obasico13', $obasico[13]);

$result3->execute();

//$result31=mysqli_query ($conn,$sql31) or die ("Invalid result precioopc basico");


$sql32 = "INSERT INTO precioopc (idpr,nombre,precio,caracprecio,estado,
cuadrante,entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,
productos,revision,trabajo,siniestro,control,mediciones
) 
VALUES (:idproyectos,
:noavanzado,:poavanzado,:nomcla,'1',
:oavanzado0,:oavanzado1,:oavanzado2,:oavanzado3,:oavanzado4,:oavanzado5,:oavanzado6,:oavanzado7,
:oavanzado8,:oavanzado9,:oavanzado10,:oavanzado11,:oavanzado12,:oavanzado13)";
//echo $sql3.'<br/>';

$result3=$conn->prepare($sql32);
$result3->bindParam(':idproyectos', $idproyectos);

$result3->bindParam(':noavanzado', $noavanzado);
$result3->bindParam(':poavanzado', $poavanzado);
$result3->bindParam(':nomcla', $nomcla);

$result3->bindParam(':oavanzado0', $oavanzado[0]);
$result3->bindParam(':oavanzado1', $oavanzado[1]);
$result3->bindParam(':oavanzado2', $oavanzado[2]);
$result3->bindParam(':oavanzado3', $oavanzado[3]);
$result3->bindParam(':oavanzado4', $oavanzado[4]);
$result3->bindParam(':oavanzado5', $oavanzado[5]);
$result3->bindParam(':oavanzado6', $oavanzado[6]);
$result3->bindParam(':oavanzado7', $oavanzado[7]);

$result3->bindParam(':oavanzado8', $oavanzado[8]);
$result3->bindParam(':oavanzado9', $oavanzado[9]);
$result3->bindParam(':oavanzado10', $oavanzado[10]);
$result3->bindParam(':oavanzado11', $oavanzado[11]);
$result3->bindParam(':oavanzado12', $oavanzado[12]);
$result3->bindParam(':oavanzado13', $oavanzado[13]);

$result3->execute();

//$result32=mysqli_query ($conn,$sql32) or die ("Invalid result precioopc avanzado");


};


//precio de las tareas del proyecto

$sql2 = "INSERT INTO precioproyectos (idproyectos,pbasico,
cuadrante,entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,
productos,revision,trabajo,siniestro,control,mediciones
) 
VALUES (:idproyectos,:psbasico,
:precio0,:precio1,:precio2,:precio3,:precio4,:precio5,:precio6,:precio7,
:precio8,:precio9,:precio10,:precio11,:precio12,:precio13)";
//echo $sql2.'<br/>';

$result2=$conn->prepare($sql2);
$result2->bindParam(':idproyectos', $idproyectos);
$result2->bindParam(':psbasico', $psbasico);

$result2->bindParam(':precio0', $precio[0]);
$result2->bindParam(':precio1', $precio[1]);
$result2->bindParam(':precio2', $precio[2]);
$result2->bindParam(':precio3', $precio[3]);
$result2->bindParam(':precio4', $precio[4]);
$result2->bindParam(':precio5', $precio[5]);
$result2->bindParam(':precio6', $precio[6]);
$result2->bindParam(':precio7', $precio[7]);

$result2->bindParam(':precio8', $precio[8]);
$result2->bindParam(':precio9', $precio[9]);
$result2->bindParam(':precio10', $precio[10]);
$result2->bindParam(':precio11', $precio[11]);
$result2->bindParam(':precio12', $precio[12]);
$result2->bindParam(':precio13', $precio[13]);

$result2->execute();

//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result iproyecto 2");


for($thv=0;$thv<count($vnumtrab);$thv++){;
$nomtrab="De ".$vnumtrab[$thv]." Trabajadores";
$sql34 = "INSERT INTO precioempleados (idproyectos,estado,nombregrupo,numempleados,preciogrupo) 
VALUES (:idproyectos,'1',:nomtrab,:vnumtrab,:pnumtrab)";
//echo $sql3.'<br/>';
$result34=$conn->prepare($sql34);
$result34->bindParam(':idproyectos', $idproyectos);
$result34->bindParam(':nomtrab', $nomtrab);
$result34->bindParam(':vnumtrab', $vnumtrab[$thv]);
$result34->bindParam(':pnumtrab', $pnumtrab[$thv]);
$result34->execute();

//$result34=mysqli_query ($conn,$sql34) or die ("Invalid result precioopc basico");
};

for($thv=0;$thv<count($vnumcli);$thv++){;
$nomcli="De ".$vnumcli[$thv]." Clientes/Puesto de Trabajo";
$sql34 = "INSERT INTO preciocliente (idproyectos,estado,nombregrupo,numcliente,preciogrupo) 
VALUES (:idproyectos,'1',:nomcli,:vnumcli,:pnumcli)";
//echo $sql3.'<br/>';
$result34=$conn->prepare($sql34);
$result34->bindParam(':idproyectos', $idproyectos);
$result34->bindParam(':nomcli', $nomcli);
$result34->bindParam(':vnumcli', $vnumcli[$thv]);
$result34->bindParam(':pnumcli', $pnumcli[$thv]);
$result34->execute();

//$result34=mysqli_query ($conn,$sql34) or die ("Invalid result precioopc basico");
};

for($thv=0;$thv<count($vpersonalizacion);$thv++){;
$nomvar="plantilla".$thv;
$sql34 = "INSERT INTO preciopersonalizacion (idproyectos,estado,nombregrupo,nombrevariable,preciogrupo) 
VALUES (:idproyectos,'1',:vpersonalizacion,:nomvar,:ppersonalizacion)";
//echo $sql3.'<br/>';
$result34=$conn->prepare($sql34);
$result34->bindParam(':idproyectos', $idproyectos);
$result34->bindParam(':vpersonalizacion', $vpersonalizacion[$thv]);
$result34->bindParam(':nomvar', $nomvar);
$result34->bindParam(':ppersonalizacion', $ppersonalizacion[$thv]);
$result34->execute();

//$result34=mysqli_query ($conn,$sql34) or die ("Invalid result precioopc basico");
};


?>