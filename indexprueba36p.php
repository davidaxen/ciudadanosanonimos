<?php 

extract($_COOKIE);
//print_r($_COOKIE);
if ($com=='comprobacion'){;

?>
<?php  

$sql56="select * from previopago where idempresas='".$ide."'";
//echo $sql56;
$result56=mysql_query ($sql56) or die ("Invalid result previopago");
$row=mysql_affected_rows();

if($row>0){;

if ($tprecios==1){;
include('administracion_n/antcompra2.php');
}else{;
include('administracion_n/antcompra.php');
};


}else{

if ($tprecios==1){;
include('administracion_n/precompra2.php');
}else{;
include('administracion_n/precompra.php');
};

};
?>
		
	
</body>

</html>
<?php }else{;
include ('cierre.php');
};?>

