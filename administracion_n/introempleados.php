<?php 
include('bbdd.php');

$sql2="select id from empleados where idempresa='".$ideemp2."' and email1='".$email2."'"; 
//echo $sql2;
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result clientes");
$row2=mysqli_num_rows($result2);

if ($row2==0){;


if ($numempleado==''){;
$sql="select idempleado from empleados where idempresa='".$ideemp2."' order by idempleado desc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result clientes");
$row=mysqli_num_rows($result);
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

$sql1="INSERT INTO empleados (idempleado,idempresa,email1,";
$sql1.="nombre,localidad,nacionalidad,estado,tele1,";
$sql1.="entrada)";
//$sql1.="foto,tele1,tele2,email1,sexo,dia,mes,ano,numempleadogest,grupo) ";
$sql1.="VALUES ('$idc','$ideemp2','$email2',";
$sql1.="'$nombreemp','$localidad','$pais','1','$tfijo2',";
$sql1.="'1')";

//$sql1.="'$docf','$tele1','$tele2','$email1','$sexo','$dia4','$mes4','$ano4','$numempleadogest','$grupo')";
//echo $sql1;
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result iempleados 1");

$useremp=$email2;
$passnif=$clave2;

/*
include ('../yo.php');

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($passnif, METHOD, $key, 0, $iv);
			$passnif=base64_encode($output);
*/

$sql2 = "INSERT INTO usuarios (user,password,idempresas,idempleados,trabajador,tusuario,modulo) VALUES ('$useremp','$passnif','$ideemp2','$idc','1','3','41')";
//echo $sql2;
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result usuarios");

echo 'LOS DATOS HAN SIDO INTRODUCCIDOS';
}else{;

echo "Ya esta dado de alta el Ciudadano Anonimos, con ese correo<br><a href='http://control.ciudadanosanonimos.com'>Acceso al sistema</a>";
}; 


?>
