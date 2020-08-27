<?php  
include('bbdd.php');
//set_time_limit (0);

/*
$hora=date('H:i:s',mktime( date(H),date(i),0,date(n),date(j),date(Y)) );
while ($hora<='23:59:00'){;
set_time_limit (0);
$hor=strtok($hora,":");
$min=strtok(":");
$seg=strtok(":");
if($seg=="00"){;
*/

$sql="select * from empresas where estado='1'";
//echo $sql.'<br/>';

$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$num_rows=$result10->fetchAll();
$row=count($num_rows);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result 1");
//$row=mysqli_num_rows($result);

echo 'Total de empresas'.$row.'</br>';

foreach ($resultmos as $row) {

//for ($t=0;$t<$row;$t++){;
//mysqli_data_seek($result,$t);
//$resultado=mysqli_fetch_array($result);
$ide=$row['idempresas'];
$emailempresa=$row['email'];
$emailadmin2=$row['emailadmin'];

//echo $horario1.'<br/>';
$horario1=0;
$ft=date('Y-n-j',mktime( date(H)+$horario1,date(i),0,date(n),date(j),date(Y)) );
$tf=date('N',mktime( date(H)+$horario1,date(i),0,date(n),date(j),date(Y)) );
//$hfa=date('H:i:s',mktime( date(H)+$horario1,date(i)-60,0,date(n),date(j),date(Y)) );
$hfi=date('H:i:s',mktime( date(H)+$horario1,date(i)-20,0,date(n),date(j),date(Y)) );
$hff=date('H:i:s',mktime( date(H)+$horario1,date(i),0,date(n),date(j),date(Y)) );

//echo $hff.'<br/>';


$sql1="SELECT * from jornadas where  idempresas='".$ide."' ";
switch($tf){;
case 1: $sql1.=" and lun='1' ";break;
case 2: $sql1.=" and mar='1' ";break;
case 3: $sql1.=" and mie='1' ";break;
case 4: $sql1.=" and jue='1' ";break;
case 5: $sql1.=" and vie='1' ";break; 
case 6: $sql1.=" and sab='1' ";break;
case 7: $sql1.=" and dom='1' ";break;
};
$sql1.=" and finicio<='".$ft."' and ffin>='".$ft."' ";
$sql1.=" and horario between '".$hfi."' and '".$hff."' ";
$sql1.="order by horario asc"; 
//echo $sql1.'<br/>';

$result1=$conn->query($sql1);
$resultmos1=$conn->query($sql1);
$num_rows=$result10->fetchAll();
$row=count($num_rows);

//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
//$row1=mysqli_num_rows($result1);


echo "funcionamiento".$row1." - ".$ide."<br/>";

foreach ($resultmos1 as $row1) {

//for ($j=0;$j<$row1;$j++){;
//mysqli_data_seek($result1,$j);
//$resultado1=mysqli_fetch_array($result1);
$idclientes=$row1['idclientes'];
$horario=$row1['horario'];
$h1=strtok($horario,':');
$m1=strtok(':');
$s1=strtok(':');
$margen=$resultado1['margen'];
$h2=strtok($margen,':');
$m2=strtok(':');
$s2=strtok(':');
$h=$h1+$h2;
$m=$m1+$m2;
$s=$s1+$s2;
$horalimite=date('H:i:s',mktime( $h,$m,$s,0,0,0) );

if (($horalimite==$hff) or ($horario==$hff)) {;
$sql10="SELECT * from almpc where idpiscina='".$idclientes."' and idempresas='".$ide."'
and idpccat='1' and idpcsubcat='1' and dia='".$ft."' and hora between '".$hfi."' and '".$hff."' ";
//echo $sql10;

$result10=$conn->query($sql10);
$num_rows=$result10->fetchAll();
$row=count($num_rows);

//$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
//$row10=mysqli_num_rows($result10);

if ($row10==0){;

if ($horalimite==$hff){;
$sql13 = "INSERT INTO retrasojor(idempresas,idclientes,dia,hora,dsemana,ingreso) 
VALUES ('$ide','$idclientes','$ft','$hff','$tf','2')";
//echo $sql13;

$result13=$conn->query($sql13);

//$result13=mysqli_query ($conn,$sql13) or die ("Invalid result iclientes");


$sql18="SELECT * from vecinos,vecinoscom where vecinos.idcliente=vecinoscom.idcliente and vecinos.idempresa=vecinoscom.idempresa and vecinoscom.idcliente='".$idclientes."' and vecinoscom.idempresa='".$ide."' and jornada='1' and estado='1'";
//echo $sql18;

$result=$conn->query($sql18);
$resultmos18=$conn->query($sql18);
$num_rows=$result10->fetchAll();
$row=count($num_rows);

$result18=mysqli_query ($conn,$sql18) or die ("Invalid result 18");
$row18=mysqli_num_rows($result18);

if ($row18>0){;
$emaile=" ";

foreach ($resultmos18 as $row18) {

//for ($te=0;$te<$row18;$te++){;
//mysqli_data_seek($result18,$te);
//$resultado18=mysqli_fetch_array($result18);
$emaile.=$row18['email'];
$y=$te+1;

if ($y<$row18){;
$emaile.=",";
};

};
};


$sql16="SELECT * from clientes where idclientes='".$idclientes."' and idempresas='".$ide."'";
//echo $sql16;

$result16=$conn->query($sql16);
$resultado16=$result16->fetchAll();

//$result16=mysqli_query ($conn,$sql16) or die ("Invalid result 10");
//$resultado16=mysqli_fetch_array($result16);
$nomcliente=$resultado16['nombre'];
$nomcliente=strtoupper($nomcliente);
$asunto="Puesto de Trabajo ".$nomcliente." sin personal";

	 //$mailto="sguinaldo@yahoo.com";
	 $mailto=$emailempresa;
    //$message=$obs;
    $subject = $asunto;
    
		$message = "
				<html>
				<head>
				<title>$asunto</title>
				</head>
				<body><center>
				<table>
				<tr><td colspan='3'><img src='http://www.smartcbc.com/images/smcbc_logo_master.png'></td></tr>
				<tr><td colspan='3' align='center'>EN EL PUESTO DE TRABAJO</td></tr>
				<tr><td colspan='3' align='center'>$nomcliente</td></tr>
				<tr><td colspan='3' align='center'>NO NOS FIGURA NINGUNA ENTRADA</td></tr>
				<tr><td colspan='3' >HORA DE ENTRADA: $horario</td></tr>
				<tr><td colspan='3' align='center'>MARGEN ESTIPULADO: $margen</td></tr>
				<tr><td align='center'>Smartcbc</td><td align='center'>Condiciones del servicio</td><td align='center'>Politica</td></tr>
				</table>
				</center>
				</body>
				</html>";     
    
		/*
		$message = "
				<html>
				<head>
				<title>$asunto</title>
				</head>
				<body>
				$valor<p>
				$rf1<p>
				</body>
				</html>
				";    
   
    
    $message="En el Puesto de Trabajo ".$nomcliente." segun sus indicaciones tiene comienzo de jornada a las ".$horario." con un margen de espera de ".$margen."\r";
    $message.="Este mensaje es para indicarle que se ha sobre pasado el margen de espera y en no se ha detectado ninguna entrada de personal en el puesto de trabajo indicado"; 
     */
    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (we use a PHP end of line constant)
    $eol = PHP_EOL;

    // main header (multipart mandatory)

    $headers = 'From: SMARTCBC - ALERTAS SIN PERSONAL - <no-reply@smartcbc.com>' . $eol;
if ($emailadmin2!=""){;   
    $headers .= 'Cc: '.$emailadmin2  . $eol;
};
    if ($row18>0){;
	 $headers .= 'Bcc: ' .$emaile  . $eol;
	 };

    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
   
    

    //SEND Mail
     if (mail($mailto, $subject, $message, $headers)) {
        //echo "mail send ... OK"; // or use booleans here
        echo "<center><table border=1 cellspacing=5 cellpadding=5><tr><th>MENSAJE ENVIADO SATISFACTORIAMENTE</th></tr></table></center>";
        echo $mailto."<br>";
        echo $subject."<br>";
        echo $message."<br>";
        echo $headers."<br>";       
        
      } else {
        //echo "mail send ... ERROR!";
        echo "<center><table border=1 cellspacing=5 cellpadding=5><tr><th>MENSAJE NO ENVIADO</th></tr></table></center>";
        echo $mailto."<br>";
        echo $subject."<br>";
        echo $message."<br>";
        echo $headers."<br>";
      }
      





};


};
};
};

};

/*
};
$hora=date('H:i:s',mktime( date(H),date(i),date(s),date(n),date(j),date(Y)) );
$valor=time();
echo $valor.'<br/>';
};
*/
?>
