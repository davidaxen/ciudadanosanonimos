<?php  
include ('bbdd.php');

if (!isset($m1)){;
$m1=null;
};

if ($m1==null){;
$hoy=getdate();
$m1=$hoy['mon'];
$y1=$hoy['year'];
};

$fechai=date("Y-m-d", mktime(0, 0, 0, $m1, 1, $y1));
$fechaf=date("Y-m-d", mktime(0, 0, 0, $m1+1, 0, $y1));
$idpccat=1;
$idempleado='todos';

$sql="SELECT * from almpc where idempresas='".$ide."' and idpccat='".$idpccat."' and dia between '".$fechai."' and '".$fechaf."' ";
if ($idempleado!='todos'){;
$sql.=" and idempleado='".$idempleado."'";
};
$sql.=" order by  idempleado asc, idpiscina asc";

//echo $sql;

$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$num_rows=$result->fetchAll();
$row=count($num_rows);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
//$row=mysqli_num_rows($result);

$j=0;

foreach ($resultmos as $row) {

//for ($i=0;$i<$row;$i++){;
//mysqli_data_seek($result,$i);
//$resultado=mysqli_fetch_array($result);
$idpcsubcat=$row['idpcsubcat'];
$fecha_b=$row['dia'];
$idempleado=$row['idempleado'];
$idclientes=$row['idpiscina'];

if ( ($idempleadot!=$idempleado) or ($idclientest!=$idclientes) ) {
	if ($idpcsubcat==1){
$valores[$j]['idempleadot']=$idempleado;
$valores[$j]['idclientest']=$idclientes;
$valores[$j]['fechaent']=$fecha_b;
$valores[$j]['horaent']=$resultado['hora'];
$valores[$j]['lonent']=$resultado['lon'];
$valores[$j]['latent']=$resultado['lat'];

$fecha_bt=$fecha_b;
$idempleadot=$idempleado;
$idclientest=$idclientes;
}
}else{
if ($idpcsubcat==2){
$valores[$j]['fechasal']=$fecha_b;
$valores[$j]['horasal']=$resultado['hora'];
$valores[$j]['lonsal']=$resultado['lon'];
$valores[$j]['latsal']=$resultado['lat'];
$j=$j+1;
$fecha_bt=0;
$idempleadot=0;
$idclientest=0;
}

}



};

$idempleado=0;
$yu=0;

for ($t=0;$t<count($valores);$t++){;


$idempleadot=$valores[$t]['idempleadot'];

if($idempleado==$idempleadot){

$controldiaentrada=$valores[$t]['fechaent'];
$controlhoraentrada=$valores[$t]['horaent'];
$controldiasalida=$valores[$t]['fechasal'];
$controlhorasalida=$valores[$t]['horasal'];

$dia1=explode ("-",$controldiaentrada);
$dia2=explode ("-",$controldiasalida);
       $YDesde=$dia1[0];
       $MDesde=$dia1[1];
       $DDesde=$dia1[2];      
       $YHasta=$dia2[0];
       $MHasta=$dia2[1];
       $DHasta=$dia2[2];
$hora1 = explode(":",$controlhoraentrada);
$hora2 = explode(":", $controlhorasalida);
       $HoraDesde=$hora1[0];
       $MinutoDesde=$hora1[1];
       $HoraHasta=$hora2[0];
       $MinutoHasta=$hora2[1];
       
$anterior=mktime($HoraDesde,$MinutoDesde,0,$MDesde,$DDesde,$YDesde);
$actual=mktime($HoraHasta,$MinutoHasta,0,$MHasta,$DHasta,$YHasta);
$diferencia=$actual-$anterior;

    
       $TotHorasTrab=intval($diferencia / 3600);
       $RestaHoras=($diferencia - ($TotHorasTrab*3600) );
       $TotMinTrab=intval($RestaHoras/60);
if ($TotMinTrab<10){;
$TotMinTrab='0'.$TotMinTrab;
};


$controlhora=$TotHorasTrab;
$controlmin=$TotMinTrab;

$controlhoratotal=$controlhoratotal+$controlhora;
$controlmintotal=$controlmintotal+$controlmin;

$difhoras =$controlhora.":".$controlmin;



}else{

if ($t>0){
	$resumenvalores[$yu]['idempleado']=$idempleado;
	$resumenvalores[$yu]['horas']=$controlhoratotal;
	$resumenvalores[$yu]['min']=$controlmintotal;
	$controlhoratotal=0;
	$controlmintotal=0;
	$yu=$yu+1;
		}

$controldiaentrada=$valores[$t]['fechaent'];
$controlhoraentrada=$valores[$t]['horaent'];
$controldiasalida=$valores[$t]['fechasal'];
$controlhorasalida=$valores[$t]['horasal'];

$dia1=explode ("-",$controldiaentrada);
$dia2=explode ("-",$controldiasalida);
       $YDesde=$dia1[0];
       $MDesde=$dia1[1];
       $DDesde=$dia1[2];      
       $YHasta=$dia2[0];
       $MHasta=$dia2[1];
       $DHasta=$dia2[2];
$hora1 = explode(":",$controlhoraentrada);
$hora2 = explode(":", $controlhorasalida);
       $HoraDesde=$hora1[0];
       $MinutoDesde=$hora1[1];
       $HoraHasta=$hora2[0];
       $MinutoHasta=$hora2[1];
       
$anterior=mktime($HoraDesde,$MinutoDesde,0,$MDesde,$DDesde,$YDesde);
$actual=mktime($HoraHasta,$MinutoHasta,0,$MHasta,$DHasta,$YHasta);
$diferencia=$actual-$anterior;

    
       $TotHorasTrab=intval($diferencia / 3600);
       $RestaHoras=($diferencia - ($TotHorasTrab*3600) );
       $TotMinTrab=intval($RestaHoras/60);
if ($TotMinTrab<10){;
$TotMinTrab='0'.$TotMinTrab;
};


$controlhora=$TotHorasTrab;
$controlmin=$TotMinTrab;

$controlhoratotal=$controlhoratotal+$controlhora;
$controlmintotal=$controlmintotal+$controlmin;

$difhoras =$controlhora.":".$controlmin;


}

$idempleado=$idempleadot;

if ($t==count($resumenvalores)-1){
	$resumenvalores[$yu]['idempleado']=$idempleado;
	$resumenvalores[$yu]['horas']=$controlhoratotal;
	$resumenvalores[$yu]['min']=$controlmintotal;
	$controlhoratotal=0;
	$controlmintotal=0;
	$yu=$yu+1;
		}

}


?>








		<link rel="stylesheet" href="/estilo/estilonuevo.php" type="text/css" media="screen" charset="utf-8" >

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
  <script>
 // Write on keyup event of keyword input element
 $(document).ready(function(){
 $("#search").keyup(function(){
 _this = this;
 // Show only matching TR, hide rest of them
 $.each($("#mytable tbody tr"), function() {
 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
 $(this).hide();
 else
 $(this).show();
 });
 });
});
</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <style> 
input[type=text] {
  width: 200px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 10px;
  background-color: white;
  /*background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;*/
  padding: 8px 8px 8px 8px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 100%;
}  
  </style>
  
 <?php  
$dant=1;
$dpos=1;
$mant=$m1-1;
$mpos=$m1+1;
$yant=$y1;
$ypos=$y1;
switch($m1){;
case 1: $mant=12;$yant=$y1-1;$fechaant="Diciembre ".$yant;$fechaact="Enero ".$y1;$fechapos="Febrero ".$y1;break;
case 2: $fechaant="Enero ".$y1;$fechaact="Febrero ".$y1;$fechapos="Marzo ".$y1;break;
case 3: $fechaant="Febrero ".$y1;$fechaact="Marzo ".$y1;$fechapos="Abril ".$y1;break;
case 4: $fechaant="Marzo ".$y1;$fechaact="Abril ".$y1;$fechapos="Mayo ".$y1;break;
case 5: $fechaant="Abril ".$y1;$fechaact="Mayo ".$y1;$fechapos="Junio ".$y1;break;
case 6: $fechaant="Mayo ".$y1;$fechaact="Junio ".$y1;$fechapos="Julio ".$y1;break;
case 7: $fechaant="Junio ".$y1;$fechaact="Julio ".$y1;$fechapos="Agosto ".$y1;break;
case 8: $fechaant="Julio ".$y1;$fechaact="Agosto ".$y1;$fechapos="Septiembre ".$y1;break;
case 9: $fechaant="Agosto ".$y1;$fechaact="Septiembre ".$y1;$fechapos="Octubre ".$y1;break;
case 10: $fechaant="Septiembre ".$y1;$fechaact="Octubre ".$y1;$fechapos="Noviembre ".$y1;break;
case 11: $fechaant="Octubre ".$y1;$fechaact="Noviembre ".$y1;$fechapos="Diciembre ".$y1;break;
case 12: $mpos=1;$ypos=$y1+1;$fechaant="Noviembre ".$y1;$fechaact="Diciembre ".$y1;$fechapos="Enero ".$ypos;break;
};
?> 

<table style="aling:center">
<tr><td>  
<a href="inf-h-trabajador.php?m1=<?php  echo $mant;?>&y1=<?php  echo $yant;?>"><img src="../../img/minor-event-icon.png" width="25px"></a>
</td><td>
<?php  echo $fechaact;?>
</td><td>
<a href="inf-h-trabajador.php?m1=<?php  echo $mpos;?>&y1=<?php  echo $ypos;?>"><img src="../../img/add-event-icon.png" width="25px"></a>  
</td></tr></table>

    <div class="form-group">
 <input type="text" class="form-control pull-right" style="width:20%" id="search" placeholder="Escribe lo que quieres buscar en la tabla...">
</div>


<table class="table-bordered table pull-right" id="mytable" cellspacing="0" style="width: 100%;">

<thead class="enctab">
 <tr role="row">
<th>Empleados</th><th>Horas Trabajadas</th></tr>
</thead>
<tbody>
<?php 
for ($t=0;$t<count($resumenvalores);$t++){;


$idempleadot=$resumenvalores[$t]['idempleado'];
$sql10="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleadot."'"; 

$result10=$conn->query($sql10);
$resultado10=$result10->fetchAll();
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result1");
//$resultado10=mysqli_fetch_array($result10);
$nombre=$resultado10['nombre'];
$papellido=$resultado10['1apellido'];
$sapellido=$resultado10['2apellido'];
$nempleado=$nombre.', '.$papellido.' '.$sapellido;


$htrabajadas=$resumenvalores[$t]['horas'];
$mtrabajadas=$resumenvalores[$t]['min'];

$minenhoras=intval($mtrabajadas/60);
$minrestantes=$mtrabajadas-($minenhoras*60);


$thtrabajadas=$htrabajadas+$minenhoras;


if ($minrestantes<10){;
$minrestantes='0'.$minrestantes;
};


$difhoras =$thtrabajadas.":".$minrestantes;

$yt=fmod($t,2);
?>

<?php if ($yt==0){;?><tr class="mpar"><?php };?> 
<?php if ($yt==1){;?><tr class="mimpar"><?php };?>
<td><?php  echo strtoupper($nempleado);?></td>
<td>
<?php  if ($difhoras>=0){; ?>
<?php  echo $difhoras;?>
<?php };?>
</td>
</tr>
<?php };?>
</tbody>
</table>
