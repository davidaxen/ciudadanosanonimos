<?php 
//extract($_GET);
extract($_COOKIE);
//extract($_POST);

if ($com=='comprobacion'){;

include('portada_n/cabeceramej.php');?>


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

<div class="colocacion derecha">

<!-- arriba  -->
<div class="main3">
<span><?php  include('logo3.php');?></span>
<!--<span><?php  include('portada_n/portada2.php');?></span>-->
</div>

<div id="main4">
<H1>ESTAMOS MEJORANDO EL SISTEMA EN UN BREVE PLAZO TENDRA ACCESO</H1>
</div>

	


</div>
    

</body>

</html>
<?php }else{;
include ('cierre.php');
};?>