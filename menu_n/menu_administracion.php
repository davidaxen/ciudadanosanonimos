<?php
include('bbdd.php');

if ($ide!=null){;

  include('../portada_n/cabecera2.php');?>


<div class="colocacion derecha" id="imprimir">
<div class="titulo">
<p class="enc">ADMINISTRACION</p></div>
<div class="contenido">



<!-- FACTURACION -->
			<li><a href="#">Administracion</a>
		
				<ul>
          <li><a href="/administracion_n/dclientes.php">Clientes</a></li>

          <li><a href="/administracion_n/dcambioanual.php">Datos cambiantes anuales</a></li>


				</ul>
			</li>
<!-- FIN FACTURACION -->
</div>
<?php }else{;
include ('../cierre.php');
 };?>
</body>
</html>