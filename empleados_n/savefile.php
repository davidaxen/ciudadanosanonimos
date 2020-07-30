<html>
<head>
<title>Creacion de Ficheros</title>
<link rel="stylesheet" href="../estilo/estilo.css">
</head>
<?php 
include('bbdd.php');
?>
<body>

<table>
<tr><td rowspan=2><img src="../img/<?php  echo $img;?>"></td><td><font face="Tahoma" size="5">CREACION DE FICHEROS</font></td></tr>
<tr><td><font face="Tahoma" size="5"><?php  echo $titulo;?></font></td></tr>
</table>

<?php 
$path=$carpeta."/".$file;
$sh=fopen($path,"x");
fwrite($sh,$page);
fclose($sh);


$sql1 = "INSERT INTO fichero (idempresa,nomfichero,mes,año,carpeta) VALUES ('$ide','$file','$mes','$año','$carpeta')";
//echo $sql1;
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result icarnet");


?>


Bajarse el archivo
<a href="readfile.php?archivo=<?php  echo $path;?>">Recibo Generado</a>









