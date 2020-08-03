<?php 
include('bbdd.php');

if ($com=='comprobacion'){;

include('portada_n/cabecera.php');
?>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>

<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 8px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 40px;
  color:#fff;
}


#main {
  transition: margin-left .5s;
  padding: 16px;
  padding-top:80px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 80px;}
  .sidenav a {font-size: 18px;}
}

.main3 {
	 /*width: calc (100% - 200px);*/
	 width:100%;
	 position:relative;
	 top:0px;
    border: 0px solid #fff;
    text-align:center;
    display:inline-table;
}

.caja3{
	 padding-top:5px;
	 padding-left:5px;
	 padding-right:5px;
    border: 0px solid <?php  echo $colorborder;?>;
    text-align:center;
    min-width: 100px;
    height: 90px;
    border-bottom:5px inset #000;
    vertical-align: middle;
    margin:5px;
    border-radius: 8px;
    background-color:white;
    box-shadow: 1px 15px 18px #888888;
	 display:inline-table;
	 text-align:center;
}


.main6 {
	 /*width: calc (100% - 200px);

	 */
	 top:10px; 
	 width:100%;
	 position:relative;
	 padding:10px;
    border: 0px solid #fff;
    text-align:center;
}




</style>
<!--colocacion derecha-->
<div id="main">

<div class="main3">
<span><?php // include('portada_n/portada2.php');?></span>
</div>



<div class="main6">
<?php include ('estilo/tab.htm');?>

<?php 
$sql="select * from portadapag,paginapor where paginapor.idpag=portadapag.idpag and idempresa='".$ide."' order by idportada asc";
//echo $sql;
$result=$conn->query($sql);
$resultmos=$conn->query($sql);
$resultmos1=$conn->query($sql);
$row=count($result->fetchAll());

/*$result=mysqli_query ($conn, $sql) or die ("Invalid result idempresas");
$row=mysqli_num_rows($result);*/
?>


<div class="tab">
<?php 
/*for ($j=0;$j<$row;$j++){;
mysqli_data_seek($result,$j);
$resultado=mysqli_fetch_array($result);*/
foreach ($resultmos as $rowmos) {
$tituloport=$rowmos['titulo'];
$pagport=$rowmos['pag'];
$iconoport=$rowmos['icono'];
?>

  <button class="tablinks" onclick="openCity(event, 'd<?php  echo $j;?>')" <?php if($j==0){;?>id="defaultOpen"<?php }?> >
  <img src="../img/iconos/<?php echo $iconoport;?>" width="32px" style="vertical-align:middle;"> <?php  echo $tituloport;?></button>
  
 <?php 
};
?> 
</div>




<?php 
/*for ($j=0;$j<$row;$j++){;
mysqli_data_seek($result,$j);
$resultado=mysqli_fetch_array($result);*/
foreach ($resultmos1 as $rowmos1) {
$tituloport=$rowmos1['titulo'];
$pagport=$rowmos1['pag'];
$iconoport=$rowmos1['icono'];
?>
<div id="d<?php  echo $j;?>" class="tabcontent">
  <h3> <img src="../img/iconos/<?php echo $iconoport;?>" width="32px" style="vertical-align:middle;"> <?php  echo $tituloport;?></h3>
  <p><iframe style="border:0" name="bloque<?php  echo $j;?>" src="portada_n/<?php  echo $pagport;?>" width="100%" height="325" scrolling="auto"></iframe></p>
</div>


<?php 
};
?>
<?php include ('js/tabjs.htm');?>



</div>
</div>



    

</body>

</html>
<?php }else{;
include ('cierre.php');
};?>