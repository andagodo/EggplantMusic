<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '../clases/ContieneAlbum.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '../logica/funciones.php';
/*$alb1=$_SESSION['idalbum'];*/
$alb = $_POST['idalbum'];
$conex = conectar();
$r = new ContieneAlbum('',$alb,'');
$datos_r=$r->consultaCancionA($conex);
$Cuenta=count($datos_r);
?>
 <script src="../estilos/js/menu1.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<div class="col-sm-2 col-md-3 affix-content">
<div class="container">

<ul id='playlist'>
<?php  
	for ($i=0;$i<$Cuenta;$i++)
{
	?>
	<div class="cancion">
		<li><a href='<?php echo $datos_r[$i][3]?>'><?php echo $datos_r[$i][1]?></a><div class="btn-cancion" data-idc="<?php echo $datos_r[$i][0]?>" ><span class="glyphicon glyphicon-th-list"></span></div></li>
	</div>
<?php
}
?>
</ul>
</div>
</div>
	
<script>
//<![CDATA[
var audio;
var playlist;
var tracks;
var current;
initaudio();
function initaudio(){current=0;
	audio=$('audio');
	playlist=$('#playlist');
	tracks=playlist.find('li a');
	len=tracks.length-1;audio[0].volume=1;
	playlist.find('a').click(function(e){e.preventDefault();
		link=$(this);
		current=link.parent().index();
		runaudio(link,audio[0])});
	audio[0].addEventListener('ended',function(e){current++;
		if(current>len){current=0;link=playlist.find('a')[0]}
		else{link=playlist.find('a')[current]}runaudio($(link),audio[0])})}
	function runaudio(link,player){player.src=link.attr('href');
	par=link.parents('.cancion');
	par.addClass('active').siblings().removeClass('active');
	audio[0].load();audio[0].play()}


  //]]>        
</script>
