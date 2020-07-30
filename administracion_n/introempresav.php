<?php 

include('../yo.php');

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

/*
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
//echo $path;

if(move_uploaded_file($_FILES[$imagenes[$yh]]['tmp_name'], $path)) {;
//echo "El archivo ". basename( $_FILES['nimagen']['name']). " ha sido subido";
//echo "El archivo ". $rf . " ha sido subido<br>";
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

*/



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



$dat2=array('pp_logo.png','blanco-peq.png','pp_firma.png','pp_a4.png','pp_a4.png','pp_a4.png','','','pp_fondo_movil.png','');

$sql1 = "INSERT INTO empresas (idempresas,nombre,nif,domicilio,cp,ncc,representante,nifrepresentante,telefonof,telefonom,fax,pais,provincia,localidad,
logotipo,logotipopeq,firma,plantilla,imghoja1,imghoja2,plantillasobre,plantillacarnet,plantillamovil,ico,
color,colorm,estado,email,emailadmin,web,licadm,liccli,lictra,frase,iddistribuidor,ayuda,idproyectos) 
VALUES ('$idempresas','$nombre2','$nif2','$domicilio2','$cp2','$ncc2','$nombrer','$nifr','$tfijo2','$tmovil2','$tfax2','$pais2','$provincia2','$localidad2',
'$dat2[0]','$dat2[1]','$dat2[2]','$dat2[3]','$dat2[4]','$dat2[5]','$dat2[6]','$dat2[7]','$dat2[8]','$dat2[9]',
'$colortt2','$colormt2','1','$email2','$emailadm2','$web2','$licadm','$liccli','$lictra','$frase','$ide','0','$idpr')";
echo $sql1.'<br/>';
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result sql1");

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($clave2, METHOD, $key, 0, $iv);
			$clave2=base64_encode($output);



$sql2 = "INSERT INTO usuarios (user,password,idempresas,administracion,servicios,informes,datoslateral,portada,datoslateral2,documentacion,tusuario) 
VALUES ('$usuario2','$clave2','$idempresas','1','1','1','1','1','1','1','1')";
//echo $sql2.'<br/>';
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result icarnet");

/*
$sql2 = "UPDATE usuarios SET idempresas='".$idempresas."',administracion='1',servicios='1',informes='1',datoslateral='1',portada='1',datoslateral2='1',
documentacion='1',validar='1',estado='2',administrar='1',generador='1',herramientas='1'
where user='".$email2."'";
//echo $sql2.'<br/>';
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result sql2");
*/


$sql11 = "INSERT INTO puntservicios (idempresas,idpccat,idpcsubcat,subcategoria,rellr,rellg,rellb,activo) VALUES ('$idempresas','1','1','ENTRADA','255','255','255','1')";
//echo $sql11.'<br/>';
$result11=mysqli_query ($conn,$sql11) or die ("Invalid result sql11");

$sql11a = "INSERT INTO puntservicios (idempresas,idpccat,idpcsubcat,subcategoria,rellr,rellg,rellb,activo) VALUES ('$idempresas','1','2','SALIDA','255','255','255','1')";
//echo $sql11.'<br/>';
$result11a=mysqli_query ($conn,$sql11a) or die ("Invalid result sql11a");


$sql11a = "INSERT INTO puntservicios (idempresas,idpccat,idpcsubcat,subcategoria,rellr,rellg,rellb,activo) VALUES ('$idempresas','5','0','OTROS PRODUCTOS','255','255','255','1')";
//echo $sql11.'<br/>';
$result11a=mysqli_query ($conn,$sql11a) or die ("Invalid result sql11a");

$sql11p = "INSERT INTO portadapag (idempresa,idpag) VALUES ('$idempresas','1')";
//echo $sql11p.'<br/>';
$result11p=mysqli_query ($conn,$sql11p) or die ("Invalid result sql11p");

$sql11p1 = "INSERT INTO portadapag (idempresa,idpag) VALUES ('$idempresas','2')";
//echo $sql11p1.'<br/>';
$result11p1=mysqli_query ($conn,$sql11p1) or die ("Invalid result sql11p1");


$sql3 = "INSERT INTO menuadministracion (user,idempresa,clientes,gestores,empleados,empresas,empresa,usuario,visita) 
VALUES ('$usuario2','$idempresas','1','1','1','0','0','1','1')";
//echo $sql3.'<br/>';
$result3=mysqli_query ($conn,$sql3) or die ("Invalid result icarnet");

/*
$sql3 = "INSERT INTO menuadministracion (user,idempresa,clientes,gestores,empleados,empresas,empresa,usuario,visita) 
VALUES ('$email2','$idempresas','1','1','1','0','0','1','1')";
//echo $sql3.'<br/>';
$result3=mysqli_query ($conn,$sql3) or die ("Invalid result sql3");
*/

$datbbdd=array('servicios','hoja','etiquetas','portadai','menuinforme','menuservicios');
$valdat=array('0','17','17','17','0','0');
//$camposbbdd=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones');
//$camposbbdd=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus');
//$valoresbbdd=array($camposa[0],'1','1',$camposc[0],$camposp[4],$camposqr[0],$camposqr[1],$camposqr[3],$camposqr[2],$camposqr[4],$camposp[0],$camposp[1],$camposp[3],$camposp[2],$camposa[1],'1',$camposp[5],$camposc[2]);

$camposbbdd=array('entrada','incidencia','accdiarias','accmantenimiento','productos','niveles','revision','envases',
'trabajo','siniestro','mediciones','alarma','ruta',
'mensaje','incidenciasplus',
'cuadrante','jornadas',
'control','informes');

$valoresbbdd=array('1','1',$camposqr[0],$camposqr[1],$camposqr[2],$camposqr[3],$camposqr[4],$camposqr[5],
$camposp[0],$camposp[1],$camposp[2],$camposp[3],$camposp[4],$camposp[5],
$camposc[0],$camposc[1],
$camposa[0],$camposa[1],
'0','1');


for ($ht=0;$ht<count($datbbdd);$ht++){;


$sqlvarios= "INSERT INTO ".$datbbdd[$ht]." (";
$sqlvarios.= "idempresa,";

if (($datbbdd[$ht]=='menuinforme') or ($datbbdd[$ht]=='menuservicios')){;
$sqlvarios.="user,";
};
for ($g=0;$g<count($camposbbdd)-$valdat[$ht];$g++){;
$sqlvarios.=$camposbbdd[$g];
if($g+1!=count($camposbbdd)-$valdat[$ht]){;
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


for ($g=0;$g<count($camposbbdd)-$valdat[$ht];$g++){;
$sqlvarios.="'".$valoresbbdd[$g]."'";
if($g+1!=count($camposbbdd)-$valdat[$ht]){;
$sqlvarios.=",";
};
};
$sqlvarios.=")";

//echo $sqlvarios.'<br/>';
$resultvarios=mysqli_query ($conn,$sqlvarios) or die ("Invalid result sqlvarios[".$ht."]");

};


/*
for ($ht=4;$ht<count($datbbdd);$ht++){;


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
$sqlvarios.="'$email2',";
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
$resultvarios=mysqli_query ($conn,$sqlvarios) or die ("Invalid result sqlvarios1[".$ht."]");

};
*/


$datbbdd1=array('menuinformeenlace','menuinformeimg','menuserviciosenlace','menuinformenombre','menuserviciosnombre','menuserviciosimg','menuadministracionenlace','menuadministracionimg','menuadministracionnombre');
for ($ht1=0;$ht1<count($datbbdd1);$ht1++){;
$sqlvarios1a= "INSERT INTO ".$datbbdd1[$ht1]." (idempresa)";
$sqlvarios1a.=" values ('$idempresas')";
$resultvarios1a=mysqli_query ($conn,$sqlvarios1a) or die ("Invalid result slqvarios1a[".$ht1."]");
};
$datbbdd2=array('usuariosenlace','usuariosimg','usuariosnombre');
for ($ht2=0;$ht2<count($datbbdd2);$ht2++){;
$sqlvarios2a= "INSERT INTO ".$datbbdd2[$ht2]." (idempresas)";
$sqlvarios2a.=" values ('$idempresas')";
$resultvarios1a=mysqli_query ($conn,$sqlvarios2a) or die ("Invalid result slqvarios2a[".$ht2."]");
};




//$camposbbdd=array('cuadrante','entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus');
$sql2n="select * from proyectosnombre where idproyectos='".$idpr."'";
//echo $sql24;
$result2n=mysqli_query ($conn,$sql2n) or die ("Invalid result2n");

$datbbddnombre=array('menuinformenombre','menuserviciosnombre');

for ($htn=0;$htn<count($datbbddnombre);$htn++){;
$sqlvariosna0= "UPDATE ".$datbbddnombre[$htn]." SET";
$sqlvariosna2=" WHERE idempresa='".$idempresas."'";


for ($nn=0;$nn<count($camposbbdd);$nn++){;
$valorn=mysqli_result($result2n,0,$camposbbdd[$nn]);
$sqlvariosna1=" ".$camposbbdd[$nn]."='".$valorn."'";
$sqlvariosna=$sqlvariosna0.$sqlvariosna1.$sqlvariosna2;
$resultvariosna=mysqli_query ($conn,$sqlvariosna) or die ("Invalid result slqvariosna[".$nn."]");
};

};







}else{;
$valorintro="mal";
};

}else{;

$mal="1";
};

?>