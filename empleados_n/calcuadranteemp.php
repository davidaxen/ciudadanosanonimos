<?php 
include('bbdd.php');

$sql20="select nombre, 1apellido as pa, 2apellido as sa, email1 from empleados where idempresa='".$ide."' and idempleado='".$empleado."'";

$result20=$conn->query($sql20);
$resultado20=$result20->fetch();
//$result20=mysqli_query ($conn,$sql20) or die ("Invalid result0");
//$resultado20=mysqli_fetch_array($result20);
$nombree=$resultado20['nombre'];
$apellidope=$resultado20['pa'];
$apellidose=$resultado20['sa'];
$emailemp=$resultado20['email1'];

?>


<body>
<table>
<tr><td><img src="../img/<?php  echo $img;?>" width="300" height="81"></td>
<td><font face="Tahoma" size="5">Cuadrante de <?php  echo strtoupper($nombree);?> <?php  echo strtoupper($apellidope);?> <?php  echo strtoupper($apellidose);?></font></td></tr>
</table>

<?php 
if ($mes==0) {;
$t101=date("Y-n-j",mktime(0,0,0,1,1,$año));
$t102=date("Y-n-j",mktime(0,0,0,1,0,$año+1));

$sql40="select sum(horas) as thoras from cuadrante where idempresas='".$ide."' and idempleado='".$empleado."' and fecha between '".$t101."' and '".$t102."'";

$result40=$conn->query($sql40);
$resultado40=$result40->fetch();
//$result40=mysqli_query ($conn,$sql40) or die ("Invalid result0");
$thoras=$resultado40['thoras'];

echo "<table>";
echo "<td> Total de Horas Trabajadas durante el año</td><td>".$thoras."</td>";
echo"</table>";
};	
?>


<?php 
function CalendarioPHP($year, $month, $day_heading_length = 3,$ide,$empleado){

global $conn;

$t101=date("Y-n-j",mktime(0,0,0,$month,1,$year));
$t102=date("Y-n-j",mktime(0,0,0,$month+1,0,$year));

$sql40="select sum(horas) as thoras from cuadrante where idempresas='".$ide."' and idempleado='".$empleado."' and fecha between '".$t101."' and '".$t102."'";

$result40=$conn->query($sql40);
$resultado40=$result40->fetch();
//$result40=mysqli_query ($conn,$sql40) or die ("Invalid result0");
//$resultado40=mysqli_fetch_array($result40);
$thoras=$resultado40['thoras'];

echo "<table>";
echo "<td> Total de Horas Trabajadas</td><td>".$thoras."</td>";
echo"</table>";	
	
	
	 
// Parametros de aspecto del calendario 
$nombreFichero = basename($_SERVER['PHP_SELF']); 
$ColorFondoCelda = '#CCCCCC'; 
$ColorFondoTabla = '#666666'; 
$ColorFondoCeldasDiaSemana = '#fff4bf'; 
$ColorFondoCeldasFestivo = '#ee0000'; 
$ColorFondoCeldaDiaActual = '#00ff00'; 
$ColorDiaLaboral = '#444444'; 
$ColorDiaFestivo = '#ffffff'; 
$ColorDiaActual = '#0000ff'; 
$TamanioFuente = '3'; 
$TipoFuente = 'Tahoma,Verdana,Arial, Helvetica, sans-serif'; 
$AnchoCalendario = '602'; 
$AltoCalendario = '200'; 
$AnchoCeldas = '86'; 
$AltoCeldas = '10'; 
$AlineacionHorizontalTexto = 'center'; 
$AlineacionVerticalTexto = 'center'; 

// ----------- INICIO Dias Festivos ---------- 

$sql="select * from diasfestivos where año='".$year."' order by mes,dia asc";

$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$num_rows=$result->fetchAll();
$row=count($num_rows);
//$result=mysqli_query ($conn,$sql) or die ("Invalid query");
//$row=mysqli_num_rows($result);

if ($row==0){;
$DiasFestivos[0] = '1/1'; // 1 de enero 
$DiasFestivos[1] = '6/1'; // 6 de enero 
$DiasFestivos[2] = '19/3'; // 19 de marzo 
$DiasFestivos[3] = '1/5'; // 1 de mayo 
$DiasFestivos[4] = '15/8'; // 15 de agosto 
$DiasFestivos[5] = '12/10'; // 12 de octubre 
$DiasFestivos[6] = '1/11'; // 1 de noviembre 
$DiasFestivos[7] = '6/12'; // 6 de diciembre 
$DiasFestivos[8] = '25/12'; // 25 de diciembre 
// festivos Regionales 
$DiasFestivos[9] = '2/5'; // 2 de mayo 
$DiasFestivos[10] = '15/5'; // 15 de mayo 
$DiasFestivos[11] = '9/9'; // 9 de noviembre 
// Semana Santa 
$DiasFestivos[12] = '17/4'; // Jueves Santo 
$DiasFestivos[13] = '18/4'; // Viernes Santo 
$DiasFestivos[14] = '8/12'; // 8 de diciembre 
}else{;

foreach ($resultmos as $row) {


//for ($l=0;$l<$row;$l++){;
//mysqli_data_seek($result,$l);
//$resultado=mysqli_fetch_array($result);
$df=$row['dia']; 
$mf=$row['mes']; 
$DiasFestivos[$l] = $df.'/'.$mf;
};
};
// ----------- FIN Dias Festivos ---------- 

//Calculo la fecha actual 
$dia_actual=date("j",time()); 
$mes_actual=date("n",time()); 
$anio_actual=date("Y",time()); 

$first_of_month = mktime (0,0,0, $month, 1, $year); 
#remember that mktime will automatically correct if invalid dates are entered 
# for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998 
# this provides a built in "rounding" feature to generate_calendar() 

static $day_headings = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'); 
$maxdays = date('t', $first_of_month); #number of days in the month 
$date_info = getdate($first_of_month); #get info about the first day of the month 
$month = $date_info['mon']; 
$year = $date_info['year']; 

//Traduzco los meses de ingles a Español 
switch ($date_info[month]) { 
case "January" : $mes_info="Enero";break; 
case "February" : $mes_info="Febrero";break; 
case "March" : $mes_info="Marzo";break; 
case "April" : $mes_info="Abril";break; 
case "May" : $mes_info="Mayo";break; 
case "June" : $mes_info="Junio";break; 
case "July" : $mes_info="Julio";break; 
case "August" : $mes_info="Agosto";break; 
case "September": $mes_info="Septiembre";break; 
case "October" : $mes_info="Octubre";break; 
case "November" : $mes_info="Noviembre";break; 
case "December" : $mes_info="Diciembre";break; 
}; 

//Comienzo la tabla que contiene el calendario 
$calendar = ("<table "). 
("border='0' "). 
("height='".$AltoCalendario."' "). 
("width='".$AnchoCalendario."' "). 
("cellspacing='1' cellpadding='2' "). 
("bgcolor='".$ColorFondoTabla."'>\n"); 

//Cabecera de la tabla calendario 
//Use the <caption> tag or just a normal table heading. Take your pick. 
//$calendar .= "<caption class=\\"month\\">$date_info[month], $year</caption>\n"; 
$calendar .= ("<tr>\n"). 
("<th height='".$AltoCeldas."' colspan='7'>"). 
("<font color='".$ColorDiaFestivo."' size=".$TamanioFuente." face='".$TipoFuente."'>"). 
("$mes_info, $year"). 
("</font>"). 
("</th>\n</tr>\n"); 

// Imprime los dias de la semana "Lun", "Mar", etc. 
// Si day_heading_length es 4, aparecerá el nombre entero del dia 
// si no, solo imprime los n primeros caracteres 
if($day_heading_length > 0 and $day_heading_length <= 4){ 
$calendar .= "<tr>\n"; 
foreach($day_headings as $day_heading){ 
$calendar .= ("<th height='".$AltoCeldas."' abbr='".$day_heading."' class='dayofweek' bgcolor='".$ColorFondoCeldasDiaSemana."'>"). 
("<font color='".$ColorDiaLaboral."' size='".$TamanioFuente."' face='".$TipoFuente."'>"). 
($day_heading_length != 4 ? substr($day_heading, 0, $day_heading_length) : $day_heading). 
("</font>"). 
("</th>\n"); 
} 
$calendar .= "</tr>\n"; 
} 
$calendar .= "<tr>\n"; 

//$weekday = $date_info['wday']; //Para que sea el Domingo el primer dia de la semana 
$weekday = $date_info['wday']-1; #weekday (zero based) of the first day of the month 
if ($weekday==-1) $weekday=6; //Por si el Domingo es el dia 1 del mes 
$day = 1; #starting day of the month 

// Cuidadin con los primeros dias "vacios" del mes 
if($weekday > 0){ 
$calendar .= ("<td bgcolor='".$ColorFondoTabla). 
("' colspan='".$weekday."'></td>\n"); 
} 

//Imprimimos los dias del mes 
while ($day <= $maxdays){ 
if($weekday == 7){ //Empieza una nueva semana 
$calendar .= "</tr>\n<tr>\n"; 
$weekday = 0; 
} 

//Miro si el dia que voy a pintar es festivo 
$esFestivo = 0; 
$tmp_date=$day."/".$month; 
for ($i=0;$i<14;$i++) { 
if ($tmp_date==$DiasFestivos[$i]) {$esFestivo=1;break;} 
} 

$calendar .= ("<td width='".$AnchoCeldas). 
("' height='".$AltoCeldas). 
("' align='".$AlineacionHorizontalTexto). 
("' valign='".$AlineacionVerticalTexto). 
("' "); 

// Coloreo el fondo dependiendo del dia en el que nos encontremos 
$calendar .= "bgcolor='"; 
if (($day==$dia_actual) and 
($month==$mes_actual) and 
($year==$anio_actual)) { //Si el dia es el de hoy 
$calendar .= $ColorFondoCeldaDiaActual; 
} else { // Si el dia no es el de hoy 
if (($weekday == 5) or ($weekday == 6) or ($esFestivo==1)) { // Si estoy en fin de semana weekday=5,6 
$calendar .= $ColorFondoCeldasFestivo; 
} else { 
$calendar .= $ColorFondoCelda; 
}; 
}; 
// Aqui es donde le pongo lo que tiene que hacer en caso de exista enlace 

$calendar .= "'>";


//$fecha_b=$year."-".$month."-".$day;

$fecha_b=date("Y-n-j",mktime(0,0,0,$month,$day,$year));


$calendar .= "<font color='"; 

if (($day==$dia_actual) and ($month==$mes_actual) and ($year==$anio_actual)) { //Si el dia es el de hoy 
$calendar .= $ColorDiaActual; 
} else { // Si el dia no es el de hoy 
if (($weekday == 5) or ($weekday == 6) or ($esFestivo==1)) { // Si estoy en fin de semana weekday=5,6 
$calendar .= $ColorDiaFestivo; 
} else {$calendar .= $ColorDiaLaboral;}; 
}; 
$calendar .= ("' "). 
("size='".$TamanioFuente."' "). 
("face='".$TipoFuente."'><strong>".$day). 
("</strong></font>");


$sql0="select turno, idcomunidad, horas from cuadrante where  idempresas='".$ide."' and idempleado='".$empleado."' and fecha='".$fecha_b."' order by turno asc";

$result0=$conn->query($sql0);
$resultmos1=$conn->query($sql0);
$num_rows=$result0->fetchAll();
$row0=count($num_rows);
//$result0=mysqli_query ($conn,$sql0) or die ("Invalid result0");
//$row0=mysqli_num_rows($result);

foreach ($resultmos1 as $row0) {

//for ($l=0;$l<$row0;$l++){;
//mysqli_data_seek($result0,$l);
//$resultado0=mysqli_fetch_array($result0);
$clientes=$row0['idcomunidad'];
$horas=$row0['horas'];
$turno=$row0['turno'];

$sql10="select idclientes,nombre from clientes where idempresas='".$ide."' and idclientes='".$clientes."'";

$result10=$conn->query($sql);
$resultado10=$result10->fetch();
//$num_rows=$result10->fetchAll();
//$row=count($num_rows);
//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result0");
//$resultado10=mysqli_fetch_array($result10);
$nombrep=$resultado10['nombre'];

switch ($turno){;
case 1: $d="M";break;
case 2: $d="T";break;
case 3: $d="N";break;
};
$calendar .= "<font size='1'>";
$calendar .= "<br>";
$calendar .= $d."-".$horas."-".substr(strtoupper($nombrep),5);
//$calendar .=substr(strtoupper($apellidope),0,3)." ".substr(strtoupper($apellidose),0,3);
$calendar .= "</font><br>";
};

$calendar .="</td>\n"; 
$day++; 
$weekday++; 
} 

//Cuidadin con los ultimos dias vacios del mes 
if($weekday != 7){ 
$calendar .= '<td bgcolor="'.$ColorFondoTabla.'" colspan="' . (7 - $weekday) . '"></td>'; 
} 

//Chinnnnn pon, devolvemos toda la cadena calendario 
return $calendar . "</tr>\n</table>\n"; 
} // Fin de la funcion CalendarioPHP(año, mes, caracteres del dia) 
/*
echo CalendarioPHP($año, $mes, $dia,$ide,$empleado); 
*/


if ($mes==0){;
for($j=1; $j<13; $j++){;
//$mes=$j;
echo CalendarioPHP($año, $j, $dia,$ide,$empleado); 
echo "<p>";
echo "<a href='pdfcalcuadranteemp.php?den=I&empleado=".$empleado."&año=".$año."&mes=".$j."'><img src='../img/impacrobat.gif' border='0' alt='Todas' width=20></a>";
if ($emailemp!=""){;
echo "  ";
echo "<a href='pdfcalcuadranteemp.php?den=F&empleado=".$empleado."&año=".$año."&mes=".$mes."'><img src='../img/mail.jpg' border='0' alt='Todas' width=20></a>";
};
};
}else{;
echo CalendarioPHP($año, $mes, $dia,$ide,$empleado); 
echo "<p>";
echo "<a href='pdfcalcuadranteemp.php?den=I&empleado=".$empleado."&año=".$año."&mes=".$mes."'><img src='../img/impacrobat.gif' border='0' alt='Todas' width=20></a>";
if ($emailemp!=""){;
echo "  ";
echo "<a href='pdfcalcuadranteemp.php?den=F&empleado=".$empleado."&año=".$año."&mes=".$mes."'><img src='../img/mail.jpg' border='0' alt='Todas' width=20></a>";
};
};



?> 
</div>
<p>
