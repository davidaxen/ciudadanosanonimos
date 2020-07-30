<?php

/************************************CONFIG****************************************/

//SETTINGS//
//This code is something you set in the APP so random people cant use it.
$ACCESSKEY="secret";

/************************************CONFIG****************************************/

//these are just in case setting headers forcing it to always expire
header('Cache-Control: no-cache, must-revalidate');

if($_GET['p']==$ACCESSKEY){

$mimagen=basename( $_FILES['filename']['name']);
$timagen=strtok(basename( $_FILES['filename']['name']), '.');
$tipoimagen=strtok('.');

if ($mimagen!=null){;
$path="";
//$rf=$ide.'-'.$idcat.'-cat'.$tipoimagen;
$path = $path . basename( $_FILES['filename']['name']);
//$path = $path . $rf;
if(move_uploaded_file($_FILES['filename']['tmp_name'], $path)) {;
//echo "El archivo ". basename( $_FILES['nimagen']['name']). " ha sido subido";
echo "El archivo ". $path . " ha sido subido";
}else{;
echo "Ha ocurrido un error, trate de nuevo!";
};
};




/*
//$data = file_get_contents('php://stdin');
//$datt=implode('',$data);

$filename = $_GET['filename'];
$dato = $_GET['doc'];


echo $dato.'hola';

$path=$filename;

echo $path;


//$sh=fopen($path,"x");
//fwrite($sh,$dato);
//fclose($sh);

if (!copy($dato, $path)) {
    echo "Error al copiar $dato..$path.\n";
}

//copy($dato,$path);

//file_put_contents($filename,$data);
*/

};
?>