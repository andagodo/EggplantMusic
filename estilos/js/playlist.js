$(document).ready(
	function(){
		<?php for ($i=0;$i<$Cuenta;$i++) { ?>
			$('div.<?php echo $i?>').click(
				function(){
					console.log("2");
			    			}
			    						); 
		<?php  } ?>
			   }
			   		);
