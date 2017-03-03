<?php


function conectar()
{

    try {
    	//si es windows ejecuto un driver de pdo
    	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
		{
			$sqlserver = "sqlsrv:Server=192.168.3.11;Database=eggplantmusic";
			$con = new PDO($sqlserver, "eggplantmusic", "eggplantmusic");
		}
		//si no es windows uso otro driver de pdo
		else
		{
			$con = new PDO("dblib:host=mssql;dbname=eggplantmusic", "eggplantmusic", "eggplantmusic");
		}
		$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        return($con);

		
	} catch (PDOException $e) {
		?>
		
		<script language="javascript">
			window.alert("Hubo un error en la conexión con la base de datos\nIntente nuevamente.");
			location.href="/presentacion/indice.php";
		</script>
		
		<?php
		exit();
    }
}

function desconectar($con)
{
	$con = null;
   //sqlsrv_close($con);
}



function BrunitoPesadito ($conex)
	{ 
		$sql = "SELECT scope_identity()";
		
		$result = $conex->prepare($sql);
		$result->execute();
		$resultados= $result->fetchAll();
		return $resultados;
	}
	

function ActivacionMail($mail, $nom, $ape, $url){
 
$destinatario = $mail;
$asunto = "Eggplant Music - Activar Usuario";
$cuerpo = '
<img <img src="http://localhost:8080/img/LOGO.jpg" alt="Eggplant Music">';
$cuerpo = '
Eggplant Music - Activar usuario
<h1>Hola ';
$cuerpo .= $nom ;
$cuerpo .= " ";
$cuerpo .= $ape ;
$cuerpo .= '</h1>
<strong>Gracias por registrarte en Eggplant Music</strong>.';
$cuerpo .= 'Para completar el registro tienes que confirmar que has recibido este email haciendo click en el siguiente enlace:
<p style="text-align: center;">';
$cuerpo .= $url;
$cuerpo .= '</p>';
$cuerpo .= '<p>Saluda atentamente, </p>';
$cuerpo .= '<p><strong> Equipo Eggplant Blue. </strong></p>';
 
 
//para el envío en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
 
//dirección del remitente
$headers .= "From: Admin Eggplant Music \r\n";
 
//dirección de respuesta, si queremos que sea distinta que la del remitente
$headers .= "Reply-To: direccion_respuesta@dominio.com \r\n";

mail($destinatario,$asunto,$cuerpo,$headers);
 
}


function GenerarClave($longitud,$especiales){
// Array con los valores a escoger
$semilla = array();
$semilla[] = array('a','e','i','o','u');
$semilla[] = array('b','c','d','f','g','h','j','k','l','m','n','p','q','r','s','t','v','w','x','y','z');
$semilla[] = array('0','1','2','3','4','5','6','7','8','9');
$semilla[] = array('A','E','I','O','U');
$semilla[] = array('B','C','D','F','G','H','J','K','L','M','N','P','Q','R','S','T','V','W','X','Y','Z');
$semilla[] = array('0','1','2','3','4','5','6','7','8','9');
 
// si puede contener caracteres especiales, aumentamos el array $semilla
if ($especiales) { $semilla[] = array('$','#','%','&','@','-','?','¿','!','¡','+','-','*'); }
 $clave = "";
// creamos la clave con la longitud indicada
for ($bucle=0; $bucle <$longitud; $bucle++)
{
// seleccionamos un subarray al azar
$valor = mt_rand(0, count($semilla)-1);
// selecccionamos una posición al azar dentro del subarray
$posicion = mt_rand(0,count($semilla[$valor])-1);
// cogemos el carácter y lo agregamos a la clave
$clave .= $semilla[$valor][$posicion];
}
// devolvemos la clave
return $clave;
}



?>
