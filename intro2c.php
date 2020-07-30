<?php  
include('bbdd.php');

if (($ide!=null) or ($validar==0)){;
 include('portada_n/cabeceralibre.php');?>


<div class="colocacion derecha" id="imprimir">
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

$nccn=$entn."-".$sucn."-".$dcn."-".$ncuentan;
$datosn[5]=$nccn;
$datosn[11]=strtok($paisn,"-");
$datosn[61]=$ibann;

ksort($nombrea);
ksort($datosa);
ksort($datosn);
/*
print_r($nombrea);
echo "<br/>";
print_r($datosa);
echo "<br/>";
print_r($datosn);
echo "<br/>";
*/

if ($tablas=="modificar"){;


include('modificar.php');
};





if ($mal!=null){;
switch ($mal){;
case 1: $valor="NIF";break;
case 2: $valor="Telefono 1";break;
};

?>
Tienes que poner un <?php  echo $valor;?><br>
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
<p style="text-align:center;">
YA EST&Aacute; ACTUALIZADO EL PRODUCTO, DEBEMOS DE SALIR Y VOLVER A ENTRAR<br/>
<a href='portada_n/salir.php'><img src='img/iconos/salir-g.png' class='cuadro' ></a>
</p>
<?php 

if ($tabla=="iempresav"){;
				$url="https://control.nativecbc.com/inicio_n.php";
				echo "<SCRIPT>window.location='$url';</SCRIPT>"; 
}else{;
?>
<!--
<img alt="volver" border="0" src="/img/iconos/volver-g.png" onclick="history.go(-2)" class="cuadro">
<a href="/inicio_n.php">Volver a menu</a>-->
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