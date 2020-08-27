<?php 
//echo 'entramos en modificar proyectos <br/>';

$sql0="update proyectos set ";
$sql0ni="update proyectosimgadm set ";
$sql0na="update proyectosnombreadm set ";
$sql0i="update proyectosimg set ";
$sql0n="update proyectosnombre set ";
$sql0p="update precioproyectos set ";
$sql0a="update proyectosadministrar set ";
	


$sql1="where idproyectos='".$idproyectos."'";


$nombrecampo=$nombrea;
$valoractual=$datosa;
$valornuevo=$datosn;

for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."=\"".$valornuevo[$j]."\" ";
$sql=$sql0.$sqla.$sql1;
//echo $sql.'<br/>';
$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result $nombrecampo[$j] ");

};
};



//opciones de herramientas
$nombrecampo=$nombreha;
$valoractual=$datosha;
$valornuevo=$datoshn;


for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
if($valornuevo[$j]==null){;
$valornuevo[$j]=0;
};
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result");
//echo ($sql.'<br>');
};
};


//opciones de administrar
$nombrecampo=$nombreaa;
$valoractual=$datosaa;
$valornuevo=$datosan;


for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
if($valornuevo[$j]==null){;
$valornuevo[$j]=0;
};
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0a.$sqla.$sql1;
//echo ($sql.'<br>');
$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result");

};
};




// imagenes de logotipo -------------------------------------------------------


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
$path = $path . $rf;

if(move_uploaded_file($_FILES[$imagenes[$yh]]['tmp_name'], $path)) {;
echo "El archivo ". $rf . " ha sido subido<br>";
$sql=$sql0.$nombrecampo[$yh]."='".$dat2[$yh]."' ".$sql1;
echo $sql;
$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result");
}else{;
echo "Ha ocurrido un error, trate de nuevo!<br>";
};

};

};








// imagenes de los iconos herramientas ----------------------------------------


$imagenes=array('imgiconos0','imgiconos1','imgiconos2','imgiconos3','imgiconos4','imgiconos5','imgiconos6','imgiconos7','imgiconos8','imgiconos9','imgiconos10','imgiconos11','imgiconos12','imgiconos13');
$nombrecampo=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus');

for($yh=0;$yh<count($nombrecampo);$yh++){;

$rf="";
$mimagen=basename( $_FILES[$imagenes[$yh]]['name']);
$timagen=strtok(basename( $_FILES[$imagenes[$yh]]['name']), '.');
$tipoimagen=strtok('.');


if ($mimagen!=null){;
$path='../img/';
$rf='iconos/'.$idproyectos.'-p-'.$nombrecampo[$yh].'.'.$tipoimagen;
$datimg2[$yh]=$rf;
$path = $path . $rf;

if(move_uploaded_file($_FILES[$imagenes[$yh]]['tmp_name'], $path)) {;
echo "El archivo ". $rf . " ha sido subido<br>";
$sql=$sql0i.$nombrecampo[$yh]."='".$datimg2[$yh]."' ".$sql1;
//echo $sql;
$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result");
}else{;
echo "Ha ocurrido un error, trate de nuevo!<br>";
};


};

};


// imagenes de los iconos administrar ----------------------------------------


$imagenes=array('imgiconosa0','imgiconosa1','imgiconosa2','imgiconosa3','imgiconosa4','imgiconosa5','imgiconosa6','imgiconosa7','imgiconosa8','imgiconosa9');
$nombrecampo=array('clientes','gestores','empleados','empresas','empresa','usuario','visita','proveedor','puestos','vecinos');

for($yh=0;$yh<count($nombrecampo);$yh++){;

$rf="";
$mimagen=basename( $_FILES[$imagenes[$yh]]['name']);
$timagen=strtok(basename( $_FILES[$imagenes[$yh]]['name']), '.');
$tipoimagen=strtok('.');


if ($mimagen!=null){;
$path='../img/';
$rf='iconos/'.$idproyectos.'-p-'.$nombrecampo[$yh].'.'.$tipoimagen;
$datimg2[$yh]=$rf;
$path = $path . $rf;

if(move_uploaded_file($_FILES[$imagenes[$yh]]['tmp_name'], $path)) {;
echo "El archivo ". $rf . " ha sido subido<br>";
$sql=$sql0ni.$nombrecampo[$yh]."='".$datimg2[$yh]."' ".$sql1;
//echo $sql;
$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result");
}else{;
echo "Ha ocurrido un error, trate de nuevo!<br>";
};


};

};



// titulo herramientas
$nombrecampo=$nombreta;
$valoractual=$tituloa;
$valornuevo=$titulon;


for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0n.$sqla.$sql1;
$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result");
//echo ($sql.'<br>');
};
};


// titulo admnistrar
$nombrecampo=$nombretaa;
$valoractual=$tituloaa;
$valornuevo=$tituloan;


for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0na.$sqla.$sql1;
echo ($sql.'<br>');
$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result");
};
};


// precios

$nombrecampo=$nombreta;
$valoractual=$precioa;
$valornuevo=$precion;

for ($j=0;$j<count($nombrecampo);$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0p.$sqla.$sql1;
$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result");
//echo ($sql.'<br>');
};
};






?>