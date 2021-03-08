<?php  
include('bbdd.php');

if (($ide!=null) or ($validar==0)){;
 include('../portada_n/cabecera2.php');
 ?>


<div class="colocacion derecha" id="imprimir">
<div class="titulo">
<p class="enc">INTRODUCCION DE DATOS</p>
</div>
<div class="contenido">

<?php  


if (($rgpd=='1') and ($avisolegal=='1')){;
$sql1="UPDATE usuarios SET rgpd = '".$rgpd."', avisolegal = '".$avisolegal."' where user='".$gente."' and password='".$part."'";
//echo $sql1;
$result=$conn->exec($sql1);
//$result1=mysqli_query ($conn,$sql1) or die ("Invalid result usuarios");

};

?>
<script type="text/javascript">
window.location="https://control.ciudadanosanonimos.com/donaciones/donaciones.php";
</script>

</div>
<?php } else {;

include ('../cierre.php');

 };
 ?>