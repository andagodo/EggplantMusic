<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '../clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '../logica/funciones.php';
$conex = conectar();
$r = new Album();
$datos_r=$r->consultaTodosAlbum($conex);
$Cuenta=count($datos_r);
$Cuenta1=count($datos_r);
?>
 <script type="text/javascript">

        $(document).ready(function() {
            <?php for ($i=0;$i<$Cuenta1;$i++) { ?>
            $('#"<?php echo $datos_r[$i][1];?>"').click(function(){
                <?php $_SESSION['idalbum']= $datos_r[$i][0];?>
               <?php echo $_SESSION['idalbum'];?>
                $("#central").load('playlist.php');

            });
            
            <?php  } ?>
        });
    </script>

<div class="col-sm-2 col-md-3 affix-content">
<div class="container">

<ul id='playlist1'>
<?php
    for ($i=0;$i<$Cuenta;$i++)
{
    ?>
    
<li id='<?php echo $datos_r[$i][1]?>'><a href='#'><?php echo $datos_r[$i][1]?></a></li>
<?php
}
?>
</ul>
</div>
</div>




