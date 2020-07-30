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

$sql="select * from empresas where estado='1' order by idempresas asc";
//echo $sql.'<br/>';
$result=mysqli_query ($conn,$sql) or die ("Invalid result 1");
$row=mysqli_num_rows($result);



for ($t=0;$t<$row;$t++){;
mysqli_data_seek($result, $t);
$resultado=mysqli_fetch_array($result);
$ide=$resultado['idempresas'];
$logotipoe=$resultado['logotipo'];
$emailempresa=$resultado['email'];
$emailadmin2=$resultado['emailadmin'];

//echo $horario1.'<br/>';
$horario1=0;
$ft=date('Y-n-j',mktime( date(H)+$horario1,date(i),0,date(n),date(j),date(Y)) );
$tf=date('N',mktime( date(H)+$horario1,date(i),0,date(n),date(j),date(Y)) );
//$hfa=date('H:i:s',mktime( date(H)+$horario1,date(i)-60,0,date(n),date(j),date(Y)) );
$hfi=date('H:i:s',mktime( date(H)+$horario1,date(i)-20,0,date(n),date(j),date(Y)) );
$hff=date('H:i:s',mktime( date(H)+$horario1,date(i),0,date(n),date(j),date(Y)) );

//echo $hff.'<br/>';


$sql1="SELECT * from jorempleados where  idempresas='".$ide."' and turno='1'";
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
$sql1.=" and horent between '".$hfi."' and '".$hff."' ";
$sql1.="order by horent asc"; 
echo $sql1.'<br/>';
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result 1");
$row1=mysqli_num_rows($result1);



for ($j=0;$j<$row1;$j++){;
mysqli_data_seek($result1,$j);
$resultado1=mysqli_fetch_array($result1);
$idempleados=$resultado1['idempleados'];
$horent=$resultado1['horent'];
$h1=strtok($horent,':');
$m1=strtok(':');
$s1=strtok(':');
$margenent=$resultado1['margenent'];
$h2=strtok($margenent,':');
$m2=strtok(':');
$s2=strtok(':');
$h=$h1+$h2;
$m=$m1+$m2;
$s=$s1+$s2;
$horalimite=date('H:i:s',mktime( $h,$m,$s,0,0,0) );

if (($horalimite==$hff) or ($horario==$hff)) {;
$sql10="SELECT * from almpc where idempleado='".$idempleados."' and idempresas='".$ide."'
and idpccat='1' and idpcsubcat='1' and dia='".$ft."' and hora between '".$hfi."' and '".$hff."' ";
//echo $sql10;
$result10=mysqli_query ($conn,$sql10) or die ("Invalid result 10");
$row10=mysqli_num_rows($result10);

if ($row10==0){;

if ($horalimite==$hff){;
$sql13 = "INSERT INTO retrasojorempl(idempresas,idempleados,dia,hora,dsemana,ingreso) 
VALUES ('$ide','$idempleados','$ft','$hff','$tf','1')";
//echo $sql13;
$result13=mysqli_query ($conn,$sql13) or die ("Invalid result restrasojorempl-e");

$sql16="SELECT * from empleados where idempleado='".$idempleados."' and idempresa='".$ide."'";
//echo $sql10;
$result16=mysqli_query ($conn,$sql16) or die ("Invalid result 10");
$resultado16=mysqli_fetch_array($result16);
$nome=$resultado16['nombre'];
$ape1e=$resultado16['1apellido'];
$ape2e=$resultado16['2apellido'];
$emaile=$resultado16['email1'];
$nomempl=$nome.', '.$ape1e.' '.$ape2e;
$nomempl=strtoupper($nomempl);
$asunto="El trabajador ".$nomempl." no figura en ningún Puesto";

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
				<tr><td colspan='3'><img src='https://control.nativecbc.com/img/$logotipoe'></td></tr>
				<tr><td colspan='3' align='center'>EL TRABAJADOR</td></tr>
				<tr><td colspan='3' align='center'>$nomempl</td></tr>
				<tr><td colspan='3' align='center'>NO NOS FIGURA NINGUNA ENTRADA</td></tr>
				<tr><td colspan='3' >HORA DE ENTRADA: $horent</td></tr>
				<tr><td colspan='3' align='center'>MARGEN ESTIPULADO: $margenent</td></tr>
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

    $headers = 'From: SMARTCBC - ALERTAS PERSONAL SIN FICHAR ENTRADA - <no-reply@smartcbc.com>' . $eol;
    $headers .= 'Bcc: '.$emailadmin2 .",".$emaile . $eol;
	 //$headers .= 'Bcc: aprendom@yahoo.com'  . $eol;
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
   
    

    //SEND Mail
     if (mail($mailto, $subject, $message, $headers)) {
        //echo "mail send ... OK"; // or use booleans here
        echo "<center><table border=1 cellspacing=5 cellpadding=5><tr><th>MENSAJE ENVIADO SATISFACTORIAMENTE</th></tr></table></center>";
        //echo $mailto."<br>";
        //echo $subject."<br>";
        //echo $message."<br>";
        //echo $headers."<br>";       
        
      } else {
        //echo "mail send ... ERROR!";
        echo "<center><table border=1 cellspacing=5 cellpadding=5><tr><th>MENSJE NO ENVIADO</th></tr></table></center>";
        //echo $mailto."<br>";
        //echo $subject."<br>";
        //echo $message."<br>";
        //echo $headers."<br>";
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
