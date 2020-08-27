<?php 


$idempresasa=$datosn[0];

$sql0="update proveedores set ";
$sql1="where idempresas='".$ide."' and idproveedor='".$idproveedor."'";





$nombrecampo=array('nombre','nif','cp','domicilio','provincia','localidad','telefono','email','estado');
$valoractual=array($nombre,$nif,$cp,$domicilio,$provincia,$localidad,$telefonop,$emailp,$estadopro);
$valornuevo=array($nombre1,$nif1,$cp1,$domicilio1,$provincia1,$localidad1,$telefonop1,$emailp1,$estadopro1);





//echo (count($nombrecampo));
for ($j=0;$j<count($nombrecampo);$j++){;
//for ($j=2;$j<14;$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=$conn->exec($sql);
//$resultd=mysqli_query ($conn,$sql) or die ("Invalid result ".$nombrecampo[$j]." ");
//echo ($sql.'<br>');
};
};





?>