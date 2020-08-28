<?php 
include('bbdd.php');

if ($ide!=null){;
include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCION DE DATOS</p></div>
<div class="contenido">





<?php 
/*
print_r($_GET); 
echo "<br/>post";
print_r($_POST);
*/
//echo 'hola';

if ($tabla=="idempleados"){;

//if ($numempleado>10){

if ($nif!=null){;

$sql2="select id from empleados where idempresa='".$ide."' and nif='".$nif."'"; 

$result2=$conn->query($sql2);
$num_rows=$result->fetchAll();
$row2=count($num_rows);
//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result clientes");
//$row2=mysqli_num_rows($result2);

if ($row2==0){;

if ($foto!=null){;
$file = explode(".",$foto_name);
$rf=$ide.'-'.$idc.'-f';
$docf=$rf.".".strtolower($file[1]);
$path="../img/emp/";
copy($foto,$path.$docf);
};

if ($numempleado==''){;
$sql="select idempleado from empleados where idempresa='".$ide."' order by idempleado desc"; 

$result=$conn->query($sql);
$num_rows=$result->fetchAll();
$row=count($num_rows);
//$result=mysqli_query ($conn,$sql) or die ("Invalid result clientes");
//$row=mysqli_num_rows($result);
if ($row==0){;
$idc=10;
}else{;
$resultado=mysqli_fetch_array($result);
$idc=$resultado['idempleado'];
$idc=$idc+1;
};
}else{;
$idc=$numempleado;
}

$sql1="INSERT INTO empleados (idempleado,idempresa,nombre,1apellido,2apellido,tnif,nif,";
$sql1.="cp,domicilio,provincia,localidad,nacionalidad,estado,";
$sql1.="entrada,incidencia,mensaje,alarma,accdiarias,accmantenimiento,niveles,productos,revision,trabajo,siniestro,control,mediciones,jornadas,informes,ruta,envases,incidenciasplus,seguimiento,teletrabajo";
$sql1.="foto,tele1,tele2,email1,sexo,dia,mes,ano,numempleadogest,grupo) ";
$sql1.="VALUES ('$idc','$ide','$nombre','$apellido1','$apellido2','$tnif','$nif',";
$sql1.="'$cp','$direccion','$provincia','$localidad','$pais','1',";
if ($grupo==null){;
$sql1.="'$entrada','$incidencia','$mensaje','$alarma','$accdiarias','$accmantenimiento','$niveles','$productos','$revision','$trabajo','$siniestro','$control','$mediciones','$jornadas','$informes','$ruta','$envases','$incidenciasplus',";
}else{;
$vl=$grupo;
$sql1.="'$entrada[$vl]','$incidencia[$vl]','$mensaje[$vl]','$alarma[$vl]','$accdiarias[$vl]','$accmantenimiento[$vl]','$niveles[$vl]','$productos[$vl]','$revision[$vl]','$trabajo[$vl]','$siniestro[$vl]','$control[$vl]','$mediciones[$vl]','$jornadas[$vl]','$informes[$vl]','$ruta[$vl]','$envases[$vl]','$incidenciasplus[$vl]','$seguimiento[$vl]','$teletrabajo[$vl]',";
};

$sql1.="'$docf','$tele1','$tele2','$email1','$sexo','$dia4','$mes4','$ano4','$numempleadogest','$grupo')";
//echo $sql1;

$result1=$conn->query($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result iempleados 1");

$useremp=$ide.$idc;
$passnif=$nif;
if ($passnif==''){;
$passnif='AAAAAAAA';
};

include ('../yo.php');

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($passnif, METHOD, $key, 0, $iv);
			$passnif=base64_encode($output);




$sql2 = "INSERT INTO usuarios (user,password,idempresas,idempleados,trabajador,tusuario,modulo) VALUES ('$useremp','$passnif','$ide','$idc','1','3','41')";

$result2=$conn->query($sql2);

//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result usuarios");
}else{;
$datos="22";
};

}else{;
$datos="24";
};


};


if ($tablas=="modificar"){;
$sql0="update empleados set ";
$sql1="where idempleado='".$idc."' and idempresa='".$ide."'";


if ($grupo1!=null){;
$vl=$grupo1;
$entrada1=$entrada[$vl];
$incidencia1=$incidencia[$vl];
$mensaje1=$mensaje[$vl];
$alarma1=$alarma[$vl];
$accdiarias1=$accdiarias[$vl];
$accmantenimiento1=$accmantenimiento[$vl];
$niveles1=$niveles[$vl];
$productos1=$productos[$vl];
$revision1=$revision[$vl];
$trabajo1=$trabajo[$vl];
$siniestro1=$siniestro[$vl];
$control1=$control[$vl];
$mediciones1=$mediciones[$vl];
$jornadas1=$jornadas[$vl];
$informes1=$informes[$vl];
$ruta1=$ruta[$vl];
$envases1=$envases[$vl];
$indicenciasplus1=$incidenciasplus[$vl];
$seguimiento1=$seguimiento[$vl];
$teletrabajo1=$teletrabajo[$vl];
};



$nombrecampo=array('nombre','1apellido','2apellido','estado','nif','tnif','sexo','dia','mes','ano',
'cp','domicilio','localidad','provincia','tele1','tele2','email1','nacionalidad','grupo',
'entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro','control','mediciones','jornadas','informes','ruta','envases','incidenciasplus','seguimiento','teletrabajo');

$valoractual=array($nombre,$apellido1,$apellido2,$estadoe,$nif,$tnif,$sexo,$diaa,$mesa,$anoa,
$cp,$domicilio,$localidad,$provincia,$tele1,$tele2,$email1,$idpais,$grupo,
$entrada,$incidencia,$mensaje,$alarma,$accdiarias,$accmantenimiento,$niveles,$productos,$revision,$trabajo,$siniestro,$control,$mediciones,$jornadas,$informes,$ruta,$envases,$incidenciasplus);


$valornuevo=array($nombre1,$apellido11,$apellido21,$estadoemp1,$nif1,$tnif1,$sexo1,$diaa1,$mesa1,$anoa1,
$cp1,$domicilio1,$localidad1,$provincia1,$tele1n,$tele2n,$email1n,$idpais1,$grupo1,
$entrada1,$incidencia1,$mensaje1,$alarma1,$accdiarias1,$accmantenimiento1,$niveles1,$productos1,$revision1,$trabajo1,$siniestro1,$control1,$mediciones1,$jornadas1,$informes1,$ruta1,$envases1,$incidenciasplus1,$seguimiento1,$teletrabajo1);


//echo (count($nombrecampo));
for ($j=0;$j<count($nombrecampo);$j++){;

if ($nombrecampo[$j]=="estado"){;
//echo $valoractual[$j];
//echo $valornuevo[$j];
if ($valoractual[$j]!=$valornuevo[$j]){;
if ($valornuevo[$j]=="1"){;
$sql10="select lictra from empresas where idempresas='".$ide."'"; 

$result10=$conn->query($sql10);
$resultado10=$result->fetchAll();
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result lic");
//$resultado10=mysqli_fetch_array($result10);
$lictra=$resultado10['lictra'];
$sql10="select count(idempleado) as tot from empleados where idempresa='".$ide."' and estado='1'";

$result10=$conn->query($sql10);
$resultado10=$result->fetchAll();
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result empleados");
//$resultado10=mysqli_fetch_array($result10);
$tota=$resultado10['tot'];
if ($lictra>$tota){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo $sql;
$resultd=$conn->query($sql);

//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
}else{;
$datos=23;
};

}else{;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo $sql;

$resultd=$conn->query($sql);

//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
};
};
}else{;

if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
//echo $sql;

$resultd=$conn->query($sql);

//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
$datos='';


};
};



if ($foto1!=null){;
$file = explode(".",$foto1_name);
$rf=$ide.'-'.$idc.'-f';$docf=$rf.".".strtolower($file[1]);
$path="../img/emp/";
copy($foto1,$path.$docf);
$sqla="foto='".$docf."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid result foto");};




};

$sql2="select idempleados from usuarios where idempresas='".$ide."' and idempleados='".$idc."'"; 

$result2=$conn->query($sql2);
$num_rows=$result2->fetchAll();
$row2=count($num_rows);
//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result clientes");
//$row2=mysqli_num_rows($result2);

if ($row2==0){;
$sql2="select * from empleados where idempresa='".$ide."' and idempleado='".$idc."'";

$result2=$conn->query($sql2);
$resultado2=$result->fetchAll();
//$row=count($num_rows);
//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result clientes");
//$resultado2=mysqli_fetch_array($result2);
$passnif=$resultado2['nif'];
if ($passnif==''){;
$passnif='AAAAAAAA';
};
$useremp=$ide.$idc;

$sql2 = "INSERT INTO usuarios (user,password,idempresas,idempleados,trabajador) VALUES ('$useremp','$passnif','$ide','$idc','1')";

$result2=$conn->query($sql2);

//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result usuarios");

};




};
?>

<?php 
if ($datos==21){;
?>
Tienes que poner un NIF.<br>
<img alt="volver" border="0" src="../img/arrow_cycle.png" onclick="history.go(-2)">

<?php 
}; 
?><?php 
if ($datos==22){;
?>
El NIF esta repetido.<br>
<img alt="volver" border="0" src="../img/arrow_cycle.png" onclick="history.go(-2)">
<?php 
}; 
?>
<?php 
if ($datos==24){;
?>
El Numero de Empleado debe de ser mayor que 10.<br>
<img alt="volver" border="0" src="../img/arrow_cycle.png" onclick="history.go(-2)">
<?php 
}; 
?>

<?php 
if ($datos==23){;
?>
<table>
<tr><td class="enc">Ya ha utilizado todas las licencias contratadas</td></tr>
<tr><td class="enc">Póngase en contacto con su comercial</td></tr>
</table><br>
EL RESTO DE DATOS HAN SIDO MODIFICADOS<p>
<?php 
};


if ($datos==''){;
?>
LOS DATOS HAN SIDO INTRODUCCIDOS<p>
<?php 
};


?>
<p>
<a href="lempleados2.php?estadoe=1">Volver a menu</a>
</div>
<?php }else{;
include ('../cierre.php');
 };?>