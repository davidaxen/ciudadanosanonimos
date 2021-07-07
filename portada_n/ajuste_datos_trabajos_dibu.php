<?php  
include('bbdd.php');
//set_time_limit (0);

$fechahoy=date('Y-m-d',time());

$sql="select * from acctrabajos where idempresa='87' and diasalida='".$fechahoy."'";
//echo $sql."<br/>";

$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$num_rows=$result10->fetchAll();
$row=count($num_rows);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result 1");
//$row=mysqli_num_rows($result);
//echo $row;

foreach ($resultmos as $row) {

//for ($j=0;$j<$row;$j++){
//mysqli_data_seek($result,$j);
//$resultado=mysqli_fetch_array($result);
$idd=$row['id'];
$ids=$row['idsiniestro'];
$descrip=$row['descripcion'];
$final=explode("-und:",$descrip);

$sqlt="select * from trabajos where idempresa='87' and idsiniestro='".$ids."'";
//echo $sqlt."<br/>";

$resultt=$conn->query($sqlt);
$resultadot=$resultt->fetchAll();
//$row=count($num_rows);
//$resultt=mysqli_query ($conn,$sqlt) or die ("Invalid result 1");
//$resultadot=mysqli_fetch_array($resultt);
$descript=$resultadot['descripcion'];
$inicial=explode("-und:",$descript);

if ($inicial[1]>$final[1]){;
$resultado=$inicial[1]-$final[1];
echo "no esta todo completado nos faltan ".$inicial[1]." - ".$final[1]." ".$resultado."<br/>";
$texto=$inicial[0]."-und:".$resultado;	
$diaahora=date("Y-m-d",time());
$horaahora=date("h:i:s",time());
$sql1 = "update acctrabajos set trabajopendiente='".$texto."', trabajorealizado='".$descrip."' where id='".$idd."'";
//INSERT INTO acctrabajos (idempresa,idsiniestro,descripcion,diaentrada,horaentrada) VALUES ('87','$ids','$texto','$diaahora','$horaahora')";
//echo $sql1."<br/>";

$result1=$conn->query($sql1);

//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");

$sql2= "UPDATE trabajos SET terminado = '0', diacierre='0000-00-00', horacierre='00:00:00', diaasignacion='0000-00-00', idempleado='0', descripcion='".$texto."' WHERE idsiniestro = '".$ids."' and idempresa='87'";
//echo $sql2."<br/>";

$result2=$conn->query($sql2);

//$result2=mysqli_query ($conn,$sql2) or die ("Invalid result 2");

}else{;
     echo "todo bien ".$inicial[1]." y ".$final[1];

};






}



?>