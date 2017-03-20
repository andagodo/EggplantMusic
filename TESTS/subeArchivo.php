<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload de archivos con Ajax</title>
</head>
<body>
    
    <form enctype="multipart/form-data" id="formuploadajax" method="post">
		<div class="form-group">
			<label>Cargar Canciones:</label>
			<input name="ArchivoSubido[]" multiple="true" type="file" accept=".mp3" required/>
			<input type="submit" value="Subir archivos"/>
		</div>
    </form>
    <div id="respuesta"></div>
	

    
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
    $(function(){
        $("#formuploadajax").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formuploadajax"));
            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                url: "/includes/MusicAdmin/procesa/ProcesaAltaMusica.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false
            })
                .done(function(res){
                    $("#respuesta").html(res);
                });
        });
    });
    </script>
</body>
</html>