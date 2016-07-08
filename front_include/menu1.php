<?php 
$canc1 = $_POST['var1'];
$canc2 = $_POST['var2'];

?> 
	<ul>
            <li>Menu</li>
            <li><a href="#" id="<?php echo $canc1 ;?>" >Añadir a cola de reproducción</a></li>
    </ul>
    


<script type="text/javascript">
$(document).ready(function() {
	$('#<?php echo $canc1 ;?>').click(function(){
				console.log(<?php echo $canc1[1]?>);
		});
});
</script>
