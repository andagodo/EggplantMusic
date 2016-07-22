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

        // CUANDO SE HACE CLICK EN EL BOTON DE "+" EN MI CASO EN LAS BARRAS DE MENU RECUPERO EL ID DE LA CANCION
        $cancion.click(function(event) {
            event.preventDefault();
             $id_cancion = $( this ).attr('data-idc');
                var x=event.clientX;
                var y=event.clientY;
                //console.log(y);
                //console.log(x);
                var menu1=document.getElementById('menu1');
                menu1.style.top = y+"px";
                menu1.style.left = x+"px";
                menu1.style.display = "block";
                $("#menu1").find("a").attr("data-idc", $id_cancion);
            // obtengo el id de la cancion
            console.log($id_cancion);

        });

    });






