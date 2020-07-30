<?php 
?>
<html>
<head>
<title>Visualización de cuentas anuales de comunidades</title>
<link rel="stylesheet" href="estilo/estilo.css">
</head>
<?php  
include('sqlfacturacion.php');
?>
<body>
<table>
<tr><td rowspan="2"><img src="img/<?php  echo $img;?>" height="80"></td><td class="enc">INTRODUCCION DE DATOS</td></tr>
</table>


<?php  


if ($tabla=="albaran"){;
$sql01="select idalbaran from albaran_kmmk where idempresa='".$ide."' order by idalbaran desc";
$result01=mysql_query ($sql01) or die ("Invalid result");
$row01=mysql_affected_rows();
if ($row01!=0){;
$idalbaran=mysql_result($result01,0,'idalbaran');
$idalbaran=$idalbaran+1;
}else{;
$idalbaran=1;
};

$fecha=$año."-".$mes."-".$dia;
$sql1 = "INSERT INTO albaran_kmmk (idalbaran,idcliente,idempresa,fecha,direccionentrega,nbultos) VALUES ('$idalbaran','$idclientes','$ide','$fecha','$direccionentrega','$num_bultos')";
$result1=mysql_query ($sql1) or die ("Invalid result albaran");

for ($j=0;$j<count($nom_prod);$j++){;

$sql10 = "INSERT INTO albaran_concep_kmmk (idalbaran,nombreproducto,nombresubprod,und,prec_und_ped) VALUES ('$idalbaran','$nom_prod[$j]','$nom_subprod[$j]','$num_und[$j]','$pre_und[$j]')";
$result10=mysql_query ($sql10) or die ("Invalid result productos");

};
};




if ($tabla=="pedido"){;
$sql01="select idpedido from pedido_kmmk where idempresa='".$ide."' order by idpedido desc";
$result01=mysql_query ($sql01) or die ("Invalid result");
$row01=mysql_affected_rows();
if ($row01!=0){;
$idpedido=mysql_result($result01,0,'idpedido');
$idpedido=$idpedido+1;
}else{;
$idpedido=1;
};

$fecha=$año."-".$mes."-".$dia;
$sql1 = "INSERT INTO pedido_kmmk (idpedido,idempresa,idcliente,fecha,ncc,formapago,caract_formapago,plazo) VALUES ('$idpedido','$ide','$idclientes','$fecha','$ncc','$formapago','$caractformapago','$plazoentrega')";
$result1=mysql_query ($sql1) or die ("Invalid result presupuesto");

for ($j=0;$j<count($nom_prod);$j++){;
if ($idpresup=='nuevo'){;
$foto=$img_prod[$j];
if ($foto!=null){;
$file = explode(".",$foto_name);
$rf='kmmk-ped-'.$idpresup.'-'.$j;
$docf=$rf.'.jpg';
$path="./img/kmmk/";
copy($foto,$path.$docf);
};
}else{;
$docf=$img_prod[$j];
};
$sql10 = "INSERT INTO pedido_concep_kmmk (idpedido,nombreproducto,nombresubprod,imagen,caracteristicas,und,prec_und) VALUES ('$idpedido','$nom_prod[$j]','$nom_subprod[$j]','$docf','$ob[$j]','$num_und[$j]','$pre_und[$j]')";
$result10=mysql_query ($sql10) or die ("Invalid result productos");

};
};

if ($tabla=="presupuesto"){;
$sql01="select idpresupuesto from presup_kmmk where idempresa='".$ide."' order by idpresupuesto desc";
$result01=mysql_query ($sql01) or die ("Invalid result");
$row01=mysql_affected_rows();

if ($row01!=0){;
$idpresup=mysql_result($result01,0,'idpresupuesto');
$idpresup=$idpresup+1;
}else{;
$idpresup=1;
};



$fecha=$año."-".$mes."-".$dia;
$sql1 = "INSERT INTO presup_kmmk (idpresupuesto,idempresa,fecha,idcliente,titulo) VALUES ('$idpresup','$ide','$fecha','$idclientes','$titulo')";
$result1=mysql_query ($sql1) or die ("Invalid result presupuesto");

for ($j=0;$j<$num_prod;$j++){;
$foto=$img_prod[$j];
if ($foto!=null){;
$file = explode(".",$foto_name);
$rf='kmmk-'.$idpresup.'-'.$j;
$docf=$rf.'.jpg';
$path="./img/kmmk/";
copy($foto,$path.$docf);
};
$sql10 = "INSERT INTO presup_prod_kmmk (idpresupuesto,nombreproducto,imagen,caracteristicas) VALUES ('$idpresup','$nom_prod[$j]','$docf','$ob[$j]')";

$result10=mysql_query ($sql10) or die ("Invalid result productos");

for ($i=0;$i<$num_subprod;$i++){;
$sql11="select idproducto from presup_prod_kmmk where idpresupuesto='".$idpresup."' order by idproducto desc";

$result11=mysql_query ($sql11) or die ("Invalid result");
$idproducto=mysql_result($result11,0,'idproducto');
$a=$j.$i;
$sql20 = "INSERT INTO presup_subprod_kmmk (idproducto,nombresubprod) VALUES ('$idproducto','$nom_subprod[$a]')";

$result20=mysql_query ($sql20) or die ("Invalid result subproducto");

for ($k=0;$k<$num_desglose;$k++){;
$sql21="select idsubprod from presup_subprod_kmmk where idproducto='".$idproducto."' order by idsubprod desc";
$result21=mysql_query ($sql21) or die ("Invalid result");

$idsubprod=mysql_result($result21,0,'idsubprod');
$b=$j.$i.$k;
$sql30 = "INSERT INTO presup_cantidades_kmmk (idsubprod,und,prec_und) VALUES ('$idsubprod','$num_und[$b]','$pre_und[$b]')";

$result30=mysql_query ($sql30) or die ("Invalid result desglose");
};
};
};


};






if ($tabla=="idclientes"){;

$sql1 = "INSERT INTO clientes (idclientes,nombre,nif,cp,domicilio,provincia,localidad,ent,suc,dc,ncuenta,fvigor,idempresas,tiva) VALUES ('$idc','$cliente','$nif','$cp','$direccion','$provincia','$localidad','$ent','$suc','$dc','$ncuenta','$fvigor','$ide','$tiva')";
$result1=mysql_query ($sql1) or die ("Invalid result iclientes");
};




if ($tabla=="idproveedores"){;

$sql1 = "INSERT INTO proveedores (idproveedores,nombre,nif,cp,domicilio,provincia,localidad,ent,suc,dc,ncuenta,fvigor,idempresas,tgastos) VALUES ('$idc','$proveedor','$nif','$cp','$direccion','$provincia','$localidad','$ent','$suc','$dc','$ncuenta','$fvigor','$ide','$tgastos')";
$result1=mysql_query ($sql1) or die ("Invalid result iproveedores");

};


if ($tablas=="modificar"){;





if ($datos=="modclientes"){;
$sql0="update clientes set ";
$sql1="where idclientes='".$idclientes."' and idempresas='".$ide."'";
}else{;
if ($datos=="modempleados"){;
$sql0="update empleados set ";
$sql1="where idempleado='".$idc."' and idempresa='".$ide."'";
}else{;
if ($datos=="modexist"){;
$sql0="update existencias set ";
$sql1="where idexist='".$idexist."' and idempresas='".$ide."'";
}else{;
$sql0="update proveedores set ";
$sql1="where idproveedores='".$idproveedores."' and idempresas='".$ide."'";
};
};
};

if ($caract1!=$caract){;
$sqla="caracteristicas='".$caract1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($nombre1!=$nombre){;
$sqla="nombre='".$nombre1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($apellido11!=$apellido1){;
$sqla="1apellido='".$apellido11."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($apellido21!=$apellido2){;
$sqla="2apellido='".$apellido21."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($estado1!=$estado){;
$sqla="estado='".$estado1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($nif1!=$nif){;
$sqla="nif='".$nif1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($tiva1!=$tiva){;
$sqla="tiva='".$tiva1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($tgastos1!=$tgastos){;
$sqla="tgastos='".$tgastos1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($dia1!=$dia){;
$sqla="dia='".$dia1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($mes1!=$mes){;
$sqla="mes='".$mes1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($año1!=$año){;
$sqla="año='".$año1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($cp1!=$cp){;
$sqla="cp='".$cp1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($domicilio1!=$domicilio){;
$sqla="domicilio='".$domicilio1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($localidad1!=$localidad){;
$sqla="localidad='".$localidad1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($provincia1!=$provincia){;
$sqla="provincia='".$provincia1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($ent1!=$ent){;
$sqla="ent='".$ent1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($suc1!=$suc){;
$sqla="suc='".$suc1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($dc1!=$dc){;
$sqla="dc='".$dc1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($ncuenta1!=$ncuenta){;
$sqla="ncuenta='".$ncuenta1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($fvigor1!=$fvigor){;
$sqla="fvigor='".$fvigor1."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};


if ($fotocarneta1!=$fotocarneta){;
if ($fotocarneta1!=null){;
$file = explode(".",$fotocarneta1_name);
$rf=$ide.'-'.$idc.'-fa';
$doc=$rf.".".$file[1];
$path="./img/emp/";
copy($fotocarneta1,$path.$doc);
}else{;
$doc=$pagina;
};
$sqla="fotocarneta='".$doc."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($fotocarnetb1!=$fotocarnetb){;
if ($fotocarnetb1!=null){;
$file = explode(".",$fotocarnetb1_name);
$rf=$ide.'-'.$idc.'-fb';
$doc=$rf.".".$file[1];
$path="./img/emp/";
copy($fotocarnetb1,$path.$doc);
}else{;
$doc=$pagina;
};
$sqla="fotocarnetb='".$doc."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($fotoss1!=$fotoss){;
if ($fotoss1!=null){;
$file = explode(".",$fotoss1_name);
$rf=$ide.'-'.$idc.'-fs';
$doc=$rf.".".$file[1];
$path="./img/emp/";
copy($fotoss1,$path.$doc);
}else{;
$doc=$pagina;
};
$sqla="fotoss='".$doc."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};


if ($fotootro1!=$fotootro){;
if ($fotootro1!=null){;
$file = explode(".",$fotootro1_name);
$rf=$ide.'-'.$idc.'-fo';
$doc=$rf.".".$file[1];
$path="./img/emp/";
copy($fotootro1,$path.$doc);
}else{;
$doc=$pagina;
};
$sqla="fotootro='".$doc."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

if ($foto1!=$foto){;
if ($foto1!=null){;
$file = explode(".",$foto1_name);
$rf=$ide.'-'.$idc.'-f';
$doc=$rf.".".$file[1];
$path="./img/emp/";
copy($foto1,$path.$doc);
}else{;
$doc=$pagina;
};
$sqla="foto='".$doc."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");
};

};

if ($tablas=="modfacturas"){;

if ($cobrado==1){;
$fechaa=$año."-".$mes."-".$dia;
}else{;
$fechaa="0000-00-00";
};

$sql0="update facturas set ";
$sqla="cobrado='".$cobrado."', fechacobrado='".$fechaa."' ";
$sql1="where nfactura='".$nfactura."' and idempresas='".$ide."'";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");

$sql3="select idasiento from contabilidad where idempresas='".$ide."' order by idasiento desc"; 
$result3=mysql_query ($sql3) or die ("Invalid result3");
$asiento=mysql_fetch_array($result3);

$sql4="select obs, total from facturas where idempresas='".$ide."' and nfactura='".$nfactura."'"; 
$result4=mysql_query ($sql4) or die ("Invalid result4");
$obs=mysql_result($result4,0,'obs');
$total=mysql_result($result4,0,'total');
$fechaa=$año."-".$mes."-".$dia;



if ($asiento[0]!=null){;
$idasiento=$asiento[0]+1;
}else{;
$idasiento=1;
};



if ($cobrado==1){;

$sql12="insert into contabilidad (idasiento,idempresas,fecha,año,debe,haber,division,servicio,categoria,obs) values ('$idasiento','$ide','$fechaa','$año','','$total','4','43','431','$obs')";
$result12=mysql_query ($sql12) or die ("Invalid result12");

$sql13="insert into contabilidad (idasiento,idempresas,fecha,año,debe,haber,division,servicio,categoria,obs) values ('$idasiento','$ide','$fechaa','$año','$total','','5','57','572','$obs')";
$result13=mysql_query ($sql13) or die ("Invalid result13");

}else{;

$total2=$total+$gastosdevolucion;

$sql12="insert into contabilidad (idasiento,idempresas,fecha,año,debe,haber,division,servicio,categoria,obs) values ('$idasiento','$ide','$fechaa','$año','$total','','4','43','431','$obs')";
$result12=mysql_query ($sql12) or die ("Invalid result12");

$sql13="insert into contabilidad (idasiento,idempresas,fecha,año,debe,haber,division,servicio,categoria,obs) values ('$idasiento','$ide','$fechaa','$año','','$total2','5','57','572','$obs')";
$result13=mysql_query ($sql13) or die ("Invalid result13");

$sql14="insert into contabilidad (idasiento,idempresas,fecha,año,debe,haber,division,servicio,categoria,obs) values ('$idasiento','$ide','$fechaa','$año','$gastosdevolucion','','6','6','669','$obs')";
$result14=mysql_query ($sql14) or die ("Invalid result14");
};


};

if ($tablas=="modfrecibidas"){;
$sql0="update frecibidas set ";
$sqla="pagado='".$cobrado."' ";
$sql1="where idfr='".$idfr."' and idempresa='".$ide."'";
$sql=$sql0.$sqla.$sql1;
$resultd=mysql_query ($sql) or die ("Invalid result");

$sql3="select idasiento from contabilidad where idempresas='".$ide."' order by idasiento desc"; 
$result3=mysql_query ($sql3) or die ("Invalid result3");
$asiento=mysql_fetch_array($result3);

$fechaa=$año."-".$mes."-".$dia;
$total=$subt+$iva;
$obs="pago del documento ".$idfr;

if ($asiento[0]!=null){;
$idasiento=$asiento[0]+1;
}else{;
$idasiento=1;
};



if ($cobrado==1){;

$sql12="insert into contabilidad (idasiento,idempresas,fecha,año,debe,haber,division,servicio,categoria,obs) values ('$idasiento','$ide','$fechaa','$año','$total','','4','40','400','$obs')";
$result12=mysql_query ($sql12) or die ("Invalid result12");

$sql13="insert into contabilidad (idasiento,idempresas,fecha,año,debe,haber,division,servicio,categoria,obs) values ('$idasiento','$ide','$fechaa','$año','','$total','5','57','572','$obs')";
$result13=mysql_query ($sql13) or die ("Invalid result13");

}else{;

$total2=$total-$gastosdevolucion;
$obs="devolución del documento ".$idfr;
$sql12="insert into contabilidad (idasiento,idempresas,fecha,año,debe,haber,division,servicio,categoria,obs) values ('$idasiento','$ide','$fechaa','$año','','$total','4','40','400','$obs')";
$result12=mysql_query ($sql12) or die ("Invalid result12");

$sql13="insert into contabilidad (idasiento,idempresas,fecha,año,debe,haber,division,servicio,categoria,obs) values ('$idasiento','$ide','$fechaa','$año','$total2','','5','57','572','$obs')";
$result13=mysql_query ($sql13) or die ("Invalid result13");

$sql14="insert into contabilidad (idasiento,idempresas,fecha,año,debe,haber,division,servicio,categoria,obs) values ('$idasiento','$ide','$fechaa','$año','$gastosdevolucion','','6','6','669','$obs')";
$result14=mysql_query ($sql14) or die ("Invalid result14");
};


};







?>



LOS DATOS HAN SIDO INTRODUCCIDOS<p>


<a href="inicio.php" target="_parent">Volver a menu</a>
</body>
</html>










