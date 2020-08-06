<?php 
include('bbdd.php');

if ($com=='comprobacion'){;

 include('portada_n/cabeceralibre.php');


$sql56="select * from proyectos where idproyectos='".$idpr."'";
//echo $sql56;
$result56=$conn->query($sql56);
$resultados56=$result56->fetch();

/*$result56=mysqli_query ($conn, $sql56) or die ("Invalid result sql56");
$resultados56 = mysqli_fetch_array ($result56);*/
$rgpdt=$resultados56['rgpd'];
$avisolegalt=$resultados56['avisolegal'];

 ?>
<style>
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


<div id="main">

<div class="main3">
<span><?php  //include('portada_n/portada2.php');?></span>

</div>

<div class="main6">
<?php //include ('estilo/tab.htm');?>

<?php 
$sql="select * from portadapag,paginapor where paginapor.idpag=portadapag.idpag and idempresa='".$ide."' and paginapor.idpag in ('1','2') order by idportada asc";
//echo $sql;
$result=$conn->query($sql56);
$row=count($result->fetchAll());

/*$result=mysqli_query ($conn, $sql) or die ("Invalid result idempresas");
$row=mysqli_num_rows($result);*/
?>


<div class="tab">
<form method="post" action="intro2p.php" name="login_form">
<table>
<tr><td>
<textarea name="rgpdt" disabled cols="80" rows="15">
<?php echo $rgpdt;?></textarea></td><td><input type='checkbox' name='rgpd' value="1">Aceptaci&oacute;n de RGPD</td></tr>
<tr><td>
<textarea name="avisolegalt" disabled cols="80" rows="15"><?php echo $avisolegalt;?></textarea>
</td><td>
<input type='checkbox' name="avisolegal" value="1">Aceptaci&oacute;n de Aviso Legal</td></tr>
<tr><td><input type="submit" name="enviar"></td></tr>
</table>
</form>

</div>




</div>



</div>
    

</body>

</html>
<?php }else{;
include ('cierre.php');
};?>