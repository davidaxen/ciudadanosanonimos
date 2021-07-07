<?php 
$sdato=$_SERVER['HTTP_USER_AGENT'];
$dominio=$_SERVER['SERVER_NAME'];
setcookie("user","");
setcookie("pass","");
extract($_GET);
extract($_POST);




$tablet_browser = 0;
$mobile_browser = 0;
$body_class = 'desktop';
 
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $tablet_browser++;
    $body_class = "tablet";
}
 
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobile_browser++;
    $body_class = "mobile";
}
 
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobile_browser++;
    $body_class = "mobile";
}
 
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');
 
if (in_array($mobile_ua,$mobile_agents)) {
    $mobile_browser++;
}
 
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
    $mobile_browser++;
    //Check for tablets on opera mini alternative headers
    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
      $tablet_browser++;
    }
}
if ($tablet_browser > 0) {
 setcookie("dispositivo","tablet");

}
else if ($mobile_browser > 0) {
 setcookie("dispositivo","movil");
}
else {
 setcookie("dispositivo","pc");
}


include('bbdd.php');
if(isset($idpr)==false) {
$idpr=null;
}	
	
if($idpr!=null){;
$idprt=$idpr;
}else{
$idprt=1;	
	};

if ($idprt!=null){;

  if (isset($_REQUEST['msg'])) {
    echo "<script> alert('".$_REQUEST['msg']."'); </script>";
  }

$sql="select * from proyectos where idproyectos='".$idprt."'";
$result=$conn->query($sql);
$resultrow=$conn->query($sql);

if (isset($_COOKIE['lang']) && $_COOKIE['lang']!='') {
    $idioma=strtolower($lang);
  }else{
    $idioma='es';
  }

  include_once($_SERVER['DOCUMENT_ROOT']."/lang/$idioma.php");

$row=count($resultrow->fetchAll());
$resultados=$result->fetch();
/*
$resultados[]=$TITULO1;
$resultados[]=$TITULO2;
$resultados[]=$INPUTNAME;
$resultados[]=$INPUTPASS;
$resultados[]=$BTENTRAR;
$resultados[]=$HREFRECUCON;
*/
/*$result=mysqli_query ($conn, $sql) or die ("Este dominio no tiene acceso al sistema, por favor hable con el departamento Tecnico");
$row=mysqli_num_rows($result);
$resultados = mysqli_fetch_array ($result);*/


if ($row==0){

echo ("Este dominio no tiene acceso al sistema, comprueba todas la conexiones, por favor hable con el departamento de sistemas.");

	}else{;
	$logo = $resultados['logo'];
$logo=$LOGOPRIN2;
$tit1=$TITULO1;
$tit2=$TITULO2;
$inpn=$INPUTCORREO;
$inpp=$INPUTPASS;
$bte=$BTNENTRAR;
$hrec=$HREFRECUCON;
	
	$bdescarga=$resultados['botondescarga'];
   $fondo=$resultados['fondo'];
   $colorcentral=$resultados['colorfondo'];
   $colorarriba=$resultados['colorarriba'];
   $colorlateral=$resultados['colorlateral'];
   //$icono=$resultados['icono'];
   $pagina=$resultados['pagina'];
   //echo "$pagina";
   //echo "$logo";
   //echo "$bdescarga";
   //echo "$idprt";

//setcookie("colorarriba",$colorarriba);
//setcookie("colorcentral",$colorcentral);
//setcookie("colorlateral",$colorlateral);

?>

<?php if ($mobile_browser > 0) {;?>
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
<?php };?>
  
<?php echo sprintf($pagina,$logo,$bdescarga,$idprt,$tit1,$tit2,$inpn,$inpp,$bte,$hrec);?>


<?php };?>

<?php }else{;?>

Este dominio no tiene acceso al sistema, por favor hable con el departamento de sistemas.<br/>

<?php };?>