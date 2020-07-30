<?php 

//echo "hemos entrado en modificar<br/>";

if($subtabla=='datos'){;
$idempresasa=$datosa[0];
//echo "<br/>".$idempresasa;
$sql0="update empresas set ";
$sql1="where idempresas='".$idempresasa."'";

$sql0u="update usuarios set ";
$sql1u="where idempresas='".$idempresasa."'";


$nombrecampo=$nombrea;
$valoractual=$datosa;
$valornuevo=$datosn;

//echo (count($nombrecampo));
//for ($j=0;$j<count($nombrecampo);$j++){;
for ($j=2;$j<14;$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalidq result ".$nombrecampo[$j]." ");
//echo ($sql.'<br>');
};
};

$j=24;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalidq result ".$nombrecampo[$j]." ");
//echo ($sql.'<br>');
$sql=$sql0u.$sqla.$sql1u;
$resultd=mysqli_query ($conn,$sql) or die ("Invalidq result ".$nombrecampo[$j]." ");
//echo ($sql.'<br>');
};


for ($j=38;$j<44;$j++){;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid resulto ".$nombrecampo[$j]." ");
//echo ($sql.'<br>');
};
};

$j=46;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalidw result ".$nombrecampo[$j]." ");
//echo ($sql.'<br>');
};

$j=51;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid resultw ".$nombrecampo[$j]." ");
//echo ($sql.'<br>');
};

$j=61;
if ($valoractual[$j]!=$valornuevo[$j]){;
$sqla=$nombrecampo[$j]."='".$valornuevo[$j]."' ";
$sql=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sql) or die ("Invalid resultw ".$nombrecampo[$j]." ");
//echo ($sql.'<br>');
};

};



?>