<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/ContieneAlbum.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
/*$alb1=$_SESSION['idalbum'];*/
$alb = $_POST['idalbum'];
$conex = conectar();
$r = new ContieneAlbum('',$alb,'');
$datos_r=$r->consultaCancionA($conex);
$Cuenta=count($datos_r);
?>
<script src="/estilos/js/menu1.js"></script>
<div class="col-sm-2 col-md-3 affix-content">
<div class="container">

<ul id='playlist'>
<?php  
	for ($i=0;$i<$Cuenta;$i++)
{
	?>
	<div class="cancion">
		<li><a href='#'><?php echo $datos_r[$i][1]?></a>
			<div class="btn-cancion" data-idc="<?php echo $datos_r[$i][0]?>" data-idca="<?php echo $datos_r[$i][2]?>">
				<span class="glyphicon glyphicon-option-horizontal"></span>
			</div>
		</li>
	</div>
<?php
}
?>
</ul>
</div>
</div>
	

