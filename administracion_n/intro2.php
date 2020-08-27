<?php  
include('bbdd.php');

if (($ide!=null) or ($validar==0)){;
 include('../portada_n/cabecera2.php');?>


<div id="main">
<div class="titulo">
<p class="enc">INTRODUCCION DE DATOS</p>
</div>
<div class="contenido">

<?php  

if (isset($tabla)==false){;
$tabla=null;
}
if (isset($tablas)==false){;
$tablas=null;
}

if (isset($mal)==false){;
$mal=null;
}


if ($tabla=="idproveedor"){;

$sql1 = "INSERT INTO proveedores (idproveedor,nombre,nif,cp,domicilio,provincia,localidad,idempresas,estado,telefono,email) 
VALUES (:idp,:proveedor,:nifp,:cpp,:direccionp,
:provinciap,:localidadp,:ide,'1',:telefonop,:emailp)";
//echo $sql1;

$result1=$conn->prepare($sql1);
$result1->bindParam(':idp', $idp);
$result1->bindParam(':proveedor', $proveedor);
$result1->bindParam(':nifp', $nifp);
$result1->bindParam(':cpp', $cpp);
$result1->bindParam(':direccionp', $direccionp);

$result1->bindParam(':provinciap', $provinciap);
$result1->bindParam(':localidadp', $localidadp);
$result1->bindParam(':ide', $ide);
$result1->bindParam(':telefonop', $telefonop);
$result1->bindParam(':emailp', $emailp);

$result1->execute();

//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result iproveedores");


};


if ($tabla=="iempresa"){;
include('introempresa.php');
};


if ($tabla=="iempresav"){;
include('introempresav.php');
};


if ($tabla=="iproyecto"){;
include('introproyecto.php');
};


if ($tabla=="idusuario"){;
include('introusuario.php');
};


if ($tablas=="modificaru"){;
include('modificarusuario.php');
};

if ($tablas=="modificart"){;
include('modificart.php');
};


if ($tablas=="modificar"){;
include('modificar.php');
};


if ($tablas=="modificarproyectos"){;
include('modificarproyectos.php');
};

if ($tablas=="modificarproveedor"){;
include('modificarproveedor.php');
};


if ($mal!=null){;
switch ($mal){;
case 1: $valor="NIF";break;
case 2: $valor="Telefono 1";break;
};

?>
Tienes que poner un <?php  echo$valor;?><br>
<img alt="volver" border="0" src="../img/arrow_cycle.png" onclick="history.go(-2)">
<?php 
}else{; 



if ($valorintro=='mal'){;

if($textomal!=null){;
echo $textomal."<br/>";
}else{

echo "Tiene que cambiar el usuario y/o la clave<br>";

};
?>
<img alt="volver" border="0" src="../img/arrow_cycle.png" onclick="history.go(-2)">
<?php 
}else{;
?>
LOS DATOS HAN SIDO INTRODUCIDOS<p>
<?php 

if ($tabla=="iempresav"){;
				$url="https://control.nativecbc.com/inicio_n.php";
				echo "<SCRIPT>window.location='$url';</SCRIPT>"; 
}else{;
?>

<img alt="volver" border="0" src="/img/iconos/volver-g.png" onclick="history.go(-2)" class="cuadro">
<!--<a href="/inicio_n.php">Volver a menu</a>-->
<?php 
};
};
};

?>
</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>