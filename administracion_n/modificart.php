<?php 


$idempresasa=$datosa[0];

$sql0u="update usuarios set ";
$sql1u="where idempresas='".$idempresasa."'";
if ($datosun!=null){;
$sqlau=$nombreu."='".$datosun."' ";
$sqlu=$sql0u.$sqlau.$sql1u;
//echo $sqlu;
$resultdu=mysqli_query ($conn,$sqlu) or die ("Invalid result ".$nombreu." ");
};





$sql0="update empresas set ";
$sql1="where idempresas='".$idempresasa."'";
//echo $sql0;
//echo $sql1;
//echo "hola - datos";

$nccn=$ent2."-".$suc2."-".$dc2."-".$cc2;
$datosn[5]=$nccn;

$colort2=$datosn[21];
$r2 = substr($colort2, 1, 2);
$g2 = substr($colort2, 3, 2);
$b2 = substr($colort2, 5, 2);
$rt2=hexdec($r2);
$gt2=hexdec($g2);
$bt2=hexdec($b2);
$colorn=$rt2.",".$gt2.",".$bt2;
$datosn[21]=$colorn;

$colort2=$datosn[22];
$r2 = substr($colorm2, 1, 2);
$g2 = substr($colorm2, 3, 2);
$b2 = substr($colorm2, 5, 2);
$rt2= hexdec($r2);
$gt2= hexdec($g2);
$bt2= hexdec($b2);
$colormn=$rt2.",".$gt2.",".$bt2;
$datosn[22]=$colormn;

$nombrecampo=$nombrea;
$valoractual=$datosa;
$valornuevo=$datosn;

//echo (count($nombrecampo));
//for ($j=0;$j<count($nombrecampo);$j++){;
for ($j=2;$j<14;$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql.'<br>');
};
};

for ($j=21;$j<25;$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql.'<br>');
};
};

for ($j=38;$j<44;$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo ($sql.'<br>');
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
};
};

$j=46;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo ($sql.'<br>');
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
};


$j=51;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo ($sql.'<br>');
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
};

if ($claven!=null){;
include ('../yo.php');

$sql0u="update usuarios set ";
$sql1u="where user='".$datosa[2]."' and idempresas='".$idempresasa."' and idcliente='0' and idempleados='0' and idgestor='0' ";

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($claven, METHOD, $key, 0, $iv);
			$pass=base64_encode($output);

$sqlau="password='".$pass."' ";
$sqlu=$sql0u.$sqlau.$sql1u;
//echo $sqlu."-".$claven;
$resultdu=mysqli_query ($conn,$sqlu) or die ("Invalid result contraseña ");
};

 


// cambiar portada
$nombrec=array($nombresa,$nombrepa,$nombreha,$nombreea,$nombreaa,$nombreaa);
$valorac=array($datossa,$datospa,$datosha,$datosea,$datosaa,$datosaa);
$valornu=array($datossn,$datospn,$datoshn,$datosen,$datosaan,$datosaan);
$tablast=array('servicios','portadai','hoja','etiquetas','administrar','menuadministracion');

if ($idcm==20){;
$tjy=1;
}else{;
$tjy=0;
};

for ($yh=$tjy;$yh<count($tablast);$yh++){;

$nombrecampo=$nombrec[$yh];
$valoractual=$valorac[$yh];
$valornuevo=$valornu[$yh];

$sql00="update ".$tablast[$yh]." set ";
$sql01="where idempresa='".$idempresasa."'";
if ($tablast[$yh]=='menuadministracion'){;
	$sql01.=" and user='".$datosa[2]."'";
	};

for ($j=0;$j<count($nombrecampo);$j++){;
$t=$j+2;
if($valornuevo[$t]==""){;
$valornuevo[$t]=0;
};
//echo ($nombrecampo[$t].'-'.$valoractual[$t].'-'.$valornuevo[$t].'<br>');
if ($valoractual[$t]!=$valornuevo[$t]){;
$sqla=$nombrecampo[$t]."='".$valornuevo[$t]."' ";
$sqls=$sql00.$sqla.$sql01;
echo ($sqls.'<br>');
$results=mysqli_query ($conn,$sqls) or die ("Invalid result ".$nombrecampo[$t]." ");
};
};

};




$dat1=array('log','logp','fir','a4','hoja1','hoja2','sob','car','mov','ico');
$imagenes=array('logotipo2','logotipop2','firma2','plaa42','hoja12','hoja22','plasob2','placar2','plamov2','ico2');
$nombrecampo=array('logotipo','logotipopeq','firma','plantilla','imghoja1','imghoja2','plantillasobre','plantillacarnet','plantillamovil','ico');

for($yh=0;$yh<count($dat1);$yh++){;

$rf="";
$mimagen=basename( $_FILES[$imagenes[$yh]]['name']);
$timagen=strtok(basename( $_FILES[$imagenes[$yh]]['name']), '.');
$tipoimagen=strtok('.');


if ($mimagen!=null){;
$path="../img/";
$rf=$idempresasa.'-'.$dat1[$yh].'.'.$tipoimagen;
$dat2[$yh]=$rf;
//$path = $path . basename( $_FILES['nimagen']['name']);
$path = $path . $rf;
echo $path;

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



?>