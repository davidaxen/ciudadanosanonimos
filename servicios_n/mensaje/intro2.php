<?php  
include('bbdd.php');

if ($ide!=null){;


 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ENVIO DE MENSAJES</p></div>
<div class="contenido">


<?php  
//echo $idemplt;
if ($tabla=='intro'){;

$sql="select * from mensajes order by id desc";
$result=$conn->query($sql);
$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result mensajes");
$resultado=mysqli_fetch_array($result);*/
$id=$resultado['id'];
$idn=$id+1;


$day=date('Y-m-d H:i:s', time());
$sql1 = "INSERT INTO mensajes (id,idempresa,idempleado,texto,user,dia,pais,localidad,provincia,cp,";
if ($fechafin!=null){;
	$sql1.="fechafin,";
};
$sql1.="fichero,otrosmot) VALUES 
('$idn','$ide','$idempleado','$texto','$user','$day','$idpais','$localidad','$provincia','$cp',";
if($fechafin!=null){;
	$sql1.="'$fechafin',";
};
$sql1.="'$fichero','$otrosmot')";
//echo $sql1;
$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont2");

for ($j=0;$j<count($resp);$j++){;
	if ($resp[$j]!=null){;
		$sql10 = "INSERT INTO respuesta (idmensaje,idempresa,valor,texto) VALUES 
		('$idn','$ide','$j','$resp[$j]')";
//echo $sql10;
		$result10=$conn->exec($sql10);
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result ipuntcont2");
	};
};

if ($urlvideo!=null) {
	$sql1="INSERT INTO videos(url, idmensaje) VALUES ('$urlvideo', $idn)";
	$result=$conn->exec($sql1);
}


};

if ($tabla=='modificar'){;

$sql1 = "UPDATE mensajes SET texto='".$texto."', pais='".$idpais."', localidad='".$localidad."',provincia='".$provincia."',cp='".$cp."',fechafin='".$fechafin."' WHERE id='".$id."'";
//echo $sql1;
$result1=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result ipuntcont2");

};

?>



LOS DATOS HAN SIDO INTRODUCCIDOS<p>


<a href="dmensaje.php?dat=h" >Volver</a>
</div>
</div>



<?php } else {;
include ('../../cierre.php');
 };?>