<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '../clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '../logica/funciones.php';
$conex = conectar();
$r = new Album();
$datos_r=$r->consultaTodosAlbum($conex);
$Cuenta=count($datos_r);

?>
 <script type="text/javascript">

        $(document).ready(function() {
            <?php for ($i=0;$i<$Cuenta;$i++) { ?>
            $('#<?php echo $datos_r[$i][0];?>').click(function(){
               <?php $_SESSION['idalbum']= $datos_r[$i][0];?>
                $("#central").load('../front_include/playlist.php', { idalbum : "<?php echo $datos_r[$i][0];?>" });

            });
            
            <?php  } ?>
        });
    </script>

<div class="col-sm-2 col-md-3 affix-content">
<div class="container">

<ul id='album'>
<?php
    for ($i=0;$i<$Cuenta;$i++)
{
    ?>
    
<li><a href='#' id='<?php echo $datos_r[$i][0]?>'><?php echo $datos_r[$i][1]?></a></li>
<?php
}
?>
</ul>
</div>
</div>




