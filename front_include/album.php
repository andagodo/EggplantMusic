<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';

$conex = conectar();
$r = new Album();
$datos_r=$r->consultaTodosAlbum($conex);
$Cuenta=count($datos_r);

?>

<div class="col-sm-2 col-md-3 affix-content">
<div class="container">

<ul id='album'>
<?php
    for ($i=0;$i<$Cuenta;$i++)
{
    ?>
    
<li><a href='#' data-id='<?php echo $datos_r[$i][0]?>'><?php echo $datos_r[$i][1]?></a></li>
<?php
}
?>
</ul>
</div>
</div>




