//muestro menu de cancion de forma dinamica
/*
function mostrarMenu1(event){

	event.preventDefault();
	var x=event.clientX;
 	var y=event.clientY;
	//console.log(y);
	//console.log(x);

	var menu1=document.getElementById('menu1');
	menu1.style.top = y+"px";
	menu1.style.left = x+"px";
	menu1.style.display = "block";
}

*/
$(function(){
        var $cancion = $("div.btn-cancion");

        // Esto abre el menu 1 de la cancion dentro del album
        $cancion.click(function(event) {
            event.preventDefault();
            $id_cancion = $( this ).attr('data-idc');
            $idca_cancion = $( this ).attr('data-idca');
                var x=event.clientX;
                var y=event.clientY;
                //console.log(y);
                //console.log(x);
                var menu1=document.getElementById('menu1');
                menu1.style.top = y+"px";
                menu1.style.left = x+"px";
                menu1.style.display = "block";
                $("#menu1").find("a").attr("data-idc", $id_cancion);
                $("#menu1").find("a").attr("data-idca", $idca_cancion);
            // obtengo el id de la cancion
            console.log($id_cancion);

        });

    });






