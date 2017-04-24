<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
$conex = conectar();


if(isset($_POST['npass'])){
	
	$npass=trim($_POST['npass']);
	$clave=trim($_POST['clave']);
	
	if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $npass)){
		$conex = conectar();
		$u= new Admin ('','','',$npass,'','','','',$clave);	// Crea un nuevo objeto de tipo Admin con los valores de nueva pass y clave de mail.
		$ok=$u->EstablecePass($conex,$npass);
		if ($ok == true) {
			
			$ok2=$u->ConfirmaMail($conex);
			if($ok2 == true){
				
				$ok3=$u->SetNullClave($conex);
				
				if ($ok3 == true) {
					?>
					<script language="javascript">
						window.alert("Gracias por registrarte.\nPor favor, inicie sesión.");
						location.href="/presentacion/indice.php";
					</script>
					<?php
				}else{
					?>
					<script language="javascript">
						window.alert("Falló al activar tu usuario.\nPor favor, escriba a ayuda@eggplantblue.com.uy.");
						location.href="/presentacion/indice.php";
					</script>
					<?php					
					
				}
				
			}else{
				?>
				<script language="javascript">
					window.alert("Falló al activar tu usuario.\nPor favor, escriba a ayuda@eggplantblue.com.uy.");
					location.href="/presentacion/indice.php";
				</script>
				<?php
			}
			

			//	$u->SetCeroClave($conex);	// Función pone un "0" en el campo "Clave" del usuario que acaba de iniciar sesión.
		}else{
			?>
			<script language="javascript">
				window.alert("Falló al actualizar password.\nPor favor, escriba a ayuda@eggplantblue.com.uy.");
				location.href="/presentacion/indice.php";
			</script>
			<?php
		}
	
	}else{
		?>
		<script language="javascript">
			var clave= "<?php echo $clave;?>" ;
			alert('Este contraseña no cumple con lo mínimo de seguridad');
			window.location.href='/presentacion/indice.php?id='+clave;
		</script>
		<?php
	}
	
}else{
	
	$clave = $_GET["id"];
	$u= new Admin ('','','','','','','','',$clave);

	$ok=$u->ConsultaClave($conex);
	
	if ($ok == true) {
		header('Location: /presentacion/indice.php?id=' . $clave);
		
	}else{
		?>
		<script language="javascript">
			window.alert("Este link ya fue utilizado.\nPor favor, escriba a ayuda@eggplantblue.com.uy.");
			location.href="/presentacion/indice.php";
		</script>
		<?php
	}

}
?>