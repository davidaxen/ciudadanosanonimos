<?php 
if ($nif2!=null){;

$usuario2=$nif2;
$sql24="select * from usuarios where user='".$usuario2."' and password='".$clave2."'";
//echo $sql24;
$result24=mysqli_query ($conn,$sql24) or die ("Invalid result24");
$row24=mysqli_num_rows($result24);

if ($row24==0){;
$sql23="select idempresas from empresas order by idempresas desc";
$result23=mysqli_query ($conn,$sql23) or die ("Invalid result23");
$row=mysqli_num_rows($result23);
if ($row==0){;
$idempresas="1";
}else{;
$resultado23=mysqli_fetch_array($result23);
$idemp=$resultado23['idempresas'];
$idempresas=$idemp+1;
};


$dat1=array('log','logp','fir','a4','hoja1','hoja2','sob','car','mov','ico');
$imagenes=array('logotipo2','logotipop2','firma2','plaa42','hoja12','hoja22','plasob2','placar2','plamov2','ico2');
$nombrecampo=array('logotipo','logotipopeq','firma','plantilla','imghoja1','imghoja2','plantillasobre','plantillacarnet','plantillamovil','ico');

//$sql00="update empresas set ";
//$sql01="where user='".$nif2."' and idempresa='".$idempresas."'";

for($yh=0;$yh<count($dat1);$yh++){;

$rf="";
$mimagen=basename( $_FILES[$imagenes[$yh]]['name']);
$timagen=strtok(basename( $_FILES[$imagenes[$yh]]['name']), '.');
$tipoimagen=strtok('.');


if ($mimagen!=null){;
$path="../img/";
$rf=$idempresas.'-'.$dat1[$yh].'.'.$tipoimagen;
$dat2[$yh]=$rf;
//$path = $path . basename( $_FILES['nimagen']['name']);
$path = $path . $rf;
echo $path;

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
if($yh==1){;
$dat2[$yh]="blanco-peq.png";
};
};

};


$ncc2=$ent2."-".$suc2."-".$dc2."-".$cc2;

$r2 = substr($colort2, 1, 2);
$g2 = substr($colort2, 3, 2);
$b2 = substr($colort2, 5, 2);
$rt2=hexdec($r2);
$gt2=hexdec($g2);
$bt2=hexdec($b2);
$colortt2=$rt2.",".$gt2.",".$bt2;

$r2 = substr($colorm2, 1, 2);
$g2 = substr($colorm2, 3, 2);
$b2 = substr($colorm2, 5, 2);
$rt2= hexdec($r2);
$gt2= hexdec($g2);
$bt2= hexdec($b2);
$colormt2=$rt2.",".$gt2.",".$bt2;

if($idpr==null){;
$idpr=1;
}

if($estadot==null){;
$estadot=1;
}



$falta=date("Y-m-d");
$mesalta=date("n");
$yearalta=date("Y");
$diaalta=date("d");


$sql1 = "INSERT INTO empresas (idempresas,nombre,nif,domicilio,cp,ncc,representante,nifrepresentante,telefonof,telefonom,fax,pais,provincia,localidad,
logotipo,logotipopeq,firma,plantilla,imghoja1,imghoja2,plantillasobre,plantillacarnet,plantillamovil,ico,
color,colorm,estado,email,emailadmin,web,licadm,liccli,lictra,frase,iddistribuidor,idproyectos,
falta,mesalta,yearalta,diaalta,
colorarriba,colorlateral,colorcentral) 
VALUES ('$idempresas','$nombre2','$nif2','$domicilio2','$cp2','$ncc2','$nombrer','$nifr','$tfijo2','$tmovil2','$tfax2','$pais2','$provincia2','$localidad2',
'$dat2[0]','$dat2[1]','$dat2[2]','$dat2[3]','$dat2[4]','$dat2[5]','$dat2[6]','$dat2[7]','$dat2[8]','$dat2[9]',
'$colortt2','$colormt2','$estadot','$email2','$emailadm2','$web2','$licadm','$liccli','$lictra','$frase','$ide','$idpr',
'$falta','$mesalta','$yearalta','$diaalta',
'$colorarriba','$colorlateral','$colorcentral')";
//echo $sql1.'<br/>';
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");


$sql2 = "INSERT INTO usuarios (user,password,idempresas,administracion,servicios,informes,datoslateral,portada,datoslateral2,documentacion,idpr,estado,ayuda) 
VALUES ('$usuario2','$clave2','$idempresas','1','1','1','1','1','1','1','$idpr','$estadot','1')";
//echo $sql2.'<br/>';
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result sql2");

$sql11 = "INSERT INTO puntservicios (idempresas,idpccat,idpcsubcat,subcategoria,rellr,rellg,rellb,activo) VALUES ('$idempresas','1','1','ENTRADA','255','255','255','1')";
//echo $sql11.'<br/>';
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result sql11");

$sql11a = "INSERT INTO puntservicios (idempresas,idpccat,idpcsubcat,subcategoria,rellr,rellg,rellb,activo) VALUES ('$idempresas','1','2','SALIDA','255','255','255','1')";
//echo $sql11a.'<br/>';
$result11a=mysqli_query ($conn,$sql11a) or die ("Invalid result sql11a");

$sql11p = "INSERT INTO portadapag (idempresa,idpag) VALUES ('$idempresas','1')";
//echo $sql11p.'<br/>';
$result11p=mysqli_query ($conn,$sql11p) or die ("Invalid result sql11p");

$sql11p1 = "INSERT INTO portadapag (idempresa,idpag) VALUES ('$idempresas','2')";
//echo $sql11p1.'<br/>';
$result11p1=mysqli_query ($conn,$sql11p1) or die ("Invalid result sql11p1");

if (isset($datoadm)==false){;
$datoadm=array(1,1,1,0,1,1,1,1,1,1);
};

$sql3 = "INSERT INTO menuadministracion (user,idempresa,clientes,gestores,empleados,empresas,empresa,usuario,visita,proveedor,puestos,vecinos) 
VALUES ('$usuario2','$idempresas','$datoadm[0]','$datoadm[1]','$datoadm[2]','$datoadm[3]','$datoadm[4]','$datoadm[5]','$datoadm[6]','$datoadm[7]','$datoadm[8]','$datoadm[9]')";
//echo $sql3.'<br/>';
$result3=mysqli_query ($conn,$sql3) or die ("Invalid result sql3");

$sql3 = "INSERT INTO administrar (idempresa,clientes,gestores,empleados,empresas,empresa,usuario,visita,proveedor,puestos,vecinos) 
VALUES ('$idempresas','1','1','1','0','1','1','1','1','1','1')";
//echo $sql3.'<br/>';
$result3=mysqli_query ($conn,$sql3) or die ("Invalid result sql3a");

$dato=array('menuadministracionenlace','menuadministracionimg','menuadministracionnombre',
'menuinformeenlace','menuinformeimg','menuinformenombre',
'menuserviciosenlace','menuserviciosimg','menuserviciosnombre');

for($j=0;$j<count($dato);$j++){;
$sql13 = "INSERT INTO ".$dato[$j]." (idempresa) VALUES ('$idempresas')";
//echo $sql13;
$result13=mysqli_query ($conn,$sql13) or die ("Invalid result sql13[".$j."]");
};
$dato=array('usuariosenlace','usuariosimg','usuariosnombre');


for($j=0;$j<count($dato);$j++){;
$sql13 = "INSERT INTO ".$dato[$j]." (idempresas) VALUES ('$idempresas')";
//echo $sql13;
$result13=mysqli_query ($conn,$sql13) or die ("Invalid result sql13[".$j."]");
};

$datbbdd=array('servicios','hoja','etiquetas','portadai','menuinforme','menuservicios');
$camposbbdd=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus');


for ($ht=0;$ht<count($datbbdd);$ht++){;


$sqlvarios= "INSERT INTO ".$datbbdd[$ht]." (";
$sqlvarios.= "idempresa,";

if (($datbbdd[$ht]=='menuinforme') or ($datbbdd[$ht]=='menuservicios')){;
$sqlvarios.="user,";
};
for ($g=0;$g<count($camposbbdd);$g++){;
$sqlvarios.=$camposbbdd[$g];
if($g+1!=count($camposbbdd)){;
$sqlvarios.=",";
};
};

$sqlvarios.=") values (";
$sqlvarios.= "'$idempresas',";

if (($datbbdd[$ht]=='menuinforme') or ($datbbdd[$ht]=='menuservicios')){;
$sqlvarios.="'$usuario2',";
};

switch ($datbbdd[$ht]){;
case 'etiquetas':
		$datosprin=$datose;break;
case 'hoja':
		$datosprin=$datosh;break;		
case 'portadai':
	$datosprin=$datosp;break;
default:
	$datosprin=$datos;
}


for ($g=0;$g<count($camposbbdd);$g++){;
$sqlvarios.="'".$datosprin[$g]."'";
if($g+1!=count($camposbbdd)){;
$sqlvarios.=",";
};
};
$sqlvarios.=")";

//echo $sqlvarios.'<br/>';
$resultvarios=mysqli_query ($conn,$sqlvarios) or die ("Invalid result sqlvarios[".$ht."]");

};

}else{;
$valorintro="mal";
};

}else{;

$mal="1";
};

?>