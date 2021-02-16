<?php  
error_reporting(0);
include('bbdd.php');



if ($ide!=null){;
 include('../../portada_n/cabecera3.php');?>

<div id="main">
<div class="titulo">
<p class="enc">ENVIO DE MENSAJES</p></div>
<div class="contenido">


<?php  
if ($tabla=='intro'){;

$sql="select * from mensajes order by id desc";
$result=$conn->query($sql);
$resultado=$result->fetch();
$id=$resultado['id'];
$idn=$id+1;

$idpais = $_REQUEST['pais'];
$localidad = $_REQUEST['localidad'];
$cp = $_REQUEST['cp'];
$fechafin = $_REQUEST['fechafin'];
$texto = $_REQUEST['texto'];
$resp = $_REQUEST['resp'];


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
$result1=$conn->exec($sql1);

for ($j=0;$j<count($resp);$j++){;
	if ($resp[$j]!=null){;
		$sql10 = "INSERT INTO respuesta (idmensaje,idempresa,valor,texto) VALUES 
		('$idn','$ide','$j','$resp[$j]')";
		$result10=$conn->exec($sql10);

	};
};

$allowedExts = array("mp4", "wma");
$extension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
if (in_array($extension, $allowedExts)) {
    $nuevarutavideo="../videos/".$idn;

    if (file_exists("$nuevarutavideo/" . $_FILES["video"]["name"])){
      	echo "El video: " . $_FILES["video"]["name"] . " ya ha sido enviado ";
    }
    else{
      
      if ( ! is_dir($nuevarutavideo)) {
        mkdir($nuevarutavideo);
     	  move_uploaded_file($_FILES["video"]["tmp_name"], "$nuevarutavideo/" . $_FILES["video"]["name"]);
        $rutavideo= $_FILES["video"]["name"];
      	$sqlvideo= "INSERT INTO videos (url, idmensaje) VALUES ('videos/$idn/$rutavideo', '$idn')";
        $resultvideo=$conn->exec($sqlvideo);
      }

    }
}

$allowedExtsPDF = array("pdf");
$extensionPDF = pathinfo($_FILES['fichero']['name'], PATHINFO_EXTENSION);
if (in_array($extensionPDF, $allowedExtsPDF)) {
  $nuevarutapdf="../pdfs/".$idn;

  if (file_exists("$nuevarutapdf/" . $_FILES["fichero"]["name"])){
        echo "El pdf: " . $_FILES["fichero"]["name"] . " ya ha sido enviado ";
    }
    else{
      if ( ! is_dir($nuevarutapdf)) {
          mkdir($nuevarutapdf);
          
          move_uploaded_file($_FILES["fichero"]["tmp_name"], "$nuevarutapdf/" . $_FILES["fichero"]["name"]);
          $rutapdf= $_FILES["fichero"]["name"];
          $sqlpdf= "INSERT INTO pdfs (url, idmensaje) VALUES ('pdfs/$idn/$rutapdf', '$idn')";
          $resultpdf=$conn->exec($sqlpdf);

          /*$sqlmarcadeagua="UPDATE mensajes SET video=1 WHERE id = $idn";
          $resultmarcadeagua=$conn->exec($sqlmarcadeagua);*/
      }
    }
}



};

if ($tabla=='modificar'){;

$sql1 = "UPDATE mensajes SET texto='".$texto."', pais='".$idpais."', localidad='".$localidad."',provincia='".$provincia."',cp='".$cp."',fechafin='".$fechafin."' WHERE id='".$id."'";
$result1=$conn->exec($sql1);

};

?>



LOS DATOS HAN SIDO INTRODUCCIDOS<p>


<a href="dpuntcont.php" >Volver</a>
</div>
</div>


<?php
 header("location: dpuntcont.php?msg=La pregunta ha sido introducida correctamente");
  die();
 } else {;
include ('../../cierre.php');
 };?>