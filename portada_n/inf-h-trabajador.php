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
$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
$row=mysqli_num_rows($result);

$j=0;

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);

$idpcsubcat=$resultado['idpcsubcat'];
$fecha_b=$resultado['dia'];
$idempleado=$resultado['idempleado'];
$idclientes=$resultado['idpiscina'];

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


for ($t=0;$t<count($resumenvalores);$t++){;


$idempleadot=$resumenvalores[$t]['idempleado'];
$sql10="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleadot."'"; 
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result1");
$resultado10=mysqli_fetch_array($result10);
$nombre=$resultado10['nombre'];
$papellido=$resultado10['1apellido'];
$sapellido=$resultado10['2apellido'];
$nempleado=$nombre.' '.$papellido.' '.$sapellido;


$htrabajadas=$resumenvalores[$t]['horas'];
$mtrabajadas=$resumenvalores[$t]['min'];

$minenhoras=intval($mtrabajadas/60);
$minrestantes=$mtrabajadas-($minenhoras*60);


$thtrabajadas=$htrabajadas+$minenhoras;


if ($minrestantes<10){;
$minrestantes='0'.$minrestantes;
};


$difhoras =$thtrabajadas.":".$minrestantes;
$totalhoras=($thtrabajadas*60)+$minrestantes;

$valoresf=$valoresf."\"".strtoupper($nempleado)."\"".":".$totalhoras;
if($t<count($resumenvalores)-1){
$valoresf=$valoresf.",";
};

$difhorast[]=$difhoras;

};
?> 
<table>
<tr>
<td rowspan="2"><canvas id="myCanvas" style="background: white;"></canvas></td>
<td>
<table >
<tr><td>  
<a href="inf-h-trabajador.php?m1=<?php  echo $mant;?>&y1=<?php  echo $yant;?>"><img src="../../img/minor-event-icon.png" width="25px"></a>
</td><td width="150px" style="text-align: center;">
<?php  echo $fechaact;?>
</td><td>
<a href="inf-h-trabajador.php?m1=<?php  echo $mpos;?>&y1=<?php  echo $ypos;?>"><img src="../../img/add-event-icon.png" width="25px"></a>  
</td></tr>
</table>
</td></tr>
<tr><td><legend for="myCanvas"></legend>
</td></tr>

</table>
    
    
    <script>

var arrayJS=<?php   echo json_encode($difhorast);?>;


var myCanvas = document.getElementById("myCanvas");
myCanvas.width = 550;
myCanvas.height = 290;
   
var ctx = myCanvas.getContext("2d");
 
function drawLine(ctx, startX, startY, endX, endY,color){
    ctx.save();
    ctx.strokeStyle = color;
    ctx.beginPath();
    ctx.moveTo(startX,startY);
    ctx.lineTo(endX,endY);
    ctx.stroke();
    ctx.restore();
}
 
function drawBar(ctx, upperLeftCornerX, upperLeftCornerY, width, height,color){
    ctx.save();
    ctx.fillStyle=color;
    ctx.fillRect(upperLeftCornerX,upperLeftCornerY,width,height);
    ctx.restore();
}

var myVinyls = {

<?php echo $valoresf;?>

};
 
 
var Barchart = function(options){
    this.options = options;
    this.canvas = options.canvas;
    this.ctx = this.canvas.getContext("2d");
    this.colors = options.colors;
  
    this.draw = function(){
        var maxValue = 0;
        for (var categ in this.options.data){
            maxValue = Math.max(maxValue,this.options.data[categ]);
        }
        var canvasActualHeight = this.canvas.height - this.options.padding * 2;
        var canvasActualWidth = this.canvas.width - this.options.padding * 2;
 
        //drawing the grid lines
        var gridValue = 0;
        while (gridValue <= maxValue){
            var gridY = canvasActualHeight * (1 - gridValue/maxValue) + this.options.padding;
            drawLine(
                this.ctx,
                0,
                gridY,
                this.canvas.width,
                gridY,
                this.options.gridColor
            );
             
            //writing grid markers
            this.ctx.save();
            this.ctx.fillStyle = this.options.gridColor;
            this.ctx.textBaseline="bottom"; 
            this.ctx.font = "bold 10px Arial";
            this.ctx.fillText(gridValue, 10,gridY - 2);
            this.ctx.restore();
 
            gridValue+=this.options.gridScale;
        }      
  
        //drawing the bars
        var barIndex = 0;
        var numberOfBars = Object.keys(this.options.data).length;
        var barSize = (canvasActualWidth)/numberOfBars;
 
        for (categ in this.options.data){
            var val = this.options.data[categ];
            var barHeight = Math.round( canvasActualHeight * val/maxValue) ;
            drawBar(
                this.ctx,
                this.options.padding + barIndex * barSize,
                this.canvas.height - barHeight - this.options.padding,
                barSize,
                barHeight,
                this.colors[barIndex%this.colors.length]
            );
 
            barIndex++;
        }
 
        //texto del grafico
        this.ctx.save();
        this.ctx.textBaseline="bottom";
        this.ctx.textAlign="center";
        this.ctx.fillStyle = "#000000";
        this.ctx.font = "bold 14px Arial";
        this.ctx.fillText(this.options.seriesName, this.canvas.width/2,this.canvas.height);
        this.ctx.restore();  
         
        //leyenda
        barIndex = 0;
        var legend = document.querySelector("legend[for='myCanvas']");
        var ul = document.createElement("ul");
        legend.append(ul);
        var i=0;
        for (categ in this.options.data){
            var li = document.createElement("li");
            li.style.listStyle = "none";
            li.style.borderLeft = "10px solid "+this.colors[barIndex%this.colors.length];
            li.style.padding = "2px";
            li.style.font = "bold 10px Arial";
            li.textContent = categ + " ";
            
				var parte =  arrayJS[i].split(":");           
            if (parte[0]>166){
            li.style.font = "bold 14px Arial";
            li.style.color= "#ff0000";
            }
            li.textContent = li.textContent + arrayJS[i];
            i = i + 1;
            ul.append(li);
            barIndex++;
        }
    }
}
 



var myBarchart = new Barchart(
    {
        canvas:myCanvas,
        seriesName:"Horas Trabajadas",
        padding:20,
        gridScale:5,
        gridColor:"#eeeeee",
        data:myVinyls,
        colors:["#666666","#67b6c7", "#bccd7a","#eb9743"]
    }
);
myBarchart.draw();


  
    
    
    
    </script>
