<?php
//	session_start();
//	require_once('funciones.php');
	$peso=$altura=$edad=$sexo=$TBM=$mensajes="";
	
	$error=false;
	// Verifico que el peso este seteado y dentro de los limites
	if(isset($_POST["peso"]) and !empty($_POST["peso"])){
		$peso=strip_tags ($_POST["peso"]);
			if(($peso<0) or ($peso>250)){
				$error=true;
				$mensaje="El peso deber estar entre 0 Kg y 250 Kg para ser valido";
			}
	}
	else{
		$error=true;
		$mensaje ="El formulario debe contener un peso"."<br>";
		}
	if($error){echo $mensaje;
	}
	//En este momento tengo el peso en Kg en la variable $peso
	//else {function Tasa Metabolica};//La profesora puso este else pero no me parece necesario.
	
	//Verifico que la altura esté seteada y dentro de los límites.
	if(isset($_POST["altura"]) and !empty($_POST["altura"])){
		$altura=strip_tags ($_POST["altura"]);
			if(($altura<0) or ($altura>250)){
				$error=true;
				$mensaje="La altura deber estar entre 1cm y 250 cm para ser valida";
			}
	}
	else{
		$error=true;
		$mensaje = "El formulario debe contener un valor de altura"."<br>";
		}
	if($error){echo $mensaje;
	}
	//Aqui tengo la altura en la variable $altura
	//Verifico la edad esté seteada y sus valores dentro de los límites.
	if(isset($_POST["edad"]) and !empty($_POST["edad"])){
		$edad=strip_tags ($_POST["edad"]);
			if(($edad<0) or ($edad>120)){
				$error=true;
				$mensaje="La edad deber estar entre 0 anio y 120 anios para ser valida";
			}
	}
	else{
		$error=true;
		$mensaje ="El formulario debe contener un valor de edad"."<br>";
		}
	if($error){echo $mensaje;
	}
	//En este momento tengo el valor de la edad en la variable $_edad.
	//Opero con las tres variables de peso, altura y edad para calcular la TBM.
	//Me falta llamar el resultado de radiobutton hombre o mujer y tipo rutina
	
		
	if (isset($sexo)&& $sexo=="Hombre"){
		$TBM =(10*$peso+6.25*$altura-5*$edad)+5;
	}
	else{
		$TBM = (10*$peso+6.25*$altura-5*$edad)-161;
		}
	
	
	
	//function calorias{} ??
	if($_POST["actividad"] == "01"){
		$calorias=$TBM*1.2; echo "Las calorias que debe consumir por dia son $calorias";
	}
	if($_POST["actividad"] == "02"){
		$calorias=$TBM*1.375; echo "Las calorias que debe consumir por dia son $calorias";
	}
	if($_POST["actividad"] == "03"){
		$calorias=$TBM*1.55; echo "Las calorias que debe consumir por dia son $calorias";
	}
	if($_POST["actividad"] == "04"){
		$calorias=$TBM*1.725; echo "Las calorias que debe consumir por dia son $calorias";
	}
	if($_POST["actividad"] == "05"){
		$calorias=$TBM*1.9; echo "Las calorias que debe consumir por dia son $calorias";
	}
	
?>