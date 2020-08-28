<?php
include('bbdd.php');

$year=$año;
$month=$mes;


$sql20="select nombre, 1apellido as pa, 2apellido as sa, email1 from empleados where idempresa='".$ide."' and idempleado='".$empleado."'";

$result20=$conn->query($sql20);
//$resultmos=$conn->query($sql20);
$resultado20=$result20->fetchAll();
//$row=count($num_rows);

//$result20=mysqli_query ($conn,$sql20) or die ("Invalid result0");
//$resultado20=mysqli_fetch_array($result20);
$nombree=$resultado20['nombre'];
$apellidope=$resultado20['pa'];
$apellidose=$resultado20['sa'];
$datoemp=$nombree.' '.$apellidope.' '.$apellidose;
$apellidose=$resultado20['sa'];
$emailemp=$resultado20['email1'];


require("pdfcalendarbase.php");

class MyCalendar extends PDF_USA_Calendar
{

function printDay($date)
{
global $conn;
global $mes;
global $empleado;
global $ide;
$dato="";

	// add logic here to customize a day
	$this->JDtoYMD($date,$year,$month,$day);
	
$dia=$day;	
$fecha_b=date("Y-n-j",mktime(0,0,0,$month,$day,$year));

$sql0="select turno, idcomunidad, horas from cuadrante where  idempresas='".$ide."' and idempleado='".$empleado."' and fecha='".$fecha_b."' order by turno asc";

$resul0t=$conn->query($sql0);
$resultmos=$conn->query($sql0);
$num_rows=$result10->fetchAll();
$row0=count($num_rows);

//$result0=mysqli_query ($conn,$sql0) or die ("Invalid result0");
//$row0=mysqli_num_rows($result0);

foreach ($resultmos as $row0) {

//for ($l=0;$l<$row0;$l++){;
//mysqli_data_seek($result0,$l);
//$resultado0=mysqli_fetch_array($result0);
$clientes=$row0['idcomunidad'];
$horas=$row0['horas'];
$turno=$row0['turno'];

$sql10="select idclientes,nombre from clientes where idempresas='".$ide."' and idclientes='".$clientes."'";

$result10=$conn->query($sql10);
//$resultmos=$conn->query($sql);
$num_rows=$result10->fetchAll();
$row=count($num_rows);

//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result0");
//$resultado10=mysqli_fetch_array($result10);
$nombrep=$resultado10['nombre'];

switch ($turno){;
case 1: $d="M";break;
case 2: $d="T";break;
case 3: $d="N";break;
}
$dato1=$d."-".$horas;
$dato2=substr(strtoupper($nombrep),5)." ";

	//if ($month == $mes && $day == $dia )
		//{
		$this->SetXY($this->x, $this->y +2);
		$this->SetFont("Arial", "B", 8);
		$this->Cell($this->squareWidth,5,strtoupper($dato1), 0,2, "C");
		$this->SetFont("Arial", "B", 8);
		$valor=$this->x;
		$this->MultiCell($this->squareWidth,5,strtoupper($dato2), 0,"C");
		$this->SetXY($valor, $this->y-7);
		$this->Cell($this->squareWidth,5,"", 0,2, "C");
		//}
}

}

function isHoliday($date)
{
	// insert your favorite holidays here
	$this->JDtoYMD($date, $year, $month, $day);
	if ($date == easter_days($year) + $this->MDYtoJD(3,21,$year))
		{
		$noSchool = false;
		return "Easter";
		}
	if ($date == easter_days($year) + $this->MDYtoJD(3,21,$year) - 2)
		{
		$noSchool = false;
		return "Good Friday";
		}
	$jewishDate = explode("/", jdtojewish(gregoriantojd($month,$day,$year)));
	$month = $jewishDate[0];
	$day = $jewishDate[1];
	/*
	if ($month == 1 && $day == 1)
		return "Rosh Hashanah";
	if ($month == 1 && $day == 2)
		return "Rosh Hashanah";
	if ($month == 1 && $day == 10)
		return "Yom Kippur";
	if ($month == 3 && $day == 25)
		return "Chanukkah";
	if ($month == 8 && $day == 15)
		return "Passover";
	// call the base class for USA holidays
	*/
	return parent::isHoliday($date);
}

} // class MyCalendar extends PDF_USA_Calendar

// MyCalendar shows how to customize your calendar with Easter, some select Jewish holidays and a birthday
// Supports any size paper FPDF does
$pdf = new MyCalendar("L", "Letter");
// you can set margins and line width here. PDF_USA_Calendar uses the current settings.
$pdf->SetMargins(7,7);
$pdf->SetAutoPageBreak(false, 0);
// set fill color for non-weekend holidays
$greyValue = 190;
$pdf->SetFillColor($greyValue,$greyValue,$greyValue);
// print the calendar for a whole year
//$year = gmdate("Y");

		

//for ($month = 1; $month <= 12; ++$month)
	//{
	$date = $pdf->MDYtoJD($month, 1, $year);
	$pdf->printMonth($date);
	
$t101=date("Y-n-j",mktime(0,0,0,$month,1,$year));
$t102=date("Y-n-j",mktime(0,0,0,$month+1,0,$year));

	$date_info10 = date("F",mktime(0,0,0,$month+1,0,$year));
switch ($date_info10) { 
case "January" : $mes_info1="Enero";break; 
case "February" : $mes_info1="Febrero";break; 
case "March" : $mes_info1="Marzo";break; 
case "April" : $mes_info1="Abril";break; 
case "May" : $mes_info1="Mayo";break; 
case "June" : $mes_info1="Junio";break; 
case "July" : $mes_info1="Julio";break; 
case "August" : $mes_info1="Agosto";break; 
case "September": $mes_info1="Septiembre";break; 
case "October" : $mes_info1="Octubre";break; 
case "November" : $mes_info1="Noviembre";break; 
case "December" : $mes_info1="Diciembre";break; 
}; 	
	//$monthStr = strtoupper(gmdate ("F Y", jdtounix($date)));
	$monthStr1= strtoupper($mes_info1.' '.$year);

$sql40="select sum(horas) as thoras from cuadrante where idempresas='".$ide."' and idempleado='".$empleado."' and fecha between '".$t101."' and '".$t102."'";

$result40=$conn->query($sql40);
$resultado40=$result10->fetchAll();
//$result40=mysqli_query ($conn,$sql40) or die ("Invalid result0");
//$resultado40=mysqli_fetch_array($result40);
$thoras=$resultado40['thoras'];
	//}
	$imgemp='../img/'.$img;
		$pdf->Image($imgemp,5,5,60,20);
	  $pdf->SetFont('Arial','B',20);
		$pdf->SetXY(0,0);
		$pdf->MultiCell(272,22,strtoupper($datoemp),0,'R');
	  $pdf->SetFont('Arial','B',10);
		$pdf->SetXY(10,25);
		$pdf->MultiCell(272,22,"Total de Horas Trabajadas ".strtoupper($thoras),0,'L');
//$pdf->Output();

if($den=='F'){;
$path="CUA";
$nomfich1=$vemp."_".$datoemp."_".$monthStr1.".pdf";
$nomfich=$path."/".$nomfich1;
}else{;
$nomfich=$vemp."_".$datoemp."_".$monthStr1.".pdf";
}
$pdf->Output($nomfich,$den);
//$pdf->Output();

if($den=='F'){;
$apen='';
include('correocua.php');
};

?>
