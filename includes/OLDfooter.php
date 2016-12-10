<?php
if(! isset($_SESSION["mai"])){
	?>
 <script language="javascript">
   window.alert("Debes de estar logeado para ingresar a esta página.");
   location.href="/presentacion/indice.php";
 </script>
 <?php
}
?>


    <script src="/estilos/js/bootstrap.min.js"></script>
    <script src="/estilos/js/plugins/morris/raphael.min.js"></script>
    <script src="/estilos/js/plugins/morris/morris.min.js"></script>
    <script src="/estilos/js/plugins/morris/morris-data.js"></script>

</body>