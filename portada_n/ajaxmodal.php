<?php 
	include('bbdd.php');
	error_reporting(0);
 ?>

<span class="close">&times;</span>

<style>
	
	#vertgraph {
     width: 378px;
     height: 207px;
     position: relative;
 }
 #vertgraph ul {
     width: 378px;
     height: 207px;
     margin: 0;
     padding: 0;
 }
 #vertgraph ul li {
     position: absolute;
     width: 28px;
     height: 160px;
     bottom: 34px;
     padding: 0 !important;
     margin: 0 !important;
     background: red;
     text-align: center;
     font-weight: bold;
     color: white;
     line-height: 2.5em;
 }
 
 #vertgraph li.critical { left: 24px; background-position: 0px bottom !important; }
 #vertgraph li.high { left: 101px; background-position: -28px bottom !important; }
 #vertgraph li.medium { left: 176px; background-position: -56px bottom !important; }
 #vertgraph li.low { left: 251px; background-position: -84px bottom !important; }
 #vertgraph li.info { left: 327px; background-position: -112px bottom !important; }

</style>

<script>


	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];	

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
	    modal.style.display = "none";
	  }
	}
	</script>


<?php 
	if (isset($_POST['id'])) {
		$sqlpreg = "SELECT * FROM mensajes WHERE id = :id";
		$resultpreg=$conn->prepare($sqlpreg);
		$resultpreg->bindParam(':id', $_POST['id']);
		$resultpreg->execute();
		$resultadopreg = $resultpreg->fetch();

		$sqlres = "SELECT * FROM respuesta WHERE idmensaje = :idmensaje";
		$resultres=$conn->prepare($sqlres);
		$resultres->bindParam(':idmensaje', $_POST['id']);
		$resultres->execute();
		$resultadores = $resultres->fetchAll();

		for ($i=0; $i < count($resultadores); $i++) { 
			$cantrespuestas[$resultadores[$i]['valor']]=0;
			$nombrespuestas[$resultadores[$i]['valor']]=$resultadores[$i]['texto'];
		}

		if ($resultadopreg['otrosmot'] == 1) {
			$cantrespuestas[99] = 0;
			$nombrespuestas[99] = "Otros motivos";
		}

		

		$sqlresmen = "SELECT * FROM respuestamensajes WHERE idmensaje = :idmensaje";
		$resultresmen=$conn->prepare($sqlresmen);
		$resultresmen->bindParam(':idmensaje', $_POST['id']);
		$resultresmen->execute();
		$resultadoresmes = $resultresmen->fetchAll();

		foreach ($resultadoresmes as $rowresmen) {
			if ($rowresmen['respuesta'] == 99) {
				$cantrespuestas[99] += 1;
			}else{
				$cantrespuestas[$rowresmen['respuesta']] += 1;
			}
			
		}


?>
	<h3 style="text-align: center;"><?php echo $resultadopreg['texto']; ?></h3>



<?php
	$totalcantresp = 0;
	for ($i=0; $i < count($resultadores); $i++) {
		//echo $nombrespuestas[$i]."= ".$cantrespuestas[$i]. "<br>";
		$totalcantresp += $cantrespuestas[$i];
	}

	if ($resultadopreg['otrosmot'] == 1) {
		//echo $nombrespuestas[99]."= ".$cantrespuestas[99]. "<br>";
		$totalcantresp += $cantrespuestas[99];
	}
}

 ?>

<section class="grafico-barras">
	<ul>
	<?php 

		for ($i=0; $i < count($resultadores); $i++) {
			$total = $cantrespuestas[$i]*100;

			$porcentajefinal = ($cantrespuestas[$i]/$totalcantresp) * 100;
			echo $nombrespuestas[$i].": ".$cantrespuestas[$i]."<br>";

			?>
			<span class="barra-fondo">
    			<li class="barras" data-value="<?php echo round($porcentajefinal); ?>"></li>
     		</span>
	<?php
		}

		if ($resultadopreg['otrosmot'] == 1) {
			$porcentajefinal = ($cantrespuestas[99]/$totalcantresp) * 100;
			echo $nombrespuestas[99].": ".$cantrespuestas[99]."<br>";
			?>
			<span class="barra-fondo">
    			<li class="barras" data-value="<?php echo round($porcentajefinal); ?>"></li>
     		</span>
	<?php
		}
	 ?>        
	</ul>
</section>

<script>
$(document).ready(function() {
  $('.barras').each(function() {
     var dataWidth = $(this).data('value');
     $(this).css("width", dataWidth + "%");
    if (dataWidth <=25) { $(this).css("background-color", "red"); }
	else if (dataWidth >25 && dataWidth <=50){ $(this).css("background-color", "orange"); }
	else if (dataWidth >50 && dataWidth<=75) { $(this).css("background-color", "yellow"); }
	else if (dataWidth >75 && dataWidth<=100) { $(this).css("background-color", "green"); }	
  });
});
</script>

<style>
@import "lesshat";

@barHeight: 20px;
@borders: #717D95;
@primary: #59BAC0;

.transition (@property) {
  -webkit-transition: @property;
  -moz-transition: @property;
  -o-transition: @property;
  transition: @property 
}

.transform(@degree) {
  transform:rotate(@degree);
  -ms-transform:rotate(@degree);
  -webkit-transform:rotate(@degree); 
}

*{
  box-sizing: border-box;
}

.grafico-barras{
	margin-bottom: 1em;
	position: relative;
	width: 90%;
  margin: 3em;
	height: auto;
}

.barra-fondo{
  border-radius: 2px;
    background: #DAE4EB;
    margin-bottom: 10px;
    display: block;
}

.barras{  
    background-color: cyan;    
    .transition(all 1s ease-out);
    border-radius: 2px;
    cursor: pointer;
    margin-bottom: 10px;
    padding-left: .5em;
    position: relative;
    z-index: 9999;
    display: block;
    height: 20px;  
    width: 0%; 
    
    
    &:hover {
      .transition(all 0.5s ease);
    }
    
    &:last-child {
      margin-bottom: 0;
    }
    
    &:after {
      position: absolute;
      content: attr(data-value);
      display: none;
      
      font-size: 12px;
      border-radius: 4px;
      background: rgba(0,0,0,0.5);
      color: #fff;      
       
      padding: 0 10px;
      
      margin-left: 5px;
      left: 100%;
      top: 0;
    }
    
    &:hover:after {
      display: block;
    }
  
  
  &-legend {
    position: absolute;
    margin-right: 10px;
    left: -40px ;
    z-index: 9999;
  }

}
</style>