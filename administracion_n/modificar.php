<?php 
if($subtabla=='contraseña'){;

include ('../yo.php');

			
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($datosn[1], METHOD, $key, 0, $iv);
			$pass=base64_encode($output);

if ($pass==$part){;
if ($datosn[2]==$datosn[3]){
$sql0u="update usuarios set ";
$sql1u="where user='".$gente."'";

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($datosn[2], METHOD, $key, 0, $iv);
			$pass=base64_encode($output);

$sqlau="password='".$pass."' ";
$sqlu=$sql0u.$sqlau.$sql1u;
//echo $sqlu;
$resultdu=mysqli_query ($conn,$sqlu) or die ("Invalid result ".$nombreu." ");
$_COOKIE['part']=$pass;

}else  {;
$valorintro="mal";
$textomal="Los datos introducción no son iguales";
};                              


}else{;
$valorintro="mal";
$textomal="La contraseña introducidas no es la correcta";
};

};





if($subtabla=='datos'){;
$idempresasa=$datosa[0];
//echo "<br/>".$idempresasa;
$sql0="update empresas set ";
$sql1="where idempresas='".$idempresasa."'";
//echo $sql0;
//echo $sql1;
//echo "hola - datos";


$nccn=$ent2."-".$suc2."-".$dc2."-".$cc2;
$datosn[5]=$nccn;



$nombrecampo=$nombrea;
$valoractual=$datosa;
$valornuevo=$datosn;

//echo (count($nombrecampo));
//for ($j=0;$j<count($nombrecampo);$j++){;
for ($j=2;$j<14;$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalidq result ".$nombrecampo[$j]." ");
echo ($sql.'<br>');
};
};

$j=24;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalidq result ".$nombrecampo[$j]." ");
echo ($sql.'<br>');
};


for ($j=38;$j<44;$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid resulto ".$nombrecampo[$j]." ");
echo ($sql.'<br>');
};
};

$j=46;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalidw result ".$nombrecampo[$j]." ");
echo ($sql.'<br>');
};

$j=51;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid resultw ".$nombrecampo[$j]." ");
echo ($sql.'<br>');
};

};



if($subtabla=='portada'){;
//echo "hola - portada";
$idempresasa=$ide;

// cambiar portada
$nombrec=array($nombresa,$nombrepa,$nombreha,$nombreea);
$valorac=array($datossa,$datospa,$datosha,$datosea);
$valornu=array($datossn,$datospn,$datoshn,$datosen);
$tablas=array('servicios','portadai','hoja','etiquetas');

if ($idcm==20){;
$tjy=1;
}else{;
$tjy=0;
};

for ($yh=$tjy;$yh<count($tablas);$yh++){;

$nombrecampo=$nombrec[$yh];
$valoractual=$valorac[$yh];
$valornuevo=$valornu[$yh];

$sql00="update ".$tablas[$yh]." set ";
$sql01="where idempresa='".$idempresasa."'";

for ($j=0;$j<count($nombrecampo);$j++){;
$t=$j+2;
if($valornuevo[$t]==""){;
$valornuevo[$t]=0;
};
//echo ($nombrecampo[$t].'-'.$valoractual[$t].'-'.$valornuevo[$t].'<br>');
if ($valoractual[$t]!=$valornuevo[$t]){;
$sqla=$nombrecampo[$t]."='".$valornuevo[$t]."' ";
$sql=$sql00.$sqla.$sql01;
//echo ($sql.'<br>');
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$t]." ");
};
};

};


};

if($subtabla=='imagenes'){;
//echo "hola - imagenes";
$idempresasa=$ide;

$colort2=$datosn[21];
$r2 = substr($colort2, 1, 2);
$g2 = substr($colort2, 3, 2);
$b2 = substr($colort2, 5, 2);
$rt2=hexdec($r2);
$gt2=hexdec($g2);
$bt2=hexdec($b2);
$colorn=$rt2.",".$gt2.",".$bt2;
$datosn[21]=$colorn;

$colorm2=$datosn[22];
$r2 = substr($colorm2, 1, 2);
$g2 = substr($colorm2, 3, 2);
$b2 = substr($colorm2, 5, 2);
$rt2= hexdec($r2);
$gt2= hexdec($g2);
$bt2= hexdec($b2);
$colormn=$rt2.",".$gt2.",".$bt2;
$datosn[22]=$colormn;


$sql0="update empresas set ";
$sql1="where idempresas='".$idempresasa."'";

$nombrecampo=$nombrea;
$valoractual=$datosa;
$valornuevo=$datosn;

for ($j=21;$j<23;$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo ($sql.'<br>'.$j);
$resultd=mysqli_query ($conn,$sql) or die ("Invalido result ".$nombrecampo[$j]." ");
};
};



$dat1=array('log','logp','fir','a4','hoja1','hoja2','sob','car','mov','ico');
$imagenes=array('logotipo2','logotipop2','firma2','plaa42','hoja12','hoja22','plasob2','placar2','plamov2','ico2');
$nombrecampo=array('logotipo','logotipopeq','firma','plantilla','imghoja1','imghoja2','plantillasobre','plantillacarnet','plantillamovil','ico');

for($yh=0;$yh<count($dat1);$yh++){;

$rf="";
$mimagen=basename($_FILES[$imagenes[$yh]]['name']);
$timagen=strtok(basename($_FILES[$imagenes[$yh]]['name']), '.');
$tipoimagen=strtok('.');


if ($mimagen!=null){;
$path="../img/";
$rf=$idempresasa.'-'.$dat1[$yh].'.'.$tipoimagen;
$dat2[$yh]=$rf;
//$path = $path . basename( $_FILES['nimagen']['name']);
$path = $path . $rf;
//echo $path;

if(move_uploaded_file($_FILES[$imagenes[$yh]]['tmp_name'], $path)) {;
//echo "El archivo ". basename( $_FILES['nimagen']['name']). " ha sido subido";
echo "El archivo ". $rf . " ha sido subido<br>";
$sqla=$nombrecampo[$yh]."='".$rf."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$yh]." ");
}else{;
echo "Ha ocurrido un error, trate de nuevo!<br>";
};

};

};


}


if($subtabla=='portadapg'){;
$idempresasa=$ide;

for ($y=0;$y<count($portadapag);$y++){
$idvalor=$idportadapaga[$y];
$valorant=$portadapaga[$y];
$valornue=$portadapag[$y];
$sql=null;

if ($valorant!=null){;

if($valorant!=$valornue){;
$sql="update portadapag set idpag='".$valornue."' where idempresa='".$ide."' and idportada='".$idvalor."'";
};

}else{;

if($valornue!=null){;
$sql="INSERT INTO portadapag (idempresa, idpag) VALUES (".$ide.", '".$valornue."')";
};
};
//echo $sql.'<br/>';
if ($sql!=null){
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$y." ");
};
};



};

if($subtabla=='iconos'){;

//echo 'entrada de iconos';



$imagenes=array('imgadmin0','imgadmin1','imgadmin2','imgadmin3','imgadmin4','imgadmin5','imgadmin6','imgadmin7','imgadmin8');
$nombrecampo=array('clientes','gestores','empleados','empresas','empresa','usuario','visita','proveedor','puestos');

for($yh=0;$yh<count($nombrecampo);$yh++){;

$rf="";
$mimagen=basename( $_FILES[$imagenes[$yh]]['name']);
$timagen=strtok(basename( $_FILES[$imagenes[$yh]]['name']), '.');
$tipoimagen=strtok('.');
//echo $mimagen.'<br/>';

if ($mimagen!=null){;
$path='../img/';
$rf='iconos/'.$ide.'a-'.$nombrecampo[$yh].'.'.$tipoimagen;
$datimg2[$yh]=$rf;
$path = $path . $rf;

if(move_uploaded_file($_FILES[$imagenes[$yh]]['tmp_name'], $path)) {;
echo "El archivo ". $rf . " ha sido subido<br>";
$sql="update menuadministracionimg set ".$nombrecampo[$yh]."='".$datimg2[$yh]."' where idempresa='".$ide."'";
//echo $sql;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result");
}else{;
echo "Ha ocurrido un error, trate de nuevo!<br>";
};


};

};






$imagenes=array('imgiconos0','imgiconos1','imgiconos2','imgiconos3','imgiconos4','imgiconos5','imgiconos6','imgiconos7','imgiconos8','imgiconos9','imgiconos10','imgiconos11','imgiconos12','imgiconos13','imgiconos14','imgiconos15','imgiconos16','imgiconos17','imgiconos18','imgiconos19');
$nombrecampo=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento');
for($yh=0;$yh<count($nombrecampo);$yh++){;

$rf="";
$mimagen=basename( $_FILES[$imagenes[$yh]]['name']);
$timagen=strtok(basename( $_FILES[$imagenes[$yh]]['name']), '.');
$tipoimagen=strtok('.');
//echo $mimagen.'<br/>';

if ($mimagen!=null){;
$path='../img/';
$rf='iconos/'.$ide.'-'.$nombrecampo[$yh].'.'.$tipoimagen;
$datimg2[$yh]=$rf;
$path = $path . $rf;

if(move_uploaded_file($_FILES[$imagenes[$yh]]['tmp_name'], $path)) {;
echo "El archivo ". $rf . " ha sido subido<br>";
$sql="update menuserviciosimg set ".$nombrecampo[$yh]."='".$datimg2[$yh]."' where idempresa='".$ide."'";
//echo $sql;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result");
}else{;
echo "Ha ocurrido un error, trate de nuevo!<br>";
};


};

};



};


if($subtabla=='titulos') {;

//echo 'entrada de titulos';


$encant=array($encadminant0,$encadminant1,$encadminant2,$encadminant3,$encadminant4,$encadminant5,$encadminant6,$encadminant7,$encadminant8);
$encn=array($encadmin0,$encadmin1,$encadmin2,$encadmin3,$encadmin4,$encadmin5,$encadmin6,$encadmin7,$encadmin8);
$nombrecampo=array('clientes','gestores','empleados','empresas','empresa','usuario','visita','proveedor','puestos');

for($yh=0;$yh<count($nombrecampo);$yh++){;


if($encant[$yh]!=$encn[$yh]) {;
$sql="update menuadministracionnombre set ".$nombrecampo[$yh]."='".$encn[$yh]."' where idempresa='".$ide."'";
//echo $sql; 
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result admin");
};


};






$encant=array($enciconosant0,$enciconosant1,$enciconosant2,$enciconosant3,$enciconosant4,$enciconosant5,$enciconosant6,$enciconosant7,$enciconosant8,$enciconosant9,$enciconosant10,$enciconosant11,$enciconosant12,$enciconosant13,$enciconosant14,$enciconosant15,$enciconosant16,$enciconosant17,$enciconosant18,$enciconosant19);
$encn=array($enciconos0,$enciconos1,$enciconos2,$enciconos3,$enciconos4,$enciconos5,$enciconos6,$enciconos7,$enciconos8,$enciconos9,$enciconos10,$enciconos11,$enciconos12,$enciconos13,$enciconos14,$enciconos15,$enciconos16,$enciconos17,$enciconos18,$enciconos19);
$nombrecampo=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento');

for($yh=0;$yh<count($nombrecampo);$yh++){;

if($encant[$yh]!=$encn[$yh]) {;
$sql="update menuserviciosnombre set ".$nombrecampo[$yh]."='".$encn[$yh]."' where idempresa='".$ide."'";
//echo $sql;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result servicios");
};


};





};

?>