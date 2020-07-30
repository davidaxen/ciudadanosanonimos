<?php  
include('bbdd.php');
//set_time_limit (0);

$datcli=array('entrada','incidencia','mensaje','alarma','accdiarias','accmantenimiento','niveles','productos','revision','trabajo','siniestro',
'control','mediciones','ruta','envases','incidenciasplus','seguimiento','jornadas','informes');
$tablas=array('clientes','empleados','servicios');

for ($j=0;$j<count($tablas);$j++){;
for ($t=0;$t<count($datcli);$t++){;
$sql="update ".$tablas[$j]." set ".$datcli[$t]."='0' where ".$datcli[$t]."=''";
//echo $sql.'<br/>';
$result=mysqli_query ($conn,$sql) or die ("Invalid result 1");

};
};

$sql="update servicios set cuadrante='0' where cuadrante=''";
//echo $sql.'<br/>';
$result=mysqli_query ($conn,$sql) or die ("Invalid result 2");


?>