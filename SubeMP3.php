<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';

$accion=trim($_POST['accion']);

echo $accion; 

if ($accion == "encode"){
	
// $target_path = "audio/test/";
// $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

$data = file_get_contents($_FILES['ArchivoSubido']['tmp_name']);
$data = base64_encode($data);
// echo $data;


$NombreArchivo = GenerarClave(20,false); 

$nombre_archivo = "audio/test/".$NombreArchivo; 
 
    if(file_exists($nombre_archivo))
    {
     	?>
		<script language="javascript">
			window.alert("Este archivo ya existe.");
		</script>
		<?php
    }
/* 
    else
    {
        $mensaje = "El Archivo $nombre_archivo se ha creado";
    }
*/ 
    if($archivo = fopen($nombre_archivo, "a"))
    {
        if(fwrite($archivo, $data))
        {
     	?>
		<script language="javascript">
			window.alert("Se guardo el archivo.");
		</script>
		<?php
        }
        else
        {
     	?>
		<script language="javascript">
			window.alert("NO se guardo el archivo.");
		</script>
		<?php
        }
 
        fclose($archivo);
    }
 
 } elseif ($accion == "decode"){
	 

	 
	 $data = file_get_contents($_FILES['ArchivoSubido']['tmp_name']);
	$data = base64_decode($data);
	
	 $NombreArchivo = GenerarClave(20,false);
	 
$nombre_archivo = "audio/test/".$NombreArchivo;

 $nombre_archivo = $nombre_archivo . ".mp3";
 
    if(file_exists($nombre_archivo))
    {
     	?>
		<script language="javascript">
			window.alert("Este archivo ya existe.");
		</script>
		<?php
    }
/* 
    else
    {
        $mensaje = "El Archivo $nombre_archivo se ha creado";
    }
*/ 
    if($archivo = fopen($nombre_archivo, "a"))
    {
        if(fwrite($archivo, $data))
        {
     	?>
		<script language="javascript">
			window.alert("Se guardo el archivo.");
		</script>
		<?php
        }
        else
        {
     	?>
		<script language="javascript">
			window.alert("NO se guardo el archivo.");
		</script>
		<?php
        }
 
        fclose($archivo);
    }	 
	 
	 
	 
 }







//if(move_uploaded_file($data, $target_path)){ 
//	echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";
//}else{
//	echo "Ha ocurrido un error, trate de nuevo!";
//} 



?>
