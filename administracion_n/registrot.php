<?php 
include('bbdd.php');

if ($idpr!=null){;

$sql="SELECT * from proyectos where idproyectos='".$idpr."'"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$logo=$resultado['logo'];
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<title>REGISTRO EN <?php  echo strtoupper($nombre);?></title>  

  <link rel="shortcut icon" href="images/a-master-favicon.ico"/>
  <title><?php  echo $nombre;?></title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css"/>
  <link rel="stylesheet" type="text/css" href="css/native.css" id="pagesheet"/>
  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/iefonts_native.css?3794966850"/>
  <![endif]-->
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
var __adobewebfontsappname__ = "muse";
</script>
  <!-- JS includes -->
  <script type="text/javascript">
   document.write('\x3Cscript src="' + (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//webfonts.creativecloud.com/dosis:n4:all;open-sans:n3,n7,n4:all;arimo:n7,n4:all;nova-square:n4:all.js" type="text/javascript">\x3C/script>');
</script>
    <!--HTML Widget code-->
  
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('require', 'displayfeatures');
ga('require', 'linkid', 'linkid.js');
ga('create', 'UA-45462730-1', 'auto');
ga('send', 'pageview');
</script>

 </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="browser_width" id="u6417-bw">
     <div class="pinned-colelem" id="u6417"><!-- simple frame --></div>
    </div>
    <a class="nonblock nontext pinned-colelem" id="u6454" href="http://www.<?php  echo $nombre;?>.com">

 
     <div class="clip_frame grpelem" id="u8053"><!-- image -->
      <img class="block" id="u8053_img" src="../img/<?php  echo $logo;?>" alt="" width="500" height="132"/>
     </div>
     </a>
     
  
    <div class="clearfix colelem" id="pu8051"><!-- group -->

</div>


<?php 
} else {;

include ('../cierre.php');

 };
 ?>
